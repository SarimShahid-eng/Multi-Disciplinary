<x-guest-layout>
    <div class="text-center mt-2">
        <h5 class="text-primary">Welcome to <br> Multidisciplinary impact press
        </h5>
        <p class="text-muted">Create a new account
    </div>
    <div class="p-2 mt-1">
        <form method="POST" class="" action="{{ route('register') }}">
            @csrf
            <div @class(['mb-3' => !$errors->has('username')])>
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username"
                    @error('username') is-invalid @enderror value="{{ old('username') }}" name="username">
            </div>
            @error('username')
                <span @class([
                    'invalid-feedback',
                    'd-block' => $errors->has('username'),
                    'mb-2' => $errors->has('username'),
                ]) class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div @class(['mb-3' => !$errors->has('firstname')])>
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter firstname"
                    @error('firstname') is-invalid @enderror value="{{ old('firstname') }}" name="firstname">
            </div>
            @error('firstname')
                <span @class([
                    'invalid-feedback',
                    'd-block' => $errors->has('firstname'),
                    'mb-2' => $errors->has('firstname'),
                ]) class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div @class(['mb-3' => !$errors->has('lastname')])>
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter lastname"
                    @error('lastname') is-invalid @enderror value="{{ old('lastname') }}" name="lastname">
            </div>
            @error('lastname')
                <span @class([
                    'invalid-feedback',
                    'd-block' => $errors->has('lastname'),
                    'mb-2' => $errors->has('lastname'),
                ]) class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div @class(['mb-3' => !$errors->has('affiliation')])>
                <label for="affiliation" class="form-label">Affiliation</label>
                <input type="text" name="affiliation" class="form-control" id="affiliation"
                    placeholder="Enter affiliation" @error('affiliation') is-invalid @enderror
                    value="{{ old('affiliation') }}" name="affiliation">
            </div>
            @error('affiliation')
                <span @class([
                    'invalid-feedback',
                    'd-block' => $errors->has('affiliation'),
                    'mb-2' => $errors->has('affiliation'),
                ]) class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div @class(['mb-3' => !$errors->has('country')])>
                <label for="affiliation" class="form-label">Country</label>
                <select class="js-example-basic-single" name="country">
                    <option value="" selected>Select Country</option>
                    @foreach ($countries as $key => $country)
                        <option value="{{ $country }}">
                            {{ $key . ' - ' . $country }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('country')
                <span @class([
                    'invalid-feedback',
                    'd-block' => $errors->has('country'),
                    'mb-2' => $errors->has('country'),
                ]) class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div @class(['mb-3' => !$errors->has('email')])>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                    @error('email') is-invalid @enderror value="{{ old('email') }}" name="email">
            </div>
            @error('email')
                <span @class([
                    'invalid-feedback',
                    'd-block' => $errors->has('email'),
                    'mb-2' => $errors->has('email'),
                ]) class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div @class(['mb-3' => !$errors->has('password')])>
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password"
                    @error('password') is-invalid @enderror value="{{ old('password') }}" name="password">
            </div>
            @error('password')
                <span @class([
                    'invalid-feedback',
                    'd-block' => $errors->has('password'),
                    'mb-2' => $errors->has('password'),
                ]) class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div @class(['mb-3' => !$errors->has('password_confirmation')])>
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password"
                    placeholder="Enter password" @error('password') is-invalid @enderror value="{{ old('password') }}"
                    name="password">
            </div>
            @error('password_confirmation')
                <span @class([
                    'invalid-feedback',
                    'd-block' => $errors->has('password_confirmation'),
                    'mb-2' => $errors->has('password_confirmation'),
                ]) class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="mt-4">
                <button class="btn btn-success w-100" type="submit">Sign Up</button>
            </div>
            <div class="mt-4 text-center">
                <p class="mb-0"> Already have an account ? <a href="{{ route('login') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Sign in
                    </a> </p>
            </div>
        </form>
    </div>
</x-guest-layout>
