<?php
// vaihda tähän oman tietokantasi tiedot tai tuo ne ulkoisesta tiedostosta include toiminnolla.

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database name";

// Luo tietokantayhteys
$conn = new mysqli($servername, $username, $password, $dbname);
// unohdetaan käyttäjänimi ja salasana koska niitä ei enää tarvita
unset ($username, $password);
// Tarkista yhteys
if ($conn->connect_error) {
  die("Yhteys ei onnistunut: " . $conn->connect_error);
}
// Luodaan aikaleima ja laitetaan se samaan muotoon kuin tietokannassa
$date=date_create();
date_timestamp_set($date);
$aika = date_format($date,"Y-m-d H:i:s");

// luodaan muuttujat viestille ja nimimerkille
$message = $_GET['message'];
$user = $_GET['user'];
// viedään tiedot tauluun
$sql = "INSERT INTO chat (ID, Viesti, Aika, Nimi) VALUES ('', '$message', '$aika', '$user')";
$conn->query($sql);

$conn->close();
?>
