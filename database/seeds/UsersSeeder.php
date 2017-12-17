<?php

use Illuminate\Database\Seeder;

use App\Models\User as User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::where('id', '<>', null)->delete();

        User::create([
            'name' => 'Alessio Vietri',
            'email' => 'alvietri@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
