<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()   {
        
        Storage::disk('local')->delete(Storage::allFiles());

        //création de 30 produits de la factory
        factory(App\Product::class, 30) ->create()->each(function($product){

            // Associons une catégorie à un produit que nous venons de créer
            $category = App\Category::find(rand(1,2));

            // Pour chaque $product on associe une catégorie en particulier
            $product->category()->associate($category);

            // Ajout des images
            $link = str_random(12).'.jpg';
            $file = file_get_contents('https://lorempixel.com/400/400/fashion');
            Storage::disk('local')->put($link, $file);

            $product->save(); // Il faut sauvegarder l'association pour faire persister en base de données

            $product->update([
                'url_image'=> $link    
            ]);
            
            $product->save();
        });
    }
}