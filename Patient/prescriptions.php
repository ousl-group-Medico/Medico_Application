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
$query_prescription = "SELECT * FROM `pres` WHERE nic = '$nic'";
$result_prescription = mysqli_query($conn, $query_prescription) or die('prescription query failed');

$nic = $userDetails['nic'];
$query_issued_prescription = "SELECT * FROM `issued_pres` WHERE nic = '$nic'";
$result_issued_prescription = mysqli_query($conn, $query_issued_prescription) or die('prescription query failed');

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
    <title>Medico - Prescriptions</title>
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="css/patient_profile.css" />
</head>

<body>
    <div id="main">
        <?php include("header.php"); ?>
        <div id="site_content">
            <?php include("sidebar.php"); ?>

            <h1>Prescription Details</h1>

            <div id="content">
                <?php
                $pendingPrescriptions = [];

                while ($row = mysqli_fetch_assoc($result_prescription)) {
                    $drugName = isset($row['DrugName']) ? $row['DrugName'] : 'Not Available';
                    $dosage = isset($row['Dosage']) ? $row['Dosage'] : 'Not Available';
                    $frequency = isset($row['Frequency']) ? $row['Frequency'] : 'Not Available';
                    $duration = isset($row['Duration']) ? $row['Duration'] : 'Not Available';
                    $doctor = isset($row['doctor']) ? 'Dr. ' . $row['doctor'] : 'Not Available';
                    $date = isset($row['Date']) ? $row['Date'] : 'Not Available';
                    $status = ($duration > 0) ? 'Pending' : 'Issued';

                    if ($status == 'Pending') {
                        $pendingPrescriptions[] = [
                            'drugName' => $drugName,
                            'dosage' => $dosage,
                            'frequency' => $frequency,
                            'duration' => $duration,
                            'doctor' => $doctor,
                            'date' => $date,
                            'status' => $status
                        ];
                    }
                }

                if (count($pendingPrescriptions) > 0) : ?>
                    <table style="width:100%; border-spacing:0;">
                        <tr>
                            <th>Drug Name</th>
                            <th>Dosage</th>
                            <th>Frequency</th>
                            <th>Duration</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        foreach ($pendingPrescriptions as $prescription) {
                            echo '<tr>';
                            echo '<td>' . $prescription['drugName'] . '</td>';
                            echo '<td>' . $prescription['dosage'] . '</td>';
                            echo '<td>' . $prescription['frequency'] . '</td>';
                            echo '<td>' . $prescription['duration'] . '</td>';
                            echo '<td>' . $prescription['doctor'] . '</td>';
                            echo '<td>' . $prescription['date'] . '</td>';
                            echo '<td>' . $prescription['status'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                <?php else : ?>
                    <p>No pending prescriptions available</p>
                <?php endif; ?>

                <?php
                $issuedPrescriptions = [];
                while ($issuedRow = mysqli_fetch_assoc($result_issued_prescription)) {
                    $issuedDrugName = isset($issuedRow['DrugName']) ? $issuedRow['DrugName'] : 'Not Available';
                    $issuedDuration = isset($issuedRow['Duration']) ? $issuedRow['Duration'] : 'Not Available';
                    $issuedDoctor = isset($issuedRow['Doctor']) ? 'Dr. ' . $issuedRow['Doctor'] : 'Not Available';
                    $issuedPharmacy = isset($issuedRow['Pharmacy']) ? $issuedRow['Pharmacy'] : 'Not Available';
                    $issuedPharmacistNo = isset($issuedRow['pharmacistNo']) ? $issuedRow['pharmacistNo'] : 'Not Available';
                    $issuedDate_Time = isset($issuedRow['Date_Time']) ? $issuedRow['Date_Time'] : 'Not Available';

                    $issuedPrescriptions[] = [
                        'drugName' => $issuedDrugName,
                        'duration' => $issuedDuration,
                        'doctor' => $issuedDoctor,
                        'pharmacy' => $issuedPharmacy,
                        'pharmacistNo' => $issuedPharmacistNo,
                        'date_time' => $issuedDate_Time
                    ];
                }

                if (count($issuedPrescriptions) > 0) : ?>
                    <h2>Issued Prescriptions</h2>
                    <table style="width:100%; border-spacing:0;">
                        <tr>
                            <th>Drug Name</th>
                            <th>Duration</th>
                            <th>Doctor</th>
                            <th>Pharmacy</th>
                            <th>PharmacistNo</th>
                            <th>Date & Time</th>
                        </tr>
                        <?php
                        foreach ($issuedPrescriptions as $prescription) {
                            echo '<tr>';
                            echo '<td>' . $prescription['drugName'] . '</td>';
                            echo '<td>' . $prescription['duration'] . '</td>';
                            echo '<td>' . $prescription['doctor'] . '</td>';
                            echo '<td>' . $prescription['pharmacy'] . '</td>';
                            echo '<td>' . $prescription['pharmacistNo'] . '</td>';
                            echo '<td>' . $prescription['date_time'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                <?php else : ?>
                    <p>No issued prescriptions available</p>
                <?php endif; ?>
            </div>


        </div>
        <?php include("footer.php"); ?>
    </div>
</body>

</html>