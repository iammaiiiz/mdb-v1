@extends('layouts.layout')

@section('title','Companies Page')

@section('main')
    <div class="container">
        <div class="main">
            <h1>Companies</h1>

            <div class="content d-flex justify-content-between align-items-center gap-5">
                <h2 class="col-1">{{session('userData')}}</h2>
                <div class="col-3">
                    @if(session('message'))
                        <h5>{{session('message')}}</h5>
                    @endif
                </div>
                <a class="btn btn-danger col-1" href="{{route('logout')}}">Logout</a>
                <div class="d-flex  col-4 justify-content-end gap-4">
                    <a class="btn btn-primary" href="{{route('products')}}">All Products</a>
                    <a class="btn btn-primary" href="{{route('company.new')}}">New Company</a>
                </div>
            </div>

            <div class="content">
                <h2>Activate Companies</h2>
                @if($activateCompanies->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Address</td>
                            <td>Telephone</td>
                            <td>Email</td>
                            <td>View</td>
                            <td>option</td>
                        </tr>
                    </thead>
                    @foreach($activateCompanies AS $activateCompany)
                        <tr>
                            <td>{{$activateCompany->id}}</td>
                            <td>{{$activateCompany->company_name}}</td>
                            <td>{{$activateCompany->company_address}}</td>
                            <td>{{$activateCompany->company_telephone}}</td>
                            <td>{{$activateCompany->company_email}}</td>
                            <td><a class="btn btn-info"  href="{{route('company',['id' => $activateCompany->id])}}">View</a></td>
                            <td><a class="btn btn-danger"  href="{{route('toggleActivate',['id' => $activateCompany->id])}}">Deactivate</a></td>
                        </tr>
                    @endforeach
                </table>
                @else
                    don't have
                @endif
            </div>
            <div class="content">
                <h2>Deactivate Companies</h2>
                @if($deactivateCompanies->isNotEmpty())
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Address</td>
                            <td>Telephone</td>
                            <td>Email</td>
                            <td>View</td>
                            <td>option</td>
                        </tr>
                    </thead>
                    @foreach($deactivateCompanies AS $deActivateCompany)
                        <tr>
                            <td>{{$deActivateCompany->id}}</td>
                            <td>{{$deActivateCompany->company_name}}</td>
                            <td>{{$deActivateCompany->company_address}}</td>
                            <td>{{$deActivateCompany->company_telephone}}</td>
                            <td>{{$deActivateCompany->company_email}}</td>
                            <td><a class="btn btn-info" href="{{route('company',['id' => $deActivateCompany->id])}}">View</a></td>
                            <td><a class="btn btn-danger" href="{{route('toggleActivate',['id' => $deActivateCompany->id])}}">Activate</a></td>
                        </tr>
                    @endforeach
                </table>
                @else
                    don't have
                @endif
            </div>
        </div>
    </div>
@endsection
