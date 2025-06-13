<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Blogger</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; margin: 0; padding: 0; }
        header { background: #222; color: white; padding: 1em; text-align: center; }
        .container { padding: 2em; display: grid; gap: 20px; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); }
        .blog { background: white; padding: 1em; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        .blog h2 { margin-top: 0; }
        button { padding: 8px 15px; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
<header>
    <h1>My Blogger</h1>
</header>
<div class="container">
<?php
$result = $conn->query("SELECT * FROM blogs ORDER BY id DESC");
if ($result) {
    while($row = $result->fetch_assoc()):
?>
    <div class="blog">
        <h2><?= htmlspecialchars($row['title']) ?></h2>
        <p><?= substr(strip_tags($row['content']), 0, 100) ?>...</p>
        <button onclick="location.href='blog.php?id=<?= $row['id'] ?>'">Read More</button>
    </div>
<?php
    endwhile;
} else {
    echo "Error fetching data: " . $conn->error;
}
?>
</div>
</body>
</html>
