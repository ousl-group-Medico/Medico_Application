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
  <title>Medico - Complications</title>
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <meta name="description" content="Complications" />
  <meta name="keywords" content="Medico, Complications" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/patient_profile.css" />
</head>

<body>
  <div id="main">
    <?php include("header.php"); ?>
    <div id="site_content">
      <?php include("sidebar.php"); ?>

      <h1>Complications</h1>
      <br><br>
      <div id="content">

        <?php
        $complicationQuery = "SELECT * FROM `complication` WHERE nic = '$nic'";
        $complicationResult = mysqli_query($conn, $complicationQuery);

        if ($complicationResult) {
          if (mysqli_num_rows($complicationResult) > 0) {
            echo "<ul>";
            while ($complicationRow = mysqli_fetch_assoc($complicationResult)) {
              $complications = explode(',', $complicationRow['complicationData']);
              foreach ($complications as $complication) {
                echo "<li>" . $complication . "</li>";
              }
            }
            echo "</ul>";
          } else {
            echo "<p>No complications found</p>";
          }
        } else {
          echo "Error fetching complications.";
        }
        ?>
      </div>
    </div>
    <?php include("footer.php"); ?>
  </div>
</body>

</html>