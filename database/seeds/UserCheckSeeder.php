<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserCheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number = Company::create(['number', Str::random(4)]);

        User::create(['name' => 'june', 'money' => Str::random(8)]);


    }
}
