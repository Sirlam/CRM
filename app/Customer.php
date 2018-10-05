<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'oc_customer';

    public $primaryKey = 'customer_id';

    protected $fillable = [
        'bvn', 'customer_group_id', 'store_id', 'language_id', 'firstname', 'lastname', 'email', 'telephone', 'fax',
        'password', 'salt', 'cart', 'wishlist', 'newsletter', 'address_id', 'custom_field', 'ip', 'status', 'safe',
        'token', 'code', 'date_added', 'gender', 'dob', 'address', 'credit_score', 'credit_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
