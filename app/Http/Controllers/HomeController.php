<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class HomeController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $title = 'Beranda';

        return view('home.index', compact('title'));
    }

    public function indexTrip(Request $request): View
    {
        $title = 'Destinasi Wisata';

        return view('home.trip.index', compact('title'));
    }
}
