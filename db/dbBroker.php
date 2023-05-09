<!-- 

$host = 'localhost';
$user = 'marija';
$password = 'marija';
$database = 'film_review';
$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo 'Connection failed: ' . mysqli_connect_error();
}
?> -->


<?php
$host = "localhost";
$db = "film_review";
$username = "marija";
$password = "marija";

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_errno) {
    exit("Connection failed: " . $conn->connect_errno);
}
?>