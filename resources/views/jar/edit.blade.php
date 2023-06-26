@extends('jar.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Jar - {{ $jar->jar_name }}</h2>
            <form action="{{ route('jar.update', $jar->id) }}" method="POST">
                @csrf
                @method('PUT')
                Balance:{{$jar->savings}}
                <div class="form-group">
                    <label for="savings">Savings</label>
                    <input type="number" id="savings" name="savings" class="form-control" value="0">
                </div>
                <div class="form-group">
                    <label for="jar_name">Product to Buy</label>
                    <input type="text" id="jar_name" name="jar_name" class="form-control" value="{{ $jar->jar_name }}" readonly>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-secondary" href="{{ route('jar.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
