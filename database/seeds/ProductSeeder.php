<?php

use App\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCount = (int) $this->command->ask('How many products would you like to create?', 20);

        // model relation inside seeder
        $category = Category::all();
        factory(App\Product::class, $productCount)->make()
            ->each(function ($product) use ($category) {
                $product->category_id = $category->random()->id;
                $product->save();
            });
    }
}
