<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('postnr')->nullable();
            $table->integer('dob')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->useCurrent();
            $table->string('password');
            $table->boolean('public')->default(0);
            $table->foreignId('sign_language')->nullable()->comment("The default sign language")->constrained('languages');
            $table->foreignId('text_language')->nullable()->comment("The default text language")->constrained('languages');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}