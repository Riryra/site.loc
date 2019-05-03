<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   	const STATUS_NEW       = 0;
    const STATUS_PAID      = 1;
    const STATUS_SENT      = 2;
    const STATUS_DELIVERED = 3;

    protected $table = 'order';

    public function products() {
        return $this->belongsToMany('App\Products', 'order_product', 'order_id', 'product_id')->withPivot('quantity');
    }

    public function user() {
        return $this->hasOne('App\Users', 'id', 'user_id');
    }

    public function getStatus() {
        switch ($this->status) {
            case self::STATUS_NEW:
                return 'new';
            case self::STATUS_PAID:
                return 'paid';
            case self::STATUS_SENT:
                return 'sent';
            case self::STATUS_DELIVERED:
                return 'delivered';
        }
    }

}
