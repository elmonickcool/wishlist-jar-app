@extends('jar.layout')

@section('content')

<div class="row justify-content-center">
    <div class="col">
        <h2>📃Wishlist</h2>
    </div>
    <p>Total Savings: {{ number_format($totalSavings, 2) }}</p>
    <div class="col text-end">
        <a class="btn btn-success" href="{{ route('jar.create') }}">Add Wishlist</a>
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        @foreach($jar as $jars)
        <div class="card mb-3 mx-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if ($jars->image)
                        <div>
                            <img src="{{ asset('images/'.$jars->image) }}" alt="Jar Image" class="img-thumbnail rounded mx-auto d-block">
                        </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <a href="{{$jars->link}}">
                            <h5 class="card-title">{{ $jars->jar_name }}</h5>
                        </a>
                        <p class="card-text">Category: {{ $jars->category }}</p>
                        <p class="card-text">{{ $jars->description }}</p>
                        <p class="card-text">Cost: <strong>{{ number_format($jars->cost, 2) }}</strong></p>
                        <p class="card-text">Savings: <strong>{{ number_format($jars->savings, 2) }}</strong></p>
                        <p class="card-text">Progress: <strong>{{number_format($jars->savings/$jars->cost*100,2)}}%</strong></p>
                        
                        @if ($jars->buy)
                        <div class="alert alert-success">
                            <p class="card-text">You bought {{ $jars->jar_name }}</p>
                        </div>
                        @elseif ($jars->remaining == 0)
                        <div class="alert alert-primary">
                            <p class="card-text">You can buy {{ $jars->jar_name }}</p>
                        </div>
                        @if ($totalSavings >= $jars->cost)
                        <form action="{{ route('jar.buy', $jars->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">Buy</button>
                        </form>
                        @endif
                        @if ($totalSavings > $jars->cost && $jars->savings < $jars->cost)
                            <form action="{{ route('jar.buy', $jars->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-info">Buy with Total Savings</button>
                            </form>
                            @endif
                            @else
                            <div class="alert alert-warning">
                                <p class="card-text">You need {{ $jars->remaining }} to buy {{ $jars->jar_name }}</p>
                            </div>
                            <a class="btn btn-primary" href="{{ route('jar.edit', $jars->id) }}">Prioritize</a>
                            @if ($totalSavings > $jars->cost && $jars->savings < $jars->cost)
                                <form action="{{ route('jar.buy', $jars->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Buy with Total Savings</button>
                                </form>
                                @endif
                                @endif

                                <form action="{{ route('jar.destroy', $jars->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection