<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $postnr
 * @property int|null $dob
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $last_login
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property int $public
 * @property int|null $sign_language_id The default sign language
 * @property int|null $text_language_id The default text language
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Language|null $defaultSignLanguage
 * @property-read \App\Models\Language|null $defaultTextLanguage
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sign[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Word[] $requests
 * @property-read int|null $requests_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sign[] $signs
 * @property-read int|null $signs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sign[] $views
 * @property-read int|null $views_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Word[] $wordsCreated
 * @property-read int|null $words_created_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Word[] $wordsEdited
 * @property-read int|null $words_edited_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePostnr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSignLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTextLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'postnr',
        'dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function defaultSignLanguage()
    {
        return $this->belongsTo(Language::class, 'sign_language_id');
    }

    public function defaultTextLanguage()
    {
        return $this->belongsTo(Language::class, 'text_language_id');
    }

    public function wordsCreated()
    {
        return $this->hasMany(Word::class, 'creator_id');
    }

    public function wordsEdited()
    {
        return $this->hasMany(Word::class, 'editor_id');
    }

    public function signs()
    {
        return $this->hasMany(Sign::class, 'creator_id');
    }

    public function requests()
    {
        return $this->belongsToMany(Word::class, 'requests')->as('requests')->using(Request::class)->withTimestamps();
    }

    public function likes()
    {
        return $this->belongsToMany(Sign::class, 'likes')->as('likes')->using(Like::class)->withTimestamps();
    }

    public function views()
    {
        return $this->belongsToMany(Sign::class, 'views')->as('views')->withTimestamps();
    }
}
