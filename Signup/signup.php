<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture user input
    $role = $_POST['role'];
    
    // Common fields
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Role-specific fields
    $address = $_POST['address'] ?? '';
    $acquaintanceName = $_POST['acquaintanceName'] ?? '';
    $caregiverName = $_POST['caregiverName'] ?? '';

    // Process the data (e.g., save to database)
    // Example: Save to a file (replace with database code in a real application)
    $data = [
        'role' => $role,
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'address' => $address,
        'acquaintanceName' => $acquaintanceName,
        'caregiverName' => $caregiverName,
    ];

    // Save data to a JSON file (for demonstration purposes)
    file_put_contents('signUpData.json', json_encode($data, JSON_PRETTY_PRINT), FILE_APPEND);

    echo "<p>Sign-up successful!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Mental Health Supporter Web</title>
  <link rel="stylesheet" href="signUp.css">
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar">
    <ul>
      <li><a href="../Home/index.html">Home</a></li>
      <li><a href="../Mood/mood.html">Log Mood</a></li>
      <li><a href="../Vmood/Vmood.html">View Mood</a></li>
      <li><a href="../Alerts/alerts.html">Emergency Alerts</a></li>
      <li><a href="../Consultation/consultation.html">Consultations</a></li>
      <li><a href="../Home/index.html#login">Login</a></li>
    </ul>
  </nav>

  <img src="logo1.png" alt="Euphoria Logo" class="logo-overlay">

  <!-- Sign Up Section -->
  <div class="sign-up-container">
    <h2>Sign Up</h2>
    <form id="signUpForm" method="POST" action="">
      <label for="role">Select your role:</label>
      <select id="role" name="role" required>
        <option value="" disabled selected>Select your role</option>
        <option value="user">User</option>
        <option value="caregiver">Caregiver</option>
        <option value="consultant">Consultant</option>
        <option value="acquaintance">Acquaintance</option>
      </select>

      <div id="userFields" class="role-fields" style="display:none;">
        <input type="text" name="username" placeholder="Enter your Username" required>
        <input type="email" name="email" placeholder="Enter your Email" required>
        <input type="text" name="address" placeholder="Enter your Address" required>
        <input type="text" name="acquaintanceName" placeholder="Enter Acquaintance's Name" required>
        <input type="text" name="caregiverName" placeholder="Enter Caregiver's Name" required>
        <input type="password" name="password" placeholder="Enter your Password" required>
      </div>

      <div id="caregiverFields" class="role-fields" style="display:none;">
        <input type="text" name="username" placeholder="Enter your Username" required>
        <input type="email" name="email" placeholder="Enter your Email" required>
        <input type="text" name="address" placeholder="Enter your Address" required>
        <input type="password" name="password" placeholder="Enter your Password" required>
      </div>

      <div id="consultantFields" class="role-fields" style="display:none;">
        <input type="text" name="username" placeholder="Enter your Username" required>
        <input type="email" name="email" placeholder="Enter your Email" required>
        <input type="password" name="password" placeholder="Enter your Password" required>
      </div>

      <div id="acquaintanceFields" class="role-fields" style="display:none;">
        <input type="text" name="username" placeholder="Enter your Username" required>
        <input type="email" name="email" placeholder="Enter your Email" required>
        <input type="text" name="address" placeholder="Enter your Address" required>
        <input type="text" name="acquaintanceName" placeholder="Enter Acquaintance's Name" required>
        <input type="password" name="password" placeholder="Enter your Password" required>
      </div>

      <button type="submit" class="login-button">SIGN UP</button>
    </form>
  </div>

  <!-- JavaScript for Role-Based Fields -->
  <script>
    const roleSelect = document.getElementById('role');
    const userFields = document.getElementById('userFields');
    const caregiverFields = document.getElementById('caregiverFields');
    const consultantFields = document.getElementById('consultantFields');
    const acquaintanceFields = document.getElementById('acquaintanceFields');

    roleSelect.addEventListener('change', function() {
      userFields.style.display = 'none';
      caregiverFields.style.display = 'none';
      consultantFields.style.display = 'none';
      acquaintanceFields.style.display = 'none';

      switch (this.value) {
        case 'user':
          userFields.style.display = 'block';
          break;
        case 'caregiver':
          caregiverFields.style.display = 'block';
          break;
        case 'consultant':
          consultantFields.style.display = 'block';
          break;
        case 'acquaintance':
          acquaintanceFields.style.display = 'block';
          break;
      }
    });
  </script>

</body>
</html>