

   
    
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

    
    
    <div id="sAlt2" class="orConf">
        <center>
        <form method="post" id="buyNow">
            
            
        <div class="bAlt2l1">
            
           <div class="orH">
                <p class="orT">Buy Confiramation</p>
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
                    
                    
                    
                        
            
                
                <div class="orL3Itsho" id="summary<?php   echo($oId);     ?>">
                    <div class="orL3H">
                        <h2>Order summary (<?php echo($prName);  ?>)</h2>  
                        <hr>
                    </div>

                    <div class="row">
                            
                            <div class="col-xs-4">
                                
                                 <?php  echo('<img src = "data:image;base64,'.base64_encode($prImg).'" alt="No image" class="orCImg"');     ?>   
<!--                                -->
                        
                            </div>
                    
                            <div class="col-xs-5 orL3i1B">
                                <p class="orL3i1T" id="Subtot">Subtotal :- <?php echo($orQuan."*".$prPrice."/=");  ?></p>
                                <hr>
                                <p class="orL3i1T">Quantity</p>
                                <hr>
                                <p class="orL3i1T">Size</p>
                               
                            </div>
                            
                            <div class="col-xs-3 orL3i1B" >
                                 <p class="orL3i2T " id="subtot">Rs:-<?php echo($prPrice*$orQuan);  ?>  /=</p>
                                <hr>
                                <p class="orL3i2T" id="qun">-- <?php echo($orQuan);  ?>  --</p> 
                                <hr>
                                <p class="orL3i2T" id="siz"> <?php echo($prSize);  ?>ml  </p>
                            </div>
                        

                    
                    
                    </div>
                </div>
                           
            
          
 
                   
                    
                    
                    
                <?php
                
                
                
                
                
                
                
            }
        }
        
        
    }
                    
         
                    
        
                    
                    
    ?>
                    
               
                
     
            
            
            
            
            
            
            
            
            
          </div>    
            
            
            
            
            
            
            
            
            
            
            
           
            <div class="orL4">
                <div class="row">
                    <div class="col-xs-6">
                      <p class="orL4i1T">Grand total</p>
                        <p class="orL4i2T" id="grand">Rs:- 000 /= </p>  
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" name="buyNow" value="yes" class="orL4iBtn btn btn-lg btn-success ">BUY NOW</button>
                            </div>
                                
                            <div class="col-sm-6">
                                <button type="button" class="orL4iBtn btn btn-lg btn-danger "  onClick="document.getElementById('sAlt2').style.display = 'none'">CANCEL</button>
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
<!-- <script>    document.getElementById('sAlt2').style.display = 'block';</script>-->
    
</html>





<?php

if(isset($_SESSION['id']))
{
    if(isset($_POST['buyNow']))        
    {
        if(isset($_POST['click']))
        {  
        
        
                $cuNewName = mysqli_real_escape_string($conn,strip_tags($_POST['nameOC']));
                $cuNewAddress = mysqli_real_escape_string($conn,strip_tags($_POST['addressOC']));
                $cuNewNumber = mysqli_real_escape_string($conn,strip_tags($_POST['coNumberOC']));
                $cId =  mysqli_real_escape_string($conn,strip_tags($_SESSION['id']));


                $sql = "UPDATE `customer` SET `Cu_name` = '$cuNewName', `Address` = '$cuNewAddress', `Cu_contact_number` = '$cuNewNumber' WHERE `customer`.`C_id` = $cId;";

                if(mysqli_query($conn,$sql))
                {
                        $_SESSION['Cu_name'] = $cuNewName;



                        $click = $_POST['click'];
                        foreach($click as $orId)
                        {
                            $sqlUp = "UPDATE `order` SET `Or_type` = 'Buy' WHERE `order`.`O_id` = $orId;";
                            
                            if(mysqli_query($conn,$sqlUp))
                            {
                                if(isset($_POST['delType']))
                                {
                                    $sqlUp1 = "UPDATE `order` SET `Del_option` = '$_POST[delType]' WHERE `order`.`O_id` = $orId;";
                                    if(mysqli_query($conn,$sqlUp1))
                                    {
                                        
                                    }
                                    else
                                    {
                                       echo("Error".$sql."<hr>".mysqli_error($conn)); 
                                    }
                                }
                                
                                $sqlGt = "SELECT * FROM `order` WHERE `order`.`O_id` = $orId;";
                                $tableOrder = mysqli_query($conn,$sqlGt);
                                
                                while($colum3 = mysqli_fetch_assoc($tableOrder))
                                {
                                    $pId = $colum3['P_id'];
                                    $orQuantity = $colum3['Or_quantity'];
                                    
                                    $sqlUp3 = "UPDATE `product` SET `Pr_quntity` = `Pr_quntity`-$orQuantity WHERE `product`.`P_id` = $pId";
                                    
                                    if(mysqli_query($conn,$sqlUp3))
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
                                

    
                            }
                            else
                            {
                                echo("Error".$sqlUp.mysqli_error($conn));
                            }
                        }


 

                }
                else
                {
                    echo("Error".$sql."<hr>".mysqli_error($conn));
                }
            
            
            
         }
        else
        {
             ?>  <script>    window.alert("Please click item")   </script>   <?php
        }

            
            

            
            
            
    }
    
}



?>
