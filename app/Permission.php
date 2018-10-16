<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    //
    protected $table = 'oc_agent_permissions';

    public $primaryKey = 'id';

    protected $fillable = [
        'permission_description', 'route_url', 'parent_permission', 'is_active', 'id_tag', 'icon_class', 'is_open_class', 'toggle_icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
