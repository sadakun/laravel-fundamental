<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // to use IsAdmin middleware or call it in route
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }

    public function index()
    {
        return "you are a Administrator,because you are see this page";
    }
}
