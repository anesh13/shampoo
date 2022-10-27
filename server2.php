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

$db = mysqli_connect('localhost', 'shampoo_user', 'root1234', 'shampoo');

//hair information
if (isset($_POST['hairinfo'])) {

	$age=mysqli_real_escape_string($db, $_POST['age']);
	$label=mysqli_real_escape_string($db, $_POST['label']);
	$e=$_SESSION['username'];
	$id1=mysqli_query($db,"Select id from user where email='$e'");
	$user = mysqli_fetch_assoc($id1);
	$id=(int)$user['id'];

if(isset($_POST['gender'])&& isset($_POST['scalp'])&& isset($_POST['struc'])&& isset($_POST['type'])&& isset($_POST['concern'])&&isset($_POST['concern1'])&& isset($_POST['frag']))
 {
	$gender=mysqli_real_escape_string($db, $_POST['gender']);
	$scalp=mysqli_real_escape_string($db, $_POST['scalp']);
	$struc=mysqli_real_escape_string($db, $_POST['struc']);
	$type=mysqli_real_escape_string($db, $_POST['type']);
	$c1=mysqli_real_escape_string($db, $_POST['concern']);
    $c2=mysqli_real_escape_string($db, $_POST['concern1']);
    $frag=mysqli_real_escape_string($db, $_POST['frag']);
    $label=mysqli_real_escape_string($db, $_POST['label']);
}
else{
  		array_push($errors, "One or More fields empty");
  	}
  	if (count($errors) == 0) {
  		if(!isset($_SESSION['username']))
  		{
  			$_SESSION['msg']="You Must first log in!";
  			header('location:login.php');
  		}
  		else{
    $query = "INSERT INTO hair (id, hair_id, age, gender, scalp, struc, type, concern1, concern2, fragrance, label,cart)
  			  VALUES('$id',0,'$age','$gender','$scalp','$struc','$type','$c1','$c2','$frag','$label',1)";
  	mysqli_query($db, $query);




  	header('location: home.php');}
  }
}
?>
