@extends('layouts.layout')

@section('title','Company Page')

@section('main')
    <div class="container">
        <div class="main"><h1>Company</h1>
            <div class="info">
                {{session('userData')}}
                <a href="{{route('logout')}}">Logout</a>
                <a href="{{route('company.edit' , ['id' => $company->id])}}">update company</a>
                @if(session('message'))
                    <h2>{{session('message')}}</h2>
                @endif
            </div>
            <div class="content">
                <h2>Company</h2>
                @if($company)
                    <table class="table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Address</td>
                                <td>Telephone</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$company->id}}</td>
                            <td>{{$company->company_name}}</td>
                            <td>{{$company->company_address}}</td>
                            <td>{{$company->company_telephone}}</td>
                            <td>{{$company->company_email}}</td>
                        </tr>
                    </table>
                    <br>
                    <h2>Owner</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Mobile number</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$company->owner_name}}</td>
                            <td>{{$company->owner_number}}</td>
                            <td>{{$company->owner_email}}</td>
                        </tr>
                    </table>
                    <br>
                    <h2>Contact</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Mobile Number</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$company->contact_name}}</td>
                            <td>{{$company->contact_number}}</td>
                            <td>{{$company->contact_email}}</td>
                        </tr>
                    </table>
                @else
                    don't have
                @endif
            </div>
            <div class="content">
                <h2>Products</h2>
                @if($products->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                            <td>ID</td>
                            <td>English name</td>
                            <td>French name</td>
                            <td>English description</td>
                            <td>French description</td>
                            <td>GTIN</td>
                            <td>Brand</td>
                            <td>Country of Origin</td>
                            <td>Gross weight</td>
                            <td>Unit</td>
                            </tr>
                        </thead>
                        @foreach($products AS $product)
                            <tr class="product">
                                <td>{{$product->id}}</td>
                                <td>{{$product->product_name_en}}</td>
                                <td>{{$product->product_name_fr}}</td>
                                <td>{{$product->product_description_en}}</td>
                                <td>{{$product->product_description_fr}}</td>
                                <td>{{$product->GTIN}}</td>
                                <td>{{$product->product_brand}}</td>
                                <td>{{$product->product_country_of_origin}}</td>
                                <td>{{$product->product_gross}}</td>
                                <td>{{$product->product_unit}}</td>
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
