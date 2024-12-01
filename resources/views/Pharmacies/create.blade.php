
@extends('layout')

@section('main')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>

    <h1>pharmacy Form</h1>
    <form action="{{ route('Pharmacies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" >
    
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" >
    
    
        <button type="submit">Save</button>
    </form>
    

</body>
</html>







