<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HashController extends Controller
{
    protected $directories = [
        'resources/',
        'app/Http/Controllers/',
        'app/Models/',
        'public/'
    ];

    private $hashFile = 'hash_reference.json';

    public function index()
    {
        $hashes = $this->getFileHashes();
        return view('hashes', compact('hashes'));
    }

    public function generateHash()
    {
        $hashes = $this->getFileHashes();
        return response()->json($hashes);
    }

    private function getFileHashes()
    {
        if (!Storage::exists("app/$this->hashFile")) {
            Storage::put("app/$this->hashFile", json_encode([], JSON_PRETTY_PRINT));
        }

        $savedHashes = json_decode(Storage::get("app/$this->hashFile"), true) ?? [];

        $currentHashes = [];
        $newHashes = [];

        foreach ($this->directories as $directory) {
            foreach (glob(base_path($directory) . '*') as $file) {
                if (is_file($file)) {
                    $hash = hash_file('sha256', $file);
                    $relativePath = str_replace(base_path() . '/', '', $file);
                    $status = isset($savedHashes[$relativePath]) && $savedHashes[$relativePath] === $hash ? '✅ Valid' : '❌ Berubah';

                    $currentHashes[] = [
                        'file' => $relativePath,
                        'hash' => $hash,
                        'status' => $status
                    ];
                    $newHashes[$relativePath] = $hash;
                }
            }
        }

        Storage::put("app/$this->hashFile", json_encode($newHashes, JSON_PRETTY_PRINT));

        return $currentHashes;
    }

    public function validateHashes()
    {
        $savedHashes = json_decode(Storage::get("app/$this->hashFile"), true) ?? [];
        $validationResults = [];

        foreach ($this->directories as $directory) {
            foreach (glob(base_path($directory) . '*') as $file) {
                if (is_file($file)) {
                    $relativePath = str_replace(base_path() . '/', '', $file);
                    $currentHash = hash_file('sha256', $file);

                    $status = isset($savedHashes[$relativePath]) && $savedHashes[$relativePath] === $currentHash
                        ? '✅ Valid'
                        : '❌ Berubah';

                    $validationResults[$relativePath] = [
                        'file' => $relativePath,
                        'status' => $status
                    ];
                }
            }
        }

        return view('hashes', compact('validationResults'));
    }
}
