<?php

use Illuminate\Database\Seeder;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            'name_en' => 'Subcategory1',
            'description_en' => 'The First subcategory. ',
            'name_es' => 'Subcategoria1',
            'description_es' => 'La primera subcategoria',
            'category_id' => 1
        ]);

        DB::table('subcategories')->insert([
            'name_en' => 'Subcategory1a',
            'description_en' => 'The First-a subcategory. ',
            'name_es' => 'Subcategoria1a',
            'description_es' => 'La primera-a subcategoria',
            'category_id' => 1
        ]);


         DB::table('subcategories')->insert([
            'name_en' => 'Subcategory2',
            'description_en' => 'The Second subcategory. ',
            'name_es' => 'Subcategoria2',
            'description_es' => 'La segunda subcategoria',
            'category_id' => 2
        ]);

         DB::table('subcategories')->insert([
            'name_en' => 'Subcategory2a',
            'description_en' => 'The Second-a subcategory. ',
            'name_es' => 'Subcategoria2a',
            'description_es' => 'La segunda-a subcategoria',
            'category_id' => 2
        ]);

    }
}
