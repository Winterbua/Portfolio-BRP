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
    <?php
    include("navbar.php");
    ?>

    <div id="body">
        <?php
        /*
        $db = new mysqli("localhost", "root", "", "portfolio");
        $result = $db->query("SELECT * FROM blog");
        while($row = $result->fetch_assoc()){
            echo "<h1>" . $row['Title'] . "</h1>";
            echo "<p>" . $row['Content'] . "</p>";
            echo "<h2>" . $row['Author'] . "</h2>";
        }
        $db->close();  
            */  
        ?>
    </div>

    <?php
    include("footer.php");
    ?>
</body>
</html>