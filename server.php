<?php
session_start();

// initializing variables

$email    = "";
$mobile="";
$lname="";
$fname="";
$errors = array();
$password2="";
$age="";
$gender="";
$c1="";
$c2="";$type="";
$scalp="";$struc="";$frag="";
$label="";


// connect to the database
$db = mysqli_connect('localhost', 'shampoo_user', 'root1234', 'shampoo');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile= mysqli_real_escape_string($db, $_POST['mobile']);
  $lname=mysqli_real_escape_string($db, $_POST['lname']);
  $fname=mysqli_real_escape_string($db, $_POST['fname']);

  $password = mysqli_real_escape_string($db, $_POST['password']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  $pattern='/^(.+)@([^\.].*)\.([a-z]{2,})$/';
 if(!preg_match($pattern,$email))
 {
   array_push($errors,"Invalid Email!");
 }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (strlen($password) <8){
  array_push($errors, "Password length must be longer than 8.");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

if($user){

    if ($user['email'] === $email) {
      array_push($errors, "User already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password1 = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO user (email, mobile, password, fname, lname, id)
          VALUES('$email','$mobile', '$password1','$fname', '$lname',0)";
    mysqli_query($db, $query);
    $_SESSION['username'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header('location: home.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password2 = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password2)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password2 = md5($password2);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password2'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results)==TRUE) {
      $_SESSION['username'] = $email;
      $_SESSION['success'] = "You are now logged in";
      header('location: home.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>
