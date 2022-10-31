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

    // get username
    $query = "select username from patient where patientid=1";
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get username.";
      exit;
    } else {
      $username = $result->fetch_assoc();
      echo $username['username'];
    }

    // get dentist name
    $query = "select name from appointment, dentist where appointment.patientid=1 and dentist.dentistid=appointment.dentistid";
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get dentist name.";
      exit;
    } else {
      $dentistname = $result->fetch_assoc();
      echo $dentistname['name'];
    }

    ?>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <div class="content">
      <h1>Appointment Confirmation</h1>
      <p>ABC, your appointment has been confirmed. The details are as follows:</p>
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
