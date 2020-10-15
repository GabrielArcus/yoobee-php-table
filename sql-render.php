<?php

// Conection settings
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test_php';

// Create connection with the mysql object
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Making a query to select and retrieve data
$sql = "SELECT id, name, release_date, box_office FROM movies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<ul>';
  echo '<h1>Movies Data</h1>';
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<li>id: " . $row["id"]. " Name: " . $row["name"]. " ". $row["release_date"]. " " . $row["box_office"]. "</li>";
  }
  echo '</ul>';
} else {
  echo "0 results";
}

// Close the connection
$conn->close();

 ?>


 <?php
 //If the form is submitted
 if(isset($_POST['submit'])) {

 	//Check to make sure that the name field is not empty
 	if(trim($_POST['moviename']) == '') {
 		$hasError = true;
 	} else {
 		$name = trim($_POST['moviename']);
 	}

 	//Check to make sure that the phone field is not empty
 	if(trim($_POST['releasedate']) == '') {
 		$hasError = true;
 	} else {
 		$phone = trim($_POST['releasedate']);
 	}

 	//Check to make sure that the name field is not empty
 	// if(trim($_POST['weburl']) == '') {
 	// 	$hasError = true;
 	// } else {
 	// 	$weburl = trim($_POST['weburl']);
 	// }

 	//Check to make sure that the subject field is not empty
 	// if(trim($_POST['subject']) == '') {
 	// 	$hasError = true;
 	// } else {
 	// 	$subject = trim($_POST['subject']);
 	// }

 	//Check to make sure sure that a valid email address is submitted
 	if(trim($_POST['email']) == '')  {
 		$hasError = true;
 	} else if (!filter_var( trim($_POST['email'], FILTER_VALIDATE_EMAIL ))) {
 		$hasError = true;
 	} else {
 		$email = trim($_POST['email']);
 	}

 	//Check to make sure comments were entered
 	if(trim($_POST['message']) == '') {
 		$hasError = true;
 	} else {
 		if(function_exists('stripslashes')) {
 			$comments = stripslashes(trim($_POST['message']));
 		} else {
 			$comments = trim($_POST['message']);
 		}
 	}

 	//Check to make sure invisible form input wasnt entered
 	// if the input value does not equal '' empty, $haserror will be true
 	// the email will not be sent
 	if(trim($_POST['foo']) != '')  {
 		$hasError = true;
 	}

 	//If there is no error, send the email
 	if(!isset($hasError)) {
 		$emailTo = 'gabriel.billingarcus@gmail.com'; // Put your own email address here
 		$body = "Name: $name \n\nEmail: $email \n\nPhone Number: $phone \n\nComments:\n $comments";
 		$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

 		// \n\nSubject: $subject removed from isset

 		mail($emailTo, $subject, $body, $headers);
 		$emailSent = true;
 	}
 }
 ?>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <div class="container contact-section">

     <div class="row">
       <div class="col-md-6 col-md-push-3">
         <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
           <fieldset>
             <legend>Input Movie Data</legend>

             <?php if(isset($hasError)) { //If errors are found ?>
               <p class="alert alert-danger">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
             <?php } ?>

             <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
               <div class="alert alert-success">
                 <p><strong>Message Successfully Sent!</strong></p>
                 <p>Thank you for using our contact form, <strong><?php echo $name;?></strong>! Your email was successfully sent and we&rsquo;ll be in touch with you soon.</p>
               </div>
             <?php } ?>

             <div class="form-group">
               <label for="name">Movie Name<span class="help-required">*</span></label>
               <input type="text" name="moviename" id="moviename" value="" class="form-control required" role="input" aria-required="true" />
             </div>

             <div class="form-group">
               <label for="date">Release Date<span class="help-required">*</span></label>
               <input type="text" name="releasedate" id="releasedate" value="" class="form-control required" role="input" aria-required="true" />
             </div>

             <div class="form-group">
               <label for="earnings">Box Office<span class="help-required">*</span></label>
               <input type="text" name="boxoffice" id="boxoffice" value="" class="form-control required email" role="input" aria-required="true" />
             </div>

             <div class="form-group">
               <label for="description">Synopsis<span class="help-required">*</span></label>
               <input type="text" name="synopsis" id="synopsis" value="" class="form-control required url" role="input" aria-required="true" />
             </div>

             <div class="form-group">
               <label for="actors">Starring<span class="help-required">*</span></label>
               <input type="text" name="starring" id="starring" value="" class="form-control required url" role="input" aria-required="true" />
             </div>

             <div class="actions">
               <input type="submit" value="Send Your Message" name="submit" id="submitButton" class="btn btn-primary" title="Click here to submit your message!" />
               <input type="reset" value="Clear Form" class="btn btn-danger" title="Remove all the data from the form." />
             </div>
           </fieldset>
         </form>
       </div><!-- col -->
     </div><!-- row -->
   </div> <!-- /container -->
