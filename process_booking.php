<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = sanitize_input($_POST["first_name"]);
    $last_name = sanitize_input($_POST["last_name"]);
    $address = sanitize_input($_POST["address"]);
    $email = sanitize_input($_POST["email"]);
    $checkin_date = sanitize_input($_POST["date"]);
    $total_adults = sanitize_input($_POST["total_adults"]);
    $total_children = sanitize_input($_POST["total_children"]);
    $area_code = sanitize_input($_POST["area_code"]);
    $phone = sanitize_input($_POST["phone"]);
    $room_preference = sanitize_input($_POST["subject"]);
    $gender = sanitize_input($_POST["choice"]);
    $payment_mode = sanitize_input($_POST["choice"]);

    // Insert data into the bookings table
    $sql = "INSERT INTO bookings (first_name, last_name, address, email, checkin_date, total_adults, total_children, area_code, phone, room_preference, gender, payment_mode)
            VALUES ('$first_name', '$last_name', '$address', '$email', '$checkin_date', '$total_adults', '$total_children', '$area_code', '$phone', '$room_preference', '$gender', '$payment_mode')";

    if ($conn->query($sql) === TRUE) {
     echo '<script>alert("Booking Successful"); window.location.href = "final.php";</script>';
        
  
        // Perform additional actions or redirect as needed
    } else {
        echo '<script>alert("Error")</script>'; 
  
    }
}

// Close the database connection
$conn->close();
?>