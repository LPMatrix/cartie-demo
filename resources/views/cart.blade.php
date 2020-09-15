@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart <p class="float-right">{{ Cartie::totalItems() }}</p></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (Cartie::contents() as $product)
                            <tr>
                                <td>{{ $product["name"] }}</td>
                                <td>{{ $product["price"] }}</td>
                                <td>{{ $product["quantity"] }}</td>
                                <td>{{ $product["subtotal"] }}</td>
                                <td><a href="{{ url('remove-item')}}/{{ $product['rowid'] }}">Remove</a></td>
                            </tr>
                            @empty
                            <div class="alert alert-info text-center m-0" role="alert">
                                Your Cart is <b>empty</b>.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    <p class="float-right">N{{Cartie::totalPrice()}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
