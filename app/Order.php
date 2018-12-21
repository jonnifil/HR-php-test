<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    public function orderProduct()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function statusName()
    {
        switch ($this->status) {
            case 0:
                return 'новый';
                break;
            case 10:
                return 'подтвержден';
                break;
            case 20:
                return 'завершен';
                break;
            default: return '';
        }
    }

    public function sumOrder()
    {
        $sum = 0;
        foreach ($this->orderProduct as $product) {
            $sum += $product->sumProduct();
        }
        return $sum;
    }
}
