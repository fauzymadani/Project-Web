<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\JsonResponse;

class BukuApiController extends Controller
{
    public function index(): JsonResponse
    {
        $buku = Buku::with('kategori')->get();
        return response()->json([
            'success' => true,
            'message' => 'List data buku',
            'data' => $buku,
        ]);
    }
}
