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

      input{
       width: 400px;
       height: 35px;
      }

      input{
        display: block;
        margin-bottom: 16px;
        padding: 0;
      }

      input[type=submit] {
        font-weight: bold;
        margin-bottom: 0;
        width: 100%;
        background-color: #5CC6D0;
        border: none;
        color: white;
      }

      input[type=submit]:hover {
        font-weight: bold;
        margin-bottom: 0;
        width: 100%;
        background-color: white;
        border: 2px solid #5CC6D0;
        color: #5CC6D0;
        cursor: pointer;
      }

      hr{
        margin: 0;
        margin-top: 16px;
      }
    </style>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <div class="content">
      <div class="container">
          <div class="login">
              <form action="login_user.php" method="post">
                <h1>LOGIN</h1>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="text" id="password" name="password" required>
                <input type="submit" name="book" value="Book"></input>
                <hr>
                <p>Already have an appointment?</p>
                <input type="submit" name="reschedule" value="Reschedule"></input>
              </form>
          </div>
      </div>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
