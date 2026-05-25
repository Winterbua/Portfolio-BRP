<?php

$password = password_hash("admin123", PASSWORD_DEFAULT);

$db = new mysqli("winterschule.lima-db.de", "USER460249_pma5f", "BRP_Portfolio2026!", "db_460249_1");

$stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

$username = "admin";

$stmt->bind_param("ss", $username, $password);

$stmt->execute();

echo "User created!";
?>