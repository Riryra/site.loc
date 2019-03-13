@extends('layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div>{{$product->name}}</div>
                <div>{{$product->price}}</div>
                <img width="200" src="{{env('APP_URL').'/products/'. $product->image}}" alt="">
                <div>{{$product->description}}</div>

                <a data-id="{{$product->id}}" href="{{ url('/addBasket?id=' . $product->id . '&qt=1') }}" class="btn btn-info add-basket">Add to basket</a>
            </div>
        </div>
    </div>

@stop