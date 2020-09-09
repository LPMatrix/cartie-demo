@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart <p class="float-right">{{ Cartie::totalItems() }}</p></div>

                <div class="card-body">
                    @if (count(Cartie::contents()))
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
                            @foreach (Cartie::contents() as $item)
                            <tr>
                                <td>{{-- $item->name --}}</td>
                                <td>{{-- $item->price --}}</td>
                                <td>{{-- $item->qty --}}</td>
                                <td>{{-- $item->total --}}</td>
                                <td><a href="{{-- url('remove-cart')}}/{{$item->id --}}">Remove</a></td>
                                <td>{{ print_r(Cartie::contents()) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="float-right">N{{Cartie::totalPrice()}}</p>
                    @else
                    <div class="alert alert-info text-center m-0" role="alert">
                        Your Cart is <b>empty</b>.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
