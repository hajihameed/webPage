<?php
include 'db_connect.php';

$id = $_POST['id'];
$category = $_POST['category'];
$name = $_POST['name'];
$price = $_POST['price'];

$sql = "INSERT INTO menu (id, category, name, price) VALUES (?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE category = VALUES(category), name = VALUES(name), price = VALUES(price)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("issd", $id, $category, $name, $price);

if ($stmt->execute()) {
    echo "Item added successfully!";
} else {
    echo "Failed to add item: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
