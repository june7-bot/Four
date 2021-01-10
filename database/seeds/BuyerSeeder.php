<?php

use App\Buyer;
use App\Company;
use App\Lottery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BuyerSeeder extends Seeder
{
    public function run()
    {
        $money = rand(0, 99999999);
        Buyer::create(['name' => 'june', 'money' => $money]);
        Company::create(['money' => 0]);

    }
}
