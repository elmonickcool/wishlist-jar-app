@extends('jar.layout')

@section('content')
<div class="row">
    <div class="col">
        <h2>Add New Wishlist</h2>
    </div>
    <div class="col text-end">
        <a class="btn btn-primary" href="{{ route('jar.index') }}"> Back</a>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('jar.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="jar_name">Name:</label>
        <input type="text" name="jar_name" id="jar_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="link">Link:</label>
        <input type="text" name="link" id="link" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" class="form-control">
    </div>

    <div class="form-group">
        <label for="cost">Price:</label>
        <input type="number" name="cost" id="cost" class="form-control">
    </div>

    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" name="category" id="category" class="form-control">
    </div>
  
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
@endsection
