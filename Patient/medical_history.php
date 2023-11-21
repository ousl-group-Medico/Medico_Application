<?php
include("C:/Wamp64Server/www/Medico/connection.php");
session_start();

$email = $_SESSION['user'];
$query = "SELECT * FROM `patient_signup` WHERE email = '$email'";
$result = mysqli_query($conn, $query) or die('query failed');
$userDetails = mysqli_fetch_assoc($result);

$nic = $userDetails['nic'];

$query_bmi = "SELECT * FROM `bmi_records` WHERE nic = '$nic'";
$result_bmi = mysqli_query($conn, $query_bmi) or die('bmi query failed');
$bmi_record = mysqli_fetch_assoc($result_bmi);

function calculateAge($dob)
{
  if ($dob) {
    $dob = new DateTime(str_replace('/', '-', $dob));
    $now = new DateTime();
    $age = $now->diff($dob);
    return $age->y;
  }
  return 'Not Available';
}

$birthday = isset($userDetails['dob']) ? $userDetails['dob'] : null;
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Medico - Medical History</title>
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <meta name="description" content="Medical History" />
  <meta name="keywords" content="Medico, Medical History" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/patient_profile.css" />
  <style>
    .history-section {
      width: 45%;
      float: left;
    }

    .history-section:nth-child(even) {
      margin-right: 0;
    }

    .history-section:nth-child(odd) {
      margin-right: 5%;
    }
  </style>
</head>

<body>
  <div id="main">
    <?php include("header.php"); ?>
    <div id="site_content">
      <?php include("sidebar.php"); ?>

      <h1>Medical History</h1>

      <div id="content">

        <?php
        // Childhood Info
        $childhoodQuery = "SELECT * FROM `childhood` WHERE nic = '$nic'";
        $childhoodResult = mysqli_query($conn, $childhoodQuery);
        echo "<div class='history-section'>";
        echo "<h2>Childhood Info</h2>";
        if (mysqli_num_rows($childhoodResult) > 0) {
          echo "<ul>";
          while ($childhoodRow = mysqli_fetch_assoc($childhoodResult)) {
            echo "<li>" . $childhoodRow['task2'] . "</li>";
          }
          echo "</ul>";
        } else {
          echo "<p>No Childhood Info available</p>";
        }
        echo "</div>";

        // Family History
        $famhisQuery = "SELECT * FROM `famhis` WHERE nic = '$nic'";
        $famhisResult = mysqli_query($conn, $famhisQuery);
        echo "<div class='history-section'>";
        echo "<h2>Family History</h2>";
        if (mysqli_num_rows($famhisResult) > 0) {
          echo "<ul>";
          while ($famhisRow = mysqli_fetch_assoc($famhisResult)) {
            echo "<li>" . $famhisRow['task3'] . "</li>";
          }
          echo "</ul>";
        } else {
          echo "<p>No Family History available</p>";
        }
        echo "</div>";

        // Medical Info
        $medicalQuery = "SELECT * FROM `medical` WHERE nic = '$nic'";
        $medicalResult = mysqli_query($conn, $medicalQuery);
        echo "<div class='history-section'>";
        echo "<h2>Medical Info</h2>";
        if (mysqli_num_rows($medicalResult) > 0) {
          echo "<ul>";
          while ($medicalRow = mysqli_fetch_assoc($medicalResult)) {
            echo "<li>" . $medicalRow['task'] . "</li>";
          }
          echo "</ul>";
        } else {
          echo "<p>No Medical Info available</p>";
        }
        echo "</div>";

        // Surgical Info
        $surgicalQuery = "SELECT * FROM `surgical` WHERE nic = '$nic'";
        $surgicalResult = mysqli_query($conn, $surgicalQuery);
        echo "<div class='history-section'>";
        echo "<h2>Surgical Info</h2>";
        if (mysqli_num_rows($surgicalResult) > 0) {
          echo "<ul>";
          while ($surgicalRow = mysqli_fetch_assoc($surgicalResult)) {
            echo "<li>" . $surgicalRow['task1'] . "</li>";
          }
          echo "</ul>";
        } else {
          echo "<p>No Surgical Info available</p>";
        }
        echo "</div>";

        // Complains
        $complainQuery = "SELECT * FROM `complain` WHERE nic = '$nic' AND nic IS NOT NULL AND nic != ''";
        $complainResult = mysqli_query($conn, $complainQuery);
        echo "<div class='history-section'>";
        echo "<br><br><h2>Complains</h2>";
        if (mysqli_num_rows($complainResult) > 0) {
          echo "<ul>";
          while ($complainRow = mysqli_fetch_assoc($complainResult)) {

            if (isset($complainRow['complainData'])) {

              $complaints = explode(',', $complainRow['complainData']);
              foreach ($complaints as $complaint) {
                echo "<li>" . trim($complaint) . "</li>";
              }
            }
          }
          echo "</ul>";
        } else {
          echo "<p>No Complains available</p>";
        }
        echo "</div>";

        ?>
      </div>
    </div>
    <?php include("footer.php"); ?>
  </div>
</body>

</html>