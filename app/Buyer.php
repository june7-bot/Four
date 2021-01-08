<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{

    public function buy($count)
    {
        $sum = 500 * $count;
        $bc = $this->money;
        $this->update([
            'money' => $bc-$sum
        ]);
    }
}
