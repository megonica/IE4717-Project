<?php include '../../components/authorise_route.php';?>
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
        background-color: #5CC6D0;
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
        all: unset;
        width: 150px;
        font-weight: bold;
        font-size: 16px;
        height: 40px;
        display: block;
        margin: 25px auto 0 auto;
        background-color: white;
        text-align: center;
        color: #4096c6;
      }

      .card button:hover {
        all: unset;
        width: 148px;
        font-weight: bold;
        font-size: 16px;
        height: 38px;
        display: block;
        margin: 25px auto 0 auto;
        background-color: none;
        border: 2px solid white;
        text-align: center;
        color: white;
        cursor: pointer;
      }

      h1 {
        font-size: 24px;
        text-align: center;
      }

      section{
        /* display: grid;
        grid-template-columns: auto auto auto; */
        margin-top: 15px;
        justify-content: center;
      }

      .filter {
        display: grid;
        grid-template-columns: auto auto;
        justify-content: center;
      }

      @media screen and (max-width: 700px) {
        section{
          grid-template-columns: auto auto;
        }
        .filter{
          grid-template-columns: auto;
        }
      }
    </style>
    <?php
      @ $db = new mysqli('localhost', 'root', '', 'dental');
      if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
      }

      $records = array();
      $options = array();

      // get all or filtered dentists
      if(empty($_GET['treatment']) || $_GET['treatment'] === '') $query="select * from dentist";
      else $query="select * from dentist where specialisation='".$_GET['treatment']."'";

      $records = $db->query($query);
      if(!$records) {
        echo "Could not get dentists.";
        exit;
      }

      // get all select options
      $query="select specialisation from dentist";
      $result_options = $db->query($query);
      if(!$result_options) {
        echo "Could not get treatment options.";
        exit;
      } else {
        // push records to new array to reuse results
        while($specialisation = $result_options->fetch_array(MYSQLI_ASSOC)) {
          if(!in_array($specialisation['specialisation'], $options)){
            $options[] = $specialisation['specialisation'];
          }
        }
      }
    ?>
  </head>
  <body>
    <?php include '../../components/header.php';?>
    <div class="content">
      <div class="container">
          <div class="doctors">
              <h1>Select one of our Experienced Dentists</h1>
              <div class="filter">
                <div>
                  <label for="specialisation">Choice of Treatment: </label>
                  <select name="specialisation" id="specialisation">
                      <option value="">Select...</option>
                      <?php
                      foreach($options as $option){
                        echo  "<option value='".$option."'>".$option."</option>";
                      } 
                      ?>
                  </select>
                </div>
              </div>
                <section>
                  <!-- to loop according to number of dentists from db -->
                  <table>
                    <tbody>
                      <tr style="display: flex; flex-wrap: wrap; padding: 0 100px; justify-content: center;">
                        <?php
                          foreach($records as $record){
                            echo  "<td>";
                            echo  "<form action='../appointment/appointment.php' method='POST'>";
                            echo  "<div class='card'>";
                            echo  "<div class='card-content'>";
                            echo  "<input type='hidden' name='dentistid' value='".$record['dentistid']."'>";
                            echo  "<img src='".$record['profile']."' alt='profile'>";
                            echo  "<h2>".$record['name']."</h2>";
                            echo  "<p>".$record['position']."</p>";
                            echo  "<p>".$record['specialisation']."</p>";
                            echo  "<button type='submit'>Select</button>";
                            echo  "</div>";
                            echo  "</div>";
                            echo  "</form>";
                            echo  "</td>";
                          } ?>
                        </tr>
                    </tbody>
                  </table>
                </section>
          </div>
      </div>
    </div>
    <?php include '../../components/footer.php';?>
  </body>
  <script src="./dentists.js"></script>
  <?php
  if(!empty($_GET['treatment'])){
    echo "<script>";
    echo "document.getElementById('specialisation').value = '".$_GET['treatment']."'";
    echo "</script>";
  }
  ?>
</html>
