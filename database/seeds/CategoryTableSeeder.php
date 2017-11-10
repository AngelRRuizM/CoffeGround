<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name_en' => 'Category1',
            'description_en' => 'The First category. ',
            'name_es' => 'Categoria1',
            'description_es' => 'La primera categoria'
        ]);

         DB::table('categories')->insert([
            'name_en' => 'Category2',
            'description_en' => 'The Second category. ',
            'name_es' => 'Categoria2',
            'description_es' => 'La segunda categoria'
        ]);
    }
}
