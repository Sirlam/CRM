<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    //
    protected $table = 'oc_pickup';

    public $primaryKey = 'pickup_id';

    protected $fillable = [
        'zone_id', 'name', 'code', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     public function user()
     {
       return $this->belongsTo('App\User');
     }
}
