<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller
{
    protected $paginate = 6;

    public function __construct() {

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }

    public function index() {
        $nbproducts = Product::all()->count();
        $products = Product::paginate($this->paginate);
        return view('front.index', ['nbproducts' => $nbproducts, 'products' => $products]);
    }

    public function show(int $id) {
        // récupération d'un seul produit 
        $product = Product::find($id);
        // passage à la vue
        return view('front.show', ['product' => $product]);
    }

    public function category(int $id) {
        $category = Category::find($id);
        $nbproducts = $category->products->count();
        $products = Product::paginate($this->paginate);
        return view('front.index', ['nbproducts' => $nbproducts,'products' => $products, 'category' => $category]);
    }

    public function soldes() {
        $nbproducts = Product::where('code', 'sale')->count(); # renvoie une collection
        $products = Product::where('code', 'sale')->paginate($this->paginate);
        return view('front.index', ['nbproducts' => $nbproducts, 'products' => $products]);
    }
}