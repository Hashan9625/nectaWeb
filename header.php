<?php

/*

$home = "active";
$products = "";
$shopping = "";
$about = "";
$delive = "";
$contact = "";

*/


//$_SESSION["id"];
//$_SESSION["USER"]="admin@55%/*)";
//$_SESSION["lang"] = "E";
//$_SESSION["prePage"];
//$_SESSION['Cu_name']);
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  

<!--head-->
<link href="css/stylehead.css" rel="stylesheet" type="text/css">
</head>

<body style="padding-top: 1%">
 
            
<?php  
    /*---------                     include ALERT               ***********************************/
//    
    include("logIn.php");
    include("createAccount.php");
    
                
    ?>
    

<!--body div tag-->
<header>
	

<div>
	
	<div class="p-5 row back-img">
					<div class="col-lg-6">
						<center>
							  <img src="images/logo.png" class="nectaLogo" />
						</center>		
	  				</div>
					<div class="col-lg-6 p-5">
						<center>
			  
	  					  <h1 class="text-muted bg-color"><strong class="text-color hComent">The best natural juice company in Sri Lanka</strong></h1>
			    
		      
						</center>		
					</div>
					
					
	</div>
  <div class="top-right">
		 
<!--
			 
		   <button class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                 <img src="images/lang.png" width="40px" hight="50px"/>
                 <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">English</a></li>
                    <li><a href="#">සිංහල</a></li>
                    
                  </ul>
			</button>
  				    				
-->
			     				    				
  </div>
	
  <div>
      <div id="carousel1" class="carousel slide" data-ride="carousel">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                
              </button>
              <a class="navbar-brand text-center text-success " href="#"><b class="text-color">NECTA</b></a>
              
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="defaultNavbar1">
              <ul class="nav navbar-nav">
                <li class="<?php  echo($home);  ?>"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>   Home</a></li>
                <li class="<?php  echo($products);  ?>"><a href="products.php">Products</a></li>
                  
   
                  <?php
                  
                  if(isset($_SESSION['USER']))
                  {
                      if($_SESSION['USER'] == "customer/*-A5+")
                      {
                           echo('<li class="<?php  echo($shopping);  ?>"><a href="shoppingCart.php">Shopping cart</a></li>'); 
                      }
                      
                  }
                  
                   ?>
                  
                  
                <li class="<?php  echo($delive);  ?>"><a href="delivery.php">Delivery</a></li>
                <li class="<?php  echo($contact);  ?>"><a href="contact.php">Contact</a></li>
                <li class="<?php  echo($about);  ?>"><a href="about.php">About us</a></li>
            
       
          
                  
          <?php
                  
                  if(isset($_SESSION['USER']))
                  {
                    if($_SESSION["USER"] == "admin@55%/*)")
                    {
                        ?>
                  
                <li><a href="adminAcco.php#orders">Orders</a></li>
                <li><a href="adminAcco.php#confirmOrders">Confirm orders</a></li>
                <li><a href="adminAcco.php#refuseOrders">Refuse orders</a></li>
                <li><a href="adminAcco.php#drinkStore">Drink store</a></li>
                <li><a href="adminAcco.php#createNewAccount">Create new account</a></li>
                <li><a href="adminAcco.php#manageAccount">Manage account</a></li>
                <li><a href="adminAcco.php#contactMessage">Contact message</a></li>
                <li><a href="adminAcco.php#addNewProduct">Add new product</a></li>
                <li><a href="adminAcco.php#editProfile">Edit profile</a></li>
                  
                          
                          
                          <?php
                    }
                  

                  }
                  
                   ?>
                  
            
                
              </ul>
      
                
 
                      
<!--
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
-->
              <ul class="nav navbar-nav navbar-right">
                  
                  
                  
<?php
                  /*    ----------------------------------------------------------------------------                PHP for LOG         */

    if(isset($_SESSION['USER']))
    {
        
        ?>
                  

                      <li>

                          <button class="btn btn-default btn-lg headerCus" onClick="<?php
                                                                                    
                                                                                    if(isset($_SESSION["USER"]))
                                                                                    {
                                                                                        if($_SESSION["USER"] == "admin@55%/*)")
                                                                                        {
                                                                                            echo("window.location = 'adminAcco.php'");
                                                                                        }
                                                                                        
                                                                                        if($_SESSION["USER"] == "deli8/*)")
                                                                                        {
                                                                                            echo("window.location = 'deleverAcco.php'");
                                                                                        }
                                                                                        
                                                                                        if($_SESSION["USER"] == "customer/*-A5+")
                                                                                        {
                                                                                            echo("window.location='customerAccount.php'");
                                                                                        }
                                                                                        
                                                                                    }
                                                                                    
                                                                                    
                                                                                    ?>">
                              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>      <?php     echo($_SESSION['Cu_name']);     ?>
                          </button>

                      </li>
                  
                  
                  
        <?php
        
        
    }
    else
    {
        ?>
                  
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                 <span class="glyphicon glyphicon-user" aria-hidden="true"></span>   Account<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><button onClick="document.getElementById('log').style.display='block'" class="btn btn-default bL">Log in</button></li>
                    <li><button class="btn btn-default bc"  onClick="document.getElementById('cAcc').style.display='block'">Create New Account</button></li>
                    
                  </ul>
                </li>
                  
                  
        <?php
    }
      
                  
                  
                  
?>
                  
                  

              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
        </nav>
      </div>
    </div>
	

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>

   
    
</div>

</header>
    

<!--    ------------------------------------------                                      LOG ALLERT          -->
    
    
    

</body>
</html>


<!--  

<script type="text/javascript">
    document.getElementById("submit").click();
</script>
 




-->
