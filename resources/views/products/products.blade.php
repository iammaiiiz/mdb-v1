@extends('layouts.layout')

@section('title','Products Page')

@section('main')
    <div class="container">
        <div class="main">
            <h1>Products</h1>
            <a href="{{route('products.new')}}" class="btn btn-primary">New product</a>
            <div class="content">
            <h2>Activate Products</h2>
                @if($activateProducts->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>English name</td>
                                <!-- <td>French name</td> -->
                                <!-- <td>English description</td> -->
                                <!-- <td>French description</td> -->
                                <td>GTIN</td>
                                <td>Brand</td>
                                <!-- <td>Country of Origin</td>
                                <td>Gross weight</td>
                                <td>Unit</td> -->
                                <td>Option</td>
                            </tr>
                        </thead>
                        @foreach($activateProducts AS $activateProduct)
                            <tr>
                                <td>{{$activateProduct->id}}</td>
                                <td>{{$activateProduct->product_name_en}}</td>
                                <!-- <td>{{$activateProduct->product_name_fr}}</td> -->
                                <!-- <td>{{$activateProduct->product_description_en}}</td> -->
                                <!-- <td>{{$activateProduct->product_description_fr}}</td> -->
                                <td>{{$activateProduct->GTIN}}</td>
                                <td>{{$activateProduct->product_brand}}</td>
                                <!-- <td>{{$activateProduct->product_country_of_origin}}</td>
                                <td>{{$activateProduct->product_gross}}</td>
                                <td>{{$activateProduct->product_unit}}</td> -->
                                <td class="d-flex gap-2 justify-content-around">
                                    <a href="{{route('product',['GTIN'=>$activateProduct->GTIN])}}" class="btn btn-info">View</a>
                                    <a href="{{route('products.toggle',['id'=>$activateProduct->id])}}" class="btn btn-warning">Deactivte</a>
                                    <a href="{{route('products.remove',['id'=>$activateProduct->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    don' have
                @endif
                <br>
                <h2>Deactivate Products</h2>
                @if($deactivateProducts->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                            <td>ID</td>
                            <td>English name</td>
                            <!-- <td>French name</td> -->
                            <!-- <td>English description</td> -->
                            <!-- <td>French description</td> -->
                            <td>GTIN</td>
                            <td>Brand</td>
                            <!-- <td>Country of Origin</td>
                            <td>Gross weight</td>
                            <td>Unit</td> -->
                            <td>Option</td>
                            </tr>
                        </thead>
                        @foreach($deactivateProducts AS $deactivateProduct)
                            <tr>
                                <td>{{$deactivateProduct->id}}</td>
                                <td>{{$deactivateProduct->product_name_en}}</td>
                                <!-- <td>{{$deactivateProduct->product_name_fr}}</td> -->
                                <!-- <td>{{$deactivateProduct->product_description_en}}</td> -->
                                <!-- <td>{{$deactivateProduct->product_description_fr}}</td> -->
                                <td>{{$deactivateProduct->GTIN}}</td>
                                <td>{{$deactivateProduct->product_brand}}</td>
                                <!-- <td>{{$deactivateProduct->product_country_of_origin}}</td>
                                <td>{{$deactivateProduct->product_gross}}</td>
                                <td>{{$deactivateProduct->product_unit}}</td> -->
                                <td class="d-flex gap-2 justify-content-around">
                                <a href="{{route('product',['GTIN' => $deactivateProduct->GTIN])}}" class="btn btn-info">View</a>
                                    <a href="{{route('products.toggle',['id'=>$deactivateProduct->id])}}" class="btn btn-warning">Activte</a>
                                    <a href="{{route('products.remove',['id'=>$deactivateProduct->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    don' have
                @endif
            </div>
        </div>
    </div>
@endsection
