<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'oc_agent_locations';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
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
