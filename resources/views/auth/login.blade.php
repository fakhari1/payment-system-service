@extends('layouts.app')

@section('title', __('auth.login'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-10 col-md-6">
            @include('partials.alerts')
            <div class="card">
                <div class="card-header">
                    {{ __('auth.login') }}
                </div>

                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="row form-group mb-3">
                            <label for="email" class="col-3 col-sm-2 form-label">{{ __('auth.email') }}</label>
                            <div class="col-9 col-sm-10">
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mb-3">
                            <label for="password" class="col-3 col-sm-2 form-label">{{ __('auth.password') }}</label>
                            <div class="col-9 col-sm-10">
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div style="
                                  width: 50%;
                                  margin: 0 auto;
                                  text-align: center;
                                  display: flex;
                                  justify-content: space-between;">
                               <div> <input type="checkbox" name="remember_me" class="form-check-input ml-4">
                                   <label class="form-check-label ml-4">
                                       {{ __('auth.remember_me') }}
                                   </label></div>
                                <a href="{{ route('forget-password') }}">{{ __('auth.forget-password') }}؟</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">{{ __('auth.login') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
