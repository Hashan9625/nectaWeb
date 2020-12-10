<?php
session_start();
include('conn.php');

$home = "";
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
<title>Delever</title>
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/deleverAcco.css" rel="stylesheet" type="text/css">
</head>

<body>
      
    <?php   include("header.php");    ?>
    
    
    
    <?php

    if ( (isset( $_SESSION[ 'USER' ] ) ) && ($_SESSION['USER']=="deli8/*)") ) 
    {
        
        
        
        $dId = $_SESSION['id'];
        
        
        $sqlDe = "SELECT * FROM `delever` WHERE `D_id`=$dId";
        $tableDe = mysqli_query($conn,$sqlDe);
        
        if($columnCu = mysqli_fetch_assoc($tableDe))
        {
            $deName = $columnCu['De_name'];
            $deEmail = $columnCu['De_email'];
            $dePassword = $columnCu['De_password'];
            $deNumber1 = $columnCu['De_contact_number1'];
            $deNumber2 = $columnCu['De_contact_number2'];
            $dePhoto = $columnCu['De_photo'];
            $deArea = $columnCu['Area'];
            $dePrice = $columnCu['Delever_price'];
            
            
        }
        else
        {
            echo($sqlDe);
        }
        
  



        if ( $_SESSION[ "USER" ] == "deli8/*)" )
        {
        
    

           ?>


           <div class="row2">
                        <div class="row row21">
                            <div class="row2B">



                                    <div class="col-lg-2 accountcol21">
                                        <center>

                                            <?php    echo('<img src = "data:image;base64,'.base64_encode($dePhoto).'" alt = "no img" class="orCuImg">')   ?>
<!--                                            <img src="images/vijitha-rohana-wijemuni_650x400_81486003524.jpg" alt="no ime" class="orCuImg">                   -->

                                        </center>

                                    </div>
                                    <div class="col-lg-8 accountcol2">
                                    <p class="accountp1">
                                        <?php

                                              echo($deName); 

                                        ?> - deliver

                                    </p>
                                    </div>
                                    <div class="col-lg-2 accountncol">
                                        <center>
                                             <form method="post">
                                                  <input type="submit" name="logout" value="LOG OUT" class="newbut btn btn-danger btn-lg">
                                             </form>                   
                                        </center>

                                    </div>



                            </div>


                        </div>
            </div>




            <div class="Hl">
                <center>

                    <div class="">

                        <div class="orH">
                            <h2 class="orT">Orders for deliver</h2>
                        </div>


                        <div class="orL3">
                            <lu class="cartLu">










                                <?php

                                $sql = "SELECT * FROM `order` AS o 
                        LEFT JOIN `product` AS p ON o.P_id=p.P_id 
                        LEFT JOIN `contain` AS c ON p.Co_id=c.Co_id
                        LEFT JOIN `customer` AS cu ON o.C_id=cu.C_id
                        WHERE `Or_type`='Buy' AND `Confirm`='Confirm' AND `Deliver_confirm`='notNow' AND `D_id`='$dId'";



                                $table = mysqli_query( $conn, $sql );

                                while ( $column = mysqli_fetch_assoc( $table ) ) {

                                    $oId = $column[ 'O_id' ];
                                    $orQuan = $column[ 'Or_quantity' ];
                                    $delOption = $column[ 'Del_option' ];
                                    $productId = $column[ 'P_id' ];
                                    $prSize = $column[ 'Pr_size' ];
                                    $prPrice = $column[ 'Price' ];
                                    $coId = $column[ 'Co_id' ];
                                    $prName = $column[ 'Co_name' ];
                                    $prImg = $column[ 'Co_img' ];
                                    $comeDate = $column[ 'Come_date' ];

                                    $cuId = $column[ 'C_id' ];
                                    $cuName = $column[ 'Cu_name' ];
                                    $cuEmail = $column[ 'Cu_email' ];
                                    $address = $column[ 'Address' ];
                                    $cuCoNumber = $column[ 'Cu_contact_number' ];
                                    $cuPhoto = $column[ 'Photo' ];
                                    $cuCity = $column[ 'City' ];
                                    $cuProvince = $column[ 'Province' ];
                                    $cuZipCode = $column[ 'Zip_code' ];





                                    ?>




                                <li class="cartLi">

                                    <div class="shorL3It">
                                        <div class="orL3H">
                                            <div class="row">

                                                <div class="orL3CheckB col-xs-2">
                                                    <input type="checkbox" form="allCon" class="orL3Check" value="<?php   echo($oId);  ?>" name="click[]">
                                                </div>

                                                <div class="col-xs-10">
                                                    <strong class="orL3T">
                                                        <?php   echo($prName);    ?>
                                                    </strong>
                                                </div>



                                            </div>

                                            <hr>
                                        </div>

                                        <div class="row">

                                            <div class="col-xs-4">

                                                <?php         echo( '<img src = "data:image ; base64,'.base64_encode($prImg).'"  alt = "img" class = "orCImg">')  ?>
                                                <!-- <img src="images/orange.png" alt="no ime" class="orCImg">-->

                                            </div>

                                            <div class="col-xs-5 orL3i1B">
                                                <p class="orL3i1T">Subtotal:-  
                                                    <?php    echo($orQuan);    ?>*<?php    echo($prPrice);    ?>/=</p>
                                                <hr>
                                                <p class="orL3i1T">Quantity</p>
                                                <hr>
                                                <p class="orL3i1T">Size</p>
                                                <hr>
                                                <p class="orL3i1T">Delivery type</p>


                                            </div>

                                            <div class="col-xs-3 orL3i1B">
                                                <p class="orL3i2T">Rs:-
                                                    <?php    echo($orQuan*$prPrice);    ?>/=</p>
                                                <hr>
                                                <p class="orL3i2T">--
                                                    <?php    echo($orQuan);    ?> --</p>
                                                <hr>
                                                <p class="orL3i2T">
                                                    <?php    echo($prSize);   ?>ml </p>
                                                <hr>
                                                <p class="orL3i2TdelType">
                                                    <?php
                                                    switch ( $delOption ) {
                                                        case "Factory":
                                                            echo( '<abbr title="Customer buy our products from factory"><span class="glyphicon glyphicon glyphicon-map-marker" aria-hidden="true"></span></abbr>' );
                                                            break;
                                                        case "Home":
                                                            echo( ' <abbr title=" Customer pay online."><span class="glfDel glyphicon glyphicon-credit-card" aria-hidden="true"></span></abbr>' );
                                                            break;
                                                        case "Delivers":
                                                            echo( '<abbr title="Customer pay on delivery"><span class="glfDel glyphicon glyphicon-usd" aria-hidden="true"></span></abbr>' );
                                                            break;
                                                    }





                                                    ?>
                                                </p>
                                            </div>




                                        </div>



                                        <!--                                                                        NEW add                 -->


                                        <div>
                                            <hr>
    
        <!--                                    <hr>-->

                                     <div class="row">
                                         <form method="post">
                                         
                                                <div class="col-xs-4">
                                                    <input type="submit" name="confirm" value="Confirm" class="btn btn-success btn-lg">
                                                </div>

                                                <div class="col-xs-2">

                                                    <input type="submit" name="confirm" value="Send" class="btn btn-primary btn-lg">
                                                </div>

                                                <div class="col-xs-6">
                                                    <textarea class="form-control" placeholder="message for customer" name="cMessage"></textarea>
                                                </div>

                                                <input type="hidden" name="oId" value="<?php echo($oId);  ?>">
                                                <input type="hidden" name="cId" value="<?php  echo($cuId);  ?>">

                                         
                                         
                                         
                                         
                                         </form>

 
                                            

                                      </div>
                                            <hr>

                                            <?php

                                            $sqlM = "SELECT * FROM `c_message` WHERE `c_message`.`O_id`=$oId AND `c_message`.`To`='admin'";
                                            $tableM = mysqli_query( $conn, $sqlM );

                                            if ( mysqli_fetch_assoc( $tableM ) ) {

                                                ?>



                                            <div>

                                                <h4>customer message</h4>
                                                <ul class="cMegList">
                                                    <?php

                                                    $tableM = mysqli_query( $conn, $sqlM );

                                                    while ( $columnM1 = mysqli_fetch_assoc( $tableM ) ) {
                                                        $message = $columnM1[ 'Text' ];

                                                        ?>

                                                    <li>
                                                        <?php echo($message);  ?>
                                                    </li>

                                                    <?php

                                                    }



                                                    ?>


                                                </ul>
                                                <hr>
                                            </div>

                                            <?php


                                            }


                                            ?>
                                            <div>
                                                <table class="table">
                                                    <caption>

                                                        <strong class="cuH">Customer detail  </strong>

                                                        <?php
                                                        if ( $cuPhoto )
                                                        {
                                                            echo( '<img src = "data:image ; base64,' . base64_encode( $cuPhoto ) . '"  alt = "img" class = "cuImg">' );
                                                        } else {
                                                            ?> <img src="images/user.png" class="cuImg" alt="img">
                                                        <?php
                                                        }




                                                        ?>








                                                    </caption>
                                                    <tbody>

                                                        <?php
                                                        if ( $cuName ) {
                                                            ?>

                                                        <tr>
                                                            <td>Name</td>
                                                            <td>
                                                                <?php echo($cuName);  ?>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                        }



                                                        ?>


                                                        <?php
                                                        if ( $cuEmail ) {
                                                            ?>


                                                        <tr>
                                                            <td>Email</td>
                                                            <td>
                                                                <?php echo($cuEmail);  ?>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                        }



                                                        ?>


                                                        <?php
                                                        if ( $cuCoNumber ) {
                                                            ?>

                                                        <tr>
                                                            <td>Contact number</td>
                                                            <td>
                                                                <?php echo($cuCoNumber);  ?>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                        }



                                                        ?>


                                                        <?php
                                                        if ( $address ) {
                                                            ?>

                                                        <tr>
                                                            <td>Address</td>
                                                            <td>
                                                                <?php echo($address);  ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        }



                                                        ?>


                                                        <?php
                                                        if ( $cuCity ) {
                                                            ?>

                                                        <tr>
                                                            <td>City</td>
                                                            <td>
                                                                <?php echo($cuCity);  ?>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                        }



                                                        ?>


                                                        <?php
                                                        if ( $cuProvince ) {
                                                            ?>


                                                        <tr>
                                                            <td>Province</td>
                                                            <td>
                                                                <?php echo($cuProvince);  ?>
                                                            </td>
                                                        </tr>


                                                        <?php
                                                        }



                                                        ?>


                                                        <?php
                                                        if ( $cuZipCode ) {
                                                            ?>

                                                        <tr>
                                                            <td>Zip code</td>
                                                            <td>
                                                                <?php echo($cuZipCode);  ?>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                        }



                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                  </div>







                      </div>



                                </li>




                                <?php








                                }






                                ?>










                            </lu>






          </div>


                    </div>
                </center>
    
    
                    <div class="orL4">
                  <form method="post" id="allCon">

                        <div class="row">


                            <div class="col-sm-4">
                                <center>
                                    <input type="submit" name="confirmAll" class="orBtn btn btn-success btn-lg" value="Confirm all of selected">
                                </center>
                                
                            </div>



                            <div class="col-sm-8">

                                <textarea name="allM" class="form-control" placeholder="Message for customer"></textarea>


                            </div>


                        </div>

                  </form>

                </div>


    
    
            </div>







              <!--                                                    Customer edit form-->        
            <br><hr><br><hr><br>

            <div class="orL4">
            <form method="post" enctype="multipart/form-data">
                
                <div class="">
                    <div class="accountcol9">
                        <div class="row41">
                    <!--        <div class="col-sm-6">-->
                                <div class="row">
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1TE">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    Name:
                                    <input type="text" class="form-control" name="De_name" value="<?php echo($deName); ?>" placeholder="Enter your first and last name" required> 
                                    </p>
                                    </div>
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1TE">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                    Email:
                                    <input type="email" class="form-control" name="De_email" value="<?php   echo($deEmail);  ?>" placeholder="Please enter your Email" required>
                                    </p>
                                    </div>
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1TE">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                    Password:
                                    <input type="password" class="form-control" name="De_password"  value="<?php   echo($dePassword);  ?>" placeholder="Minium 6 characters" minlength="6" maxlength="20" required>
                                    </p>
                                    </div>
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1TE">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                    Deliver price:
                                    <input type="number" class="form-control" name="Delever_price"  value="<?php   echo($dePrice);  ?>" placeholder="Enter your price of 1 kilometre" required>
                                    </p>
                                    </div>



                                </div>
                    <!--        </div>-->

                    <!--        <div class="col-sm-6">-->
                                <div class="row">


                                        <div class="col-lg-3 orL3i1B">
                                        <p class="orL3i1TE">
                                        <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
                                        Area:
                                        <input type="text" class="form-control" name="Area"  value="<?php   echo($deArea);  ?>" placeholder="Enter your deliver Area" required>
                                        </p>
                                        </div>

                                        <div class="col-lg-3 orL3i1B">
                                        <p class="orL3i1TE">
                                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                                        Contact Number:
                                        <input type="tel" class="form-control" name="De_contact_number1"  value="<?php   echo($deNumber1);  ?>" pattern="[0-9]{10}" placeholder="Please enter your phone number">
                                        </p>
                                        </div>
                                        <div class="col-lg-3 orL3i1B">			
                                        <p class="orL3i1TE">
                                        <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                                        Contact Number:
                                        <input type="tel" class="form-control" name="De_contact_number2"  value="<?php   echo($deNumber2);  ?>" pattern="[0-9]{10}" placeholder="Please enter your phone number">
                                        </p>
                                        </div>
                                    
                                        <div class="col-lg-3 or">
                                        <p class="orL3i1TE">
                                        <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                        Upload your profile picture:
                                        <input type="file"  name="De_photo" value="Upload your profile picture" class="form-control">                   
                                        </p>
                                        </div>		




                                </div>



                    </div>
                        <div class="new">
                            <center>
                            
                                 <input type="submit" class="btn btn-success btn-lg" name="changeDeDetail" value="Change your details">                            
                            
                            </center>

                        </div>
                    </div>

                </div>
                
            
            </form>
            </div>
            
        <!--                                                /    Customer edit form-->    


            <?php
            
        }
        else
        {
             echo( "<h1>" . "YOU MUST LOG" . "</h1>" );
        }
        
    }
    else 
    {
        echo( "<h1>" . "YOU MUST LOG" . "</h1>" );
        echo('<script>'.'window.location = "index.php?user=deliver";'.'</script>e');
        
       
        ?>
    
    
<!--

        <script>
            document.getElementById( 'log' ).style.display = "block";
        </script>e

-->


        <?php

    }





      ?>

