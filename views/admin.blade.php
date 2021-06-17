@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-md-3" style="background: #FFF6A5; height: 100vh; padding-top: 80px">
            <div class="content px-3" style="width: 100%">
                <h1 class="text-custom text-center">Admin</h1>
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
                                        <h6 class="card-subtitle mb-2 text-muted">Rp
                                            {{ number_format($print->total_biaya, 2) }}</h6>
                                        <p class="m-0">Owner : {{ $print->user->name }}</p>

                                        <p class="m-0">Jilid : {{ $print->jilid == 1 ? 'Ya' : 'Tidak' }}</p>
                                        <p class="m-0">Gratis Ongkir : {{ $print->gratis_ongkir == 1 ? 'Ya' : 'Tidak' }}
                                        </p>
                                        <p class="m-0">Jumlah Halaman : {{ $print->jumlah_halaman }}</p>
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
                                        <a href="{{ asset('pdf/' . $print->file_path) }}"
                                            class="badge rounded-pill bg-secondary">Download
                                            File</a>
                                        <form action="{{ route('print.destroy', $print) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin dihapus?')"
                                                class="badge rounded-pill bg-secondary">Hapus</button>
                                        </form>
                                        @if ($print->status != 'Finished')
                                            <form action="{{ route('print.update', $print) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit"
                                                    class="badge rounded-pill bg-secondary">Selesai</button>
                                            </form>
                                        @endif
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
