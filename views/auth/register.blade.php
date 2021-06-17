@extends('layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="content">
            <div class="text-center">
                <h1>Lets Join to be an outers!</h1>
                <br>
                <br>
                <div>
                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <input type="text" name="name" id="name" placeholder="Your name"
                                class="form-control form-custom @error('name') border-red-500 @enderror"
                                value="{{ old('name') }}">

                            @error('name')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="text" name="email" id="email" placeholder="Your email"
                                class="form-control form-custom" value="{{ old('email') }}">

                            @error('email')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="file" name="profile_pics" id="profile_pics" placeholder="Your Profile Picture"
                                class="form-control form-custom" value="{{ old('profile_pics') }}">

                            @error('profile_pics')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="password" name="password" id="password" placeholder="Your password"
                                class="form-control form-custom">

                            @error('password')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="Repeat your password" class="form-control form-custom">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-custom">Register</button>
                        </div>
                        <br>
                        <a class="text-custom" href="{{ route('login') }}">Sudah Punya Akun! Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
