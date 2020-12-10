<?php
session_start();
include('conn.php');



?>

<?php
if(isset($_POST['logout']))
{
    
    ?> <script> window.location = "products.php"  </script>  <?php
    session_destroy();
}
?>



<?php



$home = "";
$products = "";
$shopping = "";
$about = "";
$delive = "";
$contact = "";




//$_SESSION["id"];
//$_SESSION["USER"]="admin@55%/*)";
//$_SESSION["lang"] = "E";
//$_SESSION["prePage"];
//$_SESSION['Cu_name']);





?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Account</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
    
<link href="css/customerAccount.css" rel="stylesheet" type="text/css">
</head>
    
    
    
    
<body>
    
    <?php   include("header.php");    ?>
    
    
    
    <?php
    
    if((isset($_SESSION['id'])) && (isset($_SESSION["USER"])) && $_SESSION["USER"]=="customer/*-A5+" )
    {
        $cuId = $_SESSION['id'];
        
        
        $sqlCu = "SELECT * FROM `customer` WHERE `C_id`=$cuId";
        $tableCu = mysqli_query($conn,$sqlCu);
        
        if($columnCu = mysqli_fetch_assoc($tableCu))
        {
            $cuName = $columnCu['Cu_name'];
            $cuEmail = $columnCu['Cu_email'];
            $cuPassword = $columnCu['Cu_password'];
            $cuAddress = $columnCu['Address'];
            $cuNumber = $columnCu['Cu_contact_number'];
            $cuPhoto = $columnCu['Photo'];
            $cuCity = $columnCu['City'];
            $cuProvince = $columnCu['Province'];
            $cuZip = $columnCu['Zip_code'];
            
        }
        else
        {
            echo($sqlCu);
        }
        
        
        
        
        ?>
    
    
    
    
    
    
    
    
    
    
    
   <div class="row2">
				<div class="row row21">
                    <div class="row2B">
                    
                    
                    
                            <div class="col-lg-2 accountcol21">
                                <center>

                                    <?php    
        if(isset($cuPhoto))
        {
            echo('<img src = "data:image;base64,'.base64_encode($cuPhoto).'" alt = "no img" class="orCuImg">') ;
            
        }
        else
        {
            echo('<img src="images/user.png" alt="no ime" class="orCuImg">');
        }
                                    ?><!--<img src="images/vijitha-rohana-wijemuni_650x400_81486003524.jpg" alt="no ime" class="orCuImg">-->                    

                                </center>

                            </div>
                            <div class="col-lg-8 accountcol2">
                            <p class="accountp1">
                                <?php

                                      echo($cuName); 

                                ?>

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
	 
    
    <hr/>
    
    <div id="bAlt2" class="">
        <center>
        
        <div class="bAlt2l1">
            
           <div class="orH">
                <h2 class="orT">My Order</h2>
           </div>

            <div class="orL3">
                <lu class="cartLu">
                    
                    
                    
                    <?php
                        
                        $sql = "
                SELECT o.`O_id`, o.`P_id`, o.`Or_quantity`, o.`Del_option`, o.`Come_date`, o.`Confirm`, o.`Receiver_confirm`, o.`Or_type`, p.`P_id`, p.`Pr_size`, p.`Price`, c.`Co_id`, c.`Co_name`, c.`Co_img`, fe.`Review` 
                FROM `order` AS o 
                LEFT JOIN `product` AS p ON o.P_id=p.P_id
                LEFT JOIN `contain` AS c ON p.Co_id=c.Co_id
                LEFT JOIN `feedback` AS fe ON o.O_id=fe.O_id
                WHERE o.`Or_type`='Buy' AND o.`C_id`=$cuId";
        
        
                        $table =mysqli_query($conn,$sql);
                        
                        while($column = mysqli_fetch_assoc($table))
                        {
                            $oId = $column['O_id'];
                            $pId = $column['P_id'];
                            $coId = $column['Co_id'];
                            $coName = $column['Co_name'];
                            $orQuantity = $column['Or_quantity'];
                            $delOption = $column['Del_option'];
                            $comeDate = $column['Come_date'];
                            $prSize = $column['Pr_size'];
                            $price = $column['Price'];
                            $prImg = $column['Co_img'];
                            $confirm = $column['Confirm'];
                            $recConfirm = $column['Receiver_confirm'];
                            $review = $column['Review'];
                            
                    
                            ?>
                    


                            <li class="cartLi" id="id<?php  echo($oId);  ?>">

                                      <div class="orL3It">


                                        <div class="orL3H">
                                              <div class="row">

<!--
                                                  <div class="orL3CheckB col-xs-2">
     
                                                  </div>
-->

                                                  <div class="col-xs-10">
                                                    <strong class="orL3T"><?php   echo($coName);    ?></strong>
                                                  </div>

                                                  <div class="col-xs-2">
                                                      <div class="delBtn">
                                                        <a href="customerAccount.php?deleteId=<?php echo($oId);  ?>&table=order&idName=O_id" ><span class="orL3i2TdeletType glyphicon glyphicon-trash" aria-hidden="true"></span></a>                                                      
                                                      </div>

                                                  </div>                                    


                                              </div>

                                                <hr>
                                        </div>


                                            <div class="row">

                                                    <div class="col-xs-4">

                                                        <?php    echo('<img src = "data:image;base64,'.base64_encode($prImg).'" alt = "No img" class = "orCImg">');   ?><!-- <img src="images/orange.png" alt="no ime" class="orCImg">-->

                                                    </div>

                                                    <div class="col-xs-5 orL3i1B">
                                                        <p class="orL3i1T">Subtotal:-  <?php  echo($orQuantity);  ?>*<?php  echo($price);  ?>/= </p>
                                                        <hr>
                                                        <p class="orL3i1T">Quantity</p>
                                                        <hr>
                                                        <p class="orL3i1T">Size</p>
                                                        <hr>
                                                        <p class="orL3i1T">Delivery type</p>

                                                    </div>

                                                    <div class="col-xs-3 orL3i1B" >
                                                         <p class="orL3i2T">Rs:-  <?php  echo($orQuantity*$price);  ?>/=</p>
                                                        <hr>
                                                        <p class="orL3i2T">-- <?php  echo($orQuantity);  ?>  --</p> 
                                                        <hr>
                                                        <p class="orL3i2T"> <?php  echo($prSize);  ?>ml  </p>
                                                        <hr>
                                                        <p class="orL3i2TdelType">  <?php
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

                                            <div>
                                                <hr>

                                                <div class="row">

                                                    <div class="col-xs-6">
                                                        <p class="orL3i1T">You arrives date</p>


                                                    </div>

                                                    <div class="col-xs-6">
                                                        <p class="orL3i2T"><?php  echo($comeDate);  ?> </p>


                                                    </div>

                                                </div>

                                                <hr>
                                        <form method="post">

                                                 <div class="row newrow2">
                                                    <?php
                                                    if($review == NULL)
                                                    {
                                                        ?>
                                                     
                                                <div class="newrow1">
                                                    <?php
                                                        if($recConfirm == "Not Now")
                                                        {
                                                            echo('<input type="submit" class="btn btn-success btn-lg" name="ConfirmOrderReceived" value="Confirm Order Received">');
                                                        }
                                                        else
                                                        {
                                                            echo('<input type="button" class="btn btn-info btn-lg"  value="Thanks for you give your feedback">');
                                                        }
                                                    ?>
                                                        
                                                        <hr>
                                                </div>

                                                     
                                                     
                                                     
                                                            <div class="col-xs-5">
                                                                <input type="submit" class="btn btn-primary btn-lg" <?php  if($recConfirm == "Not Now"){echo('name="SendMessage" value="Send Message"');}else{echo('name="SendFeedback" value="Send Feedback"');}  ?> >
                                                            </div>

                                                            <div class="col-xs-7">
                                                                <textarea class="form-control" placeholder="<?php  if($recConfirm == "Not Now"){echo("message for company");}else{echo("Feedback for product");}  ?>" name="Text"></textarea>
                                                            </div>
                                                    
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        echo('<h2><span class="label label-info">Thanks for your feedback </span> </h2>');
                                                    }
                                                    
                                                    ?>

 
                                                </div>
                                            <input type="hidden" name="O_id" value="<?php  echo($oId); ?>">
                                            <input type="hidden" name="C_id" value="<?php echo($cuId);  ?>">
                                            <input type="hidden" name="Co_id" value="<?php echo($coId);  ?>">
                                            
                                        </form>

                                                <div class="newrow3">
                                                 <hr>
                                                <?php
                                                    if($confirm == "Confirm")
                                                    {
                                                        ?><h2><span class="label label-success">Company confirmed your order </span> </h2> <?php
                                                    }
                                                    else
                                                    {
                                                        if($confirm == "Refuse")
                                                        {
                                                            ?><h2><span class="label label-danger">Sorry Dear Customer we can't place your order</span> </h2> <?php
                                                        }
                                                        else
                                                        {
                                                            ?><h2><span class="label label-info">Company not confirmed your order  yet</span> </h2> <?php
                                                        }
                                                         
                                                    }
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    ?>
                                                
                                                </div>
                                                <div>
                                                    <hr>
                                                    <h4>Received message</h4>
                                                    <ul class="cMegList">
                                                        <?php
                                                        
                                                        $sql1 = "SELECT * FROM `c_message` WHERE `C_id`=$cuId AND `To`='customer' AND `O_id`=$oId";
                                                        $table1 = mysqli_query($conn,$sql1);
                                                
                                                        while($column1 = mysqli_fetch_assoc($table1))
                                                        {
                                                            $text = $column1['Text'];
                                                            
                                                           echo(" <li>".$text."</li>");
                                                        }
                                                        
                                                        
                                                        ?>
                                                        
                                                        
                                    
                                                    </ul>
                                                    <hr>
                                                </div>
                                                <div>

                                                </div>
                                            </div>
                                      </div>



                            </li>


                    
                            <?php
                            
                            
                        }
                    
                    
                    
                    
                    
                    ?>
                    
                    
                   
                    
            
                
                
                
                
                
                
                
                </lu>
                
      
               
 
            
            
            </div>
            
<!--                                                    Customer edit form-->
            
            
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
                                    <input type="text" class="form-control" name="Cu_name" value="<?php echo($cuName); ?>" placeholder="Enter your first and last name" required> 
                                    </p>
                                    </div>
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1TE">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                    Email:
                                    <input type="email" class="form-control" name="Cu_email" value="<?php   echo($cuEmail);  ?>" placeholder="Please enter your Email" required>
                                    </p>
                                    </div>
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1TE">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                    Password:
                                    <input type="password" class="form-control" name="Cu_password"  value="<?php   echo($cuPassword);  ?>" placeholder="Minium 6 characters" minlength="6" maxlength="20" required>
                                    </p>
                                    </div>
                                    <div class="col-lg-3 orL3i1B">
                                    <p class="orL3i1TE">
                                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                                    Contact Number:
                                    <input type="tel" class="form-control" name="Cu_contact_number"  value="<?php   echo($cuNumber);  ?>" placeholder="Please enter your phone number" pattern="[0-9]{10}"  required>
                                    </p>
                                    </div>



                                </div>
                    <!--        </div>-->

                    <!--        <div class="col-sm-6">-->
                                <div class="row">


                                        <div class="col-lg-3 orL3i1B">
                                        <p class="orL3i1TE">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        Address:
                                        <input type="text" class="form-control" name="Address"  value="<?php   echo($cuAddress);  ?>" placeholder="Please enter your Address" required>
                                        </p>
                                        </div>

                                        <div class="col-lg-3 orL3i1B">
                                        <p class="orL3i1TE">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        city:
                                        <input type="text" class="form-control" name="City"  value="<?php   echo($cuCity);  ?>" placeholder="Enter your City">
                                        </p>
                                        </div>
                                        <div class="col-lg-3 orL3i1B">			
                                        <p class="orL3i1TE">
                                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                                        Province:
                                        <input type="text" class="form-control" name="Province"  value="<?php   echo($cuProvince);  ?>" placeholder="Enter your Province">
                                        </p>
                                        </div>
                                        <div class="col-lg-3 or">
                                        <p class="orL3i1TE">
                                        <span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
                                        Zipcode:
                                        <input type="number" class="form-control" name="Zip_code"  value="<?php   echo($cuZip);  ?>" placeholder="Enter your postel ZIP code">
                                        </p>
                                        </div>		


                                </div>

                    <!--        </div>-->
                                <div class="row">

                                        <div class="col-lg-3 or">
                                            <p class="orL3i1TE">
                                            <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                            Upload your profile picture:
                                            <input type="file"  name="Photo" value="Upload your profile picture" class="form-control">                   
                                            </p>
                                        </div>		



                                </div>

                    </div>
                        <div class="new">
                        <button type="submit" class="btn btn-success btn-lg" name="changeCuDetail">Change your details 
                        </button>
                        </div>
                    </div>

                </div>
                
            
            </form>
            </div>
            
        <!--                                                /    Customer edit form-->    
        
        </div>
        </center>
    </div>


    
        <?php
    }
    else
    {
        ?>
        
            
            <h1>you want log</h1>
<!--            <script>    window.location = 'customerAccount.php';</script>-->
    
        
    
        <?php
    }
    
    
    ?>
    

    <?php include("footer.php");?>
    
    
