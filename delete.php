<?php
// include("OOP.php");
include("koneksi2.php");

$conn = getConnection();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteData($id, $conn);

    header("Location: Form-day4.php");
    exit();
} else {
    echo "Invalid request. ID is missing.";
}

?>