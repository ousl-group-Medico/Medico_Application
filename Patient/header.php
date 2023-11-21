<!-- Assuming $loggedInUserNIC contains the NIC of the logged-in user -->
<?php
// Query to retrieve user's image path
$nic = $userDetails['nic'];
$imageQuery = "SELECT image FROM userimage WHERE nic = '$nic'";
$imageResult = mysqli_query($conn, $imageQuery);
$imageRow = mysqli_fetch_assoc($imageResult);

// Default image path if no image is found
$defaultImagePath = "img/user.jpg";
$userImagePath = !empty($imageRow['image']) ? $imageRow['image'] : $defaultImagePath;
?>

<!-- header.php -->

<div id="header">
  <div class="navigation">
    <a class="button" href="http://localhost/Medico/Logins/login_patient.php">
      <img src="<?php echo $userImagePath; ?>" alt="User Image">
      <div class="logout">LOGOUT</div>
    </a>
  </div>
  <div id="logo">
    <div id="logo_text">
      <h1><a href="index.html">Medico<span class="logo_colour">application</span></a></h1>
      <h2>Let's make health accessible and enjoyable for everyone.</h2>
    </div>
  </div>

  <div id="menubar">
    <ul id="menu">
      <li <?php echo (basename($_SERVER['PHP_SELF']) == 'notifications.php') ? 'class="selected"' : ''; ?>>
        <a href="notifications.php">Notifications</a>
      </li>
      <li <?php echo (basename($_SERVER['PHP_SELF']) == 'prescriptions.php') ? 'class="selected"' : ''; ?>>
        <a href="prescriptions.php">Prescriptions</a>
      </li>
      <li <?php echo (basename($_SERVER['PHP_SELF']) == 'allergies.php') ? 'class="selected"' : ''; ?>>
        <a href="allergies.php">Allergies</a>
      </li>
      <li <?php echo (basename($_SERVER['PHP_SELF']) == 'complications.php') ? 'class="selected"' : ''; ?>>
        <a href="complications.php">Complications</a>
      </li>
      <li <?php echo (basename($_SERVER['PHP_SELF']) == 'medical_history.php') ? 'class="selected"' : ''; ?>>
        <a href="medical_history.php">Medical History</a>
      </li>
    </ul>
  </div>
</div>