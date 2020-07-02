<?php

namespace App\Http\Controllers;
use App\Product;
use App\Slide;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::where('new',1)->get();
        $image=Slide::all();
        return view('page.index',compact('product','image'));
    }
    public function product()
    {
        $product=Product::all();
        return view('page.product',compact('product'));
    }
}
