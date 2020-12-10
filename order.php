<?php
session_start();
include('conn.php');


?>

<?php


    if(isset($_GET["Co_id"]))
    {
        $Co_id = $_GET["Co_id"];
    }


?>


<?php



$home = "";
$products = "";
$shopping = "";
$about = "";
$delive = "";
$contact = '';

//session_start();


?>






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>order</title>
    
    
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">    
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/order.css" rel="stylesheet" type="text/css">





</head>

<body class="p-5">

	<?php   include("header.php");   ?>
    

    
    
    
    
    	
	
            <div class="row startForm">
<!--                ********************************************************************************************                start form                   -->
                  
                    <div class="col-lg-9">

                        <div class="row">


                            <div class="col-sm-7 imgGrup">

                              <div id="carousel2" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                    
                                    <li data-target="#carousel2" data-slide-to="0" class="active"></li>
                
                                      
                <?php    
                                      /*-------------------------------------------------------                   php for    CAROUSEL            */
                        $Product = "SELECT * FROM product";
                        $product = mysqli_query($conn,$Product);
                        $i = 0 ;        
                        while($b3 = mysqli_fetch_assoc($product))
                        {
                            if($Co_id == $b3["Co_id"])
                            {
                                $i++;
                                ?>
                                      
                                    <li data-target="#carousel2" data-slide-to="<?php   echo($i);    ?>"></li>            
                                                                 
                                <?php
                                
                            }
                        }
                                      
                                      
                            
                                  
                                  
                   ?>                        
                                  
                                  </ol>
                                      
                                  <div class="carousel-inner" role="listbox">
                                    <div class="item active"><img src="images/factory.jpg" alt="First slide image" class="caroImg center-block">
                                      <div class="carousel-caption">
                                        <h3>NECTA FACTORY</h3>
                                        <p>Health care products</p>
                                      </div>
                                    </div>
                                      
                                      
                                      
                                      
                                      
                <?php                      
                        $Product = "SELECT * FROM product";
                        $product = mysqli_query($conn,$Product);
                        $i = 0 ;        
                        while($b3 = mysqli_fetch_assoc($product))
                        {
                            if($Co_id == $b3["Co_id"])
                            {
                                $prSize = $b3["Pr_size"];
                                $prPrice = $b3["Price"];
                                $prImg = $b3["Pr_img"];
                                
                                
                                ?>     
                                    <div class="item"> <?php   echo('<img src = "data:image;base64,'.base64_encode($prImg).'" alt="No image" class="caroImg center-block img-rounded img-responsive"');     ?> 
<!--.-->
                                      <div class="carousel-caption">
                                        <h3>Rs:-<?php    echo($prPrice);   ?>/=</h3>
                                        <p><?php    echo($prSize);    ?> ml</p>
                                      </div>
                                    </div>                            
                                <?php
                                
                            }
                        }
                                      
                                      
                            
                                  
                                  
                   ?>               
                                         
                                   
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
   
                                  </div>
                                  <a class="left carousel-control" href="#carousel2" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel2" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                                
                                </div>
                            </div>

<?php
                          
                                $Contain = "SELECT * FROM contain";
                                $contain = mysqli_query($conn,$Contain);


                                                          while($template = mysqli_fetch_assoc($contain))  

                                                        {

                                                             if($Co_id == $template["Co_id"])
                                                            {
                                                                $Co_name = $template["Co_name"];
                                                                $Unit_price = $template["Unit_price"];
                                                                $ingredeant = $template["Ingredeant"];
                                                                $coImg = $template["Co_img"];
                                                                
                                                             }
                                                              
                                                              
                                                          }

                            
                            
