<?php
    session_start();

    function unauthorisedRoute($details){
        echo "<script>";
        echo "alert('Error 401: Unauthorised route! ".$details."');";
        echo "history.back();";
        echo "</script>";
    }

    if (empty($_SESSION['created'])) {
        $_SESSION['created'] = time();
    } else if (time() - $_SESSION['created'] > 3600) {
        // session started more than an hour ago
        unset ($_SESSION['created']);
        unset ($_SESSION["patientid"]);
        unauthorisedRoute('Session has expired!');
    }

    if(empty($_SESSION["patientid"])){
        unauthorisedRoute('Please log in!');
    }
?>