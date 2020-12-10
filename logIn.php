
<?php

include('conn.php');


?>





<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--<title>log in</title>-->
      <!--                          ****************************************************************       THIS for TEST         
    <link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
   
      -->
    <link href="css/logIn.css" rel="stylesheet" type="text/css">
    
</head>

<body>
    
  
<div id="log" class="alt">    
    
    
      <div>
        <div class="creB well">
            <h2 class="creT">Log in your   <span class="label label-success">NECTA</span>  <?php  if(isset($_GET['user']))  {  echo($_GET['user']);    }  ?>  Account</h2>

        </div>
        
<div class="lB">
    <form method="post" autocomplete="on">

      <div class=" r1">
              
                                                
                        <h3 class="hT">Email Address*</h3>
                        <input type="email" name="email" class="form-control" placeholder="Please enter your Email" required>
                        
                        <h3 class="hT">Password*</h3>
                        <input type="password" name="cuPassword" class="form-control" placeholder="Minium 6 characters" minlength="6" maxlength="20" required>
                        
                               


      </div>

            <div class=" l3">
                <div class="bp">
                
                    
                    <div class="butB">
                        
                        <input type="submit" name="log"  value="Login" class="but">
                        <input type="button" name = "cancel" value="Cancel" onClick="document.getElementById('log').style.display = 'none'" class="but2">
                    </div>
                    <div class="comB" >
                        
                        <h3 class="comT" id="comment">You want Log In</h3>
                    
                    </div>
                    
                </div>
                
                
                


            </div>

        </form>
       </div>



    </div>
</div>    

</body>
    
    
    
    
    
    
</html>


<?php
   if(isset($_GET['user']))
    {
        ?>    <script>     document.getElementById('log').style.display = "block";    </script>   <?php
       
       if($_GET['user'] == "deliver")
       {
           
            if(isset($_POST['log']))
            {
        
            $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
            $dePassword = mysqli_real_escape_string($conn,strip_tags($_POST['cuPassword']));

            //$Customer = "SELECT * FROM 'customer' WHERE Cu_email = '$email'";
            $sqlD = "SELECT * FROM `delever` WHERE `De_email` = '$email'"; 
            $delever = mysqli_query($conn,$sqlD);






                if ($column = mysqli_fetch_assoc($delever))
                {
                    if($dePassword == $column["De_password"])
                    {
                        
                        $_SESSION["id"] = $column["D_id"];
                        $_SESSION['Cu_name'] = $column["De_name"];
                        $_SESSION["USER"]="deli8/*)";
                        
                        
                        header('Location: deleverAcco.php');
                        end();
                        ?>   <script>   
//                                        window.alert("You are loged in Deliver account");
//                                        window.location = "deleverAcco.php";

                            </script>  
                        <?php

                    }
                    else
                    {
                         ?>   <script>    window.alert("You Enter password is wrong");   
                                         document.getElementById('log').style.display = "block"; 
                                
                                </script>   <?php
                    }
                }
                else
                {
                   // echo($sqlD);
                    ?>   <script>    window.alert("You have not account");
                                     document.getElementById('log').style.display = "block"; 
                        </script>   <?php
                }
 
            
 




        

            }
           
       }
       
       if($_GET['user'] == "admin")
       {
            if(isset($_POST['log']))
            {
        
            $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
            $cuPassword = mysqli_real_escape_string($conn,strip_tags($_POST['cuPassword']));

            //$Customer = "SELECT * FROM 'customer' WHERE Cu_email = '$email'";
            $Admin = "SELECT * FROM `admin` WHERE Ad_email = '$email'"; 
            $admin = mysqli_query($conn,$Admin);






                if ($column = mysqli_fetch_assoc($admin))
                {
                    if($cuPassword == $column["Ad_password"])
                    {
                        
                        $_SESSION["id"] = $column["A_id"];
                        $_SESSION['Cu_name'] = $column["Ad_name"];
                        $_SESSION["USER"]="admin@55%/*)";
                        

    
                        header('Location: adminAcco.php');
                        end();

                        ?> 
                    
                            <script>
                                
//                                        window.location = "adminAcco.php";
//                                        window.alert("You are loged in Admin account");                                        

                            </script>  
                        <?php

                    }
                    else
                    {
                         ?>   <script>    window.alert("You Enter password is wrong");   
                                         document.getElementById('log').style.display = "block"; 
                            </script>   <?php
                    }
                }
                else
                {
                    ?>   <script>    window.alert("You have not account");  
                                     document.getElementById('log').style.display = "block"; 
                        </script>   <?php
                }
 
            
 




        

            }

           
       }
       



    }
    else
    {
        
           if(isset($_POST['log']))
            {
        
            $email = mysqli_real_escape_string($conn,strip_tags($_POST['email']));
            $cuPassword = mysqli_real_escape_string($conn,strip_tags($_POST['cuPassword']));

            //$Customer = "SELECT * FROM 'customer' WHERE Cu_email = '$email'";
            $Customer = "SELECT * FROM `customer` WHERE Cu_email = '$email' AND Cu_type = 'permanent'"; 
            $customer = mysqli_query($conn,$Customer);





                if ($column = mysqli_fetch_assoc($customer))
                {
                    if($cuPassword == $column["Cu_password"])
                    {
                    
                        $_SESSION["id"] = $column["C_id"];
                        $_SESSION['Cu_name'] = $column["Cu_name"];
                        $_SESSION["USER"]="customer/*-A5+";
                        
                        
                        header('Location: '.$_SERVER['REQUEST_URI']);
                        end();

                        ?>   

 

                            <script>   
                                        
//                                        window.location = window.location.href;
//                                        window.alert("You are loged");

                            </script>  
                        <?php

                    }
                    else
                    {
                         ?>   <script>    window.alert("You Enter password is wrong"); 
                                         document.getElementById('log').style.display = "block"; 
                                    
                                </script>   <?php
                    }
                }
                else
                {
                    ?>   <script>    window.alert("You have not account"); 
                                     document.getElementById('log').style.display = "block"; 

                        </script>   <?php
                }
 
            
 


        

            }
        
        
    }




?>



<!--*********************************                                                               THIS for                TEST           
 <script>    document.getElementById('log').style.display = 'block'</script>
    --> 