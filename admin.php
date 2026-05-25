<?php
session_start();

if (!isset($_SESSION['loggedin'])) {

    header("Location: login.php");
    exit();
}

$db = new mysqli("winterschule.lima-db.de", "USER460249_pma5f", "BRP_Portfolio2026!", "db_460249_1");

$result = $db->query("SELECT * FROM blog ORDER BY BlogNr DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="author" content="manuel mayr">

    <title>Admin</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div id="body">

    <h1>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?></h1>

    <div class="admin-actions">

        <a href="create.php" class="admin-button">
            Create Blog
        </a>

        <a href="logout.php" class="admin-button">
            Logout
        </a>

    </div>

    <h2>Your Blogs</h2>

    <div class="admin-blog-list">

        <?php
        while($row = $result->fetch_assoc()) {

            echo "<div class='admin-blog-card'>";

            echo "<h2>" .
                htmlspecialchars($row['Title']) .
                "</h2>";

            echo "<p>" .
                nl2br(htmlspecialchars($row['Content'])) .
                "</p>";

            echo "<a class='admin-button'
                    href='edit.php?BlogNr=" .
                    $row['BlogNr'] .
                    "'>Edit</a>";

            echo "</div>";
        }
        ?>

    </div>

</div>

<?php include("footer.php"); ?>

</body>
</html>