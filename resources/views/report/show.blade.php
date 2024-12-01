@extends('layout')

@section('main')
    <h1>offer Details</h1>

    <p><strong>problem:</strong> {{ $report->problem}}</p>
    @if($report->image)
    <p><strong>Image:</strong></p>
    <img src="{{ asset('problem/' . basename($report->image)) }}" alt="Image" style="width: 200px;">
@else
    <p>No image available.</p>
@endif
    
@endsection
