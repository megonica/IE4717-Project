<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Smile Dental Clinic - Register</title>
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
        margin-top: 0px;
        margin-bottom: 18px;
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
    <div class="content">
      <div class="container">
        <form action="" method="post">
          <div class="login">
              <h1>SIGN UP</h1>
              <label for="email">Email</label>
              <input type="text" id="email" name="email">
              <label for="username">Username</label>
              <input type="text" id="username" name="username">
              <label for="password">Password</label>
              <input type="text" id="password" name="password">
              <button type="submit">Book</button>
          </div>
        </form>
      </div>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
