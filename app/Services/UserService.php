<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\User;

class UserService
{
    public function store(array $userData, array $address): User
    {
        $user = User::where('email', $userData['email'])->first(['id', 'name', 'email']);

        if (!$user) {
            $user = User::create([...$userData, 'password' => bcrypt(Str::uuid())]);
        }

        $user->addresses()->updateOrCreate(
            [
                'zipcode' => $address['zipcode'],
                'number' => $address['number']
            ],
            $address
        );

        return $user;
    }
}
