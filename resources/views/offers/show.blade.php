@extends('layout')

@section('main')
    <h1>offer Details</h1>

    <p><strong>Name:</strong> {{ $offers->name }}</p>
    <p><strong>title:</strong> {{ $offers->title }}</p>
    <p><strong>addres:</strong> {{ $offers->address }}</p>
    <p><strong>oldprice:</strong> {{ $offers->oldPrice }}</p>
    <p><strong>newprice:</strong> {{ $offers->newPrice }}</p>
    <p><strong>city:</strong> {{ $offers->City->name }}</p>
    <p><strong>specialization:</strong> {{ $offers->Specialization->name }}</p>
    
@endsection
