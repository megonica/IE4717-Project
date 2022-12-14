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
        margin-bottom: 0;
        width: 100%;
        background-color: #5CC6D0;
        border: none;
        color: white;
      }

      button:hover {
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
        <form action="insert_user.php" method="POST">
          <div class="signup">
              <h1>SIGN UP</h1>
              <label for="email">Email</label>
              <input type="text" id="email" name="email" required>
              <label for="username">Username</label>
              <input type="text" id="username" name="username" required>
              <label for="password">Password</label>
              <input type="text" id="password" name="password" required>
              <button type="submit">Book</button>
          </div>
        </form>
      </div>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
