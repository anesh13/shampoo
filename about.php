<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
video {
  width: 100%;
  height: auto;
}
body {
  background: #333;
  padding-top: 60px;
}
.video-container {
  position: relative;
}
video {
  height: auto;
  vertical-align: middle;
  width: 100%;
}
.overlay-desc {
  background: rgba(0,0,0,0);
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size:50px;
  opacity:0.6;

}
@font-face {
  font-family: "Kimberley";
  src: url(http://www.princexml.com/fonts/larabie/kimberle.ttf) format("truetype");
}

</style>
<body>
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
<video width="320" height="240" autoplay>
  <source src="images/woman.mp4" type="video/mp4">
  <?php
  header("Refresh:5");
  ?>

</video>
<div class="overlay-desc">


        <p rows="15" cols="25"><i>TressBless</br>.....is an exclusive door into the world of fresh</br> and handmade cosmetics manufacturing, where</br> the words "fresh" and "handmade" come to life.</br> melange of everyday stories that combines the purity of </br>tradition with the effectiveness of </br>contemporary concoctions.</p>
     </div>
	</div>



</body>
</html>
