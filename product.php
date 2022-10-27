<?php
include "headernav.php";

$product_id = $_GET['p'];
echo $product_id;
// if the cookie exists, read it and unserialize it. If not, create a blank array
// if(array_key_exists('recentviews', $_COOKIE)) {
//     $cookie = $_COOKIE['recentviews'];
//     $cookie = unserialize($cookie);
// } else {
//     $cookie = array();
// }
//
// //  add the item to the begining
// array_unshift($cookie, $product_id);
// //$cookie[] = $product_id;
// $cookie =  array_unique($cookie);
// $cookie = array_slice($cookie,0,5);
// $cookie = serialize($cookie);
//
// // save the cookie
// setcookie('recentviews', $cookie, time()+3600);
// echo $cookie;
//
// if(array_key_exists('mostviews', $_COOKIE)) {
//     $cookie1 = $_COOKIE['mostviews'];
//     $cookie1 = unserialize($cookie1);
// } else {
//     $cookie1 = array();
// }
//
// //  add the item to the begining
// array_unshift($cookie1, $product_id);
// //$cookie[] = $product_id;
// $cookie1=array_count_values($cookie1);
// foreach($cookie1 as $key => $value) {
//   echo "$key is at $value";
// }
// $count = array_column($cookie1, 'value');
// array_multisort($count, SORT_DESC, $cookie1);
// $cookie1 = array_slice($cookie1,0,5);
// $cookie1 = serialize($cookie1);
//
// // save the cookie
// setcookie('recentviews', $cookie1, time()+3600);
// echo $cookie1;
?>
		<!-- /BREADCRUMB -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
		<script>

    (function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };
	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {
		noBackPlease();
		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };
    };
})(window);
</script>

		<!-- SECTION -->
		<div class="section main main-raised">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->

					<?php
                include_once 'server4.php';
                $currentUrl = 'https://';
            $currentUrl .= $_SERVER['HTTP_HOST'];
            $currentUrl .= $_SERVER['REQUEST_URI'];
            $indexInURL = strpos($currentUrl, 'index') + 6;
            $index = substr($currentUrl, $indexInURL);
            $index = intval($index);
						echo($index);
						echo("Helloooo");
                // update recents
                $product_id = $_GET['p'];
          $allRecents = array();
          if(isset($_COOKIE['mostRecentProducts'])) {
            $allRecents = unserialize($_COOKIE['mostRecentProducts'], ["allowed_classes" => false]);
          }

          if ((array_search($product_id, $allRecents)) !== false) {
            unset($allRecents[$index]);
          }
          array_unshift($allRecents, $product_id);
          setcookie("mostRecentProducts", serialize($allRecents), time() + (86400 * 5)); // 5 days

					$allPopular = [
					              1 => 0,
					              2 => 0,
					              3 => 0,
					              4 => 0,
					              5 => 0,
					              6 => 0,
					              7 => 0,
					              8 => 0,
					              9 => 0,
					              10 => 0,
												11 => 0,
												12 => 0,
					            ];
					            if(isset($_COOKIE['mostPopularProducts'])){
					              $allPopular = unserialize($_COOKIE['mostPopularProducts'], ['allowed_classes' => false]);
					            }
					            $allPopular[$product_id] += 1;
					            arsort($allPopular);
					            setcookie("mostPopularProducts", serialize($allPopular), time() + (86400 * 5)); // 5 days



								$sql = " SELECT * FROM product WHERE product_id = $product_id";

                print_r($product_id);
								if (!$db) {
									die("Connection failed: " . mysqli_connect_error());
								}
								$result = mysqli_query($db, $sql);
                print_r($result);
								if (mysqli_num_rows($result) > 0)
								{
									while($row = mysqli_fetch_assoc($result))
									{

									echo '



                                <div class="col-md-5 col-md-push-2">
                                <div id="product-main-img">
                                    <div class="product-preview">
                                        <img src="product_images/'.$row['product_image'].'" alt="">
                                    </div>
                                </div>
                            </div>


									';

									?>
					 <?php

									$_SESSION['product_id'] = $row['product_id'];
									}
								}
								?>

					<!-- product -->

					<!-- /product -->

				</div>
				<!-- /row -->

			</div>

		</div>
