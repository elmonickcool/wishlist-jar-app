@extends('jar.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Bid for {{ $jar->jar_name }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('jar.update', $jar->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="savings">Balance:</label>
                        <span class="font-weight-bold">{{ $jar->savings }}</span>
                    </div>
                    <div class="form-group">
                        <label for="savings">Savings:</label>
                        <input type="text" id="savings" name="savings" class="form-control" value="{{ old('savings') }}" pattern="\d+(\.\d{1,2})?">
                    </div>
                    <div class="form-group">
                        <label for="jar_name">Product to Buy:</label>
                        <input type="text" id="jar_name" class="form-control" value="{{ $jar->jar_name }}" readonly>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-secondary" href="{{ route('jar.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection