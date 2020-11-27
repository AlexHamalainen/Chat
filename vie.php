<?php
include ("../../../jotaki.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
unset ($username, $password);
// Check connection
if ($conn->connect_error) {
  die("Yhteys ei onnistunut: " . $conn->connect_error);
}
$date=date_create();
date_timestamp_set($date);
$aika = date_format($date,"Y-m-d H:i:s");

$message = $_GET['message'];
$user = $_GET['user'];
$sql = "INSERT INTO chat (ID, Viesti, Aika, Nimi) VALUES ('', '$message', '$aika', '$user')";
$conn->query($sql);

$conn->close();
?>
