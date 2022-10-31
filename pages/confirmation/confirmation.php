<?php include '../../components/authorise_route.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Smile Dental Clinic - Confirmation</title>
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <style>
      .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }
    </style>
    <?php


    @ $db = new mysqli('localhost', 'root', '', 'dental');
    if (mysqli_connect_errno()) {
      echo "Error: Could not connect to database.  Please try again later.";
      exit;
    }

    $patientid = !empty($_SESSION["patientid"]) ? $_SESSION["patientid"] : '';
    $dentistid = isset($_POST['dentistid']) ? $_POST['dentistid'] : '';
    $dateid = isset($_POST['dateid']) ? $_POST['dateid'] : '';
    $timeid = isset($_POST['radio']) ? $_POST['radio'] : '';

    if($patientid === '' || $dentistid === '' || $dateid === '' || $timeid === ''){
      echo "<script>";
      echo "alert('Please select a date and time!');";
      echo "history.back();";
      echo "</script>";
    }

    $query = "insert into appointment(patientid, dentistid, dateid, timeid) values (".$patientid.", ".$dentistid.", ".$dateid.", ".$timeid.")";
    $result = $db->query($query);

    // get username
    $query = "select username from patient where patientid=".$patientid."";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    if(!$result) {
      echo "Could not get username.";
      exit;
    }

    // // get dentist name
    // $query = "select name from appointment, dentist where appointment.patientid=1 and dentist.dentistid=appointment.dentistid";
    // $result = $db->query($query);
    // if(!$result) {
    //   echo "Could not get dentist name.";
    //   exit;
    // } else {
    //   $dentistname = $result->fetch_assoc();
    //   echo $dentistname['name'];
    // }

    ?>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <div class="content">
      <h1>Appointment Confirmation</h1>
      <?php
        echo "<p>".$row['username'].", your appointment has been confirmed. The details are as follows:</p>";
      ?>
      <h3>Dr. Smile</h3>
      <h3>Wednesday, 24 April 2022</h3>
      <h3>2:00pm</h3>
      <p>A confirmation email has been sent to:</p>
      <h3>customeremail@email.com</h3>
      <p>Check your email to ensure that you have received the appointment confirmation email.</p>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
