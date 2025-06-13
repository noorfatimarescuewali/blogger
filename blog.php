<?php include 'db.php'; $id = $_GET['id']; $blog = $conn->query("SELECT * FROM blogs WHERE id=$id")->fetch_assoc(); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $blog['title'] ?></title>
    <style>
        body { font-family: Arial; padding: 2em; background: #f4f4f4; }
        .blog { background: white; padding: 2em; border-radius: 10px; box-shadow: 0 0 10px #aaa; }
        img { max-width: 100%; height: auto; margin: 1em 0; }
        button { padding: 8px 15px; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
<div class="blog">
    <h1><?= $blog['title'] ?></h1>
    <?php if($blog['image']): ?>
        <img src="<?= $blog['image'] ?>">
    <?php endif; ?>
    <p><?= nl2br($blog['content']) ?></p>
    <button onclick="location.href='index.php'">Back</button>
</div>
</body>
</html>
