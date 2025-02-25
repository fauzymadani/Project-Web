<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controller\BukuController;
use App\Models\Buku;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $article->image = $path;
        }

        $article->save();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dibuat.');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }


    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $article->title = $request->title;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $article->image = $path;
        }

        $article->save();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }


    public function home()
    {
        $articles = Article::latest()->take(3)->get(); // Ambil 3 artikel terbaru
        $buku = Buku::latest()->take(3)->get(); // Ambil 3 buku terbaru

        return view('buku.baca', compact('articles', 'buku'));
    }

    public function adminIndex()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }
}
