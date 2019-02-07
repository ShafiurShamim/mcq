<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        collect([
            [
                'name' => 'John Doe',
                'username' => 'johndoe',
                'email' => 'john@example.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Indiana Jones',
                'username' => 'indy',
                'email' => 'indy@example.com',
                'password' => bcrypt('secret')
            ],
        ])->each(function ($user) {
            factory(User::class)->create(
                [
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'password' => bcrypt('secret')
                ]
            );
        });
    }
}
