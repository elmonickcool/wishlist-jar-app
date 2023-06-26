@extends('jar.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-left">
                <h2>Wishlist Crud</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('jar.create') }}">Create New Jar</a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-10">
            @foreach($jar as $jars)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $jars->jar_name }}</h5>
                    <p class="card-text">{{$jars->description}}</p>
                    <p class="card-text">Cost: {{$jars->cost}}</p>
                    <p class="card-text">Remaining:{{$jars->remaining}}</p>
                    <a class="btn btn-primary" href="{{ route('jar.edit', $jars->id) }}">Edit</a>
                    
                    <form action="{{ route('jar.destroy', $jars->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
