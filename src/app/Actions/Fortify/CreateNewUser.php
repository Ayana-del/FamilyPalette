<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Family;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return DB::transaction(function () use ($input) {

            $family = Family::create([
                'name' => $input['name'] . '家',
                'invite_code' => strtoupper(substr(md5(uniqid()), 0, 8)),
            ]);

            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'family_id' => $family->id,
            ]);

            Profile::create([
                'user_id' => $user->id,
                'color_code' => '#3490dc',
                'theme_id' => 1,
            ]);

            return $user;
        });
    }
}