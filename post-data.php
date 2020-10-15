<?php
// includes
include 'functions.php';
include 'config.php';

error_reporting( error_reporting() & ~E_NOTICE )
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
      <div class="row">
         <div class="col">
           <?php
           // Create connection
           $conn = new mysqli($servername, $username, $password, $dbname);
           // Check connection
           if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
           }

           // Delete process for form submission
           if ($_POST['deleteMovie']) {
            // delete movie code goes here
             deleteDataFromDatabase ();
           }

           // Submit process for form submission
           if ($_POST['submit']) {
            // Submit movie code goes here
             sendFormDataToDatabase();
           }

           // Update process for form submission
           if ($_POST['update']) {
            // Update movie code goes here
            updateDataInDatabase();
           }

           // Delete process for form submission
           if ($_POST['deleteAllData']) {
            // Delete all data code goes here
            deleteAllData();
           }

           // Close the connection
           $conn->close();
            ?>
         </div>
      </div>
    </div>
  </body>
</html>
