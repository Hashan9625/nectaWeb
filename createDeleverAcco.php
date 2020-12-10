<?php

include('conn.php');


?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>createAccount</title>
    
<!--    <link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">-->
<!--    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">-->


    <link href="css/createAccount.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="dAcc" class="crea"> 
    
 
     <div>
        <div class="creB well ">
            <h2 class="creT">Create <span class="label label-success">NECTA</span> delever  Account</h2>

        </div>
        
    <div class="row lB">
    <form method="post" autocomplete="on">

      <div class="col-lg-9 r1">
                <div class="row">
                    <div class="col-sm-6 l1">
                        <h3 class="hT">Full name*</h3>
                        <input type="text" name="name" class="form-control" placeholder="Enter your first and last name" required>
                        
                        <h3 class="hT">Email Address*</h3>
                        <input type="email" name="email" class="form-control" placeholder="Please enter your Email" required>
                        
                        <h3 class="hT">Password*</h3>
                        <input type="password" name="cuPassword" class="form-control" placeholder="Minium 6 characters" minlength="6" maxlength="20" required>
                       
                       
                        <h3 class="hT" >Area*</h3>
                        <textarea name="area" class="form-control" placeholder="Please enter your Area" required></textarea>
 
                    </div>

                    <div class="col-sm-6 l2">
                       
                         
                        <h3 class="hT"><span class="glyphicon glyphicon-phone-alt area-hidden=true"></span>   phone Number *</h3>
                        <input type="tel" name="contactNumber1" class="form-control" placeholder="Please enter your phone number" pattern="[0-9]{10}" required>
                        
                        <h3 class="hT"><span class="glyphicon glyphicon-phone area-hidden=true"></span> phone Number*</h3>
                        <input type="tel" name="contactNumber2" class="form-control" placeholder="Please enter your phone number" pattern="[0-9]{10}" required>
                        
                        <h3 class="hT">Delever Fee</h3>
                        <input type="text" name="delePrice" class="form-control" placeholder="Enter your delever Fee">
                        
                    </div>

                </div>

    </div>

            <div class="col-lg-3 l3">
                <div class="bp">
                
<!--                    <label><input type="checkbox"> I want to receive exclusive offers and promotion form <span class="badge">Necta</span></label>-->
                    <div class="butB">
                        
                        <input type="submit" name="createDeleverAccount"  value="Done" class="but">
                        <input type="button" name = "cancel" value="Cancel" class="but2" onClick="document.getElementById('dAcc').style.display = 'none'" >
                    </div>
                    
                </div>
                
                
                


            </div>
        <input type="hidden" name = "customer" value="permanent">
        </form>
        <div class="creComm">
        
            <h2 class="creComment" id="creComment">Create Delever account</h2>
        </div>
        
       </div>



    </div>
    
    
    
</div>
</body>
    
    
     
    
    
</html>

<?php

    if(isset($_POST['createDeleverAccount']))
    {
        $name = mysqli_real_escape_string($conn,strip_tags($_POST['name']));
        $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
        $cuPassword = mysqli_real_escape_string($conn,strip_tags($_POST['cuPassword']));
        $contactNumber1 = mysqli_real_escape_string($conn,strip_tags($_POST['contactNumber1']));
        $contactNumber2 = mysqli_real_escape_string($conn,strip_tags($_POST['contactNumber2']));
        $area = mysqli_real_escape_string($conn,strip_tags($_POST['area']));
        $delPrice = mysqli_real_escape_string($conn,strip_tags($_POST['delePrice']));
        
        /*  --------------------------------------------------------------------------------------------   check email*/
        $Customer = "SELECT * FROM `delever` WHERE De_email = '$email'"; 
        $customer = mysqli_query($conn,$Customer);
        
        if(mysqli_fetch_assoc($customer))
        {
            ?>   <script>    window.alert("Email is alredy Enterd");   </script>   <?php
            
        }
        else
        {           /*--------------------------------------------------------------------------------------   upload data   */
            $insert_sql = "INSERT INTO `delever` (`D_id`, `De_name`, `De_email`, `De_password`, `De_contact_number1`, `Delever_price`, `Area`, `De_photo`, `De_contact_number2`) VALUES (NULL, '$name', '$email', '$cuPassword', '$contactNumber1', '$delPrice', '$area', NULL, '$contactNumber2');";
        
    
        
            if(mysqli_query($conn,$insert_sql)) /* -----------------------------------------     some eror in other browsers  ****   **  **  ** */
            {
                
               ?>
                     
                    <script>
                        window.alert("accoun is created");
                    </script>

                <?php
            }
            else
            {
                echo("Error".$insert_sql."<br>".mysqli_error($conn));
            }
        }
        
     
        
        
    }
//mysqli_close($conn);
?>


<!--*********************************                                                               THIS for                TEST       -->
<!-- <script>    document.getElementById('dAcc').style.display = 'block'</script>-->
       
  