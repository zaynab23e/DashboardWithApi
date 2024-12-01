@extends('layout')

@section('main')
    <h1>offer Details</h1>

    <p><strong>Name:</strong> {{$reservation->name}}</p>
    <p><strong>phone:</strong> {{$reservation->phone}}</p>
    <p><strong>time:</strong> {{$reservation->time }}</p>
    @if (isset($reservation->Offer->name))
    <p><strong>offer:</strong>{{ $reservation->Offer->name }}</p>
    @endif
    @if (isset($reservation->Doctor->name ))
    <p><strong>doctor:</strong> {{ $reservation->Doctor->name }}</p>
    @endif
@endsection
