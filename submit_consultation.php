<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "bhoomi_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate inputs
$full_name = trim($_POST['full_name'] ?? '');
$phone_number = trim($_POST['phone_number'] ?? '');
$program = trim($_POST['program'] ?? '');
$booking_for = trim($_POST['booking_for'] ?? '');
$selected_date = trim($_POST['selected_date'] ?? '');

// Basic validation
if (empty($full_name) || empty($phone_number) || empty($program) || empty($booking_for) || empty($selected_date)) {
    die("All fields are required.");
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO online_consultations (full_name, phone_number, program, booking_for, selected_date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $full_name, $phone_number, $program, $booking_for, $selected_date);

if ($stmt->execute()) {
    header("Location: thankyou.php");
    exit();
} else {
    echo "Database error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

