@extends('layouts.master')

@section('content')

{{$products->links()}}
@include('back.product.partials.flash')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
	        <th>Prix</th>
            <th>Statut</th>
            <th>Mettre à jour</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td>{{$product->title}}</td>
	        <td>{{$product->category->title?? 'aucune catégorie' }}</td>
            <td>{{$product->price}} €</td>
            <td>{{$product->status}}</td>
            <td><a href = "{{route('admin.edit', $product->id)}}"><button type="button" class="btn btn-info btn-sm">Mettre à jour</button></a></td>
            <td><form class="delete" method="POST" action="{{route('admin.destroy', $product->id)}}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input class="btn btn-danger btn-sm" type="submit" value="Supprimer" >
            </form></td>
        </tr>
    @empty
        aucun produit
    @endforelse
    </tbody>
</table>
{{$products->links()}}
@endsection 
