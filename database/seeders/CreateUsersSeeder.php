<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Superadmin User',
                'email' => 'admin@gmail.com',
                'type' => 0,
                'active' => 1,
                'branch_id' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Supervisor User',
                'email' => 'supervisor@gmail.com',
                'type' => 1,
                'active' => 1,
                'branch_id' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Sub Supervisor User',
                'email' => 'subsupervisor@gmail.com',
                'type' => 2,
                'active' => 1,
                'branch_id' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Sales User',
                'email' => 'sales@gmail.com',
                'type' => 3,
                'active' => 1,
                'branch_id' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Reseller',
                'email' => 'reseller@gmail.com',
                'type' => 4,
                'active' => 1,
                'branch_id' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Reseller 2',
                'email' => 'reseller2@gmail.com',
                'type' => 4,
                'active' => 0,
                'branch_id' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Reseller 3',
                'email' => 'reseller3@gmail.com',
                'type' => 4,
                'active' => 0,
                'branch_id' => 2,
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
