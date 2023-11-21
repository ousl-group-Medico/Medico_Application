<?php
include("C:/Wamp64Server/www/Medico/connection.php");
session_start();

if (!isset($_SESSION['user'])) {
  header("location: loginPatient.php");
  exit();
}

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
  <meta name="description" content="Patient's Personal Details" />
  <link rel="icon" type="image/png" href="img/favicon.png" />
  <meta name="keywords" content="Medico, Personal Details" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/patient_profile.css" />
  <title>Medico - Personal Details</title>

</head>

<body>
  <div id="main">
    <?php include("header.php"); ?>
    <div id="site_content">

      <?php include("sidebar.php"); ?>

      <h1>Hello <?php echo $userDetails['full_name']; ?>, Welcome back!</h1>

      <!-- ... (previous code) ... -->

      <div id="content">
        <?php
        $query_pending = "SELECT COUNT(*) AS pending_count FROM `pres` WHERE nic = '$nic' AND Duration > 0";
        $result_pending = mysqli_query($conn, $query_pending) or die(mysqli_error($conn));
        $row_pending = mysqli_fetch_assoc($result_pending);
        $pending_count = $row_pending['pending_count'];

        if ($pending_count > 0) {
          echo "<p style='color: red;'>You have $pending_count pending prescription(s). Checkout the prescription(s).</p>";
        } else {
          echo "<p>No pending prescriptions. Have a look at your medical info.</p>";
        }

        // echo "<p style: >bla bla bla</p>";
        ?>

      </div>


    </div>
    <?php include("footer.php"); ?>
  </div>
</body>

</html>