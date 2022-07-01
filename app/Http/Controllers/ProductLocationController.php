<?php

namespace App\Http\Controllers;

use App\Models\ProductLocation;
use Illuminate\Http\Request;

class ProductLocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['productLocations'] = ProductLocation::paginate(13);
        return view('product-location.list', $data);
    }

    public function create()
    {

        return view('product-location.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|max:20',
            'rack' => 'required|numeric',
            'queue' => 'required|numeric'
        ]);
        $prodLocation = new ProductLocation();

        $prodLocation->position = $request->post('position');
        $prodLocation->rack = $request->post('rack');
        $prodLocation->queue = $request->post('queue');
        $prodLocation->save();
        return back()->with('message', 'Products location is created');
    }

    public function edit($id)
    {

        $data['prodLocation'] = ProductLocation::findOrFail($id);


        return view('product-Location.edit', $data);
    }

    public function update(Request $request, $prodLocationId)
    {
        $request->validate([
            'position' => 'required|max:20',
            'rack' => 'required|numeric',
            'queue' => 'required|numeric'
        ]);
        $prodLocation = ProductLocation::find($prodLocationId);
        $prodLocation->position = $request->post('position');
        $prodLocation->rack = $request->post('rack');
        $prodLocation->queue = $request->post('queue');
        $prodLocation->save();
        return back()->with('message', 'Product location is edited');

    }

    public function destroy($id)
    {
        $prodLocation = ProductLocation::find($id);
        $prodLocation->delete();
        return back()->with('message', 'Product location is deleted');
    }
}
