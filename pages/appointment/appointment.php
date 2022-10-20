<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Smile Dental Clinic - Appointment</title>
    <link rel="stylesheet" href="../../styles/global.css">
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
      </div>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
