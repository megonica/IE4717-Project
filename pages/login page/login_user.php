<?php
    if(!isset($_POST['username']) || !isset($_POST['password'])){
        echo "<script>";
        echo "alert('Please key in the necessary fields!')";
        echo "</script>";
    }

    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    @ $db = new mysqli('localhost', 'root', '', 'dental');
      if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }

    // verify patient
    $query="select patientid, count(*) from `patient` where username='".$username."' and password='".$password."'";
    $result = $db->query($query);
    if(!$result){
        echo "<script>";
        echo "alert('Failed to get user data.');";
        echo "</script>";
    }
    $row = $result->fetch_assoc();

    if($row['count(*)'] == 1){
        $_SESSION['created'] = time();
        $_SESSION["patientid"] = $row['patientid'];

        // book new appointment or reschedule current appointment
        echo "<script>";
        if(isset($_POST['book'])) {
            $query="select appointmentid from `appointment` where patientid='".$row['patientid']."'";
            $result = $db->query($query);
            if(!$result){
                echo "alert('Failed to verify if user already has an existing appointment.');";
            }

            $row = $result->fetch_assoc();
            if($row) {
                echo "alert('You already have an appointment! Reschedule appointment instead.');";
                echo "history.back();";
            }
            else echo "location.href='../dentists/dentists.php';";
        }
        else if(isset($_POST['reschedule'])) {
            // verify if appointment for patientid exists
            $query="select appointmentid from `appointment` where patientid='".$row['patientid']."'";
            $result = $db->query($query);
            if(!$result){
                echo "alert('Failed to get appointment data.');";
            }
            $row = $result->fetch_assoc();

            if($row) echo "location.href='../appointment/appointment.php?appointmentid=".$row['appointmentid']."';";
            else {
                echo "alert('You have not made any appointment!');";
                echo "history.back();";
            };
        }
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Invalid username or password.');";
        echo "history.back();";
        echo "</script>";
    }
?>