<?php

namespace App\Http\Controllers;


use App\Models\Product;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $product = Product::simplePaginate(3);
        return view('dashboard',['products' => $product ]);
    }
}
