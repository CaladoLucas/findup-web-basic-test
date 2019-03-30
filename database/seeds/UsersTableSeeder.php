<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'      => 'Admin',
            'email'     => 'admin@findup.com.br',
            'password'  => app('hash')->make('654321')
        ]);

        for ($i = 1;$i <= 10;$i++){
            App\User::create([
                'name'      =>  str_random(10),
                'email'     => str_random(10).'@findup.com.br',
                'password'  => app('hash')->make('123456'),
            ]);
        }        
    }
}
