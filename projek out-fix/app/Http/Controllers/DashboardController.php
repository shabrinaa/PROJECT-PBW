<?php

namespace App\Http\Controllers;

use App\Models\PrintModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if (auth()->user()->hak_akses == "admin") {
            return redirect()->route('admin');
        }

        $printed = PrintModel::latest()->get()->where('user_id', auth()->user()->id);

        return view('dashboard', [
            'printed' => $printed
        ]);
    }
}
