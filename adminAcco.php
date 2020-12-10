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







<?php



if(isset($_GET['id']))
{
    $id = $_GET['id'];
    
    echo('<script>'.'window.location = "#'.$id.'";'.'</script>');
}



//                          Admin edit form



function resizeImage($resorseType,$image_width,$image_hight){
        $resizeWidth = 500;
        $resizeHight = 500;
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHight);
        imagecopyresampled($imageLayer,$resorseType,0,0,0,0,$resizeWidth,$resizeHight,$image_width,$image_hight);
        return $imageLayer;        
}





if(isset($_POST['changeAdDetail']))
{
     $adName = mysqli_real_escape_string($conn,strip_tags($_POST['Ad_name']));
     $adEmail = mysqli_real_escape_string($conn,strip_tags($_POST['Ad_email']));
     $adPassword = mysqli_real_escape_string($conn,strip_tags($_POST['Ad_password']));
     $adNumber = mysqli_real_escape_string($conn,strip_tags($_POST['Ad_number']));
     $aId = mysqli_real_escape_string($conn,strip_tags($_POST['Ad_id']));
    
     
    
     
    
    
    $sqlCuUp = "UPDATE `admin` SET `Ad_name` = '$adName', `Ad_email` = '$adEmail', `Ad_password` = '$adPassword', `Ad_number` = '$adNumber' WHERE `admin`.`A_id` = $aId;";
    
    if(mysqli_query($conn,$sqlCuUp))
    {
        if(is_uploaded_file($_FILES['Ad_photo']['tmp_name']))
        {
            
            
            
        
            $fileName = $_FILES['Ad_photo']['tmp_name'];
            $sourceProperties = getimagesize($fileName);
            $resizeFileName = time();
            $uploadPath = "./uploads/";
            $fileExt = pathinfo($_FILES['Ad_photo']['name'],PATHINFO_EXTENSION);
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
             
            
            
//            $imgData = addslashes(file_get_contents($_FILES['Ad_photo']['tmp_name']));        
            $sqlCuUp1 = "UPDATE `admin` SET `Ad_photo`='$imgData' WHERE `admin`.`A_id` = $aId;";
            
            if(mysqli_query($conn,$sqlCuUp1))
            {
                
            }
            else
            {
                echo('<script>'.' window.alert("The picture cannot be UPLOADED \n SEND another");'.'</script>');
//                echo($sqlCuUp1);
            }
        }
        
      //  header("Location: adminAcco.php");
        header('Location: adminAcco.php#');
        end();
        ?>
            
            <script>
//                window.location = 'adminAcco.php';
            </script>
        <?php
    }
    else
    {
        echo('<script>'.' window.alert("The data is not ACCURATE");'.'</script>');
//        echo($sqlCuUp);
    }
    
}






//                         Drink store  

if(isset($_POST['pEdit']))
{
    $price1 = $_POST['price'];
    $add = $_POST['add'];
    $reduce = $_POST['reduce'];
    $pId1 = $_POST['pId'];
    
    $sqlP = "UPDATE `product` SET `Price` = $price1 WHERE `product`.`P_id` = $pId1;";
    
    if(mysqli_query($conn,$sqlP))
    {
        if($add)
        {
            $sql = "UPDATE `product` SET `Pr_quntity` = `Pr_quntity`+$add WHERE `product`.`P_id` = $pId1;";   
            
            if(mysqli_query($conn,$sql))
            {
                
            }
            else
            {
                echo($sql);
            }
        }


        if($reduce)
        {
            $sql = "UPDATE `product` SET `Pr_quntity` = `Pr_quntity`-$reduce WHERE `product`.`P_id` = $pId1;";   
            
            if(mysqli_query($conn,$sql))
            {
                
            }
            else
            {
                echo($sql);
            }
        }

        header('Location: adminAcco.php#drinkStore');
        end();

        ?> <script>  
                
//                window.location = "adminAcco.php";
            //    window.location = "adminAcco.php#drinkStore";
    
              //  window.location.href = ""  ;
           </script> <?php
    }
    else
    {
        each($sqlP);
    }
    
}





