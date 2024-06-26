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
                    <h3 class="font-weight-bold">Register</h3>
                    <p class="text secondary mt-3 mb-3">Let's create your account!</p>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="formControlUsername" class="form-label">Username</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="formControlUsername" placeholder="Enter your username" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="formControlEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="formControlEmail" placeholder="name@example.com" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="formControlPassword" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="formControlPassword" placeholder="Enter your password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox">
                            <label class="form-check-label" for="checkbox">I accept the <strong>Privacy Policy</strong></label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-indigo" type="submit">Register</button>
                        </div>
                    </form>
                    <p class="mt-3">Already have an account? <a href="/login">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop