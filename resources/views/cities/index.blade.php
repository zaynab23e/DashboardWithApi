@extends('layout')

@section('main')

{{-- {{ $Pharmacies }} --}}



        <h1>cities List</h1>

        <button><a href="{{ route('city.create') }}", style="color: white">create</a></button>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr>
                    
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">actions</th>
                
                </tr>
            </thead>
            <tbody>
                
                @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->name }} </td>
                    <td><button class="btn btn-success"><a href="{{ route('city.show', $city->id) }}", style="color: white">show</a></button></td>
                    <td><button class='btn btn-warning'><a href="{{ route('city.edit', $city->id) }}", style="color: white">edit</a></button></td>
                    <form  action="{{ route('city.delete',[$city->id]) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                    <td>  <button class="btn btn-danger">delete</button></td>
                    </form>
                    
                </tr>
                
                @endforeach
            
            </tbody>
        </table>
    @endsection

