<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
body{
	background-color: gray;
	padding: 80px;
}
table {
    color: #333;
    font-family: Helvetica, Arial, sans-serif;
    width: 640px;
    border-collapse:collapse;
		border-spacing: 0;
}

td, th {
    border: 1px solid transparent; /* No more visible border */
    height: 30px;
    transition: all 0.3s;  /* Simple transition for hover effect */
}

th {
    background: #DFDFDF;  /* Darken header a bit */
    font-weight: bold;
}

td {
    background: #FAFAFA;
    text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */
tr:nth-child(even) td { background: #F1F1F1; }

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */
tr:nth-child(odd) td { background: #FEFEFE; }

</style>
</head>
<body>
	<div>
  <?php
	if(!isset($_SESSION))
{
		session_start();
}
  include_once("headernav.php")
   ?>
</div>
<h2 align=center>Current Orders </h2>

<br><br>
<div style="overflow-y:auto;">

<table align='center'>
  <thead>
    <tr>
      <th>Shampoo Label</th>
      <th>Order No:</th>

    </tr>
  </thead>
  <tbody id="myTable">
  <?php
  session_start();

$db = mysqli_connect('localhost', 'shampoo_user', 'root1234', 'shampoo');
       $e=$_SESSION['username'];
  $id1=mysqli_query($db,"Select id from user where email='$e'");
  $user = mysqli_fetch_assoc($id1);
  $id=(int)$user['id'];
      $user_check_query = "SELECT h.label, o.ord_no FROM hair h, orders o WHERE h.id='$id' and h.hair_id=o.hair_id";

       $result1 = mysqli_query($db, $user_check_query);$result=array();
			 if($result1)
      while($result=mysqli_fetch_array($result1))
      {
      	echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td></tr>";
      }
?>

  </tbody>
  </table>
  </div></body></html>
