@extends('layout.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1>Create product</h1>

                <form enctype="multipart/form-data" method="post" action="">
                    @csrf

                    <div class="form-group">
                        <label for="product-name">Name</label>
                        <input name="product-name" type="text" class="form-control" id="product-name" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label for="product-price">Price</label>
                        <input name="product-price" type="number" class="form-control" id="product-price" placeholder="Enter price" step="0.01" min="0">
                    </div>

                    <div class="form-group">
                        <label for="product-desc">Description</label>
                        <textarea name="product-desc" id="product-desc" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="product-image">image</label>
                        <input name="product-image" id="product-image" class="form-control" type="file">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@stop
