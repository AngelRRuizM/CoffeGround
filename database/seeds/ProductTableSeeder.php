<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name_en' => 'Product1',
            'description_en' => 'Woralex',
            'name_es' => 'Producto1',
            'description_es' => 'Guau. ',
            'subcategory_id' => 1

        ]);

        DB::table('products')->insert([
            'name_en' => 'Product2',
            'description_en' => 'Woralex',
            'name_es' => 'Producto2',
            'description_es' => 'Guau. ',
            'subcategory_id' => 1

        ]);

        DB::table('products')->insert([
            'name_en' => 'Product3',
            'description_en' => 'Woralex',
            'name_es' => 'Producto3',
            'description_es' => 'Guau. ',
            'subcategory_id' => 2

        ]);

        DB::table('products')->insert([
            'name_en' => 'Product4',
            'description_en' => 'Woralex',
            'name_es' => 'Producto4',
            'description_es' => 'Guau. ',
            'subcategory_id' => 2

        ]);

        DB::table('products')->insert([
            'name_en' => 'Product5',
            'description_en' => 'Woralex',
            'name_es' => 'Producto5',
            'description_es' => 'Guau. ',
            'subcategory_id' => 3

        ]);

        DB::table('products')->insert([
            'name_en' => 'Product6',
            'description_en' => 'Woralex',
            'name_es' => 'Producto6',
            'description_es' => 'Guau. ',
            'subcategory_id' => 3

        ]);

        DB::table('products')->insert([
            'name_en' => 'Product7',
            'description_en' => 'Woralex',
            'name_es' => 'Producto7',
            'description_es' => 'Guau. ',
            'subcategory_id' => 4

        ]);

        DB::table('products')->insert([
            'name_en' => 'Product8',
            'description_en' => 'Woralex',
            'name_es' => 'Producto8',
            'description_es' => 'Guau. ',
            'subcategory_id' => 4

        ]);
    }
}
