<?php
include ("../../../jotaki.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
unset ($username, $password);
// Check connection
if ($conn->connect_error) {
  die("Yhteys ei onnistunut: " . $conn->connect_error);
}

$sql = "SELECT Viesti, Aika, Nimi FROM chat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<b>" . $row["Aika"] . ":</b> <span style='color: blue;'>@" . $row['Nimi'] . "</span> " . $row["Viesti"] . "<br>";
  }
}
$conn->close();
?>
