@extends('layouts.master')
@section('page-title')
    Dashboard
@endsection
@section('content')

<div class="container-fluid">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-F6BBBF">
                <div class="row">
                    <div class="icon">
                        <img class ="dashboardUserImage" src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" >
                    </div>
                    <div class="inner">
                        <h2>{{ $totalProduct }}</h2>
                        <p>Total product</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-BD3565">
                <div class="row">
                    <div class="icon">
                        <img class ="dashboardUserImage" src="https://www.vhv.rs/dpng/d/495-4954741_shopping-bag-png-shopping-bag-icon-png-transparent.png" >
                    </div>
                    <div class="inner" style="color: white">
                        <h2>{{ $totalBrand }}</h2>
                        <p>Total brand added </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection