@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="border rounded bg-light p-3" style="min-height: 100%">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">قابل خرید</th>
                            <th scope="col" style="width: 110px">قیمت محصول</th>
                            <th scope="col" style="width: 100px;">تعداد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>
                                    <div class="d-flex justify-content-between w-100">
                                        <span>
                                            {{ number_format($item->price / 10) }}
                                        </span>
                                        <span>
                                            <sub>{{ "تومان" }}</sub>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <form action="{{ route('cart.update', $item) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number"
                                                   name="quantity"
                                                   id="quantity"
                                                   class="form-control form-control-sm"
                                                   onchange="event.preventDefault(); setTimeout(function () {event.target.parentElement.submit()}, 300)"
                                                   min="1"
                                                   max="{{ $item->stock }}"
                                                   value="{{ $item->quantity }}">
                                        </form>
                                        <form action="{{ route('cart.item.delete', $item) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('cart.item.delete', $item) }}"
                                               onclick="event.preventDefault(); event.target.parentElement.parentElement.submit()"
                                               class="text-danger fw-bold me-3" style="cursor: pointer">
                                                <i class="fa-light fa-multiply"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">هیچ موردی در سبد خرید یافت نشد.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                @include('cart.summary')
                <div class="row px-3 pt-3">
                    <a href="{{ route('cart.checkout.form') }}" class="btn btn-primary">
                        ثبت و ادامه سفارش
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
