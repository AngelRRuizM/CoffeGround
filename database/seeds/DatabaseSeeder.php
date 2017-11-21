<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
         $this->call(RolesSeeder::class);
         $this->call(UsersRolesSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(SubcategoryTableSeeder::class);
         $this->call(ToastTableSeeder::class);
         $this->call(TypeTableSeeder::class);
         $this->call(GroundTableSeeder::class);
         $this->call(CoffeeCategoryTableSeeder::class);
         $this->call(CoffeeTableSeeder::class);
         //$this->call(ImageTableSeeder::class);
         $this->call(PresentationTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(CartsTableSeeder::class);
         
         
    }
}
