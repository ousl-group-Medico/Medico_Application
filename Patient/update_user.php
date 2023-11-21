<?php
session_start();

// Include your database connection code here
include("C:/Wamp64Server/www/Medico/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = $_POST["fullname"];
    $newNic = isset($_POST["nic"]) ? $_POST["nic"] : "";
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $password = $_POST["psw"];

    // Retrieve the current NIC from the session
    $currentNic = isset($_SESSION['userDetails']['nic']) ? $_SESSION['userDetails']['nic'] : "";

    // Update user data in patient_signup table
    $updateUserQuery = "UPDATE patient_signup SET 
                        full_name = '$fullname', 
                        email = '$email', 
                        phone_number = '$phone', 
                        dob = '$dob', 
                        password = '$password'";

    // Update NIC if it is set in the form
    if (!empty($newNic)) {
        $updateUserQuery .= ", nic = '$newNic'";
    }

    $updateUserQuery .= " WHERE nic = '$currentNic'";

    $updateUserResult = mysqli_query($conn, $updateUserQuery);

    if ($updateUserResult) {
        // Update user data in the session or fetch updated data from the database
        $_SESSION['userDetails']['full_name'] = $fullname;
        $_SESSION['userDetails']['email'] = $email;
        $_SESSION['userDetails']['phone_number'] = $phone;
        $_SESSION['userDetails']['dob'] = $dob;

        // Handle profile image update
        if (!empty($_FILES["userImage"]["name"])) {
            $targetDirectory = "img/uploads/";

            // Ensure the target directory exists
            if (!is_dir($targetDirectory)) {
                mkdir($targetDirectory, 0755, true);
            }

            $targetFile = $targetDirectory . basename($_FILES["userImage"]["name"]);

            // Upload the image
            if (move_uploaded_file($_FILES["userImage"]["tmp_name"], $targetFile)) {
                // Update user image path in userimage table
                $updateImageQuery = "UPDATE userimage SET image = '$targetFile' WHERE nic = '$newNic'";
                $updateImageResult = mysqli_query($conn, $updateImageQuery);

                if ($updateImageResult) {
                    // Update user image path in the session
                    $_SESSION['userDetails']['image'] = $targetFile;
                } else {
                    // Handle image update failure
                    echo "Error updating user image: " . mysqli_error($conn);
                }
            } else {
                // Handle image upload failure
                echo "Error uploading user image.";
            }
        }

        // Redirect or handle success as needed
        header("Location: notifications.php");
        exit();
    } else {
        // Handle update failure
        echo "Error updating user data: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
