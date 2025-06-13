<?php include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = '';
    if ($_FILES['image']['name']) {
        $image = 'uploads/' . time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }
    $stmt = $conn->prepare("INSERT INTO blogs (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $image);
    $stmt->execute();
    echo "<script>location.href='dashboard.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Blog</title>
    <style>
        body { font-family: Arial; padding: 2em; background: #fefefe; }
        form { background: #fff; padding: 2em; border-radius: 10px; box-shadow: 0 0 10px #aaa; max-width: 600px; margin: auto; }
        input, textarea { width: 100%; margin-bottom: 1em; padding: 0.5em; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 10px 20px; background: #007BFF; color: white; border: none; border-radius: 5px; }
    </style>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
    <h2>Add New Blog</h2>
    <input name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" rows="6" required></textarea>
    <input type="file" name="image">
    <button type="submit">Post</button>
</form>
</body>
</html>
