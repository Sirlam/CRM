<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('oc_pickup')->delete();

      DB::table('oc_pickup')->insert([
          ['name' => 'Abuja', 'code' => 'ABJ', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
          ['name' => 'Lagos', 'code' => 'LAG', 'status' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
          ['name' => 'Edo', 'code' => 'EDO', 'status' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
      ]);
    }
}
