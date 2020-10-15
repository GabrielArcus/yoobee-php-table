<?php
function renderHtmlData () {
 global $conn;
 // Making a query to select and retrieve data
 $sql = "SELECT id, name, release_date, box_office, synopsis, starring  FROM movies";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
  echo '<h1>Movies Data</h1>';
  echo '<ul class="list-group">';

   // output data of each row
   while($row = $result->fetch_assoc()) {

     echo "<li><div class='card' style='width: 18rem;'>
            <div class='card-body'>
              <h5 class='card-title'>". $row["name"] . " </h5>
              <p class='card-title'>". $row["release_date"] ." </p>
              <p class='card-title'>". $row["box_office"] ." </p>
              <p class='card-text'>" . $row["synopsis"] ."</p>
              <p class='card-text'>" .$row["starring"] ."</p>
            </div>
          </div>
          </li><br>";
   }
   echo '</ul>';
 } else {
   echo "0 results";
 }
} // Function ends

function renderTableData () {
 global $conn;
 // Making a query to select and retrieve data
 $sql = "SELECT id, name, release_date, box_office, synopsis, starring  FROM movies";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
   echo "<table class='table'><tr><th>ID</th><th>Name</th><th>Box Office</th><th>Synopsis</th><th>Starring</th></tr>";
   // output data of each row
   while($row = $result->fetch_assoc()) {
     echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["release_date"]."</td><td>".$row["synopsis"]."</td><td>".$row["starring"]."</td></tr>";
   }
   echo '</table>';
 } else {
   echo "0 results";
 }
} // Function ends

function sendFormDataToDatabase() {

  global $conn;
  global $title;
  global $date;
  global $earnings;
  global $synopsis;
  global $starring;
  // 1. Inserting information into the database query ********
  // This is an sql statement that is assigned to a php variable
  // It will insert ata into the table
  $sql = "INSERT INTO movies (name, release_date, box_office, synopsis, starring)
  VALUES ('$title', '$date', '$earnings', '$synopsis', '$starring')";

  if ($conn->query($sql) === TRUE) {
    // This message will be outpout onto the page
    echo "New record created successfully";
    renderHtmlData();
    renderTableData();
  } else {
    // If this is not successfull, this message will; be output onto the page
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}// functon ends

function deleteDataFromDatabase() {
  global $conn;
  global $title;
  // 2. Deleting information from the database query ********
  // sql to delete a record
  $sql = "DELETE FROM movies WHERE name='$title'";

  // If the connection and query is successfull...
  if ($conn->query($sql) === TRUE) {
  // This message will be outpout onto the page
    echo "New record created successfully";
  } else {
    // If this is not successfull, this message will; be output onto the page
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
   renderHtmlData();
   renderTableData();
   echo 'delete process...';
 }  // function ends

 function updateDataInDatabase() {
   // 3. Update information in the database query *********
   global $conn;
   global $title;
   global $date;
   global $earnings;
   global $synopsis;
   global $starring;

   $sql = "UPDATE movies SET release_date='$date', box_office='$earnings', synopsis='$synopsis', starring='$starring' WHERE name='$title'";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
    renderHtmlData();
    renderTableData();
   echo 'update process working...';
 } // function ends


 function deleteAllData() {
   // 4. Delete all information in the database
   global $conn;

   $sql = "DELETE FROM movies";
   if ($conn->query($sql) === TRUE) {
     echo "All Movies Deleted";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
 }
 ?>
