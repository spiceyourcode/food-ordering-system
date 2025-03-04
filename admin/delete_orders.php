<?php
include("../connection/connect.php");
error_reporting(E_ALL); // Enable error reporting for debugging
session_start();

$stmt = $db->prepare("DELETE FROM users_orders WHERE o_id = ?");
$stmt->bind_param("i", $_GET['order_del']);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    // Optionally, you can set a success message here
} else {
    // Optionally, you can set an error message here
}
$stmt->close();
header("location:all_orders.php"); // Redirect after deletion


?>
