@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.alerts')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ str()->ucfirst(__('auth.forget password')) }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-2 col-12 col-form-label text-md-end">{{ __('auth.email') }}</label>
                                <div class="col-md-10 col-12">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $email ?? old('email') }}" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback mt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('auth.send verify link') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
