<?php

use Illuminate\Database\Seeder;

class CoffeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('coffees')->insert([
            'name_en' => 'Premium',
            'description_en' => 'A very high quality premium coffee',
        	'name_es' => 'Premium',
            'description_es' => 'Un café premium chido. ',
            'type_id' => 1,
            'toast_id' => 1,
            'coffee_category_id' => 1

        ]);
         DB::table('coffees')->insert([
            'name_en' => 'Coffe1',
            'description_en' => 'Wow',
            'name_es' => 'Cafe1',
            'description_es' => 'Woah. ',
            'type_id' => 1,
            'toast_id' => 1,
            'coffee_category_id' => 2

        ]);
          DB::table('coffees')->insert([
            'name_en' => 'Coffe2',
            'description_en' => 'Wow',
            'name_es' => 'Cafe2',
            'description_es' => 'Woah. ',
            'type_id' => 1,
            'toast_id' => 2,
            'coffee_category_id' => 1

        ]);

            DB::table('coffees')->insert([
            'name_en' => 'Coffe3',
            'description_en' => 'Wow',
            'name_es' => 'Cafe3',
            'description_es' => 'Woah. ',
            'type_id' => 1,
            'toast_id' => 2,
            'coffee_category_id' => 2

        ]);

            DB::table('coffees')->insert([
            'name_en' => 'Coffe4',
            'description_en' => 'Wow',
            'name_es' => 'Cafe4',
            'description_es' => 'Woah. ',
            'type_id' => 1,
            'toast_id' => 3,
            'coffee_category_id' => 1

        ]);

            DB::table('coffees')->insert([
            'name_en' => 'Coffe5',
            'description_en' => 'Wow',
            'name_es' => 'Cafe5',
            'description_es' => 'Woah. ',
            'type_id' => 1,
            'toast_id' => 3,
            'coffee_category_id' => 2

        ]);

            DB::table('coffees')->insert([
            'name_en' => 'Coffe6',
            'description_en' => 'Wow',
            'name_es' => 'Cafe6',
            'description_es' => 'Woah. ',
            'type_id' => 2,
            'toast_id' => 1,
            'coffee_category_id' => 1

        ]);

            DB::table('coffees')->insert([
            'name_en' => 'Coffe7',
            'description_en' => 'Wow',
            'name_es' => 'Cafe7',
            'description_es' => 'Woah. ',
            'type_id' => 2,
            'toast_id' => 1,
            'coffee_category_id' => 2

        ]);

            DB::table('coffees')->insert([
            'name_en' => 'Coffe8',
            'description_en' => 'Wow',
            'name_es' => 'Cafe8',
            'description_es' => 'Woah. ',
            'type_id' => 2,
            'toast_id' => 2,
            'coffee_category_id' => 1

        ]);

            DB::table('coffees')->insert([
            'name_en' => 'Coffe9',
            'description_en' => 'Wow',
            'name_es' => 'Cafe9',
            'description_es' => 'Woah. ',
            'type_id' => 2,
            'toast_id' => 2,
            'coffee_category_id' => 2

        ]);

            DB::table('coffees')->insert([
            'name_en' => 'Coffe10',
            'description_en' => 'Wow',
            'name_es' => 'Cafe10',
            'description_es' => 'Woah. ',
            'type_id' => 2,
            'toast_id' => 3,
            'coffee_category_id' => 1

        ]);

            DB::table('coffees')->insert([
            'name_en' => 'Coffe11',
            'description_en' => 'Wow',
            'name_es' => 'Cafe11',
            'description_es' => 'Woah. ',
            'type_id' => 2,
            'toast_id' => 3,
            'coffee_category_id' => 2

        ]);
    }
}
