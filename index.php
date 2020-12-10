<?php
session_start();

include( "conn.php" );

$home = "active";
$products = "";
$shopping = "";
$about = "";
$delive = "";
$contact = "";


?>






<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>home</title>


    <link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
    <link href="css/index.css" rel="stylesheet" type="text/css">


    <script>
        var images = [
            "images/orange.jpg",
            "images/side1.jpg",
            "images/side2.jpg",
            "images/side3.jpg",
            "images/side4.jpg",
            "images/side5.jpg",
            "images/side6.jpg",

        ];
        var i = 0;

        function mySlider() {
            document.getElementById( 'slide' ).src = images[ i ];

            if ( i < images.length - 1 ) {
                i++;
            } else {
                i = 0;
            }

            setTimeout( "mySlider()", 3000 );
        }
    </script>


</head>

<body>

    <?php   include("header.php");   ?>


    <div class="bo1">

        <div class="bo2">

            <div class="bi3B">

                <h1 class="bi3T">Welcome to Healthy Products</h1>

            </div>

            <div>
                <img src="" class="img1 img-rounded img-responsive" id="slide">
            </div>
            <div class="row">
                <div class="bi1 col-md-4">

                    <div class="bi2">
                        <a href="order.php?Co_id=4">
                            <img src="images/alove.jpg" class="img2 img-rounded img-responsive">

                        <h1 class="bi2AloH">Aloe Vera</h1>
                            <p class="bi2Alo">Drinking Aloe Vera juice may give you relief when heartburn attacks.</p>
                      </a>
                    
                  </div>

              </div>


                <div class="bi1 col-md-4">

                    <div class="bi2">
                        <a href="order.php?Co_id=7">
                            <img src="images/jam.jpg" class="img2  img-rounded img-responsive">

                            <h1 class="bi2AloH">Mixed Fruit Jam</h1>
                            <p class="bi2Alo">Mixed Fruit Jam is a continental recipe made using a lot of fruits like  Pineapple, Mango, Passion and many.</p>

                      </a>
                    

                  </div>

                </div>


                <div class="bi1 col-md-4">

                    <div class="bi2">

                        <a href="order.php?Co_id=6">
                        
                            <img src="images/chocolate .jpg" class="img2 img-rounded img-responsive">

                            <h1 class="bi2AloH">Chocolate Milk Drink</h1>
                            <p class="bi2Alo">Chocolate flavored milk.It can be made by mixing chocolate syrup with milk.</p>

                      </a>

                    


                  </div>

                </div>

            </div>


            <div class="row">
                <div class="bi1 col-md-4">

                    <div class="bi2">
                        <a href="order.php?Co_id=1">
                            <img src="images/orangeD.jpg" class="img2 img-rounded img-responsive">

                            <h1 class="bi2AloH">Orange Drink</h1>
                            <p class="bi2Alo">orange juice is high in vital nutrients and enjoyed worldwide.</p>
                      </a>
                    
                  </div>

                </div>


                <div class="bi1 col-md-4">

                    <div class="bi2">
                        <a href="order.php?Co_id=2">
                            <img src="images/mango.jpg" class="img2 img-rounded img-responsive">

                            <h1 class="bi2AloH">Mango Drink</h1>
                            <p class="bi2Alo">Mango is low in calories yet high in nutrients — particularly vitamin C, which aids immunity, iron absorption and growth and repair.</p>

                      </a>
                    

                  </div>

                </div>


                <div class="bi1 col-md-4">

                    <div class="bi2">

                        <a href="order.php?Co_id=3">
                        
                            <img src="images/woodapple.jpg" class="img2 img-rounded img-responsive">

                            <h1 class="bi2AloH">Wood Apple Drink</h1>
                            <p class="bi2Alo">Wood apple drink is rich in antioxidants and also contains several compounds that fight against free radicals and help in better functioning of the body.</p>

                      </a>

                    


                  </div>

                </div>

            </div>



        </div>




    </div>

    <?php    include("footer.php");    ?>


    <script>
        mySlider();
    </script>
</body>
</html>