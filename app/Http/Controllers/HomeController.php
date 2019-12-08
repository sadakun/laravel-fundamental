<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        // $user = Auth::user();
        // return view('home', compact('user'));

        ## create session
        // $request->session()->put(['sadakun' => 'master something']);
        // $request->session()->get('sadakun');

        // session(['marcomelandri' => 'master something']);
        // return session('marcomelandri');

        ## session delete
        // $request->session()->flush();
        // return $request->session()->all();

        ## flashing data
        // $request->session()->flash('message', 'Post has been created');
        // return $request->session()->get('message');

        ## flashing data lil bit longer
        // $request->session()->reflash();
        // $request->session()->keep('message');
        return view('home');
    }
}
