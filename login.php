<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new mysqli("winterschule.lima-db.de", "USER460249_pma5f", "BRP_Portfolio2026!", "db_460249_1");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {

        if (password_verify($password, $user['password'])) {

            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];

            header("Location: admin.php");
            exit();

        } else {

            $error = "Wrong password.";
        }

    } else {

        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manuel mayr">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div id="body">

    <h1>Admin Login</h1>

    <form method="POST">

        <input type="text" name="username" placeholder="Username" required>
        <br><br>

        <input type="password" name="password" placeholder="Password" required>
        <br><br>

        <button type="submit">Login</button>

    </form>

    <p style="color:red;">
        <?php echo $error; ?>
    </p>
    
</div>

<?php include("footer.php"); ?>


</body>
</html>