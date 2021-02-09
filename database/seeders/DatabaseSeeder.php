<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    }

    protected function createNewUsers()
    {
        $password = Hash::make('12345678'); // Default user password

        $d = [

            ['name' => 'Adminitrator',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => $password,
                'user_type' => '1',    //admin
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Teacher Mike',
                'email' => 'teacher@teacher.com',
                'user_type' => '2', //teacher
                'username' => 'teacher1',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Thanh Ngo',
                'email' => 'thanhnx@student.com',
                'user_type' => '3',
                'username' => 'thanhnx',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Minh Nam',
                'email' => 'nam@student.com',
                'user_type' => '3',
                'username' => 'nam',
                'password' => $password,
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
            ],
        ];
        DB::table('users')->insert($d);
    }
}