<?php include("footer.php"); ?>
    
</body>
</html>

<?php




if ( isset( $_POST[ 'confirmAll' ] ) )
{
//    $action = $_POST[ 'confirmAll' ];
    $cMessage = $_POST[ 'allM' ];
    //$orderId = $_POST['oId'];
    //$cId = $_POST['cId'];
    $date = date( "Y-m-d" ); //." At ".date("H:i:s");
    

    if(isset($_POST[ 'click' ]))
    {
        $click = $_POST[ 'click' ];
     
        foreach ( $click as $orderId ) {


        $sqlC = "UPDATE `order` SET `deliver_confirm` = 'HandedOver' WHERE `order`.`O_id` = $orderId;";

        if ( mysqli_query( $conn, $sqlC ) )
        {
            if ( $cMessage )
            {

                $sqlFind = "SELECT * FROM `order` WHERE `order`.`O_id`=$orderId";
                $tableFind = mysqli_query( $conn, $sqlFind );

                while ( $columnF = mysqli_fetch_assoc( $tableFind ) ) {
                    $cId = $columnF[ 'C_id' ];

                    $sqlMg = "INSERT INTO `c_message` (`M_id`, `O_id`, `C_id`, `A_id`, `To`, `DateTime`, `Text`) VALUES (NULL, $orderId, $cId, $_SESSION[id],'customer', '$date', '$cMessage');";

                    if ( mysqli_query( $conn, $sqlMg ) ) 
                    {

                    } else {
                        echo( 'Error' . $sqlMg . '<br>' . mysqli_error( $conn ) );
                    }

                }




            }



        }
        else 
        {
            echo( 'Error' . $sqlC . '<br>' . mysqli_error( $conn ) );
        }


    }
   
    ?>
        <script>
            window.alert( 'DONE All' );
            window.location = window.location.href;
        </script>
    <?php


        
    }
    else
    {
        echo("<script>"."window.alert( 'You Not Select' );"."</script>");
    }




}







