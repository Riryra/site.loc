@extends('layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @foreach($all as $product)
                    <div class="col-lg-3">
                        <div>{{$product->name}}</div>
                        <div>{{$product->price}}</div>
                        <img width="200" src="{{env('APP_URL').'/products/'. $product->image}}" alt="">
                        <div>{{$product->description}}</div>
                        <a href="{{url('/shop/product/' . $product->id)}}">view details</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop
