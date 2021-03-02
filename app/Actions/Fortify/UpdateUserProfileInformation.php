<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
            'postnr' => ['nullable', 'numeric', 'min:1000', 'max:9990'],
            'dob' => ['nullable', 'numeric', 'min:1900', 'max:' . Carbon::now()->year],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill($this->createBasisInformation($input))->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $info = $this->createBasisInformation($input);
        $info['email_verified_at'] = null;

        $user->forceFill($info)->save();
        $user->sendEmailVerificationNotification();
    }

    /**
     * Creates a array with the basis information needed whether the user need to verify the mail or not
     *
     * @param array $input
     * @return array
     */
    private function createBasisInformation(array $input): array
    {
        return [
            'name' => $input['name'],
            'email' => $input['email'],
            'postnr' => $input['postnr'],
            'dob' => $input['dob']
        ];
    }
}