</body>
    
 
</html>



<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    
    echo('<script>'.'window.location = "#id'.$id.'";'.'</script>');
}



if(isset($_POST['SendFeedback']))
{
    $oIdF =  mysqli_real_escape_string($conn,strip_tags($_POST['O_id']));
    $cIdF =  mysqli_real_escape_string($conn,strip_tags($_POST['C_id']));
    $coIdF =  mysqli_real_escape_string($conn,strip_tags($_POST['Co_id']));
    $dateF =  date( "Y-m-d" );
    $textF =  mysqli_real_escape_string($conn,strip_tags($_POST['Text']));
    
    $sqlF = "INSERT INTO `feedback` (`C_id`, `O_id`, `Co_id`, `Review`, `Fe_img`, `Fe_date`) VALUES ($cIdF, $oIdF, $coIdF, '$textF', NULL, '$dateF');";
    
    if(mysqli_query($conn,$sqlF))
    {
        ?>
            <script>
                    window.location = "customerAccount.php?id=<?php echo($oIdF); ?>";
            </script>
        <?php   
  
    }
    else
    {
        echo($sqlF);
    }

    
}



if(isset($_POST['ConfirmOrderReceived']))
{
    $conRec =  mysqli_real_escape_string($conn,strip_tags($_POST['ConfirmOrderReceived']));
    $oIdRec =  mysqli_real_escape_string($conn,strip_tags($_POST['O_id']));
    
    
    $sqlCon = "UPDATE `order` SET `Receiver_confirm`='Received' WHERE `O_id`=$oIdRec";
    
    if(mysqli_query($conn,$sqlCon))
    {
        ?>
            <script>
                window.location = "customerAccount.php?id=<?php echo($oIdRec); ?>";
            </script>
        <?php   
    }
    else
    {
       echo($sqlCon); 
    }
}



