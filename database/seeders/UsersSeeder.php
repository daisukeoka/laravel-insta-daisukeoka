<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function run(): void
    {
        $users = [
            [
                'name' => 'aaaaa',
                'email' => 'aaaaa@email.com',
                'password' => Hash::make('12345678'),
                'role_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'bbbbb',
                'email' => 'bbbbb@email.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'ccccc',
                'email' => 'ccccc@email.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]

        ];
        $this->user->insert($users);
    }
}
