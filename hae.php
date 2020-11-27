<?php
// vaihda tähän oman tietokantasi tiedot tai tuo ne ulkoisesta tiedostosta include toiminnolla.

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database name";

// Luo tietokantayhteys
$conn = new mysqli($servername, $username, $password, $dbname);
// unohda käyttäjänimi ja salasana koska niitä ei enää tarvita
unset ($username, $password);
// tarkista yhteys
if ($conn->connect_error) {
  die("Yhteys ei onnistunut: " . $conn->connect_error);
}

// valitaan taulu ja sen kentät
$sql = "SELECT Viesti, Aika, Nimi FROM chat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // jos näytettävää on, näytetään se
  // Aika tulee lihavoituna, nimimerkki sinisenä ja niiden perään viesti ja rivinvaihto
  while($row = $result->fetch_assoc()) {
    echo "<b>" . $row["Aika"] . ":</b> <span style='color: blue;'>@" . $row['Nimi'] . "</span> " . $row["Viesti"] . "<br>";
  }
}
$conn->close();
?>
