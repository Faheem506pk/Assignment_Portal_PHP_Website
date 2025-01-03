<?php
session_start(); // Start the session to check if the user is logged in

// Redirect to login page if not logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit;
}
$student_id = $_SESSION['student_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/panel.css" />
    <title>Home - Assignment Portal</title>
</head>
<body>
    <div class="container">
        <div class="subject">

            <h4>Welcome <?php echo $student_id; ?> to the Assignment Submission Portal</h4>
            <p>Click below to submit your assignments:</p>
            <button class="go-back"> <a href="submit.php">Submit Assignment</a></button>
            <button class="go-back"> <a href="assignments.php">View All submitted Assignment</a></button>
            <button class="go-back"> <a href="logout.php">Log Out</a></button>
        </div>
    </div>
</body>
</html>
