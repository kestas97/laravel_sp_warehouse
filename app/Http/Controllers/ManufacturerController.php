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
        $request->validate([
            'name' => 'required|max:20'
        ]);
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
        $request->validate([
            'name' => 'required|max:20'
        ]);
        $manufacturer = Manufacturer::findOrFail($manufacturerId);
        $manufacturer->name = $request->post('name');
        $manufacturer->save();
        return back()->with('message', 'Manufacturer is edited');

    }

    public function destroy($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->delete();
        return back()->with('message', 'Manufacturer is deleted');
    }
}
