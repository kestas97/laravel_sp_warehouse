<?php

namespace App\Http\Controllers;

use App\Models\Flavor;
use Illuminate\Http\Request;

class FlavorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['flavors'] = Flavor::paginate(13);
        return view('flavor.list', $data);
    }

    public function create()
    {

        return view('flavor.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20'
        ]);
        $flavor = new Flavor();

        $flavor->name = $request->post('name');
        $flavor->save();
        return back()->with('message', 'Flavor is created');
    }

    public function edit($id)
    {

        $data['flavor'] = Flavor::findOrFail($id);


        return view('flavor.edit', $data);
    }

    public function update(Request $request, $flavorId)
    {
        $request->validate([
            'name' => 'required|max:20'
        ]);
        $flavor = Flavor::find($flavorId);
        $flavor->name = $request->post('name');
        $flavor->save();
        return back()->with('message', 'Flavor is edited');

    }

    public function destroy($id)
    {
        $flavor = Flavor::find($id);
        $flavor->delete();
        return back()->with('message', 'Flavor is deleted');
    }
}
