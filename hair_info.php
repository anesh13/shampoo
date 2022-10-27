<?php include('server2.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>HAIR INFO</title>
  <link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .error {
  width: 92%;
  margin: 0px auto;
  padding: 10px;
  border: 1px solid #a94442;
  color: #a94442;
  background: #f2dede;
  border-radius: 5px;
  text-align: left;
  font-size:120%;
}

.btn {
  padding: 10px;
  font-size: 22px;
  color: white;
  background: black;
  border: none;
  border-radius: 5px;
}

  form, .content {
  width: 70%;
  margin: 5px auto;
  padding: 70px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 5px 5px 10px 10px;
  text-align: center;
}
  .header img{
  	float: center;
  	width: 100%;
    height: 100%;
    background: #555;
  }
  /* HIDE RADIO */
[type=radio] {
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
  height: 245px;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #555;
}
  .input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {

  text-align: center;
  font-size: 22px;
  font-family: 'Averia Gruesa Libre';

}
.input-group input {
  height: 30px;
  width: 40%%;
  padding: 5px 10px;
  font-size: 20px;
  border-radius: 5px;
  border: 1px solid gray;
}
.input-group label span {
    position:relative;
    display:inline-block;
    margin: 20px 10px;
    font-size:20px;
    padding:20px;
    width: 150px;
    background: #000;
    border: 1px solid #444;
    color: white;
    border-radius: 4px;
}
.input-group label input:checked ~ span {
    color:pink;
    border: 1px solid #008eff;
}

  </style>
</head>
<body>
<!-- <div class="header">
<img src="amoreh.jpg" />
</div> -->
<div>
  <div>
  <?php
  if(!isset($_SESSION))
{
    session_start();
}
  include_once("headernav.php")
   ?>
  </div>
  <div>
<form method="post" action="hair_info.php">

  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>1. What is your age?</label></br></br>
  		<input type="text" name="age" value="<?php echo $age; ?>" ></br></br></br>
  	</div>

  	<div class="input-group">
  		<label>2. What is your gender?</label></br></br>
  		<label>
  		<input type="radio" name="gender" value="Female" >Female
  		<img src="images/female.png"></label><label>
  		<input type="radio" name="gender" value="Male">Male
  		<img src="images/male.png"></label></br></br></br>
  	</div>

<div class="input-group">
  		<label>3. Help us understand your hair and scalp condition.</label></br></br>
  		<label>
  		<input type="radio" name="scalp" value="Straight">Straight
  		<img src="images/fine.png"></label><label>
  		<input type="radio" name="scalp" value="Wavy">Wavy
  		<img src="images/wavy.png"></label><label>
  		<input type="radio" name="scalp" value="Curly">Curly
  		<img src="images/curly.png"></label></br></br></br>
  	</div>

  <div class="input-group">
  		<label>4. Hair Structure?</label></br></br>
  		<label>
  		<input type="radio" name="struc" value="Fine">Fine
  		<img src="images/fine.png"></label><label>
  		<input type="radio" name="struc" value="Medium">Medium
  		<img src="images/medium.png"></label><label>
  		<input type="radio" name="struc" value="Coarse">Coarse
  		<img src="images/coarse.png"></label></br></br></br>
  	</div>

  	<div class="input-group">
  		<label>5. Scalp Type?</label></br></br><label>
  		<input type="radio" name="type" value="Dry">
      <span>Dry</span></label><label>
  		<input type="radio" name="type" value="Normal">
      <span>Normal</span></label><label>
  		<input type="radio" name="type" value="Oily"><span>Oily</span></label><label>
      </br></br></br>
  	</div>

  	<div class="input-group">
  		<label>6. What is your primary hair concern?</label></br></br><label>
  		<input type="radio" name="concern" value="Hairfall" >
  		<span>Hairfall</span></label><label>
  		<input type="radio" name="concern" value="Dry and Damaged">
  		<span>Dry and Damaged</span></label><label>
  		<input type="radio" name="concern" value="Dandruff">
  		<span>Dandruff</span></label><label>
  		<input type="radio" name="concern" value="Control">
  		<span>Oil Control</span></label></br></br></br>
  	</div>

  	<div class="input-group">
  		<label>7. What is your secondary hair concern?</label></br></br><label>
  		<input type="radio" name="concern1" value="Color Protection">
  		<span>Color Protection
  		</span></label><label>
  		<input type="radio" name="concern1" value="Volume">
  		<span>Volume</span></label><label>
  		<input type="radio" name="concern1" value="Enhanced Shine">
  		<span>Enhanced Shine</span></label><label>
  		<input type="radio" name="concern1" value="Lengthen"><span>Lengthen</span></label><label>
  		<input type="radio" name="concern1" value="Anti-Frizz">
  		<span>Anti-Frizz</span></label>
  		</br></br></br>
  	</div>

  	<div class="input-group">
  		<label>8. Add a Fragrance of your choice.</label></br></br>
  		<label>
  		<input type="radio" name="frag" value="Citrus">Citrus
  		<img src="images/citrus.png"></label><label>
  		<input type="radio" name="frag" value="Tropical">Sweet
  		<img src="images/tropical.png"></label><label>
  		<input type="radio" name="frag" value="Floral">Floral
  		<img src="images/floral.png"></label><label>
  		<input type="radio" name="frag" value="Woody">Woody
  		<img src="images/woody.png"></label><br></br></br>
  	</div>

  		<div class="input-group">
  		<label>9. Enter name for the label.(This name would be printed on the bottle)</label>
  		</br></br>
  		<input type="text" name="label" value="<?php echo $label; ?>" ></br></br></br>
  	</div>

  	<div class="input-group">
  		<button type="submit" class="btn" name="hairinfo">Add to Cart</button>


  	</div>
  	</form>
  </div>
  	</body>
  	</html>
