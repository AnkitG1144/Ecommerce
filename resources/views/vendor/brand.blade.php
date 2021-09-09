@extends('layouts.master')
@section('page-title')
    Brands And Categories
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        Add Brand
    </div>
    <div class="card-body">
        <form action="{{ URL::to('vendor/create-brand') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="brand_title" class="form-label">Brand Name</label>
                <input class="form-control" type="text" id="brand_title" name="brand_name">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-control">
                    <option value="0" selected disabled>Choose Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name}}</option>
                    @endforeach
                </select>
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
                    <th scope="col">Category</th>
                    <th scope="col">Brand</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allBrands as $key => $allBrand)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $allBrand->category_name }}</td>
                    <td>{{ $allBrand->brand_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection