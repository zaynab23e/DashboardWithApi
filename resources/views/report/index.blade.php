@extends('layout')

@section('main')

        <h1>problems List</h1>
        <table border="1" style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr>
                    <th style="padding: 10px;">problem</th>
                    <th style="padding: 10px;">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($problems as $problem)
                <tr>
                    <td>{{ $problem ->problem}} </td>
                    <td><a href="{{ route('problem.show',[$problem->id]) }}"><button>show</button></a></td>
                    <form  action="{{ route('problem.delete',[$problem->id]) }}"  method="POST">
                        @csrf
                        @method('DELETE')
                    <td>  <button class="btn btn-danger">delete</button></td>
                    </form> 
                </tr>
                
                @endforeach
            
            </tbody>
        </table>
    @endsection

