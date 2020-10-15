<?php
// includes
include 'functions.php';
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

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


// Close the connection
$conn->close();

?>
