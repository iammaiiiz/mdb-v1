@extends('layouts.layout')

@section('title','New company')

@section('main')
    <div class="container">
        <form action="{{route('company.store')}}" method="post">
            @if(session('message'))
                {{session('message')}};
            @endif
            @csrf
            <h1>CompanyInfo</h1>
            <div class="form-group">
                <div class="input-group">
                    <label for="company_name">company_name</label>
                    <input type="text" name="company_name" id="company_name">
                </div>
                <div class="input-group">
                    <label for="company_address">company_address</label>
                    <input type="text" name="company_address" id="company_address">
                </div>
                <div class="input-group">
                    <label for="company_telephone">company_telephone</label>
                    <input type="text" name="company_telephone" id="company_telephone">
                </div>
                <div class="input-group">
                    <label for="company_email">company_email</label>
                    <input type="text" name="company_email" id="company_email">
                </div>
            </div>
            <br>
            <h1>Contact</h1>
            <div class="form-group">
                <div class="input-group">
                    <label for="contact_name">contact_name</label>
                    <input type="text" name="contact_name" id="contact_name">
                </div>
                <div class="input-group">
                    <label for="contact_mobile_number">contact_mobile_number</label>
                    <input type="text" name="contact_mobile_number" id="contact_mobile_number">
                </div>
                <div class="input-group">
                    <label for="contact_email">contact_email</label>
                    <input type="text" name="contact_email" id="contact_email">
                </div>
            </div>
            <h1>Owner</h1>
            <div class="form-group">
                <div class="input-group">
                    <label for="owner_name">owner_name</label>
                    <input type="text" name="owner_name" id="owner_name">
                </div>
                <div class="input-group">
                    <label for="owner_mobile_number">owner_mobile_number</label>
                    <input type="text" name="owner_mobile_number" id="owner_mobile_number">
                </div>
                <div class="input-group">
                    <label for="owner_email">owner_email</label>
                    <input type="text" name="owner_email" id="owner_email">
                </div>
            </div>
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
