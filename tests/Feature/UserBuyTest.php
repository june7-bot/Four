<?php

namespace Tests\Feature;

use App\Buyer;
use App\Company;
use App\Lottery;
use App\User;
use http\Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserBuyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\BuyerSeeder::class);
    }

    public function test_user_buy()
    {
        $buyer = Buyer::first();
        $company = Company::first();

        $buyermoney = $buyer->money;
        $buyer->buy(1, $company );

        $this->assertEquals($buyermoney - 500 , $buyer->money);
        $this->assertEquals(500 , $company->money);


    }

    public function test_user_no_money()
    {
        $buyer = Buyer::create(['name' => 'june1', 'money' => 400]);
        $company = Company::first();

        self::assertEquals(Exception::class,  $buyer->buy(1, $company ) );
    }

    public function test_user_checking_winningnumber()
    {

        $buyer = Buyer::first();

        $lottery = new Lottery(['round' => 1]);
        $lottery->makeWinningNumber();

        $result = $buyer->insertNumber( rand(1, 5) , $lottery );

        self::assertFalse($result);
    }

    public function test_match_winning_number()
    {
        $buyer = Buyer::first();
        $lottery = new Lottery(['round' => 1 , 'winningNumber' => rand(1000,9999)]);
        $wn = $lottery->winningNumber;
        $temp = $buyer->money;
        $buyer->insertNumber( rand(1, 5) , $lottery , $wn);

        self::assertEquals($temp + 10000, $buyer->refresh()->money );

    }


}
