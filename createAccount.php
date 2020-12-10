<?php
include('conn.php');


?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--
    <title>createAccount</title>
    
    <link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

-->

    <link href="css/createAccount.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="cAcc" class="crea"> 
    
 
     <div>
        <div class="creB well ">
            <h2 class="creT">Create your   <span class="label label-success">NECTA</span>  Account</h2>

        </div>
        
    <div class="row lB">
    <form method="post" autocomplete="on" action="">

      <div class="col-lg-9 r1">
                <div class="row">
                    <div class="col-sm-6 l1">
                        <h3 class="hT">Full name*</h3>
                        <input type="text" name="name" class="form-control" placeholder="Enter your first and last name" required>
                        
                        <h3 class="hT">Email Address*</h3>
                        <input type="email" name="email" class="form-control" placeholder="Please enter your Email" required>
                        
                        <h3 class="hT">Password*</h3>
                        <input type="password" name="cuPassword" class="form-control" placeholder="Minium 6 characters" minlength="6" maxlength="20" required>
                        
                        <h3 class="hT">phone Number*</h3>
                        <input type="tel" name="contactNumber" class="form-control" placeholder="Please enter your phone number" pattern="[0-9]{10}" required>
                        
                       

                    </div>

                    <div class="col-sm-6 l2">
                        <h3 class="hT" >Address*</h3>
                        <textarea name="address" class="form-control" placeholder="Please enter your Address" required></textarea>
                        
                        
                        <h3 class="hT">City</h3>
                        <input type="text" name="city" class="form-control" placeholder="Enter your City">
                        
                        <h3 class="hT">Province</h3>
                        <input type="text" name="province" class="form-control" placeholder="Enter your Province">
                        
                        <h3 class="hT">Zip Code</h3>
                        <input type="number" name="zipCode" class="form-control" placeholder="Enter your postel ZIP code">
                    </div>

                </div>

    </div>

            <div class="col-lg-3 l3">
                <div class="bp">
                
                    <label><input type="checkbox"> I want to receive exclusive offers and promotion form <span class="badge">Necta</span></label>
                    <div class="butB">
                        
                        <input type="submit" name="createAccount"  value="Done" class="but">
                        <input type="button" name = "cancel" value="Cancel" class="but2" onClick="document.getElementById('cAcc').style.display = 'none'" >
                    </div>
                    
                </div>
                
                
                


            </div>
        <input type="hidden" name = "customer" value="permanent">
        </form>
        <div class="creComm">
        
            <h2 class="creComment" id="creComment">Create your account</h2>
        </div>
        
       </div>



    </div>
    
    
    
</div>
</body>
    
    
     
    
    
</html>

<?php

    if(isset($_POST['createAccount']))
    {
        $name = mysqli_real_escape_string($conn,strip_tags($_POST['name']));
        $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
        $cuPassword = mysqli_real_escape_string($conn,strip_tags($_POST['cuPassword']));
        $contactNumber = mysqli_real_escape_string($conn,strip_tags($_POST['contactNumber']));
        $address = mysqli_real_escape_string($conn,strip_tags($_POST['address']));
        $city = mysqli_real_escape_string($conn,strip_tags($_POST['city']));
        $province = mysqli_real_escape_string($conn,strip_tags($_POST['province']));
        $zipCode = mysqli_real_escape_string($conn,strip_tags($_POST['zipCode']));
        $cuType =  mysqli_real_escape_string($conn,strip_tags($_POST['customer']));
        
        /*  --------------------------------------------------------------------------------------------   check email*/
        $Customer = "SELECT * FROM `customer` WHERE Cu_email = '$email' AND Cu_type = 'permanent'"; //hashanacer@gmail.com
        $customer = mysqli_query($conn,$Customer);
        
        if(mysqli_fetch_assoc($customer))
        {
            ?>   <script>    window.alert("Email is alredy Enterd"); 
                            document.getElementById('cAcc').style.display='block';
                </script>   <?php
            
        }
        else
        {           /*--------------------------------------------------------------------------------------   upload data   */
            $insert_sql = "INSERT INTO customer(Cu_name,Cu_email,Cu_password,Cu_contact_number,Address,City,Province,Zip_code,Cu_type)VALUES('$name','$email','$cuPassword','$contactNumber','$address','$city','$province','$zipCode','$cuType')";
        
    
        
            if(mysqli_query($conn,$insert_sql)) /* -----------------------------------------     some eror in other browsers  ****   **  **  ** */
            {
                 $_SESSION["id"] = mysqli_insert_id($conn);
                 $_SESSION['Cu_name'] = $name;
                 $_SESSION["USER"] = "customer/*-A5+";
                ?>
                     
                    <script>
                        window.alert("accoun is created\nDon't forget password");
                        window.location="products.php";
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


<!--*********************************                                                               THIS for                TEST       
 <script>    document.getElementById('cAcc').style.display = 'block'</script>
       
 --> 