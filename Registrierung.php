<?php
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "deinBenutzername";
$password = "deinPasswort";
$dbname = "deineDatenbankname";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Benutzer registrieren
if(isset($_POST['register'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  $result = mysqli_query($conn, $sql);

  if($result) {
    // Erfolgreich registriert, leite den Benutzer zur Login-Seite weiter
    header("location: login.php");
    exit();
  } else {
    // Fehlermeldung, falls die Registrierung fehlschlägt
    echo "Registrierung fehlgeschlagen";
  }
}

mysqli_close($conn);
?>
