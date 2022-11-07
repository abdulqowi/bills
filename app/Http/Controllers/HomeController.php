<?php

namespace App\Http\Controllers;

use App\Models\{Order, OrderDetail, Product};
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
            return view('dashboard', [
        ]);
    }
}
