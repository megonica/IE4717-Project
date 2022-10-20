<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Smile Dental Clinic - Home</title>
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <style type="text/css">
      * {
        box-sizing: border-box;
      }
      .col-left {
        flex: 50%;
        border: 2px solid;
        padding: 25px;
      }
      .col-left img {
        background-color: #aaa;
        width: 100%;
        padding: 20px;
      }
      .col-right {
        flex: 50%;
        border: 2px solid;
        padding: 25px;
      }
      .col-right button {
        background-color: lightblue;
        width: 200px;
        height: 40px;
        font-size: 16px;
        font-weight: bold;
        border: 0px;
        margin-right: 25px;
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
        <img src="" alt="Home Image" style="height: 200px;">
      </div>
      <div class="col-right">
        <p>Welcome to</p>
        <h1>Best Smile Dental Clinic Online Booking System</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec lectus sit amet sapien viverra congue. Praesent consectetur tortor et efficitur venenatis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec lectus sit amet sapien viverra congue.</p>
        <p>Call us +65 12345678 to find out more.</p>
        <a href="../login page/login.php"><button type="button" name="login" id="login">Login</button></a>
        <a href="../register page/register.php"><button type="button" name="signup" id="signup">Sign Up</button></a>
      </div>

    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
