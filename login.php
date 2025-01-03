<?php
include 'db.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the form input
// Capture the form input
// Capture the form input
$_SESSION['student_id'] = $student_id; // Assuming you set student_id after successful login
$_SESSION['student_id'] = $student_id;
$student_id = trim($_POST['student_id']); // Trim any extra spaces
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE student_id = ?");
$stmt->bind_param("s", $student_id); // "s" for string type

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check if a user was found
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the password (no hash, plain text comparison)
    if ($password === $user['password']) {
        session_start();
        $_SESSION['student_id'] = $user['student_id']; // Store user ID in session
        header("Location: index.php");
        // echo "Login successful! Welcome, " . $user['student_id'];
    } else {
        echo "Invalid credentials!";
    }
} else {
    // echo "No user found with that student ID.";
}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Login</title>
  </head>
  <body>
    <div class="navbar">
      <a href="/assignment_portal">Home</a>
      <a href="/assignment_portal/about_us.html">About</a>
      <a href="/assignment_portal/contact_us.html">Contact Us</a>
      <a href="/assignment_portal/login.php">Login</a>
    </div>

    <div id="login" class="section">
      <h2>Login</h2>
    <?php
include 'db.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the form input
// Capture the form input
// Capture the form input
$student_id = trim($_POST['student_id']); // Trim any extra spaces
$password = $_POST['password'];

// Prepare and bind
$stmt = $conn->prepare("SELECT * FROM users WHERE student_id = ?");
$stmt->bind_param("s", $student_id); // "s" for string type

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check if a user was found
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the password (no hash, plain text comparison)
    if ($password === $user['password']) {
        session_start();
        $_SESSION['student_id'] = $user['student_id']; // Store user ID in session
        echo "Login successful! Welcome, " . $user['student_id'];
    } else {
        echo "Invalid credentials!";
    }
} else {
    echo "No user found with that student ID.";
}
}

?>

      <div class="login-container">
        <form
          action="/assignment_portal/login.php"
          method="post"
          class="login-form"
        >
          <label for="student-id">Student ID:</label>
          <input type="text" id="student-id" name="student_id" required />
          <label for="password">Password:</label>

          <input type="password" id="password" name="password" required />

          <button type="submit">Login</button>
        </form>
        <a href="register.php">Register Now</a>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <p>&copy; 2024 UET Taxila - Assignment Submission Portal</p>
    </div>
  </body>
</html>
