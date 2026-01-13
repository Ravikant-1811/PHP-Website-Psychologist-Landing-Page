<?php
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // Simulate email / DB save
    $success = "✅ Thank you! Your message has been submitted successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Dr. Bhoomi Nandwani</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 0;
    }

    /* Contact button */
    .contact-button {
      margin: 20px;
      padding: 10px 20px;
      background-color: #0066cc;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    /* Modal backdrop */
    .modal {
      display: none;
      position: fixed;
      z-index: 10;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
    }

    /* Modal content box */
    .contact-form {
      background-color: #fff;
      padding: 25px;
      border-radius: 8px;
      max-width: 500px;
      width: 90%;
      position: relative;
    }

    .contact-form h2 {
      margin-top: 0;
    }

    input, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 15px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    button, input[type="submit"] {
      background: #0066cc;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
    }

    .close-btn {
      position: absolute;
      right: 15px;
      top: 10px;
      font-size: 20px;
      cursor: pointer;
      color: #888;
    }

    .success-message {
      color: green;
      font-weight: bold;
      margin: 20px;
    }
  </style>
</head>
<body>

<!-- ✅ Contact Button -->
<button class="contact-button" onclick="openModal()">Contact Dr. Bhoomi Nandwani</button>

<!-- ✅ Success Message -->
<?php if (!empty($success)) : ?>
  <div class="success-message"><?php echo $success; ?></div>
<?php endif; ?>

<!-- ✅ Modal Form -->
<div class="modal" id="contactModal">
  <div class="contact-form">
    <span class="close-btn" onclick="closeModal()">&times;</span>
    <h2>Contact Dr. Bhoomi Nandwani</h2>
    <form method="POST" action="contact.php">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <input type="text" name="phone" placeholder="Phone Number" required>
      <input type="text" name="subject" placeholder="Subject" required>
      <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
      <input type="submit" value="Send Message">
    </form>
  </div>
</div>

<!-- ✅ JS to toggle modal -->
<script>
  function openModal() {
    document.getElementById("contactModal").style.display = "flex";
  }
  function closeModal() {
    document.getElementById("contactModal").style.display = "none";
  }
  // Close modal when clicked outside
  window.onclick = function(event) {
    const modal = document.getElementById("contactModal");
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

</body>
</html>
