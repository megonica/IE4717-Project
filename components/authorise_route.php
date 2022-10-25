<?php
    session_start();

    if (!isset($_SESSION['created'])) {
        $_SESSION['created'] = time();
    } else if (time() - $_SESSION['created'] > 1800) {
        // session started more than 30 minutes ago
        session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    }

    if(!isset($_SESSION["patientid"])){
        echo "<script>";
        echo "alert('Error 401: Unauthorised route!')";
        echo "location.href='../pages/home/home.php';";
        echo "</script>";
    }
?>