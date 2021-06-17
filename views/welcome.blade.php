@extends('layout.app')

@section('content')


    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img style="height: 70%" src="{{ asset('image/front-image.png') }}" alt="Hero Image">
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="content text-center" style="margin-top: -50px">
                    <h1>Welcome Outers!</h1>
                    <br>
                    <a href="/login" class="btn btn-custom px-5 my-3">Masuk</a>
                    <br>
                    <a href="/register" class="btn btn-custom px-5 my-3">Daftar</a>
                    <br>
                    <br>
                    <br>
                    <small>Copyright &copy; Print-out 2021</small>
                </div>
            </div>
        </div>
    </div>

@endsection
