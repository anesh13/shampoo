<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" type="text/css" href="style.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <style type="text/css">
      .flex-container{
        display: flex;
        flex-wrap: wrap;
      }

      .card {
          flex: 0 0 18rem;
          margin:8px 6px;
          transition: 0.3s;
      }

      .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
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

    <div>
        <h2 style="padding: 0 0 0 16px; margin-top: 60px;">Your 5 most recently viewed products</h2>
        <div class='flex-container'>
          <?php
            require_once 'server4.php';

            if(!isset($_COOKIE['mostRecentProducts'])){
              echo('
                <p style="padding:0 0 0 16px">You haven\'t viewed any products recently</p>
              ');
            }
            else{
              $allRecents = unserialize($_COOKIE['mostRecentProducts'], ["allowed_classes" => false]);

              for($i = 0; $i < sizeof($allRecents); $i++){
                $sql = "SELECT * FROM product WHERE product_id = $allRecents[$i]";
                if($result = mysqli_query($db, $sql)){
                  while($row = mysqli_fetch_assoc($result)){
                    echo('
                    <a href="product.php?p='.$row["product_id"].'" onclick="updateRecentlyViewed('.$row["product_id"].')">
                      <div class="card">
                        <img src="product_images/'.$row["product_image"].'" alt="..." height="200px" style="display: block; margin: 20px auto 0 auto">
                        <div class="card-body">
                          <h5 class="card-title" style="color: black">'.$row["product_title"].'</h5>
                          <a href="" class="btn btn-primary">'.$row["product_price"].'</a>
                        </div>
                      </div>
                    </a>
                    ');
                  }
                  mysqli_free_result($result);
                }
              }

            }

          ?>

        </div>

    <div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
