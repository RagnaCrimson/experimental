<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_id = $_POST['v_id']; // Assuming you have an input field for ID

    $stmt = $conn->prepare("DELETE FROM venues WHERE V_ID=?");
    $stmt->bind_param("i", $v_id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
