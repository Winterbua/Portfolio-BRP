<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

$db = new mysqli("winterschule.lima-db.de", "USER460249_pma5f", "BRP_Portfolio2026!", "db_460249_1");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author = trim($_POST['author']);

    if (!empty($title) && !empty($content) && !empty($author)) {

        $stmt = $db->prepare(
            "INSERT INTO blog (Title, Content, Author)
             VALUES (?, ?, ?)"
        );

        $stmt->bind_param("sss", $title, $content, $author);

        $stmt->execute();

        $message = "Blog created successfully!";
    } else {
        $message = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="manuel mayr">

    <title>Create Blog</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div id="body">

    <h1>Create Blog</h1>

    <?php if ($message != ""): ?>
        <p style="margin-bottom: 20px; opacity: 0.9;">
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php endif; ?>

    <form method="POST" class="create-form">

        <input
            type="text"
            name="title"
            placeholder="Blog Title"
            required
        >

        <input
            type="text"
            name="author"
            placeholder="Author Name"
            required
        >

        <textarea
            name="content"
            placeholder="Write your blog..."
            required
        ></textarea>

        <button type="submit">
            Publish Blog
        </button>

    </form>

</div>

<?php include("footer.php"); ?>

</body>
</html>