if ( isset( $_POST[ 'confirm' ] ) ) {
    $action = $_POST[ 'confirm' ];
//    $deleverId = $_POST[ 'deliveryId' ];
    $cMessage = $_POST[ 'cMessage' ];
    $orderId = $_POST[ 'oId' ];
    $cId = $_POST[ 'cId' ];
    $date = date( "Y-m-d" ); //." At ".date("H:i:s");


    if($action == "Confirm")
    {
         $sqlC = "UPDATE `order` SET `deliver_confirm` = 'HandedOver' WHERE `order`.`O_id` = $orderId;";

        if ( mysqli_query( $conn, $sqlC ) ) 
        {
            if ( $cMessage )
            {
                $sqlMg = "INSERT INTO `c_message` (`M_id`, `O_id`, `C_id`, `A_id`, `To`, `DateTime`, `Text`) VALUES (NULL, $orderId, $cId, $_SESSION[id],'customer', '$date', '$cMessage');";

                if ( mysqli_query( $conn, $sqlMg ) ) {} else {
                    echo( 'Error' . $sqlMg . '<br>' . mysqli_error( $conn ) );
                }


            }

            ?>
            <script>
                window.alert( 'DONE' );
                window.location = window.location.href;
            </script>
            <?php

       
        }


    }
    
            
    if($action == "Send")
    {

        if ( $cMessage )
        {
            $sqlMg = "INSERT INTO `c_message` (`M_id`, `O_id`, `C_id`, `A_id`, `To`, `DateTime`, `Text`) VALUES (NULL, $orderId, $cId, $_SESSION[id],'customer', '$date', '$cMessage');";

            if ( mysqli_query( $conn, $sqlMg ) ) 
            {}
            else
            {
                echo( 'Error' . $sqlMg . '<br>' . mysqli_error( $conn ) );
            }

        ?>
        <script>
            window.alert( 'DONE' );
            window.location = window.location.href;
        </script>
        <?php



        }



    }


}





