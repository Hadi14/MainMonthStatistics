<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Emdad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Hemayat";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Hmy_CityFamily:" . $row["Hmy_CityFamily"]. " - Hmy_RuralFamily: " . $row["Hmy_RuralFamily"]. " Hmy_MenFamily " . $row["Hmy_MenFamily"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 