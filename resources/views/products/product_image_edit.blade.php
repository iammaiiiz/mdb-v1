@extends('layouts.layout')

@section('title','New company')

@section('main')
    <div class="container">
        <form action="{{route('products.image.update',['GTIN' => $GTIN])}}" method="post" enctype="multipart/form-data">
            @if(session('message'))
                {{session('message')}};
            @endif
            @csrf
            <h1>Edit product Image</h1>
            <input type="file" class="form-control" name="image" id="image">
            <input type="submit" value="Update">
        </form>
    </div>
@endsection
