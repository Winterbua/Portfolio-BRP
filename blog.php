<?php
// blog.php

function connectDB() {
    $db = new mysqli("winterschule.lima-db.de", "USER460249_pma5f", "BRP_Portfolio2026!", "db_460249_1");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    return $db;
}

function getAllBlogs($db) {
    $sql = "SELECT BlogNr, Title FROM blog ORDER BY BlogNr DESC";
    return $db->query($sql);
}

function getBlogById($db, $blogNr) {
    $stmt = $db->prepare("SELECT * FROM blog WHERE BlogNr = ?");
    $stmt->bind_param("i", $blogNr);
    $stmt->execute();

    return $stmt->get_result();
}

function displayBlog($result) {

    if ($row = $result->fetch_assoc()) {

        echo "<article class='blog-post'>";

        echo "<h1>" . htmlspecialchars($row['Title']) . "</h1>";

        echo "<p>" . nl2br(htmlspecialchars($row['Content'])) . "</p>";

        echo "<h3>Written by: " . htmlspecialchars($row['Author']) . "</h3>";

        echo "</article>";

    } else {

        echo "<p>Blog post not found.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manuel mayr">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div id="body" class="blog-layout">

    <aside class="blog-sidebar">

        <h2>Blogs</h2>

        <div class="blog-list">

            <?php
            $db = connectDB();

            $blogs = getAllBlogs($db);

            while ($blog = $blogs->fetch_assoc()) {

                echo "<a class='blog-link' href='blog.php?BlogNr=" . $blog['BlogNr'] . "'>";

                echo htmlspecialchars($blog['Title']);

                echo "</a>";
            }
            ?>

        </div>

    </aside>

    <main class="blog-content">

        <h1>Blog</h1>

        <?php

        if (isset($_GET['BlogNr'])) {

            $blogNr = (int) $_GET['BlogNr'];

            $result = getBlogById($db, $blogNr);

            displayBlog($result);

        } else {

            echo "<p>Select a blog from the left.</p>";
        }

        $db->close();

        ?>

    </main>

</div>

<?php include("footer.php"); ?>

</body>
</html>