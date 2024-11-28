@extends('layouts.layout')

@section('title','Validate GTIN')

@section('main')
    <div class="container">
        <form action="{{route('check.gtin')}}" method="post">
            @csrf
            <div class="form-group">
                <textarea class="p-4" class="w-100" name="gtin" id="gtin" rows="10"></textarea>
                <input type="submit" value="Check">
            </div>
        </form>
        <br>
        <form>
            @if(session('results'))
                @if(session('status') === true)
                    <h1 class="text-center text-bolder">All valid <span class="h1 text-success">&#10003</span></h1>
                @endif
                <table class="w-100">
                    @foreach(session('results') as $result)
                        <tr class="w-100 px-2 py-4 d-flex justify-content-between">
                            <td>{{$result['gtin']}}</td>
                            <td>{{$result['status']}}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </form>
    </div>
@endsection
