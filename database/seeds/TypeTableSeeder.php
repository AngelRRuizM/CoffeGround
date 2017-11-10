<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
        	'name_en' => 'Bourbon'
        	'description_en' => 'Complex acidity, with brilliant and balanced notes',
        	'name_es' => 'Bourbon',
          'description_es' => 'Acidez compleja, con notas brillantes y equilibradas '
        ]);

         DB::table('types')->insert([
        	'name_en' => 'Caturra',
        	'description_en' => 'In a cup, has medium body and taste',
        	'name_es' => 'Caturra',
          'description_es' => 'En taza, tiene cuerpo y dulzura medios.'
        ]);


          DB::table('types')->insert([
            'name_en' => 'Typical',
            'description_en' => 'Coffee prepared with typical witll always be of excellent quality, with a great body and nice sweetness',
            'name_es' => 'Tipica',
            'description_es' => 'El café preparado con tipica siempre será de excelente calidad, con buen cuerpo y gran dulzura.'
        ]);


    }
}
