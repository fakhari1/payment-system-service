@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.validation-errors')
        <form action="{{ route('cart.checkout') }}" id="payment_form" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <h5 class="card-header text-end p-4">اطلاعات کاربر</h5>
                        <div class="card-body p-4">
                            <div class="row justify-content-around">
                                <div class="title col-2 text-end me-3" style="width: 100px">گیرنده:</div>
                                <div class="col-10 text-end">
                                    {{ auth()->user()->name }}
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row justify-content-around">
                                <div class="title col-2 text-end me-3" style="width: 100px">آدرس:</div>
                                <div class="col-10 text-end">
                                    {{ auth()->user()->address ?? 'از قسمت تکمیل اطلاعات کاربری آدرس را ثبت کنید.' }}
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="row justify-content-around">
                                <div class="title col-2 text-end me-3" style="width: 100px">شماره تلفن:</div>
                                <div class="col-10 text-end">
                                    {{ auth()->user()->phone_number ?? 'از قسمت تکمیل اطلاعات کاربری شماره تلفن را ثبت کنید.' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @include('cart.summary')
                    <div class="row px-3 pt-3">
                        <button type="submit" class="btn btn-primary">
                            پرداخت
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <h5 class="card-header text-end p-4">روش پرداخت</h5>
                        <div class="card-body p-4">
                            <div class="row align-items-center my-3 border-top py-2">
                                <div class="col-6 text-end">
                                    <div class="form-check">
                                        <input checked class="form-check-input" type="radio" name="type"
                                               value="online"
                                               id="online_payment" style="float: none">
                                        <label class="form-check-label me-4">
                                            پرداخت آنلاین
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <select name="gateway" id="gateway" class="form-select"
                                            style="background-position: left .75rem center">
                                        <option value="saman">سامان</option>
                                        <option value="mellat">ملت</option>
                                        <option value="sepah">سپه</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row border-bottom py-2">
                            <span class="text-end">
                                در این روش شما میتوانید با استفاده از کارت بانک های عضو شتاب با استفاده از رمز پویا مبلغ خود را پرداخت کنید.
                            </span>
                            </div>
                            <div class="row align-items-center my-3 py-2">
                                <div class="col-6 text-end">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type"
                                               value="offline"
                                               id="delivery_time_payment" style="float: none">
                                        <label class="form-check-label me-4">
                                            پرداخت در محل
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom py-2">
                            <span class="text-end">
                                در این روش شما میتوانید درب منزل خود مبلغ را پرداخت کنید.
                            </span>
                            </div>
                            <div class="row align-items-center my-3 py-2">
                                <div class="col-6 text-end">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" value="card_to_card" id="card_payment"
                                               style="float: none">
                                        <label class="form-check-label me-4">
                                            کارت به کارت
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                            <span class="text-end">
                                {{ "لطفا مبلغ را به شما کارت" }}
                                {{ "5555 5555 5555 5555" }}
                                {{ "واریز نمایید و کد پیگیری را به همکاران ما ارسال کنید." }}
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
