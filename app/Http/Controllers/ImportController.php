<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createImport()
    {

        return view('product-import.import');
    }

    public function import()
    {
        Excel::import(new ProductImport(),request()->file('file'), \Maatwebsite\Excel\Excel::CSV);

        return back()->with('message', 'All products is added');
    }
}
