<?php
session_start();
?>

<div id="header">

    <a href="index.php">Startseite</a>

    <a href="blog.php" class="links">Projekte</a>

    <a href="download.php" class="links">Download</a>

    <a href="kontakt.php" class="links">Kontakt</a>

    <?php if (isset($_SESSION['loggedin'])): ?>

        <a href="admin.php" class="links">Admin</a>

        <a href="logout.php" class="links">Logout</a>

    <?php else: ?>

        <a href="login.php" class="links">Login</a>

    <?php endif; ?>

</div>