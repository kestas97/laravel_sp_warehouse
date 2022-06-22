<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['manufacturers'] = Manufacturer::paginate(13);
        return view('manufacturer.list', $data);
    }

    public function create()
    {

        return view('manufacturer.form');
    }

    public function store(Request $request)
    {
        $manufacturer = new Manufacturer();

        $manufacturer->name = $request->post('name');
        $manufacturer->save();
        return back()->with('message', 'Manufacturer is created');
    }

    public function edit($id)
    {

        $data['manufacturer'] = Manufacturer::findOrFail($id);


        return view('manufacturer.edit', $data);
    }

    public function update(Request $request, $manufacturerId)
    {
        $manufacturer = Manufacturer::find($manufacturerId);
        $manufacturer->name = $request->post('name');
        $manufacturer->save();
        return back()->with('message', 'Manufacturer is edited');

    }

    public function destroy($id)
    {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return back()->with('message', 'Manufacturer is deleted');
    }
}
