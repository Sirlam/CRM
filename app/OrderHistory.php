<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    //
    protected $table = 'oc_order_history';

    public $primaryKey = 'order_history_id';

    protected $fillable = [
        'order_id', 'order_status_id', 'notify', 'comment', 'date_added',
    ];
}
