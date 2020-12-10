

   
    
<?php
                                if(isset($_SESSION['id']))
                                {
                                    $id = $_SESSION['id'];
                                    
                                    
                                    
                                    $Customer = "SELECT * FROM customer WHERE C_id=$id";
                                    $customer = mysqli_query($conn,$Customer);
                                


                                                          while($column = mysqli_fetch_assoc($customer))  

                                                        {
                                                              
                                                              $cuName = $column['Cu_name'];
                                                              $address = $column['Address'];
                                                              $cuNumber = $column['Cu_contact_number'];
                                                              
                                                        
                                                              
                                                              
                                                        }

                              
                                    
                                    
                                    
                                    
                                }
                                else
                                {
                                      $cuName = "";
                                      $address = "";
                                      $cuNumber = "";
                                
                                }

                             
                            
?>                            







<!doctype html>
<html>
<head>
<meta charset="utf-8">
    
<!--        **************************************************************                                                  FOR   TEST -->
<!--<title>orderConf</title>-->

<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css">-->
<!--<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">-->
 
<link href="css/order.css" rel="stylesheet" type="text/css"> 
</head>
    
    
    

<body>   
    
    
    
    <div id="bAlt2" class="orConf">
        <center>
        <form method="post" id="buyNow">
            
            
        <div class="bAlt2l1">
            
           <div class="orH">
                <h2 class="orT">Order Confiramation</h2>
           </div>
            <div class="orL1">
                
                <table width="100%">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-user"></span>
                        </td>
                        
                        <td>
                            <input type="text" name="nameOC" id="nameOC" class="form-control" value="<?php   echo($cuName);    ?>" >
                        </td>
                    
                    </tr>
                    
                    
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-home"></span>
                        </td>
                        
                        <td>
                            <textarea name="addressOC" id="addressOC" class="form-control" ><?php     echo($address);    ?></textarea>
                        </td>
                    
                    </tr>
                    
                    
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-phone"></span>
                        </td>
                        
                        <td>
                            <input type="tel" class="form-control" name="coNumberOC" id="coNumberOC" pattern="[0-9]{10}" value="<?php   echo($cuNumber);   ?>">
                        </td>
                    
                    </tr>
                
                </table>
            
            </div>
            
          <div id="pay" class="orL2">
                
                <div class="orL2H">
                    
                    <h2 class="orL2T">PAYMENT METOD</h2>
                
                </div>
                
                <div class="orL2iB">
                    
                    <input type="number" class="form-control" placeholder="Card Number">
                
                </div>
            
                
                <div class="orL2iB">
                    
                    <input type="number" class="form-control" placeholder="Card Number">
                
                </div>
            
                
                <div class="orL2iB">
                    
                    <input type="number" class="form-control" placeholder="Card Number">
                
                </div>
            
                
                <div class="orL2iB">
                    
                    <input type="number" class="form-control" placeholder="Card Number">
                
                </div>
            
                
            <div class="orL2iB">
                    
                    <input type="number" class="form-control" placeholder="Card Number">
                
              </div>
            
            <button type="button" class="btn btn-danger btn-lg orL2Btn">DONE</button>
            </div>
            
            
            
            <div class="orL3">
                
                <div class="orL3It">
                    <div class="orL3H">
                        <h2>Order summary (<?php  echo($Co_name);  ?>)</h2>  
                        <hr>
                    </div>

                    <div class="row">
                            
                            <div class="col-xs-4">
                                
                                 <?php   echo('<img src = "data:image;base64,'.base64_encode($coImg).'" alt="No image" class="orCImg"');     ?>   
<!--                                -->
                        
                            </div>
                    
                            <div class="col-xs-5 orL3i1B">
                                <p class="orL3i1T" id="Subtot">Subtotal</p>
                                <hr>
                                <p class="orL3i1T">Quantity</p>
                                <hr>
                                <p class="orL3i1T">Size</p>
                               
                            </div>
                            
                            <div class="col-xs-3 orL3i1B" >
                                 <p class="orL3i2T " id="subtot">Rs:- 120 /=</p>
                                <hr>
                                <p class="orL3i2T" id="qun">-- 00  --</p> 
                                <hr>
                                <p class="orL3i2T" id="siz"> 500ml  </p>
                            </div>
                        

                    
                    
                    </div>
                </div>
                           
            
            </div>
            
            <div class="orL4">
                <div class="row">
                    <div class="col-xs-6">
                      <p class="orL4i1T">Grand total</p>
                        <p class="orL4i2T" id="grand">Rs:- 1050/=</p>  
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" name="buyNow" value="yes" class="orL4iBtn btn btn-lg btn-success ">BUY NOW</button>
                            </div>
                                
                            <div class="col-sm-6">
                                <button type="button" class="orL4iBtn btn btn-lg btn-danger "  onClick="document.getElementById('bAlt2').style.display = 'none'">CANCEL</button>
                            </div>
                        
                        </div>

                      
                    </div>
                
                </div>
            
            
            </div>
            
            
        
        </div>
        </form>
        </center>
    </div>
    
   
