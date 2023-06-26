@extends('jar.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('jar.index') }}"> Back</a>
        </div>
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
  
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
