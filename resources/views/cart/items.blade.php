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
                            <th scope="col">قیمت محصول</th>
                            <th scope="col">تعداد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    {{ number_format($item->price / 10) }}
                                    {{ "تومان" }}
                                </td>
                                <td>
                                    {{ $item->quantity }}
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
                    <a href="" class="btn btn-primary">
                        ثبت و ادامه سفارش
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
