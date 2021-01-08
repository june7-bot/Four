<?php

namespace Tests\Feature;

use App\Buyer;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserBuyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_buy()
    {
        $buyer = Buyer::create(['name' => 'june', 'money' => 10000]);

        $buyer->buy(1);

        $this->assertEquals($buyer->money-500, $buyer->money);
    }
}
