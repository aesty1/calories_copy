<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Apple', 'Meat', 'Orange', 'Potato', 'Rice', 'Beef', 'Cabbage', 'Kefir', 'Kiwi', 'Strawberry', 'Corn', 'Mango',
            'Banana','Grape', 'Pomegranate', 'Turkey', 'Yogurt', 'Coconut', 'Buckwheat', 'Egg', 'Pasta', 'Tomatoes',
            'Cucumber', 'Oatmeal', 'Milk'
        ];

        foreach ($names as $name) {
            DB::table('products')->insert([
                'user_id' => 0,
                'name' => $name,
                'calories' => random_int(20, 500),
                'carbohydrates' => random_int(1, 20),
                'fats' => random_int(1, 10),
                'protein' => random_int(1, 10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
