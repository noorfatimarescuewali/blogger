<?php include 'db.php';
$id = $_GET['id'];
$blog = $conn->query("SELECT * FROM blogs WHERE id=$id")->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $conn->query("UPDATE blogs SET title='$title', content='$content' WHERE id=$id");
    echo "<script>location.href='dashboard.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Blog</title>
    <style>
        body { font-family: Arial; padding: 2em; background: #f0f0f0; }
        form { background: white; padding: 2em; border-radius: 10px; max-width: 600px; margin: auto; box-shadow: 0 0 10px #ccc; }
        input, textarea { width: 100%; margin-bottom: 1em; padding: 0.5em; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 5px; }
    </style>
</head>
<body>
<form method="POST">
    <h2>Edit Blog</h2>
    <input name="title" value="<?= htmlspecialchars($blog['title']) ?>" required>
    <textarea name="content" rows="6" required><?= $blog['content'] ?></textarea>
    <button type="submit">Update</button>
</form>
</body>
</html>
