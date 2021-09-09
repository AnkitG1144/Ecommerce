@extends('layouts.master')
@section('page-title')
    Products
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        Add Product
    </div>
    <div class="card-body">
        <form action="{{ URL::to('vendor/create-product') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input class="form-control" type="text" id="product_name" name="product_name">
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea class="form-control" type="text" id="product_description" name="product_desctiption" rows="5"></textarea>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input class="form-control" type="file" id="formFile" name="product_image">
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <select name="brand" id="brand" class="form-control">
                    <option value="0" selected disabled>Choose brand</option>
                    @foreach($brands as $key => $brand)
                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Image</label>
                <input class="form-control" type="number" id="price" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ asset('storage/products/'.$product->image) }}" style="height: 30px; width: 30px border-radius: 50px;"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_desc }}</td>
                    <td>{{ $product->brand_name }}</td>
                    <td>{{ $product->price }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection