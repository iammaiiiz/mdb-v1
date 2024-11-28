@extends('layouts.layout')

@section('title','Validate GTIN')
@section('lang',isset($lang) ? $lang : 'en')
@section('main')
    <div class="container">
        <div class="align-self-end">
            <a href="{{Route('public.product',['lang'=>'en','gtin'=>$product->GTIN])}}"class="text-decoration-none text-white h3">EN</a>
            <a href="{{Route('public.product',['lang'=>'fr','gtin'=>$product->GTIN])}}"class="text-decoration-none text-white h3">FR</a>
        </div>
        <h1>{{$product->company_name}}</h1>
        <img src="{{url('public/images/'.$product->image)}}" alt="" class="w-100">
        <h2>{{$product->GTIN}}</h2>
        @if($lang == 'en')
            <h3>{{$product->product_name_en}}</h3>
            <h3>{{$product->product_description_en}}</h3>
        @else
            <h3>{{$product->product_name_fr}}</h3>
            <h3>{{$product->product_description_fr}}</h3>
        @endif
        <h4>{{$product->product_gross}}</h4>
        <h4>{{$product->product_unit}}</h4>
    </div>
@endsection
