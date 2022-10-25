<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Best Smile Dental Clinic - Dentists</title>
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

      .card{
        width: 230px;
        height: 280px;
        background-color: #D9D9D9;
        margin: 10px;
        padding: 10px;
      }

      .card img {
        width: 150px;
        height: 150px;
        border-radius: 100%;
        object-fit: cover;
        text-align: center;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      .card h2 {
        font-size: 14px;
        margin-bottom: 0;
        text-align: center;
      }

      .card p {
        font-size: 11px;
        margin: 0;
        text-align: center;
      }

      .card button {
        width: 150px;
        font-weight: bold;
        font-size: 16px;
        height: 40px;
        display: block;
        margin: 25px auto 0 auto;
      }

      h1 {
        font-size: 24px;
        text-align: center;
      }

      section{
        display: grid;
        grid-template-columns: auto auto auto;
      }

      @media screen and (max-width: 700px) {
        section{
          grid-template-columns: auto auto;
        }
      }
    </style>
    <?php
      @ $db = new mysqli('localhost', 'root', '', 'dental');
      if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
      }

      $query="select * from dentist";
      $result = $db->query($query);
      if(!$result) {
			echo "Could not get most popular product.";
			exit;
      } else {
        $num_results = $result->num_rows;
      }
    ?>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <div class="content">
      <div class="container">
        <form action="" method="post">
          <div class="doctors">
              <h1>Select one of our Experienced Dentists</h1>
              <section>
                <!-- to loop according to number of dentists from db -->
                <?php
                for($i=0; $i<$num_results; $i++){
			            $row = $result->fetch_assoc();
                  echo "<div class='card'>";
                  echo "<div class='card-content'>";
                  echo  "<img src='".$row['profile']."' alt='profile'>";
                  echo  "<h2>".$row['name']."</h2>";
                  echo  "<p>".$row['position']."</p>";
                  echo  "<p>".$row['specialisation']."</p>";
                  echo  "<button type='submit'>Select</button>";
                  echo  "</div>";
                  echo  "</div>";
                } ?>
              </section>
          </div>
        </form>
      </div>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
</html>
