@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-3" style="background: #FFF6A5; height: 100vh; padding-top: 80px">
            <div class="content px-3" style="width: 100%">
                <h1 class="text-custom text-center">PRINT</h1>
                <hr>
                <a href="{{ route('dashboard') }}" class="btn btn-custom my-2" style="width: 100%">Home</a>
                <br>
                <a href="{{ route('about') }}" class="btn btn-custom my-2" style="width: 100%">About</a>
            </div>

        </div>
        <div class="col-md-9 d-flex justify-content-center align-items-center">
            <div class="content" style="width: 500px">
                <form action="{{ route('print') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control form-custom" name="file" type="file" value="{{ old('file') }}">
                        <small>Masukan Format PDF</small>
                        @error('file')
                            <div class="text-danger mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input checked class="form-check-input" type="radio" name="jilid" id="inlineRadio1"
                                value="Dijilid">
                            <label class="form-check-label" for="inlineRadio1">Dijilid</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jilid" id="inlineRadio2"
                                value="Tidak_Dijilid">
                            <label class="form-check-label" for="inlineRadio2">Tidak Dijilid</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-custom" id="floatingInput"
                                placeholder="Masukan Nomor Telpon" name="no_telpon" value="{{ old('no_telpon') }}">
                            <label for="floatingInput">Nomor Telpon Aktif</label>
                        </div>
                        @error('no_telpon')
                            <div class="text-danger mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control form-custom" placeholder="Masukan Alamat Lengkap"
                                name="alamat_lengkap" id="floatingTextarea2"
                                style="height: 100px">{{ old('alamat_lengkap') }}</textarea>
                            <label for="floatingTextarea2">Alamat Lengkap</label>
                        </div>
                        @error('alamat_lengkap')
                            <div class="text-danger mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                        <small>Format pengisian alamat : Jalan, Desa, Kecamatan, Provinsi </small>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-custom">Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
