@extends('layout')
@section('main')
        <h1>reservations List</h1>
        {{-- "{{ route('Reservation.delete',[]) }}" --}}
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr>
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">phone</th>
                    <th style="padding: 10px;">time</th>
                    <th style="padding: 10px;">action</th>
                    {{-- <th style="padding: 10px;">phone</th>
                    <th style="padding: 10px;">actions</th> --}}
                </tr>
                    </thead>
                            <tbody>
                                    <tr>
                    @foreach ($reservations as $reservation)
                    <td> {{ $reservation->name}}</td>
                    <td> {{ $reservation->phone}}</td>
                    <td> {{ $reservation->time}}</td>
                    <td>
                        <a href="{{route('reservation.show',[$reservation->id])}}">
                            <button>show</button>
                        </a>     
                    </td>
                    <form  action="{{ route('reservation.delete',[$reservation->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <td>    <button class="btn btn-danger">deletee</button> </td>
                    </form> 
                    
                </tr>
                @endforeach
                    {{-- @foreach ($offers as $offer)
                    <tr>
                    <td>{{ $offer->name }} </td>
                    <td>{{ $offer->phone }} </td>
                    <td>{{ $offer->time }} </td> --}}
                    {{-- <td>{{ $offer->Specialization['name'] }} </td> --}}
                    {{-- <td>{{ $offer->City['name'] }} </td> --}}
                    {{-- <td>{{ $offer->title }} </td> --}}
                    {{-- 
                    <td>{{ $offer}} </td>
                    <td><button class="btn btn-success"><a href="{{ route('offers.show', $offer->id) }}", style="color: white">show</a></button></td>
                    <td><button class='btn btn-warning'><a href="{{ route('offers.edit', $offer->id) }}", style="color: white">edit</a></button></td--}}
            </tbody>
        </table>
    @endsection

