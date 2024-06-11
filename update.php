<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_id = $_POST['v_id']; // Assuming you have an input field for ID
    $v_name = $_POST['v_name'];
    // Add other variables for your form fields

    $stmt = $conn->prepare("UPDATE venues SET V_Name=?, ... WHERE V_ID=?");
    $stmt->bind_param("si", $v_name, $v_id);
    // Bind other parameters for your form fields

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
