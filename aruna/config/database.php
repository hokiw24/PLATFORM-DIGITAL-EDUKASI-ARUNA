<?php

$host = "localhost";
$user = "unap9130_aruna";
$pass = "VDVUpWkrW5VuvXXUfMAz";
$db   = "unap9130_aruna";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$conn->set_charset("utf8");