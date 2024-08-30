<?php
function getConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "latihan_sql";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("koneksi gagal" . $conn->connect_error);

    } else {
        // echo"done";

    }
    return $conn;

}

?>