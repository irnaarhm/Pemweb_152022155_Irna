<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['flower'] = Flower::latest()->take(3)->get();
        return view('customer.home', $data);
    }
}
