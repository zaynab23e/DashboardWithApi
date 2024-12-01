@extends('layout')

@section('main')

        <h1>offer List</h1>

        <button><a href="{{ route('offers.create') }}", style="color: white">create</a></button>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr>
                    
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">address</th>
                    <th style="padding: 10px;">newprice</th>
                    <th style="padding: 10px;">oldprice</th>
                    <th style="padding: 10px;">spescialization</th>
                    <th style="padding: 10px;">city</th>
                    <th style="padding: 10px;">title</th>
                    <th style="padding: 10px;">actions</th>
                    {{-- <th style="padding: 10px;">phone</th>
                    <th style="padding: 10px;">actions</th> --}}
                
                </tr>
            </thead>
            <tbody>
                
                @foreach ($offers as $offer)
                <tr>
                    <td>{{ $offer->name }} </td>
                    <td>{{ $offer->address }} </td>
                    <td>{{ $offer->newPrice }} </td>
                    <td>{{ $offer->oldPrice }} </td>
                    <td>{{ $offer->Specialization['name'] }} </td>
                    <td>{{ $offer->City['name'] }} </td>
                    <td>{{ $offer->title }} </td>
                    
                    
                    
                    

                    <td>{{ $offer->phone }} </td>
                    <td><button class="btn btn-success"><a href="{{ route('offers.show', $offer->id) }}", style="color: white">show</a></button></td>
                    <td><button class='btn btn-warning'><a href="{{ route('offers.edit', $offer->id) }}", style="color: white">edit</a></button></td>
                    <form  action="{{ route('offers.delete',[$offer->id]) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                    <td>  <button class="btn btn-danger">delete</button></td>
                    </form> 
                    
                </tr>
                
                @endforeach
            
            </tbody>
        </table>
    @endsection

