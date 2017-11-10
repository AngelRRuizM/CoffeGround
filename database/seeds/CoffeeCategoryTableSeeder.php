<?php

use Illuminate\Database\Seeder;

class CoffeeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coffee_categories')->insert([
        	'name_en' => 'Premium',
            'description_en' => 'A premium and good coffee. ',
            'name_es' => 'Premium',
            'description_es' => 'Un café premium elegante'
        ]);

         DB::table('coffee_categories')->insert([
            'name_en' => 'Speciality',
            'description_en' => 'A very special coffee ',
            'name_es' => 'Especialidad',
            'description_es' => 'Un café muy especial'
        ]);
    }
}
