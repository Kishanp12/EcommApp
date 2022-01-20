<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {


        return view('home.dashboard', ['products' => auth()->user()->products]);
    }
}
