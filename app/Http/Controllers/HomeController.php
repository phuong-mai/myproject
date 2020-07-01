<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::where('new',1)->get();
        return view('page.index',compact('product'));
    }
    public function product()
    {
        $product=Product::all();
        return view('page.product',compact('product'));
    }
}
