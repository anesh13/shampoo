<?php
session_start();

// initializing variables

$email   = "";
$fname="";
$lname="";
$errors = array();
$issue="";
$msg="";
$cid="";

// connect to the database
$db = mysqli_connect('localhost', 'shampoo_user', 'root1234', 'shampoo');

// REGISTER USER
if (isset($_SESSION['username'])) {
  // receive all input values from the form
  if(isset($_POST['Submit'])){

  $fname= mysqli_real_escape_string($db, $_POST['firstname']);
  $lname=mysqli_real_escape_string($db, $_POST['lastname']);
  $issue=mysqli_real_escape_string($db, $_POST['issue']);
  $msg = mysqli_real_escape_string($db, $_POST['subject']);




  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($lname)) { array_push($errors, "Last name is required");}
   if (empty($issue)) { array_push($errors, "Issue is required");}



  $email=$_SESSION['username'];


  if (count($errors) == 0) {


    $query = "INSERT INTO feedback (c_id, email, first_name,last_name,issue,msg)
          VALUES(0,'$email', '$fname','$lname','$issue','$msg')";
    mysqli_query($db, $query);

    header('location: home.php');
  }
}
}
else{
  array_push($errors,"Login First!");
}

?>
