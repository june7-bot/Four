<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Company;
use App\Lottery;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function result()
    {
        $money = rand(0, 99999999);
        $buyer = Buyer::create(['name' => 'june', 'money' => $money]);
        Company::create(['money' => 0]);


        $lottery = new Lottery(['round' => 1]);
        $number = request()->number;
        if(! $buyer->insertNumber( rand(1, 5) , $lottery , $number) ){
            $check = "꽝";
        }else $check = "추가흐들빈디ㅏㅏ";

        return view('result', compact('check'));
    }
}
