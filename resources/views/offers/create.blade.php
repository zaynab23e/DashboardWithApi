
@extends('layout')

@section('main')
<div class="container">
    <h1>Add Doctor</h1>
    <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="newPrice" class="form-label">New Price</label>
    <input type="text" class="form-control" id="newPrice" name="newPrice" value="{{ old('newPrice') }}">
    @error('newPrice')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="oldPrice" class="form-label">Old Price</label>
    <input type="text" class="form-control" id="oldPrice" name="oldPrice" value="{{ old('oldPrice') }}">
    @error('oldPrice')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <textarea class="form-control" id="title" name="title">{{ old('title') }}</textarea>
    @error('title')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
    @error('address')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="city" class="form-label">City</label>
    <select id="city" name="city" class="form-control">
        @foreach($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option> <!-- Show names, send IDs -->
        @endforeach
    </select>
    @error('city')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="specialization" class="form-label">Specialization</label>
    <select id="specialization" name="specialization" class="form-control">
        @foreach($specializations as $specialization)
            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option> <!-- Show names, send IDs -->
        @endforeach
    </select>
    @error('specialization')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" id="image" name="image">
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Save</button>
@endsection