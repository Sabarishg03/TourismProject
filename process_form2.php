<?php

// Function to sanitize and validate form data
function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $name = cleanInput($_POST["name"]);
    $email = cleanInput($_POST["email"]);
    $message = cleanInput($_POST["message"]);

    // Insert data into the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tms";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    // Close the connection
    $stmt->close();
    $conn->close();

    // Display submitted alert message
     echo '<script>alert("QUERY SENT"); window.location.href = "final.php";</script>';
} else {
    // Handle invalid form submission
    echo json_encode(["success" => false, "message" => "Invalid form submission"]);
}

?>