<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test_php';

$mName = 'Ghostbusters';
$mDate = '1982';
$mBoxOffice = '35.4M';
$mSynopsis = 'A movie about ghosts and busters';
$mStarring = 'Dan Aykroyd';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 1. Inserting information into the database query ********
// This is an sql statement that is assigned to a php variable
// It will insert ata into the table
$sql = "INSERT INTO movies (name, release_date, box_office, synopsis, starring)
VALUES ('$mName', '$mDate', '$mBoxOffice', '$mSynopsis', '$mStarring')";

// 2. Deleting information from the database query ********
// sql to delete a record
// $sql = "DELETE FROM movies WHERE id=4";

// 3. Update information in the database query *********
// $sql = "UPDATE movies SET name='Changed name' WHERE id=2";

// If the connection and query is successfull...
if ($conn->query($sql) === TRUE) {
  // This message will be outpout onto the page
  echo "New record created successfully";
} else {
  // If this is not successfull, this message will; be output onto the page
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();

 ?>
