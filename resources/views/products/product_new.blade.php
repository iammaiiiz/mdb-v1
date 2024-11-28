@extends('layouts.layout')

@section('title','New company')

@section('main')
    <div class="container">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @if(session('message'))
                {{session('message')}};
            @endif
            @csrf
            <h1>Product</h1>
            <div class="form-group">
                <div class="input-group">
                    <label for="company_id">company</label>
                    <select name="company_id" id="company_id" required>
                        @foreach($companies as $company)
                            <option value="{{$company->c_id}}">
                                {{$company->c_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <label for="product_name_en">product_name_en</label>
                    <input type="text" name="product_name_en" id="product_name_en">
                </div>
                <div class="input-group">
                    <label for="product_name_fr">product_name_fr</label>
                    <input type="text" name="product_name_fr" id="product_name_fr">
                </div>
                <div class="input-group">
                    <label for="product_description_en">product_description_en</label>
                    <input type="text" name="product_description_en" id="product_description_en">
                </div>
                <div class="input-group">
                    <label for="product_description_fr">product_description_fr</label>
                    <input type="text" name="product_description_fr" id="product_description_fr">
                </div>
                <div class="input-group">
                    <label for="product_brand">product_brand</label>
                    <input type="text" name="product_brand" id="product_brand">
                </div>
                <div class="input-group">
                    <label for="product_country_of_origin">product_country_of_origin</label>
                    <input type="text" name="product_country_of_origin" id="product_country_of_origin">
                </div>
                <div class="input-group">
                    <label for="product_gross">product_gross</label>
                    <input type="text" name="product_gross" id="product_gross">
                </div>
                <div class="input-group">
                    <label for="product_unit">product_unit</label>
                    <input type="text" name="product_unit" id="product_unit">
                </div>
                <div class="input-group">
                    <label for="image">image</label>
                    <input type="file" class="form-controll" name="image" id="image">
                </div>
            </div>
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
