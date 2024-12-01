@extends('layout')

@section('main')

{{-- {{ $Pharmacies }} --}}



        <h1>Pharmacies List</h1>

        <button><a href="{{ route('Pharmacies.create') }}", style="color: white">create</a></button>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr>
                    
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">phone</th>
                    <th style="padding: 10px;">actions</th>
                
                </tr>
            </thead>
            <tbody>
                
                @foreach ($Pharmacies as $Pharmacy)
                <tr>
                    <td>{{ $Pharmacy->name }} </td>
                    <td>{{ $Pharmacy->phone }} </td>
                    <td><button class="btn btn-success"><a href="{{ route('Pharmacies.show', $Pharmacy->id) }}", style="color: white">show</a></button></td>
                    <td><button class='btn btn-warning'><a href="{{ route('Pharmacies.edit', $Pharmacy->id) }}", style="color: white">edit</a></button></td>
                    <form  action="{{ route('Pharmacies.delete',[$Pharmacy->id]) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                    <td>  <button class="btn btn-danger">delete</button></td>
                    </form>
                    
                </tr>
                
                @endforeach
            
            </tbody>
        </table>
    @endsection

