<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProduct
 * @package App
 * @property $id
 * @property $order_id
 * @property $product_id
 * @property $quantity
 * @property $price
 *
 * @property Order $order
 * @property Product $product
 */
class OrderProduct extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * @return mixed
     */
    public function sumProduct()
    {
        return $this->quantity * $this->price;
    }
}
