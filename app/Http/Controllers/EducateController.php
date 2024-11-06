<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducateController extends Controller
{
    public function index()
    {
        return view('educate');
    }

    public function pemilahan()
    {
        return view('educate_pemilahan');
    }

    public function dampak()
    {
        return view('educate_dampak');
    }

    public function pengelolaan()
    {
        return view('educate_pengelolaan');
    }
}
