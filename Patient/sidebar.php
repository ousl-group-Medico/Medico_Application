<!-- sidebar.php -->

<div class="sidebar">
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

  <!-- Add a round image at the top middle -->
  <div style="text-align: center; margin-top: 10px; margin-bottom: 15px">
    <img src="<?php echo $userImagePath; ?>" alt="Profile Image" style="width: 90px; height: 90px; border-radius: 50%;">
  </div>

  <!-- Display user details with edit button -->
  <div class="user-details">
    <p><strong>Name:</strong> <?php echo $userDetails['full_name']; ?></p>
    <p><strong>NIC:</strong> <?php echo $userDetails['nic']; ?></p>
    <p><strong>Birthday:</strong> <?php echo $birthday ? $birthday : 'Not Available'; ?></p>
    <p><strong>Age:</strong> <?php echo calculateAge($birthday); ?></p>
    <p><strong>Email:</strong> <?php echo $userDetails['email']; ?></p>
    <p><strong>Phone Number:</strong> <?php echo $userDetails['phone_number']; ?></p>

    <!-- Edit button -->
    <button class="edit-button" onclick="openForm()">Edit Personal Details</button>
  </div>

  <br>

  <hr>

  <!-- Display BMI record if available -->
  <?php if (!empty($bmi_record)) : ?>
    <br><br>
    <p><strong>Blood Type:</strong> <?php echo $bmi_record['blood_type']; ?></p>
    <p><strong>BMI:</strong> <?php echo $bmi_record['bmi']; ?></p>
  <?php else : ?>
    <br><br>
    <p>No Blood type or BMI record available</p>
  <?php endif; ?>
</div>

<div class="form-popup" id="myForm">
  <form action="update_user.php" method="post" class="form-container" enctype="multipart/form-data">

    <!-- Add cancel mark to the top right corner -->
    <div id="cancelMark" style="position: absolute; top: 10px; right: 10px; font-size: 30px; color: #f7ba6f; cursor: pointer;">&times;</div>

    <h1 style="text-align: center;">Enter New Details</h1>
    <br>

    <!-- Image upload section -->
    <div style="text-align: center; align-items:center">
      <!-- Display existing profile image -->
      <img src="<?php echo $userImagePath; ?>" alt="Profile Image" style="width: 90px; height: 90px; border-radius: 50%;">
      <br>
      <label for="userImage"><b>Update Profile Image</b></label>
      <input type="file" id="userImage" name="userImage" style="margin-left: 60px; margin-top: 12px; display: block;">

    </div>

    <br><br>

    <label for="fullname"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Full Name" name="fullname" value="<?php echo $userDetails['full_name']; ?>" required>

    <label for="nic"><b>NIC</b></label>
    <input type="text" placeholder="Enter NIC" name="nic" value="<?php echo $userDetails['nic']; ?>" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $userDetails['email']; ?>" required>

    <label for="phone" style="display: block; margin-bottom: 5px;">Phone Number:</label>
    <input type="tel" style="width: 99%; height: 40px;" id="phone" name="phone" pattern="\d*" maxlength="10" placeholder="Enter the Phone Number" required>

    <label for="dob" style="display: block; margin-bottom: 5px; margin-top: 25px;"><b>Date of Birth</b></label>
    <input type="date" style="width: 99%; height: 40px;" placeholder="Enter Date of Birth" name="dob" value="<?php echo $birthday; ?>" required>

    <br><br><br>

    <label for="psw"><b>New Password</b></label>
    <input type="password" placeholder="Enter New Password" name="psw" required>

    <label for="confirm_psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm New Password" name="confirm_psw" required>

    <button type="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    // Add event listener to handle click on cancel mark
    document.getElementById("cancelMark").addEventListener("click", closeForm);

    // Add event listener to open the form when the "Edit Personal Details" button is clicked
    var editButton = document.querySelector(".edit-button");
    if (editButton) {
      editButton.addEventListener("click", openForm);
    }

    // Add event listener to handle click on the close button
    var cancelButton = document.querySelector(".cancel");
    if (cancelButton) {
      cancelButton.addEventListener("click", closeForm);
    }

    // Add event listener for form submission
    var myForm = document.getElementById("myForm");
    if (myForm) {
      myForm.addEventListener("submit", function(event) {
        // Validate the phone number
        var phoneInput = document.getElementById("phone");
        var phoneValue = phoneInput.value;

        // Regular expression to match 10 digits
        var phoneRegex = /^\d{10}$/;

        if (!phoneRegex.test(phoneValue)) {
          alert("Please enter a valid 10-digit phone number.");
          event.preventDefault(); // Prevent form submission
          return;
        }

        // Add logic to handle other form validations if needed
      });
    }
  });
</script>