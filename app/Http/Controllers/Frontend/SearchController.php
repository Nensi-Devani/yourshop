<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProducts(Request $request)
    {
        if($request->search){
            $products = Product::where('name','like','%'.$request->search.'%')->latest()->paginate(16);
            return view('frontend.search',compact('products'));
        }
        else{
            return redirect()->back();
        }
    }
}
