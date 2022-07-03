<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function generateQr($id)
    {

        $data = Product::findOrFail($id);
        $qrcode = QrCode::size(400)->format('svg')->generate('http://127.0.0.1:8000/product/' . $data->id);
        return view('qr-code.generate', compact('qrcode'));
    }

    public function downloadQr($id)
    {
        $data = Product::findOrFail($id);
        $qrcode = QrCode::size(400)->format('svg')->generate('http://127.0.0.1:8000/product/' . $data->id);
        return view('qr-code.download', compact('qrcode'));
    }

}
