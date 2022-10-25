<?php
    session_start();

    function unauthoriseRoute($details){
        echo "<script>";
        echo "alert('Error 401: Unauthorised route! ".$details."');";
        echo "history.back();";
        echo "</script>";
    }

    if (empty($_SESSION['created'])) {
        $_SESSION['created'] = time();
    } else if (time() - $_SESSION['created'] > 900) {
        // session started more than 15 minutes ago
        unset ($_SESSION['created']);
        unset ($_SESSION["patientid"]);
        unauthoriseRoute('Session has expired!');
    }

    if(empty($_SESSION["patientid"])){
        unauthoriseRoute('Please log in!');
    }
?>