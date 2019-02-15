@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Modifier le produit</h1>
                <form action="{{route('admin.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="form">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" value="{{$product->title}}" class="form-control" id="title" placeholder="Nom du produit">
                            @if($errors->has('title'))
                            <span class="error">{{$errors->first('title')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control">{{$product->description}}</textarea>
                            @if($errors->has('description'))
                            <span class="error">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="price">Prix</label>
                            <input type="text" name="price" value="{{$product->price}}" class="form-control">
                            @if($errors->has('price'))
                            <span class="error">{{$errors->first('price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-select">
                        <label for="category">Catégorie</label>
                        <select id="category" name="category_id">
                            @foreach($categories as $id => $title)
                                <option value="{{$id}}" {{($product->category->id == $id)? 'selected' : '' }}>{{$title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-select">
                        <label for="size">Taille :</label>
                        <select id="size" name="size">
                            <option value="46" {{($product->size == 46)? 'selected' : '' }}>46</option>
                            <option value="48" {{($product->size == 48)? 'selected' : '' }}>48</option>
                            <option value="50" {{($product->size == 50)? 'selected' : '' }}>50</option>
                            <option value="52" {{($product->size == 52)? 'selected' : '' }}>52</option>
                        </select>
                    </div>
                    <div class="form">
                        <div class="input-file">
                        <h2>Image</h2>
                        <img width="300" src="{{url('images', $product->url_image)}}" alt="">
                        <input class="file" type="file" name="picture">
                        @if($errors->has('picture'))
                        <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span>
                        @endif
                        </div>
                    </div>                
            </div><!-- #end col md 6 -->

            <div class="col-md-6">
                <h2>Statut</h2>
                <div class="input-radio">
                    <input type="radio" name="status" value="published" {{($product->status == 'published')? 'checked' : '' }}>Publié<br>
                    <input type="radio" name="status" value="draft" {{($product->status == 'draft')? 'checked' : '' }}>Brouillon<br>
                </div>
                <div class="form-select">
                    <label for="code">Code produit</label>
                    <select id="code" name="code">
                        <option value="{{$id}}" {{($product->code == 'sale')? 'selected' : '' }}>sale</option>
                        <option value="{{$id}}" {{($product->code == 'new')? 'selected' : '' }}>new</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reference">Référence</label>
                    <input type="text" name="reference" value="{{$product->reference}}" class="form-control">
                    @if($errors->has('reference'))
                    <span class="error">{{$errors->first('reference')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success btn-sm">Mettre à jour</button>
            </div><!-- #end col md 6 -->
                </form>
        </div>
    </div>
@endsection
