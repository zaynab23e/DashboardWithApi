@extends('layout')

@section('main')
<form action="{{ route('offers.update', $offers->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name', $offers->name) }}">

    <label for="name">image:</label>
    <input type="file" name="image">

    <label for="name">title:</label>
    <input type="text" name="title" value="{{ old('title', $offers->title) }}">

    <label for="name">address:</label>
    <input type="text" name="address" value="{{ old('address', $offers->address) }}">

    <label for="name">newprice:</label>
    <input type="text" name="newPrice" value="{{ old('newPrice', $offers->newPrice) }}">

    <label for="name">oldprice:</label>
    <input type="text" name="oldPrice" value="{{ old('oldPrice', $offers->oldPrice) }}">

    <label for="name">city:</label>
    <select name="city">
        @foreach($Cities as $ci)
            <option value="{{ $ci->id }}" {{ $ci->id == $offers->ci_id ? 'selected' : '' }}>
                {{ $ci->name }}
            </option>
        @endforeach
    </select>
    <label for="name">Specializations:</label>
    <select name="specialization">
        @foreach($Specializations as $sp)
            <option value="{{ $sp->id }}" {{ $sp->id == $offers->spe_id ? 'selected' : '' }}>
                {{ $sp->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>
@endsection