function resizeImage($resorseType,$image_width,$image_hight){
        $resizeWidth = 500;
        $resizeHight = 500;
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHight);
        imagecopyresampled($imageLayer,$resorseType,0,0,0,0,$resizeWidth,$resizeHight,$image_width,$image_hight);
        return $imageLayer;        
}








if(isset($_POST['changeDeDetail']))
{
     $deName = mysqli_real_escape_string($conn,strip_tags($_POST['De_name']));
     $deEmail = mysqli_real_escape_string($conn,strip_tags($_POST['De_email']));
     $dePassword = mysqli_real_escape_string($conn,strip_tags($_POST['De_password']));
     $deNumber1 = mysqli_real_escape_string($conn,strip_tags($_POST['De_contact_number1']));
     $deNumber2 = mysqli_real_escape_string($conn,strip_tags($_POST['De_contact_number2']));
     $dePrice = mysqli_real_escape_string($conn,strip_tags($_POST['Delever_price']));
     $deArea = mysqli_real_escape_string($conn,strip_tags($_POST['Area']));
 
    
    $sqlDeUp = "UPDATE `delever` SET `De_name` = '$deName', `De_email` = '$deEmail', `De_password` = '$dePassword', `Area` = '$deArea', `De_contact_number1` = '$deNumber1', `De_contact_number2` = '$deNumber2', `Delever_price` = '$dePrice' WHERE `delever`.`D_id` = $dId;";
    
    if(mysqli_query($conn,$sqlDeUp))
    {
        if(is_uploaded_file($_FILES['De_photo']['tmp_name']))
        {
            
         
            $fileName = $_FILES['De_photo']['tmp_name'];
            $sourceProperties = getimagesize($fileName);
            $resizeFileName = time();
            $uploadPath = "./uploads/";
            $fileExt = pathinfo($_FILES['De_photo']['name'],PATHINFO_EXTENSION);
            $uploadImageType = $sourceProperties[2];
            $sourceWidth = $sourceProperties[0];
            $sourceHight = $sourceProperties[1];
            $imgData ;
            switch($uploadImageType)
            {
                case IMAGETYPE_JPEG:
                    $resorseType = imagecreatefromjpeg($fileName);
                    $imageLayer = resizeImage($resorseType,$sourceWidth,$sourceHight);
                    
                    imagejpeg($imageLayer,$uploadPath."thumo_".$resizeFileName.".".$fileExt);
                    
                    $imgData = addslashes(file_get_contents($uploadPath."thumo_".$resizeFileName.".".$fileExt));
                    
                    
                    break;
                    
                case IMAGETYPE_GIF:
                    $resorseType = imagecreatefromgif($fileName);
                    $imageLayer = resizeImage($resorseType,$sourceWidth,$sourceHight);
                    
                    imagegif($imageLayer,$uploadPath."thumo_".$resizeFileName.".".$fileExt);
                    
                    $imgData = addslashes(file_get_contents($uploadPath."thumo_".$resizeFileName.".".$fileExt));
                    
                    break;
                    
                case IMAGETYPE_PNG:
                    $resorseType = imagecreatefrompng($fileName);
                    $imageLayer = resizeImage($resorseType,$sourceWidth,$sourceHight);
                    
                    imagepng($imageLayer,$uploadPath."thumo_".$resizeFileName.".".$fileExt);
                    
                    $imgData = addslashes(file_get_contents($uploadPath."thumo_".$resizeFileName.".".$fileExt));
                    
                    break;
                    
                default:
                    
                    echo('<script>'.' window.alert("The picture cannot be UPLOADED \n SEND another");'.'</script>');
                    break;
                    
            }
            
            
            
            
            
//            $imgData = addslashes(file_get_contents($_FILES['De_photo']['tmp_name']));        
            $sqlDeUp1 = "UPDATE `delever` SET `De_photo`='$imgData' WHERE `delever`.`D_id` = $dId;";
            
            if(mysqli_query($conn,$sqlDeUp1))
            {
                
            }
            else
            {
                echo('<script>'.' window.alert("The picture cannot be UPLOADED \n SEND another");'.'</script>');
//                echo($sqlDeUp1);
            }
        }
        
//        header("Location: customerAccount.php");
        ?>
            
            <script>
                window.location = 'deleverAcco.php';
            </script>
        <?php
    }
    else
    {
        echo('<script>'.' window.alert("The data is not ACCURATE");'.'</script>');
//        echo($sqlDeUp);
    }
    
}





if(isset($_POST['logout']))
{
    session_destroy();
    ?> <script> window.location = "products.php"  </script>  <?php
}


?>