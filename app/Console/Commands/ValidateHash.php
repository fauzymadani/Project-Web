<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ValidateHash extends Command
{
    protected $signature = 'hash:validate';
    protected $description = 'Memvalidasi hash file tanpa mengganti nilai hash yang tersimpan';

    public function handle()
    {
        $storedHashes = json_decode(Storage::get('hash_reference.json'), true);
        $validationResults = [];

        foreach ($storedHashes as $file => $oldHash) {
            if (Storage::exists($file)) {
                $currentHash = hash_file('sha256', storage_path("app/$file"));

                if ($currentHash === $oldHash) {
                    $status = "✅ Valid";
                } else {
                    $status = "❌ Tidak Valid";
                }

                $validationResults[$file] = [
                    'file' => $file,
                    'hash' => $oldHash,
                    'status' => $status
                ];
            }
        }

        Storage::put('hash_validation.json', json_encode($validationResults, JSON_PRETTY_PRINT));

        $this->info('Validasi hash selesai.');
    }
}
