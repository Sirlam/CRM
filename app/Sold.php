<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
    //
    protected $table = 'oc_sold_products';

    public $primaryKey = 'id';

    protected $fillable = [
        'order_id', 'customer_id', 'imei_number', 'firstname', 'lastname', 'telephone', 'email', 'currency_id',
        'currency_code', 'total', 'name', 'quantity', 'pickup_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
