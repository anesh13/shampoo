<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
 h2.a{
  font-family: Arial,Helvetica,sans-serif;
}
</style>
</head>
<body>
  <div class="header">
  	<h2 class="a">Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	
  	<div class="input-group">
  	  <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	 
  	  <input type="text" name="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>">
  	</div>
  	<div class="input-group">
  	 
  	  <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname; ?>">
  	</div>
  	<div class="input-group">
  	  
  	  <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>">
  	</div>
  	<div class="input-group">
  	  
  	  <input type="password" placeholder="Password" name="password">
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
 

