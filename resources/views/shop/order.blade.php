@extends('layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3>New order for {{{ Auth::user()->username }}}</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qt</th>
                        <th scope="col">Sum</th>

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
                                <td><strong>{{$products[$product->id]}}</strong></td>
                                <td>{{$products[$product->id] * $product->price}}</td>
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

                <form action="" method="post">
                    @csrf

                    <input name="user_id" type="hidden" value="{{{ Auth::user()->id }}}">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input name="address" type="text" class="form-control" id="address" placeholder="Address">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

@stop
