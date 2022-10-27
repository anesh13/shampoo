<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<div class = "team-content" style="padding: 70px;">
<h3> Meet our team! </h3>]
  <?php
  //Secure Section creation
  if(!isset($_SESSION['username']))
  {

    echo "<p><a href='login.php'>Login</a> to view Contacts</p>";

  }
  else
  {
  // file_get_contents("file.txt");
  $file_handle = fopen("team.txt", "rb");

while (!feof($file_handle) ) {

$line_of_text = fgets($file_handle);
$parts = explode(' - ', $line_of_text);
if ( ! isset($parts[1])) {
   $parts[1] = null;
}

print $parts[0] . " - " . $parts[1]. "<BR>" . "<BR>";

}

fclose($file_handle);
}
  ?>

</div>
</body>
</html>
