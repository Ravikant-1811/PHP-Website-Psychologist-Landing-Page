<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "bhoomi_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all messages
$sql = "SELECT * FROM contact_form ORDER BY timestamp DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - View Messages</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f7f7f7;
      padding: 20px;
    }
    h2 {
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
    }
    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: left;
    }
    th {
      background: #0066cc;
      color: white;
    }
    tr:nth-child(even) {
      background: #f2f2f2;
    }
  </style>
</head>
<body>

<h2>Admin Panel: Contact Messages</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Date/Time</th>
  </tr>

  <?php
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["message"] . "</td>";
          echo "<td>" . $row["timestamp"] . "</td>";
          echo "</tr>";
      }
  } else {
      echo "<tr><td colspan='5'>No messages found.</td></tr>";
  }
  ?>

</table>

</body>
</html>