if ( isset( $_POST[ 'confirmAll' ] ) ) {
    $action = $_POST[ 'confirmAll' ];
    $deleverId = $_POST[ 'allDele' ];
    $cMessage = $_POST[ 'allM' ];
    //$orderId = $_POST['oId'];
    //$cId = $_POST['cId'];
    $date = date( "Y-m-d" ); //." At ".date("H:i:s");
    $click = $_POST[ 'click' ];


    foreach ( $click as $orderId ) {


        $sqlC = "UPDATE `order` SET `Confirm` = '$action',`D_id` = $deleverId WHERE `order`.`O_id` = $orderId;";

        if ( mysqli_query( $conn, $sqlC ) ) {
            if ( $cMessage ) {

                $sqlFind = "SELECT * FROM `order` WHERE `order`.`O_id`=$orderId";
                $tableFind = mysqli_query( $conn, $sqlFind );

                while ( $columnF = mysqli_fetch_assoc( $tableFind ) ) {
                    $cId = $columnF[ 'C_id' ];

                    $sqlMg = "INSERT INTO `c_message` (`M_id`, `O_id`, `C_id`, `A_id`, `To`, `DateTime`, `Text`) VALUES (NULL, $orderId, $cId, $_SESSION[id],'customer', '$date', '$cMessage');";

                    if ( mysqli_query( $conn, $sqlMg ) ) {

                    } else {
                        echo( 'Error' . $sqlMg . '<br>' . mysqli_error( $conn ) );
                    }

                }




            }



        } else {
            echo( 'Error' . $sqlC . '<br>' . mysqli_error( $conn ) );
        }


    }
    
    header('Location: adminAcco.php#');
    end();

    ?>
    <script>
//        window.alert( 'DONE All' );
//        window.location = window.location.href;
    </script>
    <?php



}







if ( isset( $_POST[ 'confirm' ] ) ) {
    $action = $_POST[ 'confirm' ];
    $deleverId = $_POST[ 'deliveryId' ];
    $cMessage = $_POST[ 'cMessage' ];
    $orderId = $_POST[ 'oId' ];
    $cId = $_POST[ 'cId' ];
    $date = date( "Y-m-d" ); //." At ".date("H:i:s");



    $sqlC = "UPDATE `order` SET `Confirm` = '$action',`D_id` = $deleverId WHERE `order`.`O_id` = $orderId;";

    if ( mysqli_query( $conn, $sqlC ) ) {
        if ( $cMessage ) {
            $sqlMg = "INSERT INTO `c_message` (`M_id`, `O_id`, `C_id`, `A_id`, `To`, `DateTime`, `Text`) VALUES (NULL, $orderId, $cId, $_SESSION[id],'customer', '$date', '$cMessage');";

            if ( mysqli_query( $conn, $sqlMg ) ) {} else {
                echo( 'Error' . $sqlMg . '<br>' . mysqli_error( $conn ) );
            }


        }
        
                ?>
        <script>
//            window.alert( 'DONE' );
//            window.location = window.location.href;
        </script>
        <?php

        
        header('Location: adminAcco.php#');
        end();




    } else {
        echo( 'Error' . $sqlC . '<br>' . mysqli_error( $conn ) );
    }

}







if ( isset( $_GET[ 'delId' ] ) )
{
    $del_sql = "DELETE FROM `order` WHERE `O_id` = '$_GET[delId]'";

    if ( mysqli_query( $conn, $del_sql ) ) {
        
        header('Location: adminAcco.php#');
        end();
        
        ?>
        <script>
//            window.location = "adminAcco.php";
        </script>

        <?php
    }
}




if ( isset( $_GET[ 'deleteId' ] ) )
{
    $del_sql = "DELETE FROM `$_GET[table]` WHERE `$_GET[table]`.`$_GET[idName]` = $_GET[deleteId];";

    if ( mysqli_query( $conn, $del_sql ) ) 
    {
        header('Location: adminAcco.php#');
        end();

        ?>
        <script>
//           window.location = "adminAcco.php";
        </script>

        <?php
    }
    else
    {
        echo($del_sql);
    }
}





?>




<?php

if(isset($_POST['logout']))
{
    session_destroy();
    
    header('Location: index.php#');
    end();

}



