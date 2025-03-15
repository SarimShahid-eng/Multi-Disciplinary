<x-guest-layout>
    <div class="text-center mt-2">
        <h5 class="text-primary">Welcome to <br> Multidisciplinary impact press
        </h5>
        <p class="text-muted">Sign In.
    </div>
    <div class="p-2 mt-1">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email"
                    @error('email') is-invalid @enderror value="{{ old('email') }}" name="email">
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password-input">Password</label>
                    <a href="" class="text-muted">Forgot
                        password?</a>
                </div>
                <div class="position-relative auth-pass-inputgroup mb-3">

                    <input type="password" class="form-control pe-5 password-input" placeholder="Enter password"
                        id="password" @error('password') is-invalid @enderror" name="password"
                        autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button
                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-end">
                                            <a href="" class="text-decoration-underline">Forget Password?</a>
                                        </div> --}}
            <div class="mt-4">
                <button class="btn btn-success w-100" type="submit">Sign In</button>
            </div>
            <div class="mt-4 text-center">
                <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Signup
                    </a> </p>
            </div>
        </form>
    </div>
</x-guest-layout>
