<?php
// Start a session to manage user sessions
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from POST request
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    // Check if username and password are not empty
    if (!empty($userName) && !empty($password)) {
        // Database connection details
        $host = "localhost"; // Server name
        $dbusername = "root"; // Database username
        $dbpassword = ""; // Database password
        $dbname = "foodorderwebpage"; // Database name

        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL query to fetch user data
        $sql = "SELECT password FROM signup WHERE userName = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $userName);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            // Bind the hashed password result
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();

            // Check if the password matches (Plain-text comparison, temporary workaround)
            if ($password === $hashedPassword) {
                // Set session for the user
                $_SESSION['userName'] = $userName;
                echo "Login successful! Redirecting to the dashboard...";
                // Redirect to home page
                header("Location: home.html");
                exit();
            } else {
                echo "Invalid password. Please try again.";
            }
        } else {
            echo "No user found with that username.";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request.";
}
?>
