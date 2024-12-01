@extends('layout')

@section('main')
    <h1>Doctor Details</h1>
    <p><strong>Name:</strong> {{ $doctor->name }}</p>
    <p><strong>City:</strong> {{ $doctor->city->name }}</p>
    <p><strong>Specialization:</strong> {{ $doctor->specialization->name }}</p>
    <p><strong>Price:</strong> {{ $doctor->price }}</p>
    <p><strong>Details:</strong> {{ $doctor->details }}</p>
    <p><strong>Waiting Time:</strong> {{ $doctor->Waitingtime }}</p>
    <p><strong>Address:</strong> {{ $doctor->address }}</p>
@endsection
