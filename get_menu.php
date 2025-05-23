<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FoodOrdering";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

$menu = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menu[] = $row;
    }
}

echo json_encode($menu);

$conn->close();
?>
