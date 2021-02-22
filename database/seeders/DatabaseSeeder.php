<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
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
        DB::table('users')->delete();
        $this->createNewUsers();
    }

    protected function createNewUsers()
    {
        $password = Hash::make('123456a@A'); // Default user password

        $d = [

            ['name' => 'Adminitrator',
                'email' => 'admin@admin.com',
                'userName' => 'admin',
                'password' => $password,
                'role_id' => '1',    //admin
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            ['name' => 'Teacher1',
                'email' => 'teacher1@teacher.com',
                'role_id' => '2', //teacher
                'userName' => 'teacher1',
                'password' => $password,
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            ['name' => 'Teacher2',
                'email' => 'teacher2@teacher.com',
                'role_id' => '2', //teacher
                'userName' => 'teacher2',
                'password' => $password,
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            ['name' => 'Student1',
                'email' => 'student1@student.com',
                'role_id' => '3',
                'userName' => 'student1',
                'password' => $password,
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],

            ['name' => 'Student2',
                'email' => 'student2@student.com',
                'role_id' => '3',
                'userName' => 'student2',
                'password' => $password,
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
        ];
        DB::table('users')->insert($d);
    }
}
