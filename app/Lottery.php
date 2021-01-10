<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lottery extends Model
{
    protected $table = 'lottery';

    public function checkNumber($num)
    {
        if($this->winningNumber != $num )
            return false;
        else{
            $this->match();
            return true;
        }
    }

    private function match()
    {
        $buyerId = $this->buyer_id;
        $buyer = $this->buyer->where('id', $buyerId)->first();
        $money = $buyer->money;
        $buyer->update(['money' => $money + 10000 ]);


    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }


}
