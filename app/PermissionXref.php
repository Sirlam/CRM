<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionXref extends Model
{
    //
    protected $table = 'oc_agent_role_perm';

    public $primaryKey = 'id';

    protected $fillable = [
        'role_id', 'permission_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
