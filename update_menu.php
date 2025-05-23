<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FoodOrdering";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data)) {
    $conn->query("TRUNCATE TABLE menu");

    foreach ($data as $item) {
        $stmt = $conn->prepare("INSERT INTO menu (category, name, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $item['category'], $item['name'], $item['price']);
        $stmt->execute();
    }
}

echo json_encode(["message" => "Menu updated successfully!"]);

$conn->close();
?>
