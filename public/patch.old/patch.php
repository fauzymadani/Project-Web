<?php
$repoOwner = "fauzymadani";
$repoName = "Project-Web";

$apiUrl = "https://api.github.com/repos/$repoOwner/$repoName/commits";

$options = [
    "http" => [
        "header" => "User-Agent: PHP",
    ],
];
$context = stream_context_create($options);
$response = file_get_contents($apiUrl, false, $context);
$commits = json_decode($response, true);

if ($commits === null) {
    echo "Tidak bisa mengambil data commit dari GitHub.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Git Patch Viewer</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
</head>
<body>
    <h1>Git Patch Viewer - <?php echo "$repoOwner/$repoName"; ?></h1>

    <h2>Daftar Commit</h2>
    <ul>
        <?php foreach ($commits as $commit): ?>
            <li>
                <a href="patch_viewer.php?sha=<?php echo $commit[
                    "sha"
                ]; ?>"><?php echo $commit["commit"]["message"]; ?></a>
                - <?php echo $commit["commit"]["author"]["name"]; ?>
                (<?php echo $commit["commit"]["author"]["date"]; ?>)
            </li>
        <?php endforeach; ?>
    </ul>
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
