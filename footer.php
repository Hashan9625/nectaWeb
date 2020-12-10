<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link href="css/stylefooter.css" rel="stylesheet" type="text/css";   
    
</head>

<body>
		<footer class="footerBgColor1">
		
		<div class="" >
  			<div class="footerNav">
  				<nav class="navbar-dark">
  					<center>
  						<ul>
  							<li class="<?php  echo($home);  ?>">
  								<a href="index.php" class="btn btn-warning">Home</a>
  							</li>
  							<li class="<?php  echo($products);  ?>">
  								<a href="products.php" class="btn btn-warning">Products</a>
  							</li>
  							<li class="<?php  echo($shopping);  ?>">
  								<a href="shoppingCart.php" class="btn btn-warning">Shopping cart</a>
  							</li>
  							<li>
  								<input type="button" value="Log in" onClick="document.getElementById('log').style.display='block'" class="btn btn-warning">
  							</li>
  							<li>
  								<input type="button" onClick="document.getElementById('cAcc').style.display='block'" value="Create New Account" class="btn btn-warning">
  							</li>
  							<li class="<?php  echo($about);  ?>">
  								<a href="about.php" class="btn btn-warning">About us</a>
  							</li>
  						</ul>
  					</center>
  				
  					
  				</nav>
  	
  			</div>
		</div>

		<div class="row footerBgColor2">
	 		 <div class="col-sm-6 ">
 		 	   <div class="row">
 		 	     <div class="col-md-6 border">
 		 	  	   <h4 class="text-center footerFont">Contact Information</h4>
 		 	  	   <div>
 		 	  	   
 		 	  	   		<table>
 		 	  	   			<tr>	
 		 	  	   				<td class="mark"><span class="glyphicon glyphicon-map-marker"></span></td>
 		 	  	   			 	<td><p>No.570,  Bulankulama Disa Mw,  Stage ll,  Anuradhapura,  Sri Lanka.</p></td>
 		 	  	   			 </tr>
 		 	  	   			 <tr>
 		 	  	   			 	<td class="mark">
 		 	  	   			 		<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
 		 	  	   			 	</td>
 		 	  	   			 	<td>
 		 	  	   			 		<a href="mailto:fruitsnectar@gmail.com">fruitsnectar@gmail.com</a>
 		 	  	   			 	</td>
 		 	  	   			 </tr>
 		 	  	   		</table>
		 	  	   		
 		 	  	   </div>
	 	  	      
	 	  	     </div>
	 		 	  <div class="col-md-6 border">
	 		 	  	<table class="text-center">
	 		 	  		<tr >
	 		 	  			<td colspan="2"><h4 class="footerFont">Call Us On</h4></td>
	 		 	  		</tr>
	 		 	  		<tr>
	 		 	  			<td>
	 	  				    	<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
	 	  				    </td>
	 	  				    <td>
	 	  				    	<p>025-3247062 </p>
	 	  				    </td>
	 		 	  		</tr>
	 		 	  		<tr>
	 		 	  			<td>
	 	  				    	<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
	 	  				    </td>
	 	  				    <td><p>071–7802442 </p></td>
	 		 	  		</tr>
	 		 	  		<tr>
	 		 	  			<td>
	 	  				    	<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
	 	  				    </td>
	 	  				    <td><p>071-0129858 </p></td>
	 		 	  		</tr>
	 		 	  	</table>
	 		 	  </div>
 		 	   </div>
             </div>
	  		<div class="col-sm-6 footerFont mathHigth border">
	  			<center>
	  				<h2>Information </h2>
	  				<p>JS products is a well established brand which manufatcures
and markets juices and jam since 2014.<br>
This is a medium size wholesale beverage
store located at Anuradhapura.</p>
	  			</center>
	  		</div>
		</div>
		

	    <div>
            <center>

                <h4 class="footerFont">Follow us</h4>
                
                  <div class="btn-group-vertical">

                        <a href="#" ><img src="images/Fb.png" width="50px"></a>
                        <a href="#" ><img src="images/Ins.png" width="50px"></a>
                        <a href="#" ><img src="images/Ln.png" width="50px"></a>
                        <a href="#" ><img src="images/twit.png" width="50px"></a>

                  </div>

            </center>

	  	  
        </div>
	  
	  
	  

        <div class="flag">
            
            <img src="images/Flag_of_Sri_Lanka.svg" width="150" class="end">
            
        </div>
        
        <div>
            
                   <center>&copy;<small>  Copyright </small>&copy; <small> Necta.lk 2019 | </small> <small class="text-danger">Website Design by : Rajarata University</small> </center>
        
        </div>
        
 
	</footer>
</body>
</html>
    
     <script>
        
        /*          ------------------------        FOR LOGING alert*/
        var modal = document.getElementById('cAcc');
        
        window.onclick = function(event){
            if(event.target == modal)
                {
                    modal.style.display = "none";
                }
        }
      </script>

    
    
            <script>
        
        /*          ------------------------        FOR LOGING alert*/
        var modal = document.getElementById('log');
        
        window.onclick = function(event){
            if(event.target == modal)
                {
                    modal.style.display = "none";
                }
        }
        </script>
<?php
    /*    ----------------------------------        this for check     */
//    
//  echo($_SESSION["id"]."<hr>"); 
// echo($_SESSION[ 'USER' ]."<hr>")    ;
//    echo($_SESSION['lang']."<hr>");
////    
    
    ?>
