<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{



//
//    public function checkNumber($n)
//    {
//        if($this->winningNumber == $n) {
//            $this->makeWinningNumber();
//            return true;
//        }
//        else return false;
//    }

    public function addMoney($sum)
    {
        $nowMoney = $this->money;
        $this->update([
            'money' => $nowMoney + $sum
        ]);
    }

    public function buyers()
    {
        return $this->hasMany(Buyer::class);
    }
}
