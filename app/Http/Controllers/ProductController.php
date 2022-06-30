<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Flavor;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductLocation;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::paginate(13);

        return view('product.list', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['manufacturers'] = Manufacturer::all();
        $data['flavors'] = Flavor::all();
        $data['categories'] = Category::all();
        $data['locations'] = ProductLocation::all();
        return view('product.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();

        if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi'). $file->getClientOriginalName();
            $file->move(public_path('public/image'), $filename );
            $product['image'] = $filename;
        }
        $product->title = $request->post('title');
        $product->manufacturer_id = $request->post('manufacturer_id');
        $product->category_id = $request->post('category_id');
        $product->flavor_id = $request->post('flavor_id');
        $product->location_id = $request->post('location_id');
        $product->quantity = $request->post('quantity');
        $product->save();

        return back()->with('message', 'Product is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $data['product'] = $product;

        return view('product.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['product'] = $product;
        $data['manufacturers'] = Manufacturer::all();
        $data['flavors'] = Flavor::all();
        $data['categories'] = Category::all();
        $data['locations'] = ProductLocation::all();
        return view('product.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('YmdHi'). $file->getClientOriginalName();
            $file->move(public_path('public/image'), $filename );
            $product['image'] = $filename;
        }

        $product->title = $request->post('title');
        $product->manufacturer_id = $request->post('manufacturer_id');
        $product->category_id = $request->post('category_id');
        $product->flavor_id = $request->post('flavor_id');
        $product->location_id = $request->post('location_id');
        $product->quantity = $request->post('quantity');
        $product->save();
        return back()->with('message', 'Product information is edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back()->with('message', 'Product is deleted');
    }

    public function generateQr($id)
    {

        $data = Product::findOrFail($id);
        $qrcode = QrCode::size(400)->format('svg')->generate('http://127.0.0.1:8000/product/'.$data->id);
        return view('product.qrcode', compact('qrcode'));
    }

    public function downloadQr($id)
    {
        $data = Product::findOrFail($id);
        $qrcode = QrCode::size(400)->format('svg')->generate('http://127.0.0.1:8000/product/'.$data->id);
        return view('product.qrcode-download', compact('qrcode'));
    }



}
