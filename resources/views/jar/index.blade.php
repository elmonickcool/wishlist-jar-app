@extends('jar.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-left">
                <h2>Wishlist CRUD</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('jar.create') }}">Create New Jar</a>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="{{ route('jar.bought') }}">Bought Items</a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-10">
            @foreach($jar as $jars)
            <div class="card mb-3">
                <div class="card-body">
                    <a href="{{$jars->link}}">
                        <h5 class="card-title">{{ $jars->jar_name }}</h5>
                    </a>
                    <p class="card-text">{{ $jars->description }}</p>
                    <p class="card-text">Cost: <strong>{{ number_format($jars->cost, 2) }}</strong></p>
                    <p class="card-text">Savings: <strong>{{ number_format($jars->savings, 2) }}</strong></p>

                    @if ($jars->buy)
                    <div class="alert alert-success">
                        <p class="card-text">You bought {{ $jars->jar_name }}</p>
                    </div>
                    @elseif ($jars->remaining == 0)
                    <div class="alert alert-warning">
                        <p class="card-text">You can buy {{ $jars->jar_name }}</p>
                    </div>
                    <form action="{{ route('jar.buy', $jars->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Buy</button>
                    </form>
                    @else
                    <div class="alert alert-warning">
                        <p class="card-text">You need {{ $jars->remaining }} to buy {{ $jars->jar_name }}</p>
                    </div>
                    <a class="btn btn-primary" href="{{ route('jar.edit', $jars->id) }}">Prioritize</a>
                    @endif


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