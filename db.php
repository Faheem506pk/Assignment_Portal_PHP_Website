<?php
// Database connection settings
$host = 'localhost';
$user = 'root';
$password = ''; // Default password for XAMPP
$database = 'assignment_portal'; // The name of the database you created

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
} else {
   
    
}

// Optional: A function to close the connection
// function closeConnection($conn) {
//     if ($conn) {
//         $conn->close();
//         echo "Database Connection Closed!";
//     }
// }
// ?>
