@extends('layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Qt</th>
                    <th scope="col">Sum</th>
                    <th scope="col">delete</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 0)
                @php($n = 0)
                @php($products = \Illuminate\Support\Facades\Session::get('products'))
                @if (empty($basketProducts) === false)
                    @foreach($basketProducts as $product)
                        <tr>
                            <td></td>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><a href="{{ url('/qtBasket?id='.$product->id.'&val=minus') }}" class="btn btn-info">-</a> <strong>{{$products[$product->id]}}</strong> <a href="{{ url('/qtBasket?id='.$product->id.'&val=plus') }}" class="btn btn-danger">+</a></td>
                            <td>{{$products[$product->id] * $product->price}}</td>
                            <td><a class="btn btn-info" href="{{ url('/deleteBasket?id='. $product->id) }}">Delete</a></td>
                        </tr>
                        @php($i = $i + $products[$product->id])
                        @php($n = $n + $products[$product->id] * $product->price)
                    @endforeach
                @endif
                </tbody>
            </table>
            <div>
                <strong>Total: </strong>{{$i}} qts
                <hr>
                <strong>Total sum: </strong>{{$n}} $
            </div>

            <div class="col-lg-12" style="margin-top: 20px">
                @if(Auth::check())
                    <a href="/make-order" class="btn btn-primary">Make Order</a>
                @else
                    // The user is not authenticated...
                @endif

            </div>
        </div>
    </div>

@stop
