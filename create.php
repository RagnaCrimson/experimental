<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from $_POST for all form fields
    $v_name = $_POST['v_name'];
    $v_province = $_POST['v_province'];
    $v_district = $_POST['v_district'];
    $v_subdistrict = $_POST['v_subdistrict'];
    $v_executive_name = $_POST['v_executive_name'];
    $v_exe_tell = $_POST['v_exe_tell'];
    $v_exe_email = $_POST['v_exe_email'];
    $v_coordinator_name = $_POST['v_coordinator_name'];
    $v_coo_tell = $_POST['v_coo_tell'];
    $v_coo_email = $_POST['v_coo_email'];
    $v_sale = $_POST['v_sale'];
    $v_date = $_POST['v_date'];
    $v_electric_per_year = $_POST['v_electric_per_year'];
    $v_electric_per_month = $_POST['v_electric_per_month'];
    $v_status = $_POST['v_status'];

    // Prepare SQL statement with placeholders for bind parameters
    $stmt = $conn->prepare("INSERT INTO venues (V_Name, V_Province, V_District, V_SubDistrict, V_ExecutiveName, V_ExeTell, V_ExeEmail,
                                                V_CoordinatorName, V_CooTell, V_CooEmail, V_Sale, V_Date, V_ElectricPerYear, V_ElectricPerMonth, V_Status) 
                                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssssssssssss", $v_name, $v_province, $v_district, $v_subdistrict, $v_executive_name, $v_exe_tell, $v_exe_email,
                      $v_coordinator_name, $v_coo_tell, $v_coo_email, $v_sale, $v_date, $v_electric_per_year, $v_electric_per_month, $v_status);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
