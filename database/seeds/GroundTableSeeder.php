<?php

use Illuminate\Database\Seeder;

class GroundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grounds')->insert([
        	'name_en' => 'Strong ground',
            'description_en' => 'A very strong grounding. ',
            'name_es' => 'Molido fuerte',
            'description_es' => 'Un molido muy fuerte'
        ]);

        DB::table('grounds')->insert([
        	'name_en' => 'Weak ground',
            'description_en' => 'A very weak grounding. ',
            'name_es' => 'Molido fuerte',
            'description_es' => 'Un molido muy fuerte'
        ]);
    }
}
