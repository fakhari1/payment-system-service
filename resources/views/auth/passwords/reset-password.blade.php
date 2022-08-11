@extends('layouts.app')

@section('title', __('auth.login'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-10 col-md-6">
            @include('partials.alerts')
            <div class="card">
                <div class="card-header">
                    {{ __('auth.reset password') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('reset-password') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row form-group mb-3">
                            <label for="email" class="col-3 col-sm-3 form-label">{{ __('auth.email') }}</label>
                            <div class="col-9 col-sm-9">
                                <input type="email" name="email" id="email" class="form-control" value="{{ $email }}">
                            </div>
                        </div>
                        <div class="row form-group mb-3">
                            <label for="password" class="col-3 col-sm-3 form-label">گذرواژه جدید</label>
                            <div class="col-9 col-sm-9">
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mb-3">
                            <label for="password" class="col-3 col-sm-3 form-label">تکرار گذرواژه جدید</label>
                            <div class="col-9 col-sm-9">
                                <input type="text" name="password_confirmation" id="password_confirmation"
                                       class="form-control">
                            </div>
                        </div>
                        <div style="margin-right: 13%">
                            @include('partials.validation-errors')
                        </div>

                        <div style="margin-right: 17%">
                            <button type="submit"
                                    class="btn btn-sm btn-success">{{ __('auth.reset password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
