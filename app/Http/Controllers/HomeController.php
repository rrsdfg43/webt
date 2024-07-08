<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class HomeController extends Controller
{
    public function index()
    {
        $anime = Anime::get();
        return view('admin.index', compact('anime'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
