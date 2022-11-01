<?php include '../../components/authorise_route.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Smile Dental Clinic - Appointment</title>
    <link rel="stylesheet" type="text/css" href="../../styles/global.css">
    <link rel="stylesheet" type="text/css" href="calendar_style.css">
    <link rel="stylesheet" type="text/css" href="timeslot_style.css">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <style type="text/css">
      * {
        box-sizing: border-box;
      }
      .col-left {
        flex: 30%;
        /* border: 2px solid; */
        padding: 25px;
        height: 300px;
      }
      .col-left-img {
        float: left;
        /* border: 2px solid; */
        margin-right: 5px;
      }
      img[alt=Dentist] {
        width: 100px;
        height: 100px;
        object-fit: cover;
      }
      .col-left-top {
        /* border: 2px solid; */
      }
      .col-left-intro {
        float: left;
        /* border: 2px solid; */
      }
      .col-right {
        flex: 70%;
        /* border: 2px solid; */
        padding: 25px;
        background-color: #4096c6;
      }
      .col-right-content {
        display: flex;
      }
      .col-right .appt-date {
        flex: 50%;
      }
      .col-right .appt-time {
        flex: 50%;
      }
      /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
      @media screen and (max-width: 700px) {
        .content {   
          flex-direction: column;
        }
      }

      input[name='back'] {
        all: unset;
        width: 200px;
        font-weight: bold;
        font-size: 16px;
        height: 40px;
        display: block;
        background-color: #4096c6;
        text-align: center;
        color: white;
      }

      input[name='back']:hover {
        all: unset;
        width: 198px;
        font-weight: bold;
        font-size: 16px;
        height: 38px;
        display: block;
        background-color: white;
        text-align: center;
        color:  #4096c6;
        cursor: pointer;
        border: 2px solid #4096c6;
      }
    </style>
    <?php
      $dentistid;

      @ $db = new mysqli('localhost', 'root', '', 'dental');
      if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
      }

      if(isset($_GET['appointmentid'])){
        // reschedule from login.php
        $query="select dentistid from `appointment` where appointmentid='".$_GET['appointmentid']."'";
        $result = $db->query($query);
        if(!$result){
                echo "<script>";
                echo "alert('Failed to get appointment data.');";
                echo "</script>";
            }
        $row = $result->fetch_assoc();
        $dentistid = $row['dentistid'];
      }else if(isset($_POST['dentistid'])){
        // book from dentists.php
        $dentistid = $_POST['dentistid'];
      } else if(isset($_GET['dentistid'])){
        // selected available date on calendar
        $dentistid = $_GET['dentistid'];
      } else {
        echo "<script>";
        echo "alert('Please select a dentist!');";
        echo "history.back();";
        echo "</script>";
      } 

      $query="select * from dentist where dentistid=".$dentistid."";
      $result = $db->query($query);
      if(!$result) {
        echo "Could not get selected dentist.";
        exit;
      }
      $row = $result->fetch_assoc();

      // get available time slots
      $time_str = array();
      $time_str_ids = array();
      $dateid;
      $time_booked = array();

      $query="select timeid from appointment;";
      $appointments = $db->query($query);
      $num_appointments = $appointments->num_rows; 
      
      for ($i=0; $i <$num_appointments; $i++) { 
        $appointment = $appointments->fetch_assoc();
        $time_booked[] =  $appointment['timeid'];
      }
      
      if(isset($_GET['date'])){
        $query="select date.dateid, time.time_available, time.timeid from date INNER JOIN time ON date.dateid = time.dateid WHERE date.date_available = '".$_GET['date']."' AND date.date_available <= DATE(NOW() + INTERVAL 3 MONTH) and date.date_available >= DATE(NOW());";
        $result = $db->query($query);
        if(!$result) {
          echo "Could not get timings available.";
          exit;
        } else {
            // verify if timing(s) have been booked

            while($time_avail = $result->fetch_array(MYSQLI_ASSOC)) {
              if(!in_array($time_avail['time_available'], $time_str) && !in_array($time_avail['timeid'], $time_booked)){
                $time_str[] = strtotime($time_avail['time_available']);
                $time_str_ids[] = $time_avail['timeid'];
                $dateid = $time_avail['dateid'];
              }
            }
          // $time_avail[] = $result->fetch_assoc();
          // $time_str[] = strtotime($time_avail['time_available']);
        }
      }
      

      // get date available
      $query="select time.timeid, date.date_available FROM dentist INNER JOIN date ON dentist.dentistid = date.dentistid INNER JOIN time ON time.dateid = date.dateid WHERE dentist.dentistid = ".$dentistid." and date.date_available <= DATE(NOW() + INTERVAL 3 MONTH) and date.date_available >= DATE(NOW());";
      $result = $db->query($query);
      if(!$result) {
        echo "Could not get selected dentist's dates and time available.";
        exit;
      }
      $num_results = $result->num_rows;

      echo "<script>";
      echo "sessionStorage.clear();";
      for($i=0; $i <$num_results; $i++){
        $dateAndTimeRow = $result->fetch_assoc();
        if(!in_array($dateAndTimeRow['timeid'], $time_booked)){
          $date = substr($dateAndTimeRow['date_available'], -2);
          echo 'sessionStorage.setItem("'.$dateAndTimeRow['date_available'].'", "'.$dateAndTimeRow['date_available'].'");';
        }
      }
      echo "sessionStorage.setItem('dentistid', '".$dentistid."');";
      echo "</script>";
    ?>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <div class="content" style="margin-bottom: 10px;">
      <div class="col-left">
        <div class="col-left-img">
          <?php
            echo "<img src='".$row['profile']."' alt='Dentist'>";
          ?>          
        </div>
        <div class="col-left-top">
          <?php
            echo "<h3>".$row['name']."</h3>";
            echo "<p>".$row['position']."</p>";
          ?>
        </div>
        <div class="col-left-intro">
          <?php
            echo "<p>".$row['specialisation']."</p>";
            echo "<p>".$row['details']."</p>";
          ?>
          <form action="../dentists/dentists.php" method="POST">
            <input type="submit" name="back" value="Select another dentist">
          </form>
        </div>
      </div>
      <div class="col-right">
        <h3 style="text-align: center;">Select a Date & Time</h3>
        <div class="col-right-content">
          <div class="appt-date">
            <div class="wrapper">
              <div class="cal-header">
                <p class="current-date"></p>
                <div class="icons">
                  <span id="prev" class="material-symbols-rounded">&lt</span>
                  <span id="next" class="material-symbols-rounded">&gt</span>
                </div>
              </div>
              <div class="calendar">
                <ul class="weeks">
                  <li>Sun</li>
                  <li>Mon</li>
                  <li>Tue</li>
                  <li>Wed</li>
                  <li>Thu</li>
                  <li>Fri</li>
                  <li>Sat</li>
                </ul>
                <ul class="days">
                </ul>
              </div>
            </div>
          </div>
          <div class="appt-time">
            <?php
              if(isset($_GET['date'])){
                $date_str = date("l, d F Y", strtotime($_GET['date']));
                echo '<p style="margin: 45px 0 0 30px; font-weight: bold; color: white;">'.$date_str.'</p>';
              }
            ?>
            <form action='../confirmation/confirmation.php' method='POST'>
              <div class="time-display">
                <?php
                  if(isset($_GET['date']) && isset($dateid) && isset($dentistid)){
                    echo "<input type='hidden' name='dentistid' value='".$dentistid."'>";
                    echo "<input type='hidden' name='dateid' value='".$dateid."'>";
                    echo '<p style="color: white; margin-left: 10px;">Please select a timing below</p>';
                  }
                ?>
                <?php
                  for ($i = 0; $i < count($time_str); $i++) {
                      // echo "<input type=\"button\" name=\"\" value=\"".date("h:iA", $time)."\">";
                      echo "<input type=\"radio\" checked=\"checked\" name=\"radio\" value='".$time_str_ids[$i]."'>";
                      echo "<label class=\"time-radio\">".date("h:iA", $time_str[$i])."</label>";
                      echo "<br>";
                    }
                ?>
              </div>
              <?php
                if(isset($_GET['date'])){
                  echo '<button type="submit" name="book">Book</button>';
                }else {
                  echo '<p style="color: white; margin-left: 10px;">Please select a date on the calendar</p>';
                  echo '<button type="submit" name="book" disabled>Book</button>';
                }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include '../../components/footer.php';?>
    <script>
      function getDay() {
        const { value } = event.target;
        const month = event.target.getAttribute('data-month');
        const year = event.target.getAttribute('data-year');
        const selectedDate = `${year}-${month}-${value}`;
        const dentistid = sessionStorage.getItem('dentistid');
        location.href = `./appointment.php?dentistid=${dentistid}&date=${selectedDate}`;
      }
    </script>
  </body>
  <script type="text/javascript" src="calendar_script.js"></script>
</html>
