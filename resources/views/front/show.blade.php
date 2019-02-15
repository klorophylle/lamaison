@extends('layouts.master')

@section('content')

<div class="row bg-lightgrey" style="margin-top:2rem">
    <div class="col-sm">
      <a href="#"><img width="180px" src="{{asset('images/'.$product->url_image)}}" alt="" /></a>
      <a href="#"><img width="180px" src="{{asset('images/'.$product->url_image)}}" alt="" /></a>
      <a href="#"><img width="180px" src="{{asset('images/'.$product->url_image)}}" alt="" /></a>
    </div>
    <div class="col-sm">
        <img width="600px" src="{{asset('images/'.$product->url_image)}}" alt="" />
    </div>
    <div class="col-sm">
        <p>{{$product->title}}</p>
        <p>Réf: {{$product->reference}}</p>
        <p>{{$product->price}} €</p>
        <form action="" method="post">
            <div class="form-group">
                <select id="my-input" class="custom-select">
                    <option value="">Taille</option>
                    <option value="46">46</option>
                    <option value="48">48</option>
                    <option value="50">50</option>
                    <option value="52">52</option>
                </select>
            </div>
        </form>
    </div>
  </div>
  <div style="margin-top:2rem">
  <p>Description :<br/>{{$product->description}}</p>
  </div>
</div>

@endsection