?>                            
                            
                            
                            
                            <div class="col-sm-5 layout2">


                              <div class="b1">

                                    <h2 class="b1Text"><?php  echo($Co_name);  ?></h2>


                                </div>


                              <div class="b2">
                                    <hr>
                                <h2 id="price">Rs:- <?php  echo($Unit_price); ?></h2>    
                                    <hr>

                                </div>


                              <div class="b3 row" id="size">



                                  <div class="col-xs-5 sizeBorder" >  
                                        <span class="sizeText">Size</span>  
                                    </div> 

                                  <div class="col-xs-7 radioList">   

                                           <table width="100%">
                                              
                                               
    
                                               
                                               
                <?php   
                        /*-----------------------------------------------------------------------------------                php for SIZE              */
                        
                        $Product = "SELECT * FROM product";
                        $product = mysqli_query($conn,$Product);
                        $j = 0 ;
                        ?>    <script>   var pri </script>                          <?php
                        while($b3 = mysqli_fetch_assoc($product))
                        {
                            if($Co_id == $b3["Co_id"])
                            {   $j++;
                                $pId = $b3["P_id"];
                                $prSize = $b3["Pr_size"];
                                $prPrice = $b3["Price"];
                                $prQun = $b3['Pr_quntity'];
                                                              
                                ?>     
                                    
                                             <tr>
                                                <td><label>
                                                  <input type="radio" name="P_id" onClick="b<?php echo($pId);  ?>()" value="<?php echo($pId);  ?>" required form="buyNow" id="id4" <?php  if($prQun == 0){echo('disabled');}   ?> >
                                                  <?php  echo($prSize);   ?>ml</label></td>
                                              </tr>
                                               
                                               <script>
                                                   function b<?php echo($pId);  ?>(){
                                                       document.getElementById('price').innerHTML='Rs:- <?php echo($prPrice);  ?>/=  <?php echo($prSize); ?>ml';
                                                       document.getElementById('siz').innerHTML=' <?php echo($prSize); ?>ml';
                                                       
                                                       pri = <?php echo($prPrice);  ?>;
                                                       
                                                       document.getElementById("id5").max=<?php   echo($prQun);  ?>;
                                                       
                                                       
                                                   }
                                               </script>
                                               
                                               
                                <?php
                                
                            }
                            
                            if($j == 0)         /* ---------------------------------------------------------------              hide SIZE                      */
                            {
                                ?>
                                               
                                    <script> document.getElementById("size").style.display = "none";</script>               
                                               
                                <?php
                            }else
                            {
                               
                                ?>
                                               
                                    <script> document.getElementById("size").style.display = "block";</script>               
                                               
                                <?php
 
                            }
                        }
                                      
                                      
                            
                                  
                                  
                   ?>               
                                               
                                               
                                               
                                               
                                            
                                            </table>  

                                    </div>


                                </div>


                              <div class="b4">
                                  

                                      <span class="qunText">Quantity</span>
                                        <input type="number" class="form-control" name="orQuantity" min="1" id="id5" form="buyNow" required>

                                </div>



                              <div class="b5 ">
                                    <center>
                                      
                                             <div class="btn-group btnGroup " role="group">
                                              
                                              
                                                  
                                                  <button type="button"  class="buyBtn" onClick="<?php 
                                                                                                 
                                                                                                 if(isset($_SESSION[ 'USER' ]))
                                                                                                 {
                                                                                                     
                                                                                                     if ( ( $_SESSION[ 'USER' ] ) != "customer/*-A5+" )
                                                                                                     { 
                                                                                                         echo("window.alert('You must LOG in customer account')"); 
                                                                                                     } 
                                                                                                     else
                                                                                                     { 
                                                                                                         echo('buy()');
                                                                                                     }                                                                                                      
                                                                                                 }
                                                                                                 else
                                                                                                {
                                                                                                     echo('buy()');
                                                                                                     
                                                                                                 }

                                                                                                 
                                                                                                 ?>">Buy Now</button>
                                                  <button type="submit" class="cartBtn" form="buyNow" name="cart">Add To Cart</button>
                                                  
                                               
                                              

                                             </div>

                                          
                                    </center>
                                    
                                </div>


                            </div>



                        </div>    


                    </div>


              <div class="col-lg-3 layout3">

                      <table class="col-xs-12 table" id="id7">
                            <caption class="delText"><h3>Delivery Option</h3></caption>


                            <tr> 

                                <td><input type="radio" name="delOption" value="Factory" id="id6" onClick="document.getElementById('pay').style.display = 'none'" form="buyNow"  required/></td>

                                <td><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></td>

                                <td>


                                    <abbr title="You can Come and buy our products from here">No.570,Bulankulama,Disa Mw,Stage ii ,Anuradhapura,Sri lanka.</abbr>
                                    
                                    <abbr title="Insert the date you can come">  

                                    <input type="date" class="form-control" form="buyNow" name="comeDate">

                                 </abbr> 
                                </td>


                        </tr>

                          <tr style="display: none;">
                                <td><input type="radio" name="delOption" value="Home" onClick="document.getElementById('pay').style.display = 'block'" form="buyNow" id=""/></td>

                                <td><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span></td>

                                <td><abbr title="You can pay , Order our products online and then we deliver it to your location.">Delivery to your location</abbr></td>
                          </tr>


                          <tr>
                                <td><input type="radio" name="delOption" value="Delivers" onClick="document.getElementById('pay').style.display = 'none'" form="buyNow" id="RadioGroup2_3" form="cart"/></td>

                                <td><span class="glyphicon glyphicon-usd" aria-hidden="true"></span></td>

                                <td><abbr title="You can pay on delivery">Cash on delivery available</abbr></td>
                          </tr>


                      </table>


                        <div>

                          <h3 class="hIng">Ingredients</h3>

                          <p class="ing"><?php   echo($ingredeant);   ?></p>


                        </div>

                        <div class="feed">


                            <table class="table">
                                <caption><h3 class="hFeed">Feedback</h3></caption>
                                
                                
                                
                                
                                
                                <?php
                                
                                $sqlFe = "SELECT * FROM `feedback` AS f
                                            LEFT JOIN `customer` AS cu ON f.C_id=cu.C_id
                                            WHERE f.Co_id=$Co_id;";
                                
                                $tableFe = mysqli_query($conn,$sqlFe);
                                
                                while($columnFe = mysqli_fetch_assoc($tableFe))
                                {
                                    $cuNameFe = $columnFe['Cu_name'];
                                    $cuPhotoFe = $columnFe['Photo'];
                                    $ReviewFe = $columnFe['Review'];
                                    $dateFe = $columnFe['Fe_date'];
                                    
                                    ?>
                                
                                <tr>

                                    <td rowspan="2">

                                        <?php
                                    if(isset($cuPhotoFe))
                                    {
                                        echo('<img src = "data:image;base64,'.base64_encode($cuPhotoFe).'"  alt="custmor" class="cuImg" >');
                                    }
                                    else
                                    {
                                        echo(' <img class="cuImg" alt="custmor" src="images/user.png"  >');
                                    }
                                      ?>
                                          

                                    </td>

                                    <td>

                                        <span class="cuName"><?php echo($cuNameFe); ?> </span>
                                        <br/>
                                        <span class="fDate">  <?php echo($dateFe); ?></span>


                                    </td>




                                </tr>


                                 <tr>


                                     <td>

                                         <p><?php echo($ReviewFe); ?></p>

                                     </td>



                                </tr>

                                
                                
                                    <?php
                                }

                                
                                
                                ?>
                                
                                
                                


                            </table>



                        </div>



                    </div>

                    
                  </div>

    
    
    
    
