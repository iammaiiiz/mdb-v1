@extends('layouts.layout')

@section('title','Error page')

@section('main')
        <div class="container">
            <div class="error">
                <h1>401 Error unauthorize</h1>
                <a href="{{route('login')}}">Go to login page</a>
            </div>
        </div>
@endsection