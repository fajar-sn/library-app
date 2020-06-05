<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin Fajar',
                'email' => 'fajarsn@pens.ac.id',
                'is_admin' => '1',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Fajar',
                'email' => 'fajarsn@it.student.pens.ac.id',
                'is_admin' => '0',
                'password' => bcrypt('123456')
            ],
        ];
        foreach($user as $key => $value)
            User::create($value);
    }
}
