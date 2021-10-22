<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Anderson Lucas',
            'email' => 'andersonlucas.s18@gmail.com',
            'cpf'   => '12345678910',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name'  => 'Admin',
            'email' => 'admin@admin.com',
            'cpf'   => '12345677896',
            'password' => bcrypt('12345'),
        ]);
    }
}
