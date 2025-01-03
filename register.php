<?php
include 'db.php'; // Include the database connection file

$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the form input
    $student_id = $_POST['student_id'];
    $password = $_POST['password']; // No password hash

    // Check if the student ID already exists in the database
    $stmt_check = $conn->prepare("SELECT * FROM users WHERE student_id = ?");
    $stmt_check->bind_param("s", $student_id);
    $stmt_check->execute();
    $stmt_check_result = $stmt_check->get_result();
    
    if ($stmt_check_result->num_rows > 0) {
        $error_message = "Student ID already exists! Please use a different ID.";
    } else {
        // Insert the user data into the database
        $stmt = $conn->prepare("INSERT INTO users (student_id, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $student_id, $password);

        if ($stmt->execute()) {
            $success_message = "Registration successful!";
        } else {
            $error_message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $stmt_check->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .success-message {
            color: green;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        #password-error {
            color: red;
            font-size: 12px;
            font-weight: bold;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>

        <?php if (!empty($success_message)) : ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <?php if (!empty($error_message)) : ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST" id="registerForm">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" required><br>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required><br>
            
            <button type="submit">Register</button>
            <div id="password-error" style="margin-top: 20px; text-align: center;"></div> <!-- Display password mismatch error here -->
        </form>
        <button class="go-back"><a href="index.html" style="text-decoration: none; color: white">Go Back</a></button>
    </div>

    <script>
        // JavaScript to check if password and confirm password match
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var passwordErrorDiv = document.getElementById("password-error");

            // Reset previous error message
            passwordErrorDiv.textContent = '';

            if (password !== confirmPassword) {
                event.preventDefault(); // Prevent form submission
                passwordErrorDiv.textContent = "Passwords do not match! Please try again."; // Display error message here
            }
        });
    </script>
</body>
</html>
