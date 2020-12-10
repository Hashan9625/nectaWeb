<?php
session_start();

include("conn.php");

?>


<?php



$home = "";
$products = "";
$shopping = "active";
$about = "";
$delive = "";
$contact = "";


?>






<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Shopping Cart</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">

    
</head>
     
<body>

    
    <script>
    
        var total = 0;
    
    </script>
    
    <?php    include("header.php");   ?>
    
  
    
    
   
    
       
    
<?php

    if(isset($_SESSION['id']))
    {
        ?>
    
        
    <div class="">
        <center>
        
        <div class="fullContain">
            
           <div class="shorH">
                <h2 class="shorT">Shopping Cart</h2>
           </div>
            
          
            <div class="orL3">
                <lu class="cartLu">
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
<?php
                    
    $sql = "SELECT * FROM `order` WHERE `C_id`=$_SESSION[id] AND `Or_type`='Cart'";
    $table = mysqli_query($conn,$sql);
                    
    while($column=mysqli_fetch_assoc($table))
    {
        
        $oId = $column['O_id'];
        $orQuan = $column['Or_quantity'];
        $delOption = $column['Del_option'];
        $productId = $column['P_id'];
        $prName;
        $prSize;
        $prPrice;
        
        $sql1 = "SELECT * FROM `product` WHERE `P_id`=$productId";
        $table1 = mysqli_query($conn,$sql1);
        
        while($clumn1 = mysqli_fetch_assoc($table1))
        {
            $prSize = $clumn1['Pr_size'];
            $prPrice = $clumn1['Price'];
            $coId = $clumn1['Co_id'];
            
            $sql2 = "SELECT * FROM `contain` WHERE `Co_id`=$coId";
            $table2 = mysqli_query($conn,$sql2);
                
            while($column2 = mysqli_fetch_assoc($table2))
            {
                $prName = $column2['Co_name'];
                $prImg = $column2['Co_img'];
                
                
                
                
                ?>
                    
                    
                    
                    
                    <li class="cartLi">
                    
                              <div class="shorL3It">
                                    <div class="orL3H">
                                      <div class="row">
                                          
                                          <div class="orL3CheckB col-xs-2">
                                            <input type="checkbox" form="buyNow" class="orL3Check" value="<?php   echo($oId);  ?>" name="click[]" onClick="c<?php  echo($oId);  ?>()">  
                                          </div>
                                          
                                          <div class="col-xs-7">
                                            <strong class="orL3T"><?php   echo($prName);    ?></strong>
                                          </div>
                                          
                                          <div class="col-xs-3">
                                            <a class="delBtn" href=shoppingCart.php?delId=<?php   echo($oId);  ?>><span class="orL3i2TdeletType glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                          </div>                                    
                                        
                                        
                                      </div>
                                                                               
                                        <hr>
                                    </div>

                                    <div class="row">

                                            <div class="col-xs-4">

                                       <?php         echo( '<img src = "data:image ; base64,'.base64_encode($prImg).'"  alt = "img" class = "orCImg">')  ?><!-- <img src="images/orange.png" alt="no ime" class="orCImg">-->

                                            </div>

                                            <div class="col-xs-5 orL3i1B">
                                                <p class="orL3i1T">Subtotal :- <?php    echo($orQuan);    ?> * <?php    echo($prPrice);    ?>/= </p>
                                                <hr>
                                                <p class="orL3i1T">Quantity</p>
                                                <hr>
                                                <p class="orL3i1T">Size</p>
                                                <hr>
                                                <p class="orL3i1T">Delivery type</p>


                                            </div>

                                            <div class="col-xs-3 orL3i1B" >
                                                 <p class="orL3i2T">Rs:- <?php    echo($orQuan*$prPrice);    ?> /=</p>
                                                <hr>
                                                <p class="orL3i2T">--  <?php    echo($orQuan);    ?>  --</p> 
                                                <hr>
                                                <p class="orL3i2T"> <?php    echo($prSize);   ?>ml  </p>
                                                 <hr>
                                                <p class="orL3i2TdelType"> <?php
                                                                                                                    switch($delOption)
                                                                                                                        {
                                                                                                                            case "Factory" :
                                                                                                                                echo('<abbr title="You can Come and buy our products from factory"><span class="glyphicon glyphicon glyphicon-map-marker" aria-hidden="true"></span></abbr>');
                                                                                                                                break;
                                                                                                                            case "Home" :
                                                                                                                                echo(' <abbr title="You can pay , Order our products online and then we deliver it to your location."><span class="glfDel glyphicon glyphicon-credit-card" aria-hidden="true"></span></abbr>');
                                                                                                                                break;
                                                                                                                            case "Delivers" :
                                                                                                                                echo('<abbr title="You can pay on delivery"><span class="glfDel glyphicon glyphicon-usd" aria-hidden="true"></span></abbr>');
                                                                                                                                break;
                                                                                                                        }
                                                    
                                                    
                                                    
                                                    
                                                    
                                                                                                                        ?></p>
                                            </div>




                                    </div>
                              </div>
                    
                    
                    
                    </li>
                    
                    
                    <script>
                        
                        var click<?php   echo($oId);  ?> = 0;
                        
                        function c<?php   echo($oId);  ?>()
                        {
                            if(click<?php echo($oId);  ?> == 0)
                                {
                                    total = total + <?php    echo($orQuan*$prPrice);    ?>;
                                    document.getElementById('total').innerHTML = "Rs:-" + total +" /=";
                                    document.getElementById('grand').innerHTML = "Rs:-" + total +" /=";
                                    click<?php   echo($oId);  ?> = 1;
                                    document.getElementById('summary<?php   echo($oId);     ?>').style.display = 'block';
                                }
                            else
                                {
                                    total = total - <?php    echo($orQuan*$prPrice);    ?>;
                                    document.getElementById('total').innerHTML = "Rs:-" + total +" /=";
                                    document.getElementById('grand').innerHTML = "Rs:-" + total +" /=";
                                    click<?php   echo($oId);  ?> = 0;
                                    document.getElementById('summary<?php   echo($oId);     ?>').style.display = 'none';
                                 
                                }
                        }
                    
                    
                    </script>
                    
                    
                    
                    
                    
                <?php
                
                
                
                
                
                
                
            }
        }
        
        
    }
                    
         
                    
        
                    
                    
    ?>
                    
               
                
                
                
                
                
                
                
                
                </lu>
                
      
               
 
            
            
            </div>
            
            <div class="orL4">
                <div class="row">
                    <div class="col-sm-5">
                      <p class="orL4i1T">Grand total</p>
                        <p class="orL4i2T" id="total">Rs:- 000 /= </p>  
                    </div>
                    
                    
                    <div class="col-sm-4">
                        
                        
                            <table class="delTab table">
                                <caption class="delCaption"><strong>Delivery type</strong></caption>
                                
                                <tbody>
                                
                                   <tr>
                                        <td>
                                            <input type="radio" form="buyNow" name="delType" value="Factory" class="delRadio" onClick="document.getElementById('pay').style.display = 'none'">
                                            <abbr title="You can Come and buy our products from factory"><span class="glfDel glyphicon glyphicon-map-marker" aria-hidden="true"></span></abbr>
                                       </td>
                                       
                                        <td>
                                            <input type="radio" form="buyNow" name="delType" value="Home" class="delRadio" onClick="document.getElementById('pay').style.display = 'block'"> 
                                            <abbr title="You can pay , Order our products online and then we deliver it to your location."><span class="glfDel glyphicon glyphicon-credit-card" aria-hidden="true"></span></abbr> 
                                       </td>
                                       
                                        <td>
                                            <input type="radio" form="buyNow" name="delType" value="Delivers" class="delRadio" onClick="document.getElementById('pay').style.display = 'none'">
                                            <abbr title="You can pay on delivery"><span class="glfDel glyphicon glyphicon-usd" aria-hidden="true"></span></abbr>
                                       </td>
                                    </tr>
                                
                                
                                </tbody>
                             </table>  
                        
                        
                    </div>
                    
                    
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="button" onClick="if(total == 0){window.alert('Please select item');}else{document.getElementById('sAlt2').style.display = 'block';} " class="orL4iBtn btn btn-lg btn-success" name="buyNow" value="BUY NOW">
                            </div>
                                                        
                        </div>
                      
                    </div>
                
                </div>
            
            
            </div>
            
            
        
        </div>
        </center>
    </div>
        

    
        <?php
    }
    else
    {
        ?>
    
        <script>
    
            document.getElementById('log').style.display = "block";
    
        </script>
    
    
    
        <?php
    }
    
    
    
    
    
    
    
    
    
?>    
     
    

    
    
    
    
    
    
    
        


    <?php      include("footer.php");  
                include("shopConf.php");            
    ?>
        

 
</body>
 
    <link href="css/shoppingCart.css" rel="stylesheet" type="text/css">
    
</html>




<?php



            if(isset($_GET['delId']))
            {
                $del_sql = "DELETE FROM `order` WHERE `O_id` = '$_GET[delId]'";
                
                if(mysqli_query($conn,$del_sql))
                {
                    
                    ?>
                            <script>
                                        window.location = "shoppingCart.php";
                            </script>

                        <?php
                }
            }





?>
