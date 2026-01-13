<?php
$conn = mysqli_connect("localhost", "root", "", "psychologist");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>