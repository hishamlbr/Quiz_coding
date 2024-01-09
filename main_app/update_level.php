<?php
include "connection.php";
session_start();

$username = $_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    $processedValue = $_POST['value'] . ' - code traité sur PHP';
    echo json_encode(['response' => $processedValue]);

    // Assign a value to $pylevel
    $pylevel = $_POST['value'];

    // Update the user's level in the database
    $sql = "UPDATE `tbl_user` SET `pylevel` = '$pylevel' WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    $_SESSION['pylevel']=$pylevel;
} else {
    // Handle the case when 'pylevel' is not set
    echo "Error: 'pylevel' is not set in the POST data.";
}
?>


