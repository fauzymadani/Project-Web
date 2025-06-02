<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use Illuminate\Http\Request;
use Parsedown;

class BugController extends Controller
{
    public function index()
    {
        $bugs = Bug::where('active', true)->latest()->get();
        return view('bugs.index', compact('bugs'));
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
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'label' => 'nullable|string',
            'captcha' => ['required', function ($attribute, $value, $fail) {
                if ($value != session('captcha_answer')) {
                    $fail('Jawaban CAPTCHA salah.');
                }
            }],
        ];

        $request->validate($rules);

        Bug::create([
            'title' => $request->title,
            'description' => $request->description,
            'label' => $request->label,
            'active' => true,
        ]);

        // Jangan hapus require_captcha supaya tetap pakai CAPTCHA tiap kali buka form
        // session()->forget('require_captcha');
        // session()->forget('captcha_answer');

        return redirect()->route('bugs.index')->with('success', 'Bug berhasil dilaporkan.');
    }

    public function show(Bug $bug)
    {
        $parsedown = new Parsedown();
        $htmlDescription = $parsedown->text($bug->description);

        return view('bugs.show', compact('bug', 'htmlDescription'));
    }
}
