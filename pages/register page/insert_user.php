<?php
    if(!isset($_POST['email']) || !isset($_POST['username']) || !isset($_POST['password'])){
        echo "<script>";
        echo "alert('Please key in the necessary fields!')";
        echo "</script>";
    }

    session_start();
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    @ $db = new mysqli('localhost', 'root', '', 'dental');
      if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }

    function validateEmailAndUser($db, $email, $username){
        // check duplicate email or user
        $query="select count(email) from patient where email='".$email."'";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        if($row['count(email)'] == 1){
            return false;
        }

        $query="select count(username) from patient where username='".$username."'";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        if($row['count(username)'] == 1){
            return false;
        }

        return true;
    }
    

    if(validateEmailAndUser($db, $email, $username)){
        $query="insert into `patient` (`email`, `username`, `password`) values ('".$email."', '".$username."', '".$password."')";
        $result = $db->query($query);
        if(!$result){
            echo "<script>";
            echo "alert('Failed to insert new user.');";
            echo "</script>";
        }

        $query="select patientid from `patient` where patientid=(select max(patientid) FROM `patient`)";
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        $_SESSION["patientid"] = $row['patientid'];
                  
        echo "<script>";
        echo "location.href='../dentists/dentists.php';";
        echo "</script>";
    }else {
        echo "<script>";
        echo "alert('User already exists!');";
        echo "location.href='register.php';";
        echo "</script>";
    }
?>