<!--                                                                                    function  BUY   -->
    <?php
        if(isset($_SESSION['id']))
        {
            ?>   <script>   var id = 1;    </script>   <?php
        }
        else
        {
             ?>   <script>   var id = 0;    </script>   <?php
        }
    
    ?>  
    
    
    
    
    
    
    
    <!--                                                                                  function  BUY -->
<script>
    function buy() {
        
            var inpObj4 = document.getElementById("id4");
            var inpObj5 = document.getElementById("id5");
            var inpObj6 = document.getElementById("id6");
            
            if (!inpObj4.checkValidity()) 
            {
                document.getElementById("size").style.backgroundColor = "red";
                window.location = "#size";
            } 
            else 
            {

                if (!inpObj5.checkValidity()) 
                {
                    document.getElementById("id5").style.backgroundColor = "red";
                    window.location = "#id5";
                } 
                else 
                {

                    if (!inpObj6.checkValidity()) 
                    {
                        document.getElementById("id7").style.backgroundColor = "red"; 
                        window.location = "#id7";
                    } 
                    else 
                    {
                        if(id)
                            {

                                document.getElementById('bAlt2').style.display = 'block';
                            

                            }
                        else
                            {
                                document.getElementById('bAlt1').style.display = "block";
                            
                            }
                   } 
                    
                } 

            } 

       
            var x = document.getElementById("id5").value;
            document.getElementById("qun").innerHTML = x;
        
        
            document.getElementById('Subtot').innerHTML = "Subtotal :-  " + x  + " * " + pri +"/=" ;
            document.getElementById("subtot").innerHTML ="Rs:-  " + pri * x ;
            document.getElementById("grand").innerHTML ="Rs:-  " + pri * x ;

        
        
        
        
    
    } 
</script>

    
    
	<?php  
            include("footer.php"); 
            include("bAlt1.php");
            include("orderConf.php");
            include("guestF.php");
    ?>
    
    
     
 
    
    
    
</body>
    

 
 
    
</html>


<?php



if(isset($_POST['cart']))
{
    if($_SESSION['USER'])
    {
        
        if ($_SESSION['USER'] != 'customer/*-A5+')
        { 
            echo("<script>"."window.alert('You must LOG in customer account')"."</script>"); 
        } 
        else
        {

            $cId =  mysqli_real_escape_string($conn,strip_tags($_SESSION['id']));
            $P_id = mysqli_real_escape_string($conn,strip_tags($_POST['P_id']));
            $orQuantity = mysqli_real_escape_string($conn,strip_tags($_POST['orQuantity']));
            $delOption = mysqli_real_escape_string($conn,strip_tags($_POST['delOption']));
            $orType =  "Cart";

            if($_POST['comeDate'])
            {
                $comeDate = mysqli_real_escape_string($conn,strip_tags($_POST['comeDate']));
            }
            else
            {
                $comeDate = "not add";
            }

            $insert_sql = "INSERT INTO `order` (C_id,P_id,Or_quantity,Del_option,Or_type,Come_date) VALUES('$cId','$P_id','$orQuantity','$delOption','$orType','$comeDate')";

            if(mysqli_query($conn,$insert_sql))
            {
                ?>  <script>   
                        window.alert("It's add to cart");
                        window.location = "order.php?Co_id=<?php   echo($Co_id);   ?>";   
                    </script>  
                <?php

            }
            else
            {
                echo($insert_sql);
            }            
        
        }
        

    }
    else
    {
        
        
        ?><script>   
                
                document.getElementById('log').style.display = 'block';
                document.getElementById('comment').innerHTML = 'You must be LOGING before selecting Shopping cart';
            
          </script><?php
    }
}




?>