</body>
    
    
<!--    *********************************                                                               THIS for                TEST    -->
<!-- <script>    document.getElementById('bAlt2').style.display = 'block'</script>-->
    
</html>





<?php

if(isset($_SESSION['id']))
{
    if(isset($_POST['buyNow']))        
    {
        
        
        $cuNewName = mysqli_real_escape_string($conn,strip_tags($_POST['nameOC']));
        $cuNewAddress = mysqli_real_escape_string($conn,strip_tags($_POST['addressOC']));
        $cuNewNumber = mysqli_real_escape_string($conn,strip_tags($_POST['coNumberOC']));
        $cId =  mysqli_real_escape_string($conn,strip_tags($_SESSION['id']));
        

        $sql = "UPDATE `customer` SET `Cu_name` = '$cuNewName', `Address` = '$cuNewAddress', `Cu_contact_number` = '$cuNewNumber' WHERE `customer`.`C_id` = $cId;";
        
        if(mysqli_query($conn,$sql))
        {
                $_SESSION['Cu_name'] = $cuNewName;
            
                $P_id = mysqli_real_escape_string($conn,strip_tags($_POST['P_id']));
                $orQuantity = mysqli_real_escape_string($conn,strip_tags($_POST['orQuantity']));
                $delOption = mysqli_real_escape_string($conn,strip_tags($_POST['delOption']));
                $orType =  "Buy";

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
                    
                    $sql = "UPDATE `product` SET `Pr_quntity` = `Pr_quntity`-$orQuantity WHERE `product`.`P_id` = $P_id";
                    
                    if(mysqli_query($conn,$sql))
                    {
                        ?>  <script>   
                                window.alert("You buy success ! \n THANK YOU");
                                window.location = window.location.href;  
                            </script>  
                        <?php 
                    }
                    else
                    {
                        echo("Error".$sql."<hr>".mysqli_error($conn));
                    }
 
                }
                else
                {
                    echo("Error".$sql."<hr>".mysqli_error($conn));
                }

            
        }
        else
        {
            echo("Error".$sql."<hr>".mysqli_error($conn));
        }
    }
    
}
else
{
        if(isset($_POST['buyNow']))
        
        {
            $cuNewName = mysqli_real_escape_string($conn,strip_tags($_POST['nameOC']));
            $cuNewAddress = mysqli_real_escape_string($conn,strip_tags($_POST['addressOC']));
            $cuNewNumber = mysqli_real_escape_string($conn,strip_tags($_POST['coNumberOC']));

            $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
            $zipCode = mysqli_real_escape_string($conn,strip_tags($_POST['zipCode']));
            $city = mysqli_real_escape_string($conn,strip_tags($_POST['city']));
            $province = mysqli_real_escape_string($conn,strip_tags($_POST['province']));
            $cuType = mysqli_real_escape_string($conn,strip_tags($_POST['customer']));
            
            
            $sql = "INSERT INTO `customer` (`C_id`, `Cu_name`, `Cu_email`, `Cu_password`, `Address`, `Cu_contact_number`, `Photo`, `City`, `Province`, `Zip_code`, `Cu_type`) VALUES (NULL, '$cuNewName', '$email', NULL, '$cuNewAddress', '$cuNewNumber', NULL, '$city', '$province', '$zipCode', '$cuType');";
            


            if(mysqli_query($conn,$sql))
            {
                $_SESSION['USER'] = "customer/*-A5+";
                $_SESSION['id'] = mysqli_insert_id($conn);
                $_SESSION['Cu_name'] = $cuNewName;


                $cId =  mysqli_real_escape_string($conn,strip_tags($_SESSION['id']));
                $P_id = mysqli_real_escape_string($conn,strip_tags($_POST['P_id']));
                $orQuantity = mysqli_real_escape_string($conn,strip_tags($_POST['orQuantity']));
                $delOption = mysqli_real_escape_string($conn,strip_tags($_POST['delOption']));
                $orType =  "Buy";

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
                    $sql = "UPDATE `product` SET `Pr_quntity` = `Pr_quntity`-$orQuantity WHERE `product`.`P_id` = $P_id";
                    
                    if(mysqli_query($conn,$sql))
                    {
                        ?>  <script>   
                                window.alert("You buy success ! \n THANK YOU");
                                window.location = window.location.href;  
                            </script>  
                        <?php 
//                            header('Location: index.php#');
//                              end();
//
//                        
////                        header('Refresh:1');
////                        end();

                    }
                    else
                    {
                        echo("Error".$sql."<hr>".mysqli_error($conn));
                    }


                }

                
            }
            else
            {
                echo("Error".$sql."<hr>".mysqli_error($conn));
            }
        }

    
}





?>
