@extends('layouts.master')

@section('content')
<h1>Tous les produits {{$category->title?? ''}}</h1>
<span> {{$nbproducts}} résultat(s)</span>
{{$products->links()}}

<ul class="list-group">
<div class="row">
@forelse($products as $product)
    
        <div class="col-lg-4" style="margin-bottom:2rem">
            <a href="{{url('product', $product->id)}}">
            @if(!is_null($product->url_image) > 0)
            <img src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" width="300px" height="300px">
            </a>
             @endif
            <h2><a href="{{url('product', $product->id)}}">{{$product->title}}</a></h2>
            <span>Prix : {{$product->price}} €</span>
        </div> 

@empty
    <li>Désolé(e) pour l'instant aucun produit n'est disponible sur le site</li>
@endforelse
</div>
</ul>
{{$products->links()}}
@endsection