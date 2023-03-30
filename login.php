<?php
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "deinBenutzername";
$password = "deinPasswort";
$dbname = "deineDatenbankname";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Benutzerdaten überprüfen
if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 1) {
    // Benutzer erfolgreich authentifiziert, erstelle eine Sitzung und leite ihn weiter
    session_start();
    $_SESSION['username'] = $username;
    header("location: home.php");
    exit();
  } else {
    // Fehlermeldung, falls die Benutzerdaten ungültig sind
    echo "Ungültige Benutzerdaten";
  }
}

mysqli_close($conn);
?>
