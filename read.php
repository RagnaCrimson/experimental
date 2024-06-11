<?php
include 'connection.php';

$sql = "SELECT * FROM venues";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["V_ID"]. " - Name: " . $row["V_Name"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
