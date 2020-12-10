<?php
session_start();
include('conn.php');



?>


<?php



$home = "";
$products = "";
$shopping = "";
$about = "";
$delive = "active";
$contact = "";


//$_SESSION["id"];
$_SESSION["lang"] = "E";
//$_SESSION["prePage"];
//$_SESSION['Cu_name']);
?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delivery</title>
    
 
    
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
 <link href="css/delivery.css" rel="stylesheet" type="text/css">      

</head>

<body>
    
    
    <?php     include("header.php");      ?>
    
    
    
    <div class="">
        <div class="del1">

             <h1 class="delheader">DELIVERY</h1>
        </div>
    </div>
    <div class="">
        <div class="d2">
            <center>
            
            
            <ul class="delul">
                
         
                
        
                
<?php
                
                
                
    $sql = "SELECT * FROM `delever`";
    $table = mysqli_query($conn,$sql);
                
    while($column = mysqli_fetch_assoc($table))
    {
        $deName = $column['De_name'];
        $deEmail = $column['De_email'];
        $deCoNumber1 = $column['De_contact_number1'];
        $deCoNumber2 = $column['De_contact_number2'];
        $area = $column['Area'];
        $dePhoto = $column['De_photo'];
        
    
        ?>
        
                
                
            <li class="dellist">
                    


                           <table class="table deltable">
                            <caption class="delcap"><strong class="delCap">Deliver</strong></caption>
                                <tr>
                                    <th class="th delImgH" rowspan="2"> <?php    echo('<img src = "data:image;base64,'.base64_encode($dePhoto).'" alt = "photo" class="delImg">');    ?>   <!--<img src="images/a.gif" class="delImg" alt="photo">  -->  </th>
                                    <th class="th" colspan="2"><p class="delH">Name</p></th>
                                    <th class="th" colspan="2"><p class="delH">Contact No.</p></th>
                                    <th class="th" colspan="2"><p class="delH">Email Address</p></th>
                                    <th class="th" colspan="2"><p class="delH">Area</p></th>
                                </tr>
                                <tr>
                                    <td><span class="delC delG glyphicon glyphicon-user"></span></td>
                                    <td><p class="delC name"><?php    echo($deName);   ?></p></td>
                                    <td><span class="delC delG glyphicon glyphicon-phone-alt area-hidden=true"></span><br><br><br><span class="delC delG glyphicon glyphicon-phone area-hidden=true"></span></td>
                                    <td><p class="delC contact"><?php    echo($deCoNumber1);    ?></p><br><p class="delC"><?php    echo($deCoNumber2);    ?></p></td>
                                    <td><span class="delC delG glyphicon glyphicon-envelope area-hidden=true"></span></td>
                                    <td><a href="<?php    echo('mailto:'.$deEmail);    ?>" class="delC"><?php    echo($deEmail);    ?></a></td>
                                    <td><span class="delC delG glyphicon glyphicon-map-marker area-hidden=true"></span></td>
                                    <td><p class="delC area"><?php    echo($area);    ?></p></td>
                                </tr>
                            </table>
                    

             </li> 
                
                
                
        <?php
        
        
    }
                
                
                
                
                
                
                
                
    ?>
                
                
                
                
                            
                
              </ul>
            
            </center>
        </div>
    </div>
    
    
    
    
    <?php     include("footer.php");      ?>

</body>
</html>
