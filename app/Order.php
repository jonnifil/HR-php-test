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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderProduct()
    {
        return $this->hasMany('App\OrderProduct');
    }

    /**
     * @return string
     */
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

    /**
     * @return int
     */
    public function sumOrder()
    {
        $sum = 0;
        foreach ($this->orderProduct as $product) {
            $sum += $product->sumProduct();
        }
        return $sum;
    }

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            ['id'=>0, 'name' => 'новый'],
            ['id'=>10, 'name' => 'подтвержден'],
            ['id'=>20, 'name' => 'завершен'],
        ];
    }

    public function sendCompleteMails()
    {

    }
}
