<?php
session_start(); // Start the session to check if the user is logged in

// Redirect to login page if not logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch the student_id from the session
$student_id = $_SESSION['student_id'];

// Include the database connection file
include 'db.php'; 

// Fetch assignments for the logged-in student
$query = "SELECT * FROM assignments WHERE student_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/panel.css" />
    <title>Submitted Assignments</title>
</head>
<body>
    <div class="container">
        <div class="subject">
            <h3>Your Submitted Assignments</h3>

            <?php if ($result->num_rows > 0) : ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Assignment Name</th>
                            <th>Subject</th>
                            <th>File Link</th>
                            <th>Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><a href="<?php echo $row['file_link']; ?>" target="_blank">View File</a></td>
                                <td><?php echo $row['submitted_at']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>You have not submitted any assignments yet.</p>
            <?php endif; ?>
            
            <button class="go-back" style="margin-top: 20px;"><a href="index.php">Go Back</a></button>
        </div>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
