@extends('layouts.layout')

@section('title','login Page')

@section('main')
    <div class="container">
        <form action="{{route('authentication')}}" method="post">
            @if(session('message'))
                {{session('message')}};
            @endif
            @csrf
            <h1>Login</h1>
            <div class="form-group">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
@endsection
