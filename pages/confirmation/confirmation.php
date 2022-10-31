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
      .content img {
        width: 450px;
        height: 300px;
        margin-bottom: 20px;
      }
      .appt-info {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }
      .appt-info h3 {
        margin: 5px;
      }
    </style>
    <?php

    @ $db = new mysqli('localhost', 'root', '', 'dental');
    if (mysqli_connect_errno()) {
      echo "Error: Could not connect to database.  Please try again later.";
      exit;
    }

    $patientid = $_SESSION["patientid"];
    // echo $patientid;

    // get username
    $query = "select username from patient where patientid=".$patientid;
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get username.";
      exit;
    } else {
      $username = $result->fetch_assoc();
      // echo $username['username'];
    }

    // get dentist name
    $query = "select dentist.name from appointment, dentist where appointment.patientid=".$patientid." and dentist.dentistid=appointment.dentistid";
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get dentist name.";
      exit;
    } else {
      $dentistname = $result->fetch_assoc();
      // echo $dentistname['name'];
    }

    // get appointment date
    $query = "select date.date_available from appointment, date where appointment.patientid=".$patientid." and date.dateid=appointment.dateid";
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get appointment date.";
      exit;
    } else {
      $date_avail = $result->fetch_assoc();
      // echo $date_avail['date_available'];
      $date_str = strtotime($date_avail['date_available']);
      // echo date("l, d F Y", $date_str);
    }

    // get appointment time
    $query = "select time.time_available from appointment, time where appointment.patientid=".$patientid." and time.timeid=appointment.timeid";
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get appointment time.";
      exit;
    } else {
      $time_avail = $result->fetch_assoc();
      // echo $time_avail['time_available'];
      $time_str = strtotime($time_avail['time_available']);
      // echo date("h:iA", $time_str);
    }

    // get customer email
    $query = "select email from patient where patientid=".$patientid;
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get customer email.";
      exit;
    } else {
      $email = $result->fetch_assoc();
      // echo $email['email'];
    }

    ?>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <div class="content">
      <img src="https://images.unsplash.com/photo-1529153856829-f8c6aeee2e48?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="celebration">
      <h1>Appointment Confirmation</h1>
      <p>
        <?php 
          echo $username['username'].",";
        ?>
        your appointment has been confirmed. The details are as follows:
      </p>
      <div class="appt-info">
        <h3>
        <?php
          echo $dentistname['name'];
        ?>
        </h3>
        <h3>
          <?php
            echo date("l, d F Y", $date_str);
          ?>
        </h3>
        <h3>
          <?php
            echo date("h:iA", $time_str);
          ?>
        </h3>
      </div>
      <p>A confirmation email has been sent to:</p>
      <h3 style="margin: 10px;">
        <?php
          echo $email['email'];
        ?>
      </h3>
      <p>Check your email to ensure that you have received the appointment confirmation email.</p>
    </div>
    <?php include '../../components/footer.php';?>

    <!-- send email -->
    <?php
      $username_str = $username['username'];
      $dentistname_str = $dentistname['name'];
      $date_avail_str = date("l, d F Y", $date_str);
      $time_avail_str = date("h:iA", $time_str);
      $email_str = $email['email'];

      $to = "$email_str";
      $subject = 'Appointment Confirmation';
      $message = "This email is to confirm that you have booked the following appointment at Best Smile Dental Clinic.
      Username: ".$username_str."
      Dentist: ".$dentistname_str."
      Date: ".$date_avail_str."
      Time: ".$time_avail_str."
      Should you wish to reschedule, you can do so by logging in to your account. 
      Thank you for booking with Best Smile Dental Clinic Online Booking System.";
      $headers = 'From: f32ee@localhost' . "\r\n" .
        'Reply-To: f32ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
      // mail($to, $subject, $message, $headers, '-ff32ee@localhost');
      // echo ("mail sent to: ".$to);
    ?>
  </body>
</html>
