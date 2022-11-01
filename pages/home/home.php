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
        padding: 25px;
        display: flex;
        align-items: center;
      }
      .col-left img {
        width: 100%;
        padding: 20px;
      }
      .col-right {
        flex: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 25px;
        padding-right: 50px;
      }
      .col-right p {
        text-align: justify;
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

      .col-right button:hover {
        cursor: pointer;
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
        <img src="https://images.unsplash.com/photo-1544507888-56d73eb6046e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1169&q=80" alt="Home Image" >
      </div>
      <div class="col-right">
        <div>
          <p>Welcome to</p>
          <h1>Best Smile Dental Clinic Online Booking System</h1>
          <p>Book your appointment with our world famous dentists today! Experiencing problems with your dental health? Fret not, as you will surely find a dentist that meets your needs. Register with us today and book an appointment to free your worries.</p>
          <p>Call us +65 12345678 to find out more.</p>
          <div>
            <a href="../login page/login.php"><button type="button" name="login" id="login">Login</button></a>
            <a href="../register page/register.php"><button type="button" name="signup" id="signup">Sign Up</button></a>
          </div>
        </div>
      </div>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
