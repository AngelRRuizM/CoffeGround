<?php

use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('carts')->insert([
            'user_id' => 1
        ]);

        DB::table('carts')->insert([
            'user_id' => 2
        ]);

        DB::table('carts')->insert([
            'user_id' => 3
        ]);
    }
}
