@extends('layouts.layout')

@section('title','Product Page')

@section('main')
    <div class="container">
        <div class="main">
            <h1>{{$product->product_name_en}}</h1>
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('products.image.remove',['GTIN' => $product->GTIN])}}" class="btn btn-primary">Remove image</a>
                <a href="{{route('products.image.edit',['GTIN' => $product->GTIN])}}" class="btn btn-warning">Edit image</a>
            </div>  
            @if(!empty($product->image))
                <img src="{{url('public/images/'.$product->image)}}" class="w-50 rounded" alt="">
            @else
                <svg width="80%" height="300px">
                    <rect width="100%" height="100%" fill="gray" />
                </svg>
            @endif
            <h3>GTIN : {{$product->GTIN}}</h3>
            <h4>Description : {{$product->product_description_en}}</h4>
            <h4>Brand : {{$product->product_brand}}</h4>
            <h4>Country of origin : {{$product->product_country_of_origin}}</h4>
            <h5>Gross : {{$product->product_gross}}</h5>
            <h5>Unit : {{$product->product_unit}}</h5>
        </div>
    </div>
@endsection
