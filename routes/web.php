<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BacaController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HashController;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/admin", function () {
    return view("dashboard");
})->middleware("iniLogin")->name("dashboard");

Route::resource("buku", BukuController::class)->middleware("iniLogin");
Route::resource("anggota", AnggotaController::class)->middleware("iniLogin");
Route::resource("dashboard", SessionController::class)->middleware("iniLogin");
Route::resource("roles", RoleController::class)->middleware("iniLogin");
Route::resource("peminjaman", PeminjamanController::class)->middleware(
    "iniLogin"
);
Route::resource("kategori", KategoriController::class)->middleware("iniLogin");
Route::get("/anggota/create", [AnggotaController::class, "create"])->name(
    "anggota.create"
);

Route::get("/login", [SessionController::class, "index"])->middleware(
    "iniTamu"
);
Route::get("sesi", [SessionController::class, "index"])->middleware("iniTamu");
Route::post("/sesi/login", [SessionController::class, "login"])->middleware(
    "iniTamu"
);
Route::get("/sesi/logout", [SessionController::class, "logout"]);

Route::get("/commits", [GithubController::class, "index"])->name(
    "commits.index"
);
Route::get("/commits/{sha}", [GithubController::class, "show"])->name(
    "commits.show"
);

/*Route::get("/baca", function () {*/
/*    return view("baca");*/
/*});*/

// Route::get('/baca', [BacaController::class, 'index']);
Route::get('/', [BukuController::class, 'daftarBuku'])->name('buku.baca');
/*Route::resource('articles', ArticleController::class)->middleware('iniLogin');*/

/*Route::get('/artikel/{id}', [ArticleController::class, 'show'])->name('artikel.show');*/
/*Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.show');*/
/*Route::get('/artikel/{id}', [ArticleController::class, 'show'])->name('artikel.show');*/
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.show');
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');

Route::resource("articles", ArticleController::class);

Route::prefix('adminartikel')->group(function () {
    Route::get('/artikel', [ArticleController::class, 'adminIndex'])->name('admin.articles.index');
    Route::get('/artikel/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::get('/artikel/{article}/edit', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/artikel/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/artikel/{article}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');
});

// ini buat handle image untuk easymde
Route::post('/upload-image', function (Request $request) {
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $path = $image->store('images', 'public'); // Simpan di storage/public/images
        return response()->json([
            'success' => 1,
            'file' => ['url' => asset('storage/' . $path)] // Akses dari storage/
        ]);
    }

    return response()->json(['success' => 0, 'error' => 'No image uploaded'], 400);
})->name('upload.image');

Route::get('/list', [BukuController::class, 'fetchBuku'])->name('buku.list');
Route::get('/file-hash', [HashController::class, 'index'])->name('hashes');
Route::post('/generate-hash', [HashController::class, 'generateHash']);
Route::get('/validate-hash', [HashController::class, 'validateHashes'])->name('validate.hash');


Route::get('/site-info', function () {
    $lastUpdated = File::lastModified(base_path('.env'));
    $formattedTime = date('Y-m-d H:i:s', $lastUpdated);

    $totalBuku = \App\Models\Buku::count();
    $totalArticle = \App\Models\Article::count();

    return view('info.index', compact('formattedTime', 'totalBuku', 'totalArticle'));
})->name('site-info');

Route::get('/tentang', function() {
    return view('tentang.index');
})->name('tentang.index');

Route::get('privasi', function() {
    return view('tentang.license');
})->name('tentang.license');