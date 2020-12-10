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
<div id="guestF" class="crea"> 
    
 
     <div>
        <div class="creB well ">
            <h2 class="creT">Fill the form</h2>

        </div>
                  
        
            <div class="row lB">
            <form autocomplete="on">

                      <div class="col-lg-9 r1">
                                <div class="row">
                                    <div class="col-sm-6 l1">
                                        <h3 class="hT">Full name*</h3>
                                        <input type="text" name="name" class="form-control" id="id1" placeholder="Enter your first and last name" value = ''>

                                        <h3 class="hT">Email Address</h3>
                                        <input type="email" name="email" class="form-control" form="buyNow"  placeholder="Please enter your Email">


                                        <h3 class="hT">phone Number*</h3>
                                        <input type="tel" name="contactNumber" class="form-control req" id="id2" placeholder="Please enter your phone number" pattern="[0-9]{10}" value = ''>


                                        <h3 class="hT">Zip Code</h3>
                                        <input type="number" name="zipCode" class="form-control" form="buyNow"  placeholder="Enter your postel ZIP code">


                                    </div>

                                    <div class="col-sm-6 l2">
                                        <h3 class="hT" >Address*</h3>
                                        <textarea name="address" class="form-control req" id="id3" placeholder="Please enter your Address" value = ''></textarea>


                                        <h3 class="hT">City</h3>
                                        <input type="text" name="city" class="form-control" form="buyNow"  placeholder="Enter your City">

                                        <h3 class="hT" id="pr">Province</h3>
                                        <input type="text" name="province" class="form-control" form="buyNow"  placeholder="Enter your Province">
                                     </div>

                                </div>

                    </div>

                    <div class="col-lg-3 l3">
                                <div class="bp">


                                        <input type="button"  onClick="done()" value="Done" class="but">
                                        <input type="button" name = "cancel" value="Cancel" class="but2" onClick="document.getElementById('guestF').style.display = 'none'" >
                                </div>
                        
                   <div class="creComm">

                        <h2 class="creComment" >Enter your details</h2>
                    </div>
                        
                    </div>



 

              </div>
        <input type="hidden" name="guestF" value="yes">
        <input type="hidden" name = "customer" form="buyNow"  value="tempery">
        </form>
       
        
       </div>



    </div>
    
    

    
    
<script>
        function done() {
            var inpObj1 = document.getElementById("id1");
            var inpObj2 = document.getElementById("id2");
            var inpObj3 = document.getElementById("id3");
            
            if (inpObj1.value == "") 
            {
                document.getElementById("id1").style.backgroundColor = "red";
                window.location="#id1";
            } 
            else 
            {

                if (!inpObj2.checkValidity()||inpObj2.value == "") 
                {
                    document.getElementById("id2").style.backgroundColor = "red";
                    window.location="#id2";
                } 
                else 
                {

                    if (inpObj3.value == "") 
                    {
                        document.getElementById("id3").style.backgroundColor = "red"; 
                        window.location="#id3";
                    } 
                    else 
                    {
                        document.getElementById('bAlt2').style.display = 'block';
                        document.getElementById('guestF').style.display = 'none';
                        
                        var id1 = document.getElementById('id1').value;
                        var id2 = document.getElementById('id2').value;
                        var id3 = document.getElementById('id3').value;
                        
                        document.getElementById('nameOC').value = id1;
                        document.getElementById('coNumberOC').value = id2;
                        document.getElementById('addressOC').innerHTML = id3;
                        

                    } 
                    
                } 

            } 
        } 
</script>

    
    
    
</div>
</body>
        
</html>

<?php
/*
    if(isset($_POST['guestF']))
    {
        $name = mysqli_real_escape_string($conn,strip_tags($_POST['name']));
        $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
        $contactNumber = mysqli_real_escape_string($conn,strip_tags($_POST['contactNumber']));
        $address = mysqli_real_escape_string($conn,strip_tags($_POST['address']));
        $city = mysqli_real_escape_string($conn,strip_tags($_POST['city']));
        $province = mysqli_real_escape_string($conn,strip_tags($_POST['province']));
        $zipCode = mysqli_real_escape_string($conn,strip_tags($_POST['zipCode']));
        $cuType =  mysqli_real_escape_string($conn,strip_tags($_POST['customer']));
        
            --------------------------------------------------------------------------------------   upload data   
           $insert_sql = "INSERT INTO customer(Cu_name,Cu_email,Cu_contact_number,Address,City,Province,Zip_code,Cu_type)VALUES('$name','$email','$contactNumber','$address','$city','$province','$zipCode','$cuType')";
        
    
        
            if(mysqli_query($conn,$insert_sql))  -----------------------------------------     some eror in other browsers  ****   **  **  ** 
            {
                $_SESSION["id"] = mysqli_insert_id($conn);
                $_SESSION['Cu_name'] = $name;
                ?>
                    <script>
                        window.alert("success");
                        document.getElementById('bAlt2');
                    </script>

                <?php
            }
            else
            {
                echo("Error".$insert_sql."<br>".mysqli_error($conn));
            }
        
     
        
        
    }
//mysqli_close($conn);
*/
?>


<!--*********************************                                                               THIS for                TEST       
 <script>    document.getElementById('cAcc').style.display = 'block'</script>
       
 --> 