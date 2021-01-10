<?php

namespace App;

use http\Exception;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    public function buy($count, $company)
    {
        $sum = 500 * $count;
        $bc = $this->money;

        if($this->money < 500 )
            return Exception::class;
        else{
        $this->update([
            'money' => $bc-$sum
        ]);
            $company->addMoney($sum);
        }
    }

    public function insertNumber($count , Lottery $round , $wn)
    {
//        for ($i = 0; $i < $count; $i++) {
            $num = rand(1000, 9999);

            $this->lotterys()->save($round);

            if( $this->lotterys->first()->checkNumber($wn) )
            {
                return true;
            }
            else return false;
//        }
    }

    public function company(){
      return $this->belongsTo(Company::class);
    }

    public function lotterys()
    {
        return $this->hasMany(Lottery::class);
    }
}
