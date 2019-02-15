<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    protected $paginate = 10;

    public function __construct() {

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate($this->paginate);
        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        return view('back.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'category_id' => 'integer',
            'price' => 'numeric',
            'status' => 'in:published,draft',
            'url_image' => 'image|max:3000',
        ]);

        $product = Product::create($request->all());

        $im = $request->file('picture');
        
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('');
            
            $product->update([
                'url_image' => $link,
            ]);
        }

        return redirect()->route('admin.index')->with('message', 'Ajout réussi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::pluck('title', 'id')->all();
    
        return view('back.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'category_id' => 'integer',
            'price' => 'numeric',
            'status' => 'in:published,draft',
            'url_image' => 'image|max:3000',
        ]);

        $product = Product::find($id);
        $product->update($request->all()); # mise à jour des données d'un produit
        
        $im = $request->file('picture');
        
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('');
            
            $product->update([
                'url_image' => $link,
            ]);
        }

        return redirect()->route('admin.index')->with('message', 'Modification prise en compte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.index');
    }
}
