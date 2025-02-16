<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BacaController extends Controller
{
    public function index()
    {
        $pdfPath = public_path('pdf');

        if (!File::exists($pdfPath)) {
            File::makeDirectory($pdfPath, 0755, true, true);
        }

        $pdfFiles = File::files($pdfPath);

        $pdfNames = collect($pdfFiles)->map(fn($file) => $file->getFilename());

        return view('baca', ['pdfFiles' => $pdfNames]);
    }
}
