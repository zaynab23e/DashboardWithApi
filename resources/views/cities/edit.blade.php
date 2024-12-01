@extends('layout')

@section('main')
<div class="container">
    <h1>edit Doctor</h1>
    <form action="{{ route('city.update',$city->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $city->name}}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
