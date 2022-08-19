<?php

namespace App\Http\Controllers;

use App\Models\Persediaan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $persediaan = Persediaan::orderBy('id_rekening')->get();
        return view('home', [
            "persediaans" => $persediaan
        ]);
    }
}
