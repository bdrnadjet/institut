@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card card-login hover-lift mt-5">
                    <div class="login-header">
                        <h3 class="mb-2">Welcome Back</h3>
                        <p class="mb-0 text-white-50">Login to your account</p>
                    </div>

                    <div class="login-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4">
                                <div class="form-floating">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="name@example.com">
                                    <label for="email">Email Address</label>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-floating">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link p-0 text-decoration-none" href="{{ route('password.request') }}">
                                        Forgot Password?
                                    </a>
                                @endif
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-login shadow-lg">
                                    <i class="bi bi-box-arrow-in-right me-2"></i> Login
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="text-muted">Don't have an account? <a href="{{ route('register') }}"
                                        class="text-primary text-decoration-none fw-bold">Apply Now</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection