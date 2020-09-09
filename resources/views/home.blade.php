@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="btn-group d-flex" role="group" aria-label="Add product to cart...">
                <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-3">
                        <a href="{{ url('add-product',  ['id' => $product->id]) }}" class="card mb-2">
                            <div class="card-body">
                                <p>{{ $product->name }}</p>
                                <p>N{{ $product->price }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>No Products</p>
                @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
