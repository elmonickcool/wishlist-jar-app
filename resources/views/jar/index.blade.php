@extends ('jar.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="pull-left">
                <h2>Wishlist Crud</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('jar.create') }}">Create New Jar</a>
            </div>
        </div>
    </div>
</div>


