<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use Illuminate\Http\Request;
use Parsedown;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class BugController extends Controller
{
    public function index()
    {
        $bugs = Bug::where('active', true)->latest()->get();

        // Ambil changelog dari GitHub
        $username = 'fauzymadani';   // Ganti ini sesuai user GitHub kamu
        $repo = 'Project-Web';               // Ganti ini sesuai repo kamu
        $url = "https://api.github.com/repos/$username/$repo/releases";

        $response = Http::get($url);
        $releases = [];

        if ($response->successful()) {
            $releases = $response->json();
        }

        return view('bugs.index', compact('bugs', 'releases'));
    }

    public function create()
    {
        // Selalu aktifkan CAPTCHA setiap kali buka form
        session()->put('require_captcha', true);

        $a = rand(1, 10);
        $b = rand(1, 10);
        $question = "$a + $b";
        $answer = $a + $b;
        session()->put('captcha_answer', $answer);

        return view('bugs.create', compact('question'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'label' => 'nullable|string|max:100',
        ]);

        $bug = new Bug();
        $bug->title = $request->title;
        $bug->description = $request->description;
        $bug->label = $request->label;

        $bug->edit_token = Str::random(32);

        $bug->save();

        return redirect()->route('bugs.show', $bug)->with('token', $bug->edit_token);
    }

    public function show(Bug $bug)
    {
        $parsedown = new Parsedown();
        $htmlDescription = $parsedown->text($bug->description);

        return view('bugs.show', compact('bug', 'htmlDescription'));
    }

    // Edit dengan validasi token dari param request
    public function edit(Bug $bug, Request $request)
    {
        if ($request->token !== $bug->edit_token) {
            abort(403, 'Token tidak valid.');
        }

        return view('bugs.edit', compact('bug'));
    }

    public function update(Request $request, Bug $bug)
    {
        if ($request->token !== $bug->edit_token) {
            abort(403, 'Token tidak valid.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'label' => 'nullable|string|max:100',
        ]);

        $bug->update([
            'title' => $request->title,
            'description' => $request->description,
            'label' => $request->label,
        ]);

        return redirect()->route('bugs.show', $bug)->with('success', 'Bug berhasil diperbarui.');
    }

    public function destroy(Request $request, Bug $bug)
    {
        if ($request->token !== $bug->edit_token) {
            abort(403, 'Token tidak valid.');
        }

        $bug->delete();

        return redirect()->route('bugs.index')->with('success', 'Bug berhasil dihapus.');
    }

    // Form input token
    public function enterToken()
    {
        return view('bugs.token');
    }

    // Proses validasi token dan redirect ke edit form
    public function processToken(Request $request)
    {
        $request->validate([
            'token' => 'required|string|size:32',
        ]);

        $bug = Bug::where('edit_token', $request->token)->first();

        if (!$bug) {
            return redirect()->back()->withErrors(['token' => 'Token tidak ditemukan atau tidak valid.']);
        }

        return redirect()->route('bugs.edit.token', ['token' => $request->token]);
    }

    // Menampilkan form edit berdasarkan token
    public function editByToken($token)
    {
        $bug = Bug::where('edit_token', $token)->firstOrFail();

        return view('bugs.edit', compact('bug'));
    }

    // Simpan perubahan dari form edit via token
    public function updateByToken(Request $request, $token)
    {
        $bug = Bug::where('edit_token', $token)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'label' => 'nullable|string|max:100',
        ]);

        $bug->update([
            'title' => $request->title,
            'description' => $request->description,
            'label' => $request->label,
        ]);

        return redirect()->route('bugs.show', $bug)->with('success', 'Bug berhasil diperbarui.');
    }

    public function destroyByToken(Request $request)
    {
        $token = $request->input('token');
        $bug = Bug::where('edit_token', $token)->firstOrFail();
        $bug->delete();

        return redirect()->route('bugs.index')->with('success', 'Laporan berhasil dihapus.');
    }

}
