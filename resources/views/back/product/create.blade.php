@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Ajouter un produit</h1>
                <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form">
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" value="" class="form-control" id="title" placeholder="Nom du produit">
                            @if($errors->has('title'))
                            <span class="error">{{$errors->first('title')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Prix</label>
                            <textarea type="text" name="price" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-select">
                        <label for="category">Catégorie</label>
                        <select id="category" name="category_id">
                            <option value="">Choisir une catégorie</option>
                            @foreach($categories as $id => $title)
                                <option value="{{$id}}">{{$title}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category'))
                        <span class="error bg-warning">{{$errors->first('category')}}</span>
                        @endif
                    </div>
                    <div class="form-select">
                        <label for="size">Taille</label>
                        <select id="size" name="size">
                            <option>Choisir une taille</option>
                            <option value="46">46</option>
                            <option value="48">48</option>
                            <option value="50">50</option>
                            <option value="52">52</option>
                        </select>
                        @if($errors->has('size'))
                        <span class="error bg-warning">{{$errors->first('size')}}</span>
                        @endif
                    </div>
                    <div class="input-file">
                        <h2>Image</h2>
                        <input class="file" type="file" name="picture">
                        @if($errors->has('picture'))
                        <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span>
                        @endif
                    </div>

                
            </div><!-- #end col md 6 -->

            <div class="col-md-6">
                <h2>Statut</h2>
                <div class="input-radio">
                    <input type="radio" name="status" value="published" checked>Publié<br>
                    <input type="radio" name="status" value="draft" checked>Brouillon<br>
                </div>
                <div class="form-select">
                    <label for="code">Code produit</label>
                    <select id="code" name="code">
                        <option value="">Choisir un code</option>
                        <option>Sale</option>
                        <option>New</option>
                    </select>
                    @if($errors->has('code'))
                        <span class="error bg-warning">{{$errors->first('code')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="reference">Référence</label>
                    <textarea type="text" name="reference" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
            </div><!-- #end col md 6 -->
                </form>
    </div>
@endsection
