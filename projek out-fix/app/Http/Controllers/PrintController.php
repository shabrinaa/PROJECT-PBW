<?php

namespace App\Http\Controllers;

use App\Models\PrintModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PrintController extends Controller
{
    public function index()
    {
        if (auth()->user()->hak_akses == "admin") {
            return redirect()->route('admin');
        }

        return view('print');
    }

    private function countPages($path)
    {
        $pdftext = file_get_contents($path);
        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
        return $num;
    }

    public function print(Request $request)
    {
        $request->validate([
            'no_telpon' => 'required|min:12',
            'alamat_lengkap' => 'required',
            'file' => 'required|mimes:pdf'
        ]);
        // $replaced = Str::of('(+1) 501-555-1000')->replaceMatches('/[^A-Za-z0-9]++/', '');
        $newFileName = time() . '-' . Str::slug(auth()->user()->name) . '.' . $request->file->extension();

        $request->file->move(public_path('pdf'), $newFileName);

        $path = 'pdf/' . $newFileName;
        $PagesCount = $this->countPages($path);

        $jilid = ($request->jilid == 'Dijilid') ? 1 : 0;

        $price = 300;
        $jilidPrice = ($jilid == 1) ? 4000 : 0;

        // cek alamat
        $alamat = explode(',', $request->alamat_lengkap);
        $gratisOngkir = (strtolower($alamat[2]) == "darussalam") ? 1 : 0;
        $ongkirPrice = ($gratisOngkir == 0) ? 7000 : 0;

        $totalBiaya = ($price * $PagesCount) + $jilidPrice + $ongkirPrice;

        $data = [
            'file_path' => $newFileName,
            'no_telpon' => Str::of($request->no_telpon)->replaceMatches('/[^A-Za-z0-9]++/', ''),
            'alamat_lengkap' => $request->alamat_lengkap,
            'jilid' => $jilid,
            'gratis_ongkir' => $gratisOngkir,
            'jumlah_halaman' => $PagesCount,
            'total_biaya' => $totalBiaya,
            'status' => 'On Progress',
        ];

        $request->user()->printed()->create($data);

        return redirect()->route('dashboard', $request->id);
    }
}
