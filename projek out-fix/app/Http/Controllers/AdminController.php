<?php

namespace App\Http\Controllers;

use App\Models\PrintModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if (auth()->user()->hak_akses != "admin") {
            return redirect()->route('dashboard');
        }
        $printed = PrintModel::latest()->get();

        return view('admin', [
            'printed' => $printed
        ]);
    }

    public function printUpdate(PrintModel $print)
    {
        $print->update([
            'status' => 'Finished'
        ]);

        return back();
    }

    public function printDestroy(PrintModel $print)
    {
        $print->delete();

        return back();
    }
}
