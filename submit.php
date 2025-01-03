<?php
include 'db.php'; // Include the database connection file
session_start();

// Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    // echo "Please log in to submit an assignment.";
    exit;
}

// Initialize a success message variable
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the form input
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $file_link = $_POST['file_link'];
    $student_id = $_SESSION['student_id']; // Get the logged-in user's ID

    // Insert the assignment data into the database
    $stmt = $conn->prepare("INSERT INTO assignments (student_id, name, subject, file_link) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $student_id, $name, $subject, $file_link);

    if ($stmt->execute()) {
        $success_message = "Assignment submitted successfully!";
    } else {
        $success_message = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/panel.css">
    <title>Submit Assignment</title>
    <style>
        /* Styling the container */
      

       

       
    </style>
</head>
<body>
    <div class="container">
        <div class="subject">
            <h3>Submit an Assignment</h3>
            <p>Please fill out the form below to submit your assignment:</p>
            <!-- Display the success message -->
            <?php if (!empty($success_message)) : ?>
                <div class="success-message"><?php echo $success_message; ?></div>
            <?php endif; ?>
          
        </div>
        <form action="submit.php" method="POST">
            <label for="name">Assignment Name:</label>
            <input type="text" name="name" required>
            
            <label for="subject">Subject:</label>
            <input type="text" name="subject" required>
            
            <label for="file_link">File Link:</label>
            <input type="text" name="file_link" required>
            
            <button type="submit">Submit Assignment</button>
        </form>
        <button class="go-back"><a href="index.php" >Go Back</a></button>
    </div>
</body>
</html>
