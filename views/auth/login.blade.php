@extends('layout.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="content">
            <div class="text-center">
                <h1>Welcome back outers!</h1>
                <br>
                <br>
                <div>
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
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
                            <input type="password" name="password" id="password" placeholder="Your password"
                                class="form-control form-custom">

                            @error('password')
                                <div class="text-danger mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-2" id="remember" name="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-custom">Masuk</button>
                        </div>
                        <br>
                        <a class="text-custom" href="{{ route('register') }}">Belum Punya Akun? Daftar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
