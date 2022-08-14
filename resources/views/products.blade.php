@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center text-center">

        <div class="card-body w-auto mx-auto d-block">
            <div class="row mb-5">
                @foreach($products as $key => $product)
                    <div class="col-md-4 mb-5">
                        <div class="card mx-auto p-2" style="width: 22rem;">
                            <img src="{{ $product->image }}" alt="Product Image" class="card-img-top">
                            <div class="card-body p-4">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text" style="text-align: justify">{{ $product->description }}</p>
                                <a href="{{ route('cart.increment', $product) }}" class="btn btn-outline-primary">
                                    اضافه به سبد خرید
                                    <i class="fa-light fa-bag-shopping"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
