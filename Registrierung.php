<?php
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "deinBenutzername";
$password = "deinPasswort";
$dbname = "deineDatenbankname";

$conn = new mysqli($servername, $username, $password, $dbname);

// Registrierungsformular verarbeiten
if(isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  // Überprüfen, ob der Benutzername bereits verwendet wird
  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
    // Fehlermeldung, wenn der Benutzername bereits verwendet wird
    echo "Dieser Benutzername ist bereits vergeben";
  } else {
    // Benutzer in die Datenbank einfügen
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    mysqli_query($conn, $sql);

    // Erfolgsmeldung und Weiterleitung zur Login-Seite
    echo "Registrierung erfolgreich abgeschlossen";
    header("location: login.php");
  }
}
?>
