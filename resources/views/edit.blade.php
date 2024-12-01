



@extends('layout')

@section('main')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Form</title>
</head>
<body>

    <h1>edit Form</h1>

    <form action="{{ route('Pharmacies.update',[$pharmacies->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $pharmacies->name }}" >
        <br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ $pharmacies->phone }}">
        <br><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
