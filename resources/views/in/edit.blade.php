@extends('layout')

@section('main')
<div class="container">
    <h1>edit Doctor</h1>
    <form action="{{ route('admin.doctors.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name}}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{$doctor->price}}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details">{{$doctor->details}}</textarea>
            @error('details')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Waitingtime" class="form-label">Waiting Time</label>
            <input type="text" class="form-control" id="Waitingtime" name="Waitingtime" value="{{$doctor->Waitingtime }}">
            @error('Waitingtime')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{$doctor->address}}">
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <select id="city" name="city" class="form-control">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ $doctor->city_id == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
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
                    <option value="{{ $specialization->id }}" {{ $doctor->specialization_id == $specialization->id ? 'selected' : '' }}>
                        {{ $specialization->name }}
                    </option>
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
    </form>
</div>
@endsection
