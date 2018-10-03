<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('oc_agent_roles')->delete();

      DB::table('oc_agent_roles')->insert([
          ['role_name' => 'Agent', 'user_level' => 1, 'created_by' => 1, 'last_modified_by' => 'SYSTEM', 'parent_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
          ['role_name' => 'Admin', 'user_level' => 2, 'created_by' => 1, 'last_modified_by' => 'SYSTEM', 'parent_id' => 2, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
      ]);
    }
}