?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>** Admin **</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css"> 
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/adminAcco.css" rel="stylesheet" type="text/css">    
    
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>


    <?php    include("header.php");   ?>








    <?php

    if (( isset( $_SESSION[ 'USER' ] ) ) && $_SESSION["USER"]=="admin@55%/*)")
    {
        
        
        
        $aId = $_SESSION['id'];
        
        
        $sqlAd = "SELECT * FROM `admin` WHERE `A_id`=$aId";
        $tableAd = mysqli_query($conn,$sqlAd);
        
        if($columnCu = mysqli_fetch_assoc($tableAd))
        {
            $adName = $columnCu['Ad_name'];
            $adEmail = $columnCu['Ad_email'];
            $adPassword = $columnCu['Ad_password'];
            $adNumber = $columnCu['Ad_number'];
            $adPhoto = $columnCu['Ad_photo'];
            
        }
        else
        {
            echo($sqlCu);
        }
        
  



        if ( $_SESSION[ "USER" ] == "admin@55%/*)" )
        {
    ?>
    
    
        
    
    
    
    
    
    
   <div class="row2">
				<div class="row row21">
                    <div class="row2B">
                    
                    
                    
                            <div class="col-lg-2 accountcol21">
                                <center>

                                    <?php    echo('<img src = "data:image;base64,'.base64_encode($adPhoto).'" alt = "no img" class="orCuImg">')   ?><!--<img src="images/vijitha-rohana-wijemuni_650x400_81486003524.jpg" alt="no ime" class="orCuImg">-->                    

                                </center>

                            </div>
                            <div class="col-lg-8 accountcol2">
                            <p class="accountp1">
                                <?php

                                      echo($adName); 

                                ?> - admin

                            </p>
                            </div>
                            <div class="col-lg-2 accountncol">
                                <center>
                                     <form method="post">
                                          <input type="submit" name="logout" value="LOG OUT" class=" newbut btn btn-danger btn-lg">
                                     </form>                   
                                </center>

                            </div>
                    
                    
                    
                    </div>
				

				</div>
</div>
    
    
    
    
 
    <!--                                                                                    for order list for confirm       -->

<div class="Hl row" id="orders">
        <center>

            <div class="row">

                <div class="shorH">
                    <h2 class="shorT">Orders</h2>
                </div>


                <div class="orL3">
                    <lu class="cartLu">










                        <?php

                        $sql = "SELECT * FROM `order` AS o 
                LEFT JOIN `product` AS p ON o.P_id=p.P_id 
                LEFT JOIN `contain` AS c ON p.Co_id=c.Co_id
                LEFT JOIN `customer` AS cu ON o.C_id=cu.C_id
                WHERE `Or_type`='Buy' AND `Confirm`='noAdd'";



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

                                        <div class="col-xs-8">
                                            <strong class="orL3T">
                                                <?php   echo($prName);    ?>
                                            </strong>
                                        </div>

                                        <div class="col-xs-2">
                                            <a class="delBtn" href=adminAcco.php?delId=<?php echo($oId); ?>><span class="orL3i2TdeletType glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
                                        <p class="orL3i1T">Subtotal :-
                                            <?php    echo($orQuan);    ?> *
                                            <?php    echo($prPrice);    ?>/= </p>
                                        <hr>
                                        <p class="orL3i1T">Quantity</p>
                                        <hr>
                                        <p class="orL3i1T">Size</p>
                                        <hr>
                                        <p class="orL3i1T">Delivery type</p>


                                    </div>

                                    <div class="col-xs-3 orL3i1B">
                                        <p class="orL3i2T">Rs:-
                                            <?php    echo($orQuan*$prPrice);    ?> /=</p>
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

                                    <div class="row">

                                        <div class="col-xs-6">
                                            <p class="orL3i1T">Customer arrives date</p>
                                            <hr>
                                            <p class="orL3i1T">Select delevers</p>
                                        </div>

                                        <div class="col-xs-6">
                                            <p class="orL3i2T">
                                                <?php  echo($comeDate);  ?>
                                            </p>
                                            <hr>

                                            <form method="post">

                                                <select name="deliveryId" class="orL3i2T form-control">

                                                    <?php
                                                    $sqld = "SELECT * FROM `delever`";
                                                    $tabled = mysqli_query( $conn, $sqld );

                                                    while ( $columnd = mysqli_fetch_assoc( $tabled ) ) {
                                                        $delId = $columnd[ 'D_id' ];
                                                        $delName = $columnd[ 'De_name' ];

                                                        ?>

                                                    <option value="<?php  echo($delId);  ?>">
                                                        <?php  echo($delName);  ?>
                                                    </option>

                                                    <?php
                                                    }


                                                    ?>



                                                </select>

                                        </div>

                                    </div>

                                    <hr>

                                    <div class="row">

                                        <div class="col-xs-4">
                                            <input type="submit" name="confirm" value="Confirm" class="btn btn-success btn-lg">
                                        </div>

                                        <div class="col-xs-4">

                                            <input type="submit" name="confirm" value="Refuse" class="btn btn-danger btn-lg">
                                        </div>

                                        <div class="col-xs-4">
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
                                                if ( $cuPhoto ) {
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

                <div class="orL4">
                  <form method="post" id="allCon">

                        <div class="row">
                            <div class="col-sm-4">

                                <p>Select delevers</p>

                                <select name="allDele" class="form-control" id="allCon">





                                    <?php
                                    $sqld = "SELECT * FROM `delever`";
                                    $tabled = mysqli_query( $conn, $sqld );

                                    while ( $columnd = mysqli_fetch_assoc( $tabled ) ) {
                                        $delId = $columnd[ 'D_id' ];
                                        $delName = $columnd[ 'De_name' ];

                                        ?>

                                    <option value="<?php  echo($delId);  ?>">
                                        <?php  echo($delName);  ?>
                                    </option>

                                    <?php
                                    }


                                    ?>



                                </select>

                            </div>

                            <div class="col-sm-2">
                                <input type="submit" name="confirmAll" class="orBtn btn btn-success btn-lg" value="Confirm">
                            </div>

                            <div class="col-sm-2">
                                <input type="submit" name="confirmAll" class="orBtn btn btn-danger btn-lg" value="Refuse">
                            </div>

                            <div class="col-sm-4">

                                <textarea name="allM" class="form-control" placeholder="Message for customer"></textarea>


                            </div>


                        </div>

                  </form>

                </div>



            </div>
        </center>
    </div>


    <!--                                                                                     Confirm list        -->
<hr>
<hr>
<hr>
    <div class="Hl row" id="confirmOrders">


        <div class="shorH">
            <h2 class="shorT">Confirm Orders</h2>
      </div>

        <div class="orL3">

            <table class="table">
                <caption>
                    <h2><span class="label label-success"> Confirm </span>  </h2>
                </caption>

                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Subtotal</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Delivery type</th>
                        <th>Customer arrives date</th>
                        <th>Customer</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact number</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Zip code</th>
                        <th>Deliver confirm</th>
                        <th>Customer confirm</th>
                    </tr>
                </thead>

                <tbody>
                    <?php


                    $sql = "SELECT * FROM `order` AS o 
                LEFT JOIN `product` AS p ON o.P_id=p.P_id 
                LEFT JOIN `contain` AS c ON p.Co_id=c.Co_id
                LEFT JOIN `customer` AS cu ON o.C_id=cu.C_id
                WHERE `Or_type`='Buy' AND `Confirm`='Confirm'";



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
                        $deliverComfirm = $column['Deliver_confirm'];
                        $customerComfirm = $column['Receiver_confirm'];

                        ?>
                    <tr>
                        <td><?php  echo($prName);  ?></td>
                        <td><?php  echo($prPrice*$orQuan);  ?></td>
                        <td><?php  echo($orQuan);  ?></td>
                        <td><?php  echo($prSize);  ?></td>
                        <td><?php  echo($delOption);  ?></td>
                        <td><?php  echo($comeDate);  ?></td>
                        <td><?php  
                        
                        if ( $cuPhoto ) 
                        {
                                 echo( '<img src = "data:image ; base64,' . base64_encode( $cuPhoto ) . '"  alt = "img" class = "cuImg">' );
                        }
                        else 
                        {
                            ?> <img src="images/user.png" class="cuImg" alt="img"> <?php
                        }  
                            ?></td>
                        <td><?php  echo($cuName);  ?></td>
                        <td><?php  echo($cuEmail);  ?></td>
                        <td><?php  echo($cuCoNumber);  ?></td>
                        <td><?php  echo($address);  ?></td>
                        <td><?php  echo($cuCity);  ?></td>
                        <td><?php  echo($cuProvince);  ?></td>
                        <td><?php  echo($cuZipCode);  ?></td>
                        <td><?php  echo($deliverComfirm);  ?></td>
                        <td><?php  echo($customerComfirm);  ?></td>
                        <td><a href="adminAcco.php?delId=<?php echo($oId); ?>" class="btn btn-danger">Delete</a></td>
                        
                       
                    </tr>

                    <?php            
            
        }
            

 ?>

                </tbody>

            </table>


        </div>




</div>
    
    
    
  
    
    
    <!--                                                                                     Refuse list        -->
<hr>
<hr>
<hr>
    <div class="Hl row" id="refuseOrders">


        <div class="shorH">
            <h2 class="shorT">Refuse Orders</h2>
      </div>

        <div class="orL3">

            <table class="table">
                <caption>
                    <h2><span class="label label-danger"> Refuse </span>  </h2>
                </caption>

                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Subtotal</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Delivery type</th>
                        <th>Customer arrives date</th>
                        <th>Customer</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact number</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Zip code</th>
                    </tr>
                </thead>

                <tbody>
                    <?php


                    $sql = "SELECT * FROM `order` AS o 
                LEFT JOIN `product` AS p ON o.P_id=p.P_id 
                LEFT JOIN `contain` AS c ON p.Co_id=c.Co_id
                LEFT JOIN `customer` AS cu ON o.C_id=cu.C_id
                WHERE `Or_type`='Buy' AND `Confirm`='Refuse'";



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
                    <tr>
                        <td><?php  echo($prName);  ?></td>
                        <td><?php  echo($prPrice*$orQuan);  ?></td>
                        <td><?php  echo($orQuan);  ?></td>
                        <td><?php  echo($prSize);  ?></td>
                        <td><?php  echo($delOption);  ?></td>
                        <td><?php  echo($comeDate);  ?></td>
                        <td><?php  
                        
                        if ( $cuPhoto ) 
                        {
                                 echo( '<img src = "data:image ; base64,' . base64_encode( $cuPhoto ) . '"  alt = "img" class = "cuImg">' );
                        }
                        else 
                        {
                            ?> <img src="images/user.png" class="cuImg" alt="img"> <?php
                        }  
                            ?></td>
                        <td><?php  echo($cuName);  ?></td>
                        <td><?php  echo($cuEmail);  ?></td>
                        <td><?php  echo($cuCoNumber);  ?></td>
                        <td><?php  echo($address);  ?></td>
                        <td><?php  echo($cuCity);  ?></td>
                        <td><?php  echo($cuProvince);  ?></td>
                        <td><?php  echo($cuZipCode);  ?></td>
                        <td><a href="adminAcco.php?delId=<?php echo($oId); ?>" class="btn btn-danger">Delete</a></td>
                        
                       
                    </tr>

                    <?php            
            
        }
            

 ?>

                </tbody>

            </table>


        </div>




</div>
    
    
 
    
    
    
<!--                                                                Drink store                -->
  
    
    
<hr><hr><hr>
    <div class="Hl row" id="drinkStore">


        <div class="shorH">
            <h2 class="shorT">Drink store</h2>
      </div>

        <div class="orL3">

            <table class="table">
                <caption>
                    <h2><span class="label label-info"> Add to store </span>  </h2>
                </caption>

                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Food</th>
                        <th>Contain name</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Store quntity</th>
                        <th>Add quntity</th>
                        <th>Reduce quntity</th>
         
                    </tr>
                </thead>

                <tbody>
                    
                    <?php


                    $sql = "SELECT * FROM `product` AS p LEFT JOIN `contain` AS c ON p.Co_id=c.Co_id LEFT JOIN `food` AS f ON c.Fo_id=f.Fo_id ORDER BY c.Co_id ";



                    $table = mysqli_query( $conn, $sql );

                    while ( $column = mysqli_fetch_assoc( $table ) ) {
                        
                        $pId = $column['P_id'];
                        $coImg = $column['Co_img'];
                        $foName = $column['Fo_name'];
                        $coName = $column['Co_name'];
                        $prSize = $column['Pr_size'];
                        $price = $column['Price'];
                        $prQuntity = $column['Pr_quntity'];
                        
                        ?>
                    <tr>
                        <form method="post">
                        <td><?php  
                        
                        if ( $coImg ) 
                        {
                                 echo( '<img src = "data:image ; base64,' . base64_encode( $coImg ) . '"  alt = "img" class = "cuImg">' );
                        }
                           ?></td>
                        <td><?php  echo($foName);  ?></td>
                        <td><?php  echo($coName);  ?></td>
                        <td><?php  echo($prSize." ml");  ?></td>
                        <td><input type="number" name="price" min="1" class="form-control" value="<?php  echo($price);  ?>"></td>
                        <td><?php  echo("---  ".$prQuntity."  ---");  ?></td>
                        <td><input type="number" name="add" min="1" class="form-control"></td>
                        <td><input type="number" name="reduce" min="1" class="form-control"></td>

                        <td><input type="submit" class="btn btn-primary" value="DONE" name="pEdit"></td>
                        <td><a href="adminAcco.php?deleteId=<?php echo($pId);  ?>&table=product&idName=P_id" class="btn btn-danger">Delete</a></td>
                        
                        <input type="hidden" name="pId" value="<?php  echo($pId);  ?>">
                       </form>
                    </tr>

                    <?php            
            
        }
            

 ?>
                   
                </tbody>

            </table>


        </div>

              <div class="orL3">

            <table class="table">
                <caption>
                    <h2><span class="label label-info"> Manage food store </span>  </h2>
                </caption>

                <thead>
                    <tr>
                        
                        <th>Food</th>
                        <th>Food name</th>

         
                    </tr>
                </thead>

                <tbody>
                    
                    <?php


                    $sql = "SELECT * FROM `food`";



                    $table = mysqli_query( $conn, $sql );

                    while ( $column = mysqli_fetch_assoc( $table ) ) {
                        
                        $foId = $column['Fo_id'];
                        $foName = $column['Fo_name'];

                        
                        ?>
                    <tr>
                    

                        <td><h4><?php  echo($foName);  ?></h4></td>
                    
                        <td><a href="adminAcco.php?deleteId=<?php echo($foId);  ?>&table=food&idName=Fo_id" class="btn btn-lg btn-danger">Delete</a></td>
                        
                        <?php
                        
                            $sqlCo = "SELECT * FROM `contain`";
                            
                            $tableCo = mysqli_query($conn,$sqlCo);
                                
                            while($columnCo = mysqli_fetch_assoc($tableCo))
                            {
                                $coId = $columnCo['Co_id'];
                                $coName = $columnCo['Co_name'];
                                $foIdCo = $columnCo['Fo_id'];
                                
                                if($foId == $foIdCo)
                                {
                                    ?>
                        
                        <td><?php  echo($coName);  ?></td>
                        <td> -- <a href="adminAcco.php?deleteId=<?php echo($coId);  ?>&table=contain&idName=Co_id" class="btn btn-danger">Delete</a></td>
                        
                                    
                                    <?php
                                }
                                
                                
                            }
                        
                        ?>
                       
                        
                    </tr>

                    <?php            
            
        }
            

 ?>
                   
                </tbody>

            </table>


        </div>

        

</div>
    
    
 
<!--                                                            Cerate NEW account     -->

  <?php  
            include("createAdminAccount .php");
            include("createDeleverAcco.php");
                
        ?>  
  
    
    
<hr>
<hr>
<hr>
    <div class="Hl row" id="createNewAccount">


        <div class="shorH">
            <h2 class="shorT">Create NEW account</h2>
      </div>

        <div class="orL3">
            <center>
            
                <div class="btn-group btn-group-lg" >

                    <input type="button" value="NEW Admin Account" class="btn btn-info" onClick=" document.getElementById('aAcc').style.display = 'block'">
                    <input type="button" value="NEW Deliver Account" class="btn btn-primary" onClick=" document.getElementById('dAcc').style.display = 'block'">


                </div>
         
            
            </center>



        </div>

        

</div>
<!--                                                         Manage Account-->
    
<hr>
<hr>
<hr>
    <div class="Hl row" id="manageAccount">


        <div class="shorH">
            <h2 class="shorT">Manage Account</h2>
      </div>

<!--                                    Customer            -->
        
        
        <div class="orL3">
            
            <table class="table">
                <caption>
                    <h2><span class="label label-primary">  Manage Customer Account </span>  </h2>
                </caption>

                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact number</th>
                        <th>City</th>
                        <th>Privince</th>
                        <th>Zip Code</th>
         
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    $sqlCu = "SELECT * FROM `customer` WHERE `Cu_type`='permanent'";                    
                    $tableCu = mysqli_query($conn,$sqlCu);
            
                    while($columnCu = mysqli_fetch_assoc($tableCu))
                    {
                        $cuIdMa = $columnCu['C_id'];
                        $cuNameMa = $columnCu['Cu_name'];
                        $cuPhotoMa = $columnCu['Photo'];
                        $cuEmailMa = $columnCu['Cu_email'];
                        $cuAddress = $columnCu['Address'];
                        $cuNumberMa = $columnCu['Cu_contact_number'];
                        $cuCityMa = $columnCu['City'];
                        $cuProvinceMa = $columnCu['Province'];
                        $cuZipCodeMa = $columnCu['Zip_code'];

            
                        ?>
                    
                            <tr>
                                <td><?php  
                        
                                if ( $cuPhotoMa ) 
                                {
                                         echo( '<img src = "data:image ; base64,' . base64_encode( $cuPhotoMa ) . '"  alt = "img" class = "cuImg">' );
                                }
                                   ?>
                                </td>
                                
                                <td><?php   echo($cuNameMa);  ?></td>
                                <td><?php   echo($cuEmailMa);  ?></td>
                                <td><?php   echo($cuAddress);  ?></td>
                                <td><?php   echo($cuNumberMa);  ?></td>
                                <td><?php   echo($cuCityMa);  ?></td>
                                <td><?php   echo($cuProvinceMa);  ?></td>
                                <td><?php   echo($cuZipCodeMa);  ?></td>
                                <td><a href="adminAcco.php?deleteId=<?php echo($cuIdMa);  ?>&table=customer&idName=C_id" class="btn btn-danger">Delete</a></td>
                    
                            </tr>
                        


                        <?php
                        
                        
                    }

                    
                    
                    ?>
                
                </tbody>


            
            
            </table>

        </div>
<!--                                    Delever            -->
        
        
        <div class="orL3">
            
            <table class="table">
                <caption>
                    <h2><span class="label label-primary">  Manage Delever Account </span>  </h2>
                </caption>

                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th><span class="glyphicon glyphicon-phone"></span>Contact number</th>
                        <th><span class="glyphicon glyphicon-phone-alt"></span>Contact number</th>
                        <th>Delevery price</th>
                        <th>Area</th>
         
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    $sqlCu = "SELECT * FROM `delever`";                    
                    $tableCu = mysqli_query($conn,$sqlCu);
            
                    while($column = mysqli_fetch_assoc($tableCu))
                    {
                        
                        $deIdMa = $column['D_id'];
                        $dePhoto = $column['De_photo'];
                        $deName = $column['De_name'];
                        $deEmail = $column['De_email'];
                        $deNumber1 = $column['De_contact_number1'];
                        $deNumber2 = $column['De_contact_number2'];
                        $deArea = $column['Area'];
                        

            
                        ?>
                    
                            <tr>
                                <td><?php  
                        
                                if ( $dePhoto ) 
                                {
                                         echo( '<img src = "data:image ; base64,' . base64_encode( $dePhoto ) . '"  alt = "img" class = "cuImg">' );
                                }
                                   ?>
                                </td>
                                
                                <td><?php   echo($deName);  ?></td>
                                <td><?php   echo($deEmail);  ?></td>
                                <td><?php   echo($deNumber1);  ?></td>
                                <td><?php   echo($deNumber2);  ?></td>
                                <td><?php   echo($deArea);  ?></td>

                                <td><a href="adminAcco.php?deleteId=<?php echo($deIdMa);  ?>&table=delever&idName=D_id" class="btn btn-danger">Delete</a></td>
                    
                            </tr>
                        


                        <?php
                        
                        
                    }

                    
                    
                    ?>
                
                </tbody>


            
            
            </table>

        </div>
<!--                                    Admin            -->
        
        
        <div class="orL3">
            
            <table class="table">
                <caption>
                    <h2><span class="label label-primary">  Manage Admin Account </span>  </h2>
                </caption>

                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact number</th>
        
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    $sqlCu = "SELECT * FROM `admin`";                    
                    $tableCu = mysqli_query($conn,$sqlCu);
            
                    while($columnCu = mysqli_fetch_assoc($tableCu))
                    {
                        $cuIdMa = $columnCu['A_id'];
                        $cuNameMa = $columnCu['Ad_name'];
                        $cuPhotoMa = $columnCu['Ad_photo'];
                        $cuEmailMa = $columnCu['Ad_email'];
                        $cuNumberMa = $columnCu['Ad_number'];
          
                        ?>
                    
                            <tr>
                                <td><?php  
                        
                                if ( $cuPhotoMa ) 
                                {
                                         echo( '<img src = "data:image ; base64,' . base64_encode( $cuPhotoMa ) . '"  alt = "img" class = "cuImg">' );
                                }
                                   ?>
                                </td>
                                
                                <td><?php   echo($cuNameMa);  ?></td>
                                <td><?php   echo($cuEmailMa);  ?></td>
                                <td><?php   echo($cuNumberMa);  ?></td>
                                <td><a href="adminAcco.php?deleteId=<?php echo($cuIdMa);  ?>&table=admin&idName=A_id" class="btn btn-danger">Delete</a></td>
                    
                            </tr>
                        


                        <?php
                        
                        
                    }

                    
                    
                    ?>
                
                </tbody>


            
            
            </table>

        </div>

        

</div>
    
<!--    Contact message-->
    
    <hr>
    <hr>
    <hr>
    <div class="Hl row" id="contactMessage">


        <div class="shorH">
            <h2 class="shorT">Contact message</h2>
      </div>

        <div class="orL3">

            <table class="table">
                <caption>
<!--                    <h2><span class="label label-success"> Confirm </span>  </h2>-->
                </caption>

                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>City</th>
                        <th>Message</th>

                    </tr>
                </thead>

                <tbody>
                    <?php


                    $sql = "SELECT * FROM `con_message`";



                    $table = mysqli_query( $conn, $sql );

                    while ( $column = mysqli_fetch_assoc( $table ) ) {

                        $conId = $column['Con_id'];
                        $conName = $column['Con_name'];
                        $conEmail = $column['Con_email'];
                        $conNumber = $column['Con_contact_number'];
                        $conCity = $column['Con_city'];
                        $conText = $column['Con_text'];


                        ?>
                    <tr>
                        <td><?php  echo($conName);  ?></td>
                        <td><?php  echo($conEmail);  ?></td>
                        <td><?php  echo($conNumber);  ?></td>
                        <td><?php  echo($conCity);  ?></td>
                        <td><?php  echo($conText);  ?></td>

                        <td><a href="adminAcco.php?deleteId=<?php echo($conId);  ?>&table=con_message&idName=Con_id" class="btn btn-danger">Delete</a></td>
                        
                       
                    </tr>

                    <?php            
            
        }
            

 ?>

                </tbody>

            </table>


        </div>




</div>
    
    
   
    
    
 
<!--                                                     Add product       -->
    
    <hr>
    <hr>
    <hr>
    <?php    include("addNewProduct.php");   ?>
    
    
    <!--                                                     /Add product       -->

    

    
              
<!--                                                    Admin edit form-->
            
            <hr>
            <hr>
            <hr>
            <div class="orL4" id="editProfile">
            <form method="post" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-lg-12 accountcol9">
                        <div class="row row41">
                    <!--        <div class="col-sm-6">-->
                                <div class="row">
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1T">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    Name:
                                    <input type="text" class="form-control" name="Ad_name" value="<?php echo($adName); ?>" placeholder="Enter your first and last name" required> 
                                    </p>
                                    </div>
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1T">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                    Email:
                                    <input type="email" class="form-control" name="Ad_email" value="<?php   echo($adEmail);  ?>" placeholder="Please enter your Email" required>
                                    </p>
                                    </div>
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1T">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                    Password:
                                    <input type="password" class="form-control" name="Ad_password"  value="<?php   echo($adPassword);  ?>" placeholder="Minium 6 characters" minlength="6" maxlength="20" required>
                                    </p>
                                    </div>
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1T">
                                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                                    Contact Number:
                                    <input type="tel" class="form-control" name="Ad_number"  value="<?php   echo($adNumber);  ?>" placeholder="Please enter your phone number" pattern="[0-9]{10}"  required>
                                    </p>
                                    </div>



                                </div>
                    <!--        </div>-->

                    <!--        <div class="col-sm-6">-->
<!--
                                <div class="row">


                                        <div class="col-lg-3 orL3i1B">
                                        <p class="orL3i1T">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        Address:
                                        <input type="text" class="form-control" name="Address"  value="<?php //  echo($cuAddress);  ?>" placeholder="Please enter your Address" required>
                                        </p>
                                        </div>

                                        <div class="col-lg-3 orL3i1B">
                                        <p class="orL3i1T">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        city:
                                        <input type="text" class="form-control" name="City"  value="<?php //  echo($cuCity);  ?>" placeholder="Enter your City">
                                        </p>
                                        </div>
                                        <div class="col-lg-3 orL3i1B">			
                                        <p class="orL3i1T">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        Province:
                                        <input type="text" class="form-control" name="Province"  value="<?php //  echo($cuProvince);  ?>" placeholder="Enter your Province">
                                        </p>
                                        </div>
                                        <div class="col-lg-3 or">
                                        <p class="orL3i1T">
                                        <span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
                                        Zipcode:
                                        <input type="number" class="form-control" name="Zip_code"  value="<?php  // echo($cuZip);  ?>" placeholder="Enter your postel ZIP code">
                                        </p>
                                        </div>		


                                </div>
-->

                    <!--        </div>-->
                                <div class="row">

                                        <div class="col-lg-3 or">
                                            <p class="orL3i1T">
                                            <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                            Upload your profile picture:
                                            <input type="file"  name="Ad_photo" value="Upload your profile picture" class="form-control">                   
                                            </p>
                                        </div>		



                                </div>

                    </div>
                        <div class="new">
                            <center>
                            
                                <button type="submit" class="btn btn-success btn-lg" name="changeAdDetail">Change your details  </button>                            
                            
                            </center>

                        </div>
                    </div>

                </div>
                
            <input type="hidden" name="Ad_id" value="<?php echo($aId) ?>">
            </form>
            </div>
            
        <!--                                           / Admin edit form-->    
 
    
    
    
    




    <?php
    } else {
        ?>

    <script>
        document.getElementById( 'log' ).style.display = "block";
    </script>



    <?php
    }


    } 
    
    else 
    {
        echo( "<h1>" . "YOU MUST LOG" . "</h1>" );
     
//        header('Location: adminAcco.php?user=admin');
//        end();
    ?>

    <script>
        
        window.location = "index.php?user=admin";
//        document.getElementById( 'log' ).style.display = "block";
    </script>



    <?php
       

    }







    ?>










    <?php      include("footer.php");     ?>

</body>



</html>


