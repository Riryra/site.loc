@extends('layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1>ADMIN</h1>


                @php($i = 0)

                <div class="accordion" id="accordionExample">
                    @foreach($orders as $order)
                        @php($totalPrice = 0)
                        @php($totalCount = 0)

                        @foreach($order->products as $product)
                            @php($totalPrice = $totalPrice + $product->price * $product->pivot->quantity)
                            @php($totalCount = $totalCount + $product->pivot->quantity)
                        @endforeach
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{ $i }}" aria-expanded="true" aria-controls="collapseOne">
                                        #{{$order->id}} | user: {{ $order->user->username }} | {{$order->address}} | total qt: {{ $totalCount }} | total price: {{ $totalPrice }}  | status {{ $order->getStatus() }}
                                    </button>

                                    <a href="{{ url('/admin/change-status/' . $order->id . '/'. \App\Order::STATUS_NEW) }}" class="btn btn-info">new</a>
                                    <a href="{{ url('/admin/change-status/' . $order->id . '/'. \App\Order::STATUS_PAID) }}" class="btn btn-info">paid</a>
                                    <a href="{{ url('/admin/change-status/' . $order->id . '/'. \App\Order::STATUS_SENT) }}" class="btn btn-info">sent</a>
                                    <a href="{{ url('/admin/change-status/' . $order->id . '/'. \App\Order::STATUS_DELIVERED) }}" class="btn btn-info">delivered</a>
                                </h2>
                            </div>

                            <div id="collapse-{{ $i }}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->products as $product)
                                            <tr>
                                                <td></td>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->price * $product->pivot->quantity}}</td>
                                                <td>{{$product->pivot->quantity}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @php($i++)
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@stop
