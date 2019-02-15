<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Storage::disk('local')->delete(Storage::allFiles());
    
        App\Category::create([
            'title' => 'Homme'
             ]);
        App\Category::create([
            'title' => 'Femme'
             ]);
        
        // $category = App\Category::find(rand(1,2));

        // $product->category()->associate($category);
        // $product->save();
    }
}
