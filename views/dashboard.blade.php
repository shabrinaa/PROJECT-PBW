@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-3" style="background: #FFF6A5; height: 100vh; padding-top: 80px">
            <div class="content px-3" style="width: 100%">
                <h1 class="text-custom text-center">HOME</h1>
                <hr>
                <a href="{{ route('print') }}" class="btn btn-custom my-2" style="width: 100%">Print</a>
                <br>
                <a href="{{ route('about') }}" class="btn btn-custom my-2" style="width: 100%">About</a>
                <br>
                <form action="{{ route('logout') }}" method="post" class="d-inline">
                    @csrf
                    <button class="btn btn-custom mt-5" style="width: 100%">Logout</button>
                </form>
            </div>

        </div>
        <div class="col-md-9 d-flex justify-content-center align-items-center">
            @if ($printed->count())
                <div class="mt-5 p-3" style="height: 90vh; width: 100%; overflow: auto">
                    <div class="row">
                        <?php $i = 1; ?>
                        @foreach ($printed as $print)
                            <div class="col-md-4">
                                <div class="card bg-main-color mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title"> <span
                                                class="badge bg-secondary me-2">{{ $i++ }}</span>
                                            {{ $print->created_at }}</h5>
                                        <hr>
                                        <h3 class="card-subtitle mb-2 text-muted">Rp
                                            {{ number_format($print->total_biaya, 2) }}</h3>
                                        <p class="m-0">Jilid :
                                            {{ $print->jilid == 1 ? 'Ya (+ Rp 4.000,-)' : 'Tidak' }}
                                        </p>

                                        <p class="m-0">Gratis Ongkir :
                                            {{ $print->gratis_ongkir == 1 ? 'Ya' : 'Tidak (+ Rp 7.000,-)' }}
                                        </p>
                                        <p class="m-0">Jumlah Halaman : {{ $print->jumlah_halaman }} ( x Rp 300,-/Lembar )
                                        </p>
                                        <p class="m-0">Status :
                                        <h3><span
                                                class="badge badge-lg {{ $print->status == 'On Progress' ? 'bg-secondary' : 'bg-success' }} mt-2">
                                                {{ $print->status }}
                                            </span>
                                        </h3>
                                        </p>
                                        <hr>
                                        <p class="m-0">No Telp : {{ $print->no_telpon }}</p>
                                        <p class="m-0">Alamat : {{ $print->alamat_lengkap }}</p>
                                        <hr>
                                        <a href="{{ asset('pdf/' . $print->file_path) }}" class="card-link">Download
                                            File</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <img style="width: 40%" src="{{ asset('image/dashboard_hero.png') }}" alt="dashboard hero">
            @endif
        </div>
    </div>
@endsection
