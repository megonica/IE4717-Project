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

    $query="select patientid, count(*) from `patient` where username='".$username."' and password='".$password."'";
    $result = $db->query($query);
    if(!$result){
        echo "<script>";
        echo "alert('Failed to get user data.');";
        echo "</script>";
    }

    $row = $result->fetch_assoc();
    if($row['count(*)'] == 1){
        $_SESSION["patientid"] = $row['patientid'];

        echo "<script>";
        echo "location.href='../dentists/dentists.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Invalid username or password.');";
        echo "history.back();";
        echo "</script>";
    }
?>