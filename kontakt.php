<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manuel mayr">
    <title>Kontakt</title>
    <link rel="stylesheet" href="style.css">

    <script>
        function validateForm() {
            let name = document.forms["contactForm"]["name"].value;
            let email = document.forms["contactForm"]["email"].value;
            let message = document.forms["contactForm"]["message"].value;

            // Name prüfen
            if (name.trim() === "") {
                alert("Bitte Namen eingeben.");
                return false;
            }

            // E-Mail prüfen
            let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                alert("Bitte gültige E-Mail eingeben.");
                return false;
            }

            // Nachricht prüfen
            if (message.trim().length < 10) {
                alert("Die Nachricht muss mindestens 10 Zeichen lang sein.");
                return false;
            }

            alert("Formular erfolgreich gesendet!");
            return true;
        }
    </script>
</head>

<body>

<?php
    include("navbar.php");
?>

<div id="body">

    <h2>Kontaktdaten</h2>

    <p>
        <strong>E-Mail:</strong>
        <a href="mailto:mayr.manuel29@gmail.com" style="color: white">
            mayr.manuel29@gmail.com
        </a>
    </p>

    <p>
        <strong>Telefon:</strong>
        +43 660 1234567
    </p>

    <p>
        <strong>Adresse:</strong>
        Haslach, Österreich
    </p>

    <h2>Social Media</h2>

    <p>
        <a href="https://www.facebook.com" target="_blank" style="color: white">
            Facebook
        </a>
        |
        <a href="https://www.instagram.com" target="_blank" style="color: white">
            Instagram
        </a>
        |
        <a href="https://www.twitter.com" target="_blank" style="color: white">
            Twitter/X
        </a>
    </p>

    <h2>Kontaktformular</h2>

    <form name="contactForm" onsubmit="return validateForm()">

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="email">E-Mail:</label><br>
        <input type="text" id="email" name="email"><br><br>

        <label for="message">Nachricht:</label><br>
        <textarea id="message" name="message" rows="5" cols="40"></textarea><br><br>

        <input type="submit" value="Senden">

    </form>

</div>

<?php
    include("footer.php");
?>

</body>
</html>