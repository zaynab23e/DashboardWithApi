

@extends('layout')


@section('main')

        <h1>Doctors List</h1>

        <button><a href="{{ route('admin.doctors.create') }}", style="color: white">create</a></button>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr>
                    
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">Specialization</th>
                    <th style="padding: 10px;">City</th>
                    <th style="padding: 10px;">actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization ? $doctor->specialization->name : 'No Specialization Assigned' }}</td>
                    <td>{{ $doctor->city ? $doctor->city->name : 'No City Assigned' }}</td>
                    
                    
                
                    <td><button class="btn btn-success"><a href="{{ route('admin.doctors.show', $doctor->id) }}", style="color: white">show</a></button></td>
                    <td><button class='btn btn-warning'><a href="{{ route('admin.doctors.edit', $doctor->id) }}", style="color: white">edit</a></button></td>
                    <form  action="{{route('admin.doctors.delete', $doctor->id) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                    <td>  <button class="btn btn-danger">delete</button></td>
                    </form>
                    
                </tr>
                
                @endforeach
            
            </tbody>
        </table>
    @endsection

