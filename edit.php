<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

$db = new mysqli("localhost", "root", "", "portfolio");

$blogNr = (int)$_GET['BlogNr'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author = trim($_POST['author']);

    if (!empty($title) && !empty($content) && !empty($author)) {

        $stmt = $db->prepare(
            "UPDATE blog
             SET Title=?, Content=?, Author=?
             WHERE BlogNr=?"
        );

        $stmt->bind_param("sssi", $title, $content, $author, $blogNr);

        $stmt->execute();

        header("Location: admin.php");
        exit();
    }
}

$stmt = $db->prepare("SELECT * FROM blog WHERE BlogNr=?");
$stmt->bind_param("i", $blogNr);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="manuel mayr">

    <title>Edit Blog</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div id="body">

    <h1>Edit Blog</h1>

    <form method="POST" class="create-form">

        <input
            type="text"
            name="title"
            value="<?php echo htmlspecialchars($row['Title']); ?>"
            required
        >

        <input
            type="text"
            name="author"
            value="<?php echo htmlspecialchars($row['Author']); ?>"
            required
        >

        <textarea
            name="content"
            required
        ><?php echo htmlspecialchars($row['Content']); ?></textarea>

        <button type="submit">
            Save Changes
        </button>

    </form>

</div>

<?php include("footer.php"); ?>

</body>
</html>