<?php
if (!isset($_GET["sha"])) {
    echo "Commit SHA tidak ditemukan.";
    exit();
}

$sha = $_GET["sha"];

$repoOwner = "fauzymadani";
$repoName = "Project-Web";

$apiUrl = "https://api.github.com/repos/$repoOwner/$repoName/commits/$sha";

$options = [
    "http" => [
        "header" => "User-Agent: PHP",
    ],
];
$context = stream_context_create($options);
$response = file_get_contents($apiUrl, false, $context);
$commitDetails = json_decode($response, true);

if ($commitDetails === null) {
    echo "Tidak bisa mengambil data commit dari GitHub.";
    exit();
}

$commitMessage = $commitDetails["commit"]["message"];
$commitDate = $commitDetails["commit"]["author"]["date"];
$commitAuthor = $commitDetails["commit"]["author"]["name"];

// Mendapatkan patch/diff dari commit
$patchUrl = "https://github.com/$repoOwner/$repoName/commit/$sha.diff";
$patchContent = file_get_contents($patchUrl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patch Detail</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
</head>
<body>
    <h1>Patch Detail</h1>

    <h2><?php echo $commitMessage; ?></h2>
    <p>By: <?php echo $commitAuthor; ?> on <?php echo $commitDate; ?></p>

    <h3>Patch</h3>
    <pre><code class="language-diff"><?php echo htmlspecialchars(
        $patchContent
    ); ?></code></pre>

    <a href="patch.php">Kembali ke Daftar Commit</a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                hljs.highlightAll();
            });
        </script>
        <script>
            document.addEventListener("keydown", function(event) {
                const key = event.key.toLowerCase();

                if (key === "h") {
                    window.location.href = "{{ route('help') }}";
                } else if (key === "a") {
                    window.scrollTo({ top: 0, behavior: "smooth" });
                } else if (key === "b") {
                    window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
                } else if (key === "j") {
                    window.scrollBy({ top: -100, behavior: "smooth" });
                } else if (key === "k") {
                    window.scrollBy({ top: 100, behavior: "smooth" })
                } else if (key === "p") {
                    window.location.href = "{{ route('key') }}";
                }

            });
        </script>
</body>
</html>
