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

    $query="select appointmentid from `appointment` where patientid='".$patientid."'";
    $result = $db->query($query);
    if(!$result){
        echo "alert('Failed to verify if user already has an existing appointment.');";
    }
    $row = $result->fetch_assoc();
    if($row) {
        // reschedule existing appt 
        $query = "update appointment set dateid = ".$dateid.", timeid = ".$timeid." where patientid = ".$patientid;
        $result = $db->query($query);
        if(!$result){
          echo "alert('Failed to update appointment.');";
          exit;
        }
    }else {
        // insert new appointment
        $query = "insert into appointment(patientid, dentistid, dateid, timeid) values (".$patientid.", ".$dentistid.", ".$dateid.", ".$timeid.")";
        $result = $db->query($query);
        if(!$result){
          echo "alert('Failed to create new appointment.');";
          exit;
        }
    }

    $query = "select username from patient where patientid=".$patientid."";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    if(!$result) {
      echo "Failed to get appointment confirmation data.";
      exit;
    }


    // get username & email
    $query = "select username, email from patient where patientid=".$patientid."";
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    if(!$result) {
      echo "Could not get username.";
      exit;
    }

    // get dentist name
    $query = "select name from appointment, dentist where appointment.patientid = ".$patientid." and dentist.dentistid=appointment.dentistid";
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get dentist name.";
      exit;
    }
    $dentistname = $result->fetch_assoc();

    // get date 
    $query = "select date_available from appointment, `date` where appointment.patientid = ".$patientid." and date.dateid=appointment.dateid";
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get date_available.";
      exit;
    }
    $dateavailable = $result->fetch_assoc();

    // get time
    $query = "select time_available from appointment, `time` where appointment.patientid = ".$patientid." and time.timeid=appointment.timeid";
    $result = $db->query($query);
    if(!$result) {
      echo "Could not get time_available.";
      exit;
    }
    $timeavailable = $result->fetch_assoc();
    echo $timeavailable['time_available'];
    ?>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <div class="content">
      <h1>Appointment Confirmation</h1>
      <?php
        echo "<p>".$row['username'].", your appointment has been confirmed. The details are as follows:</p>";
        echo "<h3>".$dentistname['name']."</h3>";

        $year = substr($dateavailable['date_available'], 0, 4);
        $date = substr($dateavailable['date_available'], -2);
        $monthNum = substr($dateavailable['date_available'], 5, 2);
        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
        $day = date('l', strtotime($dateavailable['date_available']));

        echo "<h3>".$day.", ".$date." ".$monthName." ".$year."</h3>";

        $time = date("h:iA", strtotime($timeavailable['time_available']));

        echo "<h3>".$time."</h3>";
        echo "<p>A confirmation email has been sent to:</p>";
        echo "<h3>".$row['email']."</h3>";
      ?>
      <p>Check your email to ensure that you have received the appointment confirmation email.</p>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
