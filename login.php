<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <style type="text/css">

  body
{
    background: url('http://farm3.staticflickr.com/2832/12303719364_c25cecdc28_b.jpg') fixed;
    background-size: cover;
    padding: 0;
    margin: 0;
}

.wrap
{
    width: 100%;
    height: 100%;
    min-height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 99;
}

p.a
{
    font-family: 'Open Sans' , sans-serif;
    font-size: 20px;
    font-weight: 600;
    text-align: center;
    color: #FFFFFF;
    margin-top: 5%;
    text-transform: uppercase;
    letter-spacing: 4px;
}

form
{
    width: 250px;
    margin: 0 auto;
}

form.login input[type="text"], form.login input[type="password"]
{
    width: 100%;
    margin: 0;
    padding: 5px 10px;
    background: 0;
    border: 0;
    border-bottom: 1px solid #FFFFFF;
    outline: 0;
    font-style: italic;
    font-size: 20px;
    font-weight: 400;
    letter-spacing: 1px;
    margin-bottom: 5px;
    color: black;
    outline: 0;
}

form.login button[type="submit"]
{
    width: 50%;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 500;
    margin-top: 16px;
    outline: 0;
    cursor: pointer;
    letter-spacing: 1px;
    border: 1px solid #2ecc71;
    background-color: #2ecc71;
}

form.login button[type="submit"]:hover
{
    transition: background-color 0.5s ease;
}


form.login label, form.login a
{
    font-size: 15px;
    font-weight: 400;
    color: #FFFFFF;
}

form.login a
{
    transition: color 0.5s ease;
}

form.login a:hover
{
    color: #2ecc71;
}

.error {
  width: 92%;
  margin: 0px auto;
  padding: 10px;
  border: 1px solid #a94442;
  color: #a94442;
  background: #f2dede;
  border-radius: 5px;
  text-align: left;
}

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
  <div class="wrap">
  	<p class="a">Login</h2>


  <form method="post" action="login.php" class="login">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	<input type="text" placeholder="Email" name="email" >
  	</div>
  	<div class="input-group">
  		<input type="password" placeholder="Password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p style="color:white">
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
  </div>
</body>
</html>
