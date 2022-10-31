<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Smile Dental Clinic - Appointment</title>
    <link rel="stylesheet" type="text/css" href="../../styles/global.css">
    <link rel="stylesheet" type="text/css" href="calendar_style.css">
    <script type="text/javascript" src="calendar_script.js" defer></script>
    <link rel="stylesheet" type="text/css" href="timeslot_style.css">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <style type="text/css">
      * {
        box-sizing: border-box;
      }
      .col-left {
        flex: 30%;
        border: 2px solid;
        padding: 25px;
        height: 300px;
      }
      .col-left img {
        float: left;
        border: 2px solid;
      }
      .col-left-top {
        float: left;
        border: 2px solid;
      }
      .col-left-intro {
        float: left;
        border: 2px solid;
      }
      .col-right {
        flex: 70%;
        border: 2px solid;
        padding: 25px;
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
    </style>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <div class="content">
      <div class="col-left">
        <img src="#" alt="Dentist">
        <div class="col-left-top">
          <h3>Dentist Name</h3>
          <p>Position</p>
        </div>
        <div class="col-left-intro">
          <p>Specialisation</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper ultricies nunc, vel sollicitudin odio finibus in. Praesent quis velit dolor.</p>
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
            <p>Wednesday, April 23</p>
            <form>
              <input type="button" name="" value="10:00 AM">
              <input type="button" name="" value="11:00 AM">
              <input type="button" name="" value="1:30 PM">
              <input type="button" name="" value="2:00 PM">
              <input type="button" name="" value="2:30 PM">
              <input type="button" name="" value="3:00 PM">
              <input type="button" name="" value="3:30 PM">
              <input type="button" name="" value="4:30 PM">
              <input type="submit" name="submit">
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
