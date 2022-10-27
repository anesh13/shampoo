<?php
if(!isset($_SESSION))
	 {
			 session_start();
	 } 
$db = mysqli_connect('localhost', 'shampoo_user', 'root1234', 'shampoo');
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['c_items'])){
foreach((array)$_POST['c_items'] as $selected)
{
	$hid=$selected;
$q="Delete from hair where hair_id='$hid'";
mysqli_query($db, $q);
}
}
}

if(isset($_POST['order'])){//to run PHP script on submit
if(!empty($_POST['c_items'])){
foreach((array)$_POST['c_items'] as $selected)
{
	$hid=$selected;
$q="UPDATE hair set cart=0 where hair_id='$hid'";
mysqli_query($db, $q);
$q="INSERT into orders(ord_no,hair_id) values(0,'$hid')";
mysqli_query($db, $q);
}
}
}
?>
