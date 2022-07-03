<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        if (!empty($search = $request->input('search'))){
            $data['products'] = Product::where('title', 'like', "%".$search."%")->limit(10)->get();
        }

        return view('search.autocomplete', $data);
    }

    public function find(Request $request)
    {
        if(!empty($search = $request->input('search'))){
            $data['products'] = Product::where('title', 'like', "%$search%")->paginate(13);
        }else{
            return back()->with('error', 'Input is empty!!');
        }

        return view('search.result', $data);
    }
}
