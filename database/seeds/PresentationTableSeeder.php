<?php

use Illuminate\Database\Seeder;

class PresentationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('presentations')->insert([
            'weight'=>'15 kg',
            'price' => 100.00,
            'ground_id' => 1,
            'coffee_id' =>1
        ]);

         DB::table('presentations')->insert([
        	'weight'=>'10 kg',
            'price' => 100.00,
            'ground_id' => 1,
            'coffee_id' =>1
        ]);

         DB::table('presentations')->insert([
        	'weight'=>'5 kg',
            'price' => 100.00,
            'ground_id' => 1,
            'coffee_id' =>1
        ]);

         DB::table('presentations')->insert([
        	'weight'=>'1 kg',
            'price' => 100.00,
            'ground_id' => 1,
            'coffee_id' =>1
        ]);
    }
}
