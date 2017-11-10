<?php

use Illuminate\Database\Seeder;

class ToastTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('toasts')->insert([
        	'name_en' => 'Light Toast',
        	'description_en' => 'The best choice for conserving the original flavor. Coffee with herbal and fruity hints',
        	'name_es' => 'Tueste ligero',
            'description_es' => ' Es el que mejor conserva los sabores del origen. Son cafés con matices herbales y frutales '
        ]);

         DB::table('toasts')->insert([
        	'name_en' => 'Medium Toast',
        	'description_en' => 'A toast that maintains a considerable ammount of cafeine with more sweetness. With a large amount of heating, the sugars in the coffee begin to caramelize which provides hints of dry fruits, caramel and even chocolate. ',
        	'name_es' => 'Tueste Medio',
            'description_es' => 'Se trata de un tueste que sigue manteniendo un nivel considerable de cafeína pero mayor dulzor. Con la mayor exposición al calor, los azúcares del café comienzan a caramelizarse con lo que se consiguen matices de frutos secos, caramelo e incluso chocolate. '
        ]);

         DB::table('toasts')->insert([
            'name_en' => 'Dark toast',
            'description_en' => 'The coffe is dried much more and its essential oils are extracted. It is a coffee with a low amount of cafeine which is mostly used for an espresso coffe machine.  ',
            'name_es' => 'Tueste Oscuro',
            'description_es' => 'El café se seca mucho más y se extraen todos sus aceites esenciales. Es un café con un contenido de cafeína muy bajo que se utiliza normalmente para cafetera espresso. En este tipo de tostado conseguimos sabores especiados e incluso ahumados. '
        ]);
    }
}
