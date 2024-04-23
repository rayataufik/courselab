@extends('auth.app')

@section('content')
<div class="login">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col col-md-4 mx-auto my-auto">
            <div class="card">
                <div class="card-body">
                    <a href="/" class="d-flex no-underline back align-items-center">
                        <i class='bx bx-left-arrow-alt'></i>
                        <p class="mt-3">Back</p>
                    </a>
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h3 class="font-weight-bold">Login</h3>
                    <p class="text secondary mt-3 mb-3">Hi, Welcome back 👋</p>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="formControlEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="formControlEmail" placeholder="name@example.com" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="formControlPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="formControlPassword" placeholder="Enter your password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox">
                            <label class="form-check-label" for="checkbox">Remember Me</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-indigo" type="submit">Login</button>
                        </div>
                    </form>
                    <p class="mt-3">Not have an account? <a href="/register">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop