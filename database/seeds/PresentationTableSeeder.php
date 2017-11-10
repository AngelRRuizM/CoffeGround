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
            'ground_id' => 1
        ]);

         DB::table('presentations')->insert([
        	'weight'=>'30 kg',
            'ground_id' => 1
        ]);

         DB::table('presentations')->insert([
        	'weight'=>'10 kg',
            'ground_id' => 2
        ]);

         DB::table('presentations')->insert([
        	'weight'=>'25 kg',
            'ground_id' => 2
        ]);
    }
}