if(isset($_POST['SendMessage']))
{
    $oIdM = mysqli_real_escape_string($conn,strip_tags($_POST['O_id']));
    $cIdM = mysqli_real_escape_string($conn,strip_tags($_POST['C_id']));
    $dateM =  date( "Y-m-d" );
    $textM =  mysqli_real_escape_string($conn,strip_tags($_POST['Text']));
    
    $sqlM = "INSERT INTO `c_message` (`M_id`, `O_id`, `C_id`, `A_id`, `To`, `DateTime`, `Text`) VALUES (NULL, '$oIdM', '$cIdM', NULL, 'admin', '$dateM', '$textM');";
    
    if(mysqli_query($conn,$sqlM))
    {
        ?>
            <script>
                window.location = "customerAccount.php?id=<?php echo($oIdM); ?>";
            </script>
        <?php   
  
    }
    else
    {
        echo($sqlM);
    }
}





function resizeImage($resorseType,$image_width,$image_hight){
        $resizeWidth = 500;
        $resizeHight = 500;
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHight);
        imagecopyresampled($imageLayer,$resorseType,0,0,0,0,$resizeWidth,$resizeHight,$image_width,$image_hight);
        return $imageLayer;        
}



if(isset($_POST['changeCuDetail']))
{
     $cuName = mysqli_real_escape_string($conn,strip_tags($_POST['Cu_name']));
     $cuEmail = mysqli_real_escape_string($conn,strip_tags($_POST['Cu_email']));
     $cuPassword = mysqli_real_escape_string($conn,strip_tags($_POST['Cu_password']));
     $cuAddress = mysqli_real_escape_string($conn,strip_tags($_POST['Address']));
     $cuNumber = mysqli_real_escape_string($conn,strip_tags($_POST['Cu_contact_number']));
     $cuCity = mysqli_real_escape_string($conn,strip_tags($_POST['City']));
     $cuProvince = mysqli_real_escape_string($conn,strip_tags($_POST['Province']));
     $cuZip = mysqli_real_escape_string($conn,strip_tags($_POST['Zip_code']));
//     $photo = mysqli_real_escape_string($conn,strip_tags($_POST['Photo']));
    
     
    
     
    
    
    $sqlCuUp = "UPDATE `customer` SET `Cu_name` = '$cuName', `Cu_email` = '$cuEmail', `Cu_password` = '$cuPassword', `Address` = '$cuAddress', `Cu_contact_number` = '$cuNumber', `City`= '$cuCity', `Province`='$cuProvince', `Zip_code`='$cuZip' WHERE `customer`.`C_id` = $cuId;";
    
    if(mysqli_query($conn,$sqlCuUp))
    {
        if(is_uploaded_file($_FILES['Photo']['tmp_name']))
        {
            
            $fileName = $_FILES['Photo']['tmp_name'];
            $sourceProperties = getimagesize($fileName);
            $resizeFileName = time();
            $uploadPath = "./uploads/";
            $fileExt = pathinfo($_FILES['Photo']['name'],PATHINFO_EXTENSION);
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
            //move_uploaded_file($fileName,$uploadPath.$resizeFileName.".".$fileExt);
            
            
            
//            $imgData = addslashes(file_get_contents($_FILES['Photo']['tmp_name']));        
            $sqlCuUp1 = "UPDATE `customer` SET `Photo`='$imgData' WHERE `customer`.`C_id` = $cuId;";
            
            if(mysqli_query($conn,$sqlCuUp1))
            {
                
            }
            else
            {
                echo('<script>'.' window.alert("The picture cannot be UPLOADED \n SEND another");'.'</script>');
//                echo($sqlCuUp1);
            }
        }
        
//        header("Location: customerAccount.php");
        ?>
            
            <script>
                window.location = 'customerAccount.php';
            </script>
        <?php
    }
    else
    {
        echo('<script>'.' window.alert("The data is not ACCURATE");'.'</script>');
//        echo($sqlCuUp);
    }
    
}





if ( isset( $_GET[ 'deleteId' ] ) )
{
    $del_sql = "DELETE FROM `$_GET[table]` WHERE `$_GET[table]`.`$_GET[idName]` = $_GET[deleteId];";

    if ( mysqli_query( $conn, $del_sql ) ) 
    {

        ?>
        <script>
            window.location = "customerAccount.php";
        </script>

        <?php
    }
    else
    {
        echo($del_sql);
    }
}





?>

