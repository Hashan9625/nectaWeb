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
<div id="aAcc" class="crea"> 
    
 
     <div>
        <div class="creB well ">
            <h2 class="creT">Create Admin   <span class="label label-success">NECTA</span>  Account</h2>

        </div>
        
    <div class="row lB">
    <form method="post" autocomplete="on">

      <div class="col-lg-9 r1">
                <div class="row">
                    <div class="col-sm-12 l1">
                        <h3 class="hT">Full name*</h3>
                        <input type="text" name="name" class="form-control" placeholder="Enter your first and last name" required>
                        
                        <h3 class="hT">Email Address*</h3>
                        <input type="email" name="email" class="form-control" placeholder="Please enter your Email" required>
                        
                        <h3 class="hT">Password*</h3>
                        <input type="password" name="cuPassword" class="form-control" placeholder="Minium 6 characters" minlength="6" maxlength="20" required>
                        
                        <h3 class="hT">phone Number*</h3>
                        <input type="tel" name="contactNumber" class="form-control" placeholder="Please enter your phone number" pattern="[0-9]{10}" required>
                        
                       

                    </div>

             </div>

    </div>

            <div class="col-lg-3 l3">
                <div class="bp">
                
                    <label><input type="checkbox"> I want to receive exclusive offers and promotion form <span class="badge">Necta</span></label>
                    <div class="butB">
                        
                        <input type="submit" name="createAdminAccount"  value="Done" class="but">
                        <input type="button" name = "cancel" value="Cancel" class="but2" onClick="document.getElementById('aAcc').style.display = 'none'" >
                    </div>
                    
                </div>
                
                
                


            </div>
        <input type="hidden" name = "customer" value="permanent">
        </form>
        <div class="creComm">
        
            <h2 class="creComment" id="creComment">Create account for Admin</h2>
        </div>
        
       </div>



    </div>
    
    
    
</div>
</body>
    
    
     
    
    
</html>

<?php

    if(isset($_POST['createAdminAccount']))
    {
        $name = mysqli_real_escape_string($conn,strip_tags($_POST['name']));
        $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
        $cuPassword = mysqli_real_escape_string($conn,strip_tags($_POST['cuPassword']));
        $contactNumber = mysqli_real_escape_string($conn,strip_tags($_POST['contactNumber']));
         
        /*  --------------------------------------------------------------------------------------------   check email*/
        $Customer = "SELECT * FROM `admin` WHERE Ad_email = '$email'"; 
        $customer = mysqli_query($conn,$Customer);
        
        if(mysqli_fetch_assoc($customer))
        {
            ?>   <script>    window.alert("Email is alredy Enterd");   </script>   <?php
            
        }
        else
        {           /*--------------------------------------------------------------------------------------   upload data   */
            $insert_sql = "INSERT INTO `admin` (`A_id`, `Ad_name`, `Ad_email`, `Ad_password`, `Information`, `Ad_photo`, `Ad_number`) VALUES (NULL, '$name', '$email', '$cuPassword', NULL, NULL, '$contactNumber');";
        
    
        
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
<!-- <script>    document.getElementById('aAcc').style.display = 'block'</script>-->
       
  