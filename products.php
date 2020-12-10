<?php
session_start();
include('conn.php');


?>


<?php



$home = "";
$products = "active";
$shopping = "";
$about = "";
$delive = "";
$contact = '';

 
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>products</title>

<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<!--head-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!--<link href="css/stylehead.css" rel="stylesheet" type="text/css">-->
<!--footer-->
<!--<link href="css/stylefooter.css" rel="stylesheet" type="text/css">-->




<link href="css/page.css" rel="stylesheet" type="text/css">


</head>

<body>

	<?php  include("header.php")   ?>


	<div >
	<!--*****************************************************************************************************************************************************************************-->
        
        
        
        
         
        
        
        
	   <?php
        
        $Food = "SELECT * FROM food";
       
        $food = mysqli_query($conn,$Food);
        
        
        
        
        
        while ($list = mysqli_fetch_assoc($food))
            {   
                $Fo_id = $list["Fo_id"];
                $PrHeaderText = $list["Fo_name"];
                ?>
        <div class="text-center container-fluid PrHeader">
            <h3 class="PrHeaderText"><?php  echo($PrHeaderText);   ?></h3>
        </div>
        
        <div>
            <center>
            
           
        
                <ul class="list ">
            
<!---------------------------------------------------------------------------------------------------------------------------------     start template      -------------->
                     <?php

                                            
                            $Contain = "SELECT * FROM contain";
                            $contain = mysqli_query($conn,$Contain);


                                                          while($template = mysqli_fetch_assoc($contain))  

                                                        {

                                                             if($Fo_id == $template["Fo_id"])
                                                            {
                                                                $Co_name = $template["Co_name"];
                                                                $Unit_price = $template["Unit_price"];
                                                                $Co_img = $template["Co_img"];
                                                                $Co_id = $template["Co_id"];
                                                                



                                                                ?>
                        

                                                                    <li class="templete">
                                                                    <center>


                                                                    <div class="d1 row">

                                                                        <div class="text-center ">
                                                                            <h4 class="Pname" >  <?php   echo($Co_name) ;   ?> </h4>   
                                                                        </div>


                                                                        <div>
                                                                                 
                                                                            <?php    
                                                                 
                                                                 //   <img src = "images/pro1.png"
                                                                            
                                                                                    echo( '<img src = "data:image ; base64,'.base64_encode($Co_img).'"  alt = "img" class = "img">')
                                                                            
                                                                            ?>

                                                                        </div>


                                                                        <div class="row">                                
                                                                            <div class="text-center col-xs-6">

                                                                                <strong class="PrName"> Price  </strong>

                                                                                <abbr title="price is decreass for larg value of orders"><h4 class="PrValue">Rs:-<?php echo($Unit_price);    ?></h4></abbr>



                                                                            </div>
                                                                
                                                                            <div class="text-center col-xs-6 butn">
                                                                                 <a href="order.php?Co_id=<?php    echo($Co_id);    ?>" class="btn btn-info btn-lg ">ORDER</a>
                                                                            </div>

                                                                        </div>
                                                                        





                                                                    </div>


                                                                
                                                                </center>
                                                                </li>    

                                                                <?php


                                                            }

                                                        }



                                        





                              ?>
                     
                
      <!-----------------------------------------------------------------------------------------------------------------------------------     end template     --------->  
       
 
                
                 
                </ul>
            
            
            
             </center>
            
        
        </div>
                
                <?php
            }
        
        
       ?>     
<!--************************************************************************************************************************************************************-->
		
	</div>

		<?php  include("footer.php")  ; ?>
</body>
</html>

