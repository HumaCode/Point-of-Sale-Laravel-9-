@extends('admin_auth')

@section('adminauth')

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="#" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend') }}/assets/images/logo-dark.png" alt=""
                                            height="22">
                                    </span>
                                </a>

                                <a href="#" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend') }}/assets/images/logo-light.png" alt=""
                                            height="22">
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">Enter your name or email or phone number and password to
                                access admin
                                panel.</p>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="login" class="form-label">Name/Email/Phone</label>
                                <input class="form-control @error('login') is-invalid @enderror" name="login"
                                    type="text" id="login" required="" autofocus value="{{ old('login') }}"
                                    placeholder="Enter Your Name/Email/Phone">
                                @error('login')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter Your Password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="remember_me">
                                    <label class="form-check-label" for="remember_me">Remember me</label>
                                </div>
                            </div>

                            <div class="text-center d-grid">
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div>

                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->



            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<footer class="footer footer-alt">
    2023 - <script>
    </script> &copy; {{ config('app.name') }} by <a href="#" class="text-white-50">HumaCode</a>
</footer>

@endsection