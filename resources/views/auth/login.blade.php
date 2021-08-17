@extends('layouts.app')

@section('content')
<div class="container">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-5 shadow">
                <div class="modal-header p-5 pb-4">

                    <h1 class="fw-bold mb-0">Login</h1>
                </div>
                <div class="modal-body p-5 pt-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email address</label>
                            <input id="email" type="email" class="form-control rounded-4 @error('email') is-invalid @enderror " name="email" value="{{ old('email')}}" placeholder="name@example.com">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingPassword">Password</label>

                            <input id="password" type="password" class="form-control rounded-4 @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"  placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>
                        <hr>

                        </button>
                        <div class="form-group row">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
