<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{

    public function buy($count)
    {
        $sum = 500 * $count;
        $this->update([
            'money' => $sum
        ]);
    }
}
