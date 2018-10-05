<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    //
    protected $table = 'oc_order_status';

    public $primaryKey = 'order_status_id';

    protected $fillable = [
        'language_id', 'name',
    ];
}
