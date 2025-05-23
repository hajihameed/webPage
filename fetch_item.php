<?php
include 'db_connect.php';

$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

$menuItems = [];
while ($row = $result->fetch_assoc()) {
    $menuItems[] = $row;
}

header('Content-Type: application/json');
echo json_encode($menuItems);

$conn->close();
?>
