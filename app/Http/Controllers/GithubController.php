<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GithubController extends Controller
{
    private $repoOwner = 'fauzymadani';
    private $repoName = 'Project-Web';

    public function index()
    {
        $repoOwner = $this->repoOwner;
        $repoName = $this->repoName;

        $apiUrl = "https://api.github.com/repos/{$repoOwner}/{$repoName}/commits";

        $response = Http::withHeaders(['User-Agent' => 'Laravel'])->get($apiUrl);
        $commits = $response->json();

        if (!$commits) {
            return view('patch.index', compact('repoOwner', 'repoName'))->with(['error' => 'Tidak bisa mengambil data commit dari GitHub.']);
        }

        return view('patch.index', compact('repoOwner', 'repoName', 'commits'));
    }



    public function show($sha)
    {
        $repoOwner = $this->repoOwner;
        $repoName = $this->repoName;

        $apiUrl = "https://api.github.com/repos/{$repoOwner}/{$repoName}/commits/{$sha}";

        $response = Http::withHeaders(['User-Agent' => 'Laravel'])->get($apiUrl);
        $commitDetails = $response->json();

        if (!$commitDetails) {
            return view('patch.show', compact('repoOwner', 'repoName'))->with(['error' => 'Tidak bisa mengambil data commit dari GitHub.']);
        }

        $patchUrl = "https://github.com/{$repoOwner}/{$repoName}/commit/{$sha}.diff";
        $patchContent = Http::withHeaders(['User-Agent' => 'Laravel'])->get($patchUrl)->body();

        return view('patch.show', compact('repoOwner', 'repoName', 'commitDetails', 'patchContent'));
    }
}
