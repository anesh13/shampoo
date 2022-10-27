<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="w3-top">
    <div class="w3-bar w3-black w3-card">
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="home.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
      <a href="hair_info.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CUSTOMIZE</a>
      <a href="products.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">PRODUCTS</a>
      <a href="about.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ABOUT</a>
      <a href="team.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">TEAM</a>
      <a href="contact.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT US</a>
      <div class="dropdown" align='right'>

       <a href="javascript:void(0)" class="dropbtn"></a>
       <button class="w3-bar-item w3-button w3-padding-large w3-hide-small" >ACCOUNT</button>
      <div class="dropdown-content" >
       <?php
       if (isset($_SESSION['username'])) {
        echo"<p style='color:green;' align=left'>Logged in as ".$_SESSION['username']."</p>";
        echo "<p> <a href='home.php?logout='1'' style='color: red;'>LOGOUT</p>";
         echo "<a href='order.php'>My Orders</a>";
      }
      else{
        if(!isset($_SESSION))
      {
          session_start();
      }
      echo "<a href='login.php' >LOGIN</a>";
      echo "<a href='register.php' >REGISTER</a>";
      }
      ?>
       </div></div>
      <div class="dropdown" align='right' style="float:right">


       <a href="javascript:void(0)" class="dropbtn"></a>
       <button class="dropbtn" ><img src="cart.png" width='40' height='37'></button>
      <div class="dropdown-content" style="right:0; overflow-y:scroll;">
        <?php
        if(!isset($_SESSION))
        {
          session_start();
          echo "<p>Login to view Cart</p>";

        }
        else
        {
        $db = mysqli_connect('localhost', 'shampoo_user', 'root1234', 'shampoo');
        $e=$_SESSION['username'];
    $id1=mysqli_query($db,"Select id from user where email='$e'");
    $user = mysqli_fetch_assoc($id1);
    $id=(int)$user['id'];
        $user_check_query = "SELECT label, hair_id, cart FROM hair WHERE id='$id'";

         $result1 = mysqli_query($db, $user_check_query);$result=array();
          echo "<form method='post' action='home.php'>";
          if($result)
        while($result=mysqli_fetch_array($result1))
         {
               if($result[2]=='1')
               echo "<input type='checkbox' name='c_items' style='float:left' value='".$result[1]."' >".$result[0]."<br>" ;

         }
          echo "<input type='submit' name='submit' value='Delete' ><input type='submit' name='order' value='Place Order' onclick='alert('Your Order has been placed. Total cost will be calculated after production!')'></form>";
       }

      ?>

      </div>
    </div>


       </div>
      </div>

</body>
</html>
