<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Smile Dental Clinic - Login</title>
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <style type="text/css">
      .container{
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        padding-bottom: 16px;
      }

      h1{
        margin-top: 10px;
        margin-bottom: 20px;
      }

      label{
        margin-bottom: 5px;
        display: block;
      }

      button,
      input{
       width: 400px;
       height: 35px;
      }

      input{
        display: block;
        margin-bottom: 16px;
        padding: 0;
      }

      button {
        font-weight: bold;
        width: 100%;
      }

      hr{
        margin: 0;
        margin-top: 16px;
      }
    </style>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <?php
    unset ($_SESSION["patientid"]);
    ?>
    <div class="content">
      <div class="container">
          <div class="login">
              <form action="login_user.php" method="post">
              <h1>LOGIN</h1>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="text" id="password" name="password" required>
                <button type="submit">Book</button>
              </form>
              <form action="reschedule_user.php" method="post">
                <hr>
                <p>Already have an appointment?</p>
                <button type="submit">Reschedule</button>
              </form>
          </div>
      </div>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
