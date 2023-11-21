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
    <title>Medico - Allergies</title>
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta name="description" content="Patient Allergies" />
    <meta name="keywords" content="Medico, Allergies" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/patient_profile.css" />
</head>

<body>
    <div id="main">
        <?php include("header.php"); ?>
        <div id="site_content">
            <?php include("sidebar.php"); ?>

            <h1>Allergies</h1>

            <div id="content">
                <?php
                $allergyQuery = "SELECT * FROM `allergytypes` WHERE nic = '$nic'";
                $allergyResult = mysqli_query($conn, $allergyQuery);

                function displayAllergies($result, $allergyType)
                {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<h2>{$allergyType} Allergies</h2>";
                        echo "<ul>";
                        while ($allergyRow = mysqli_fetch_assoc($result)) {
                            echo "<li>" . $allergyRow['allergyName'] . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>No {$allergyType} allergies found</p>";
                    }
                }

                $drugAllergyResult = mysqli_query($conn, "SELECT * FROM `allergytypes` WHERE nic = '$nic' AND allergyType = 'Drug'");
                $foodAllergyResult = mysqli_query($conn, "SELECT * FROM `allergytypes` WHERE nic = '$nic' AND allergyType = 'Food'");

                displayAllergies($drugAllergyResult, 'Drug');
                echo "<br><br>";
                displayAllergies($foodAllergyResult, 'Food');
                ?>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</body>

</html>