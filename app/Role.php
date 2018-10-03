<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'oc_agent_roles';

  public $primaryKey = 'id';

  protected $fillable = [
      'role_name', 'user_level', 'created_by', 'last_modified_by', 'parent_id',
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
