@extends('layout')

@section('main')

{{-- {{ $Pharmacies }} --}}



        <h1>specialization List</h1>

        <button><a href="{{ route('Specialties.create') }}", style="color: white">create</a></button>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr>
                    
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">actions</th>
                
                </tr>
            </thead> 
            <tbody>
                
                @foreach ($Specializations as $Specialization)
                <tr>
                    <td>{{ $Specialization->name }} </td>
                    <td><button class="btn btn-success"><a href="{{ route('Specialties.show', $Specialization->id) }}", style="color: white">show</a></button></td>
                    <td><button class='btn btn-warning'><a href="{{ route('Specialties.edit', $Specialization->id) }}", style="color: white">edit</a></button></td>
                    <form  action="{{ route('Specialties.delete',[$Specialization->id]) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                    <td>  <button class="btn btn-danger">delete</button></td>
                    </form>
                    
                </tr>
                
                @endforeach
            
            </tbody>
        </table>
    @endsection

