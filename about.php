<?php
session_start();
include("conn.php");

$home = "";
$products = "";
$shopping = "";
$about = "active";
$delive = "";
$contact = '';




//$_SESSION["id"];
$_SESSION["lang"] = "E";
//$_SESSION["prePage"];
//$_SESSION['Cu_name']);
?>








<!doctype html>
<html>
<head>
<title>about us</title>


<!--<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    
<link href="css/aboutus.css" rel="stylesheet" type="text/css">
    
 
</head>

<body >
    
    <?php     include("header.php");      ?>
    
<div class="abBody">
    
    
    
  	<div class="row">
  	  <div class="col-lg-6">
		<div class="aboutrow1">
            <div class="aboutl11">

                <h1 class="abouthead">
                Our Story
                </h1>


            </div>
            <div class="p1">

              <table id = "abouttab">
                <tr>
                    <td><ul><li>
                          JS products, located in the Anuradhapura district is a well established brand which manufactures and markets juices and jam.    
                   </li></ul></td>  
                    <td><ul><li>
                        The journey of JS products began in the year 2015.<br><br><br>
                    </li></ul></td>
                </tr>
                <tr>
                    <td><ul><li>
                        The company manufactures mixed fruit, mango, woodapple and aloevera juices.
                 </li></ul></td>  
                    <td><ul><li>
                        All the processing and packaging is done via manually.<br><br>
                    </li></ul></td>  
                </tr>
                <tr>
                    <td><ul><li>
                        The company produces 1300 glasses of juice daily.
                    </li></ul></td>  
                    <td><br><ul><li>
                        The company manufactures products under the technical support of Institute of Post Harvest Technology. 
                    </li></ul><br></td>  


                </tr>

                </table>
              </div>
		</div>
      </div>
      
  	  <div class="col-lg-6">
            
          <div class="aboutcol2">
              
              
                    <div class="aboutcol3">
                        <h1 class="abouthead2">Contact Information</h1>
                    </div>
    
              
              
                    
                        <div class="">

                                <table class="table">
                                    <caption class="aboutcap">Contact Us On</caption>
                                    <tr>
                                    <td>
                                      <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></td>
                                      <td>
                                            No.570,Bulankulama,Disa Mw, Stageii,Anuradhapura,SriLanka.
                                            <abbr title="The address">

                                            </abbr>
                                      </td>
                                    </tr>
                                    <tr>
                                    <td>
                                      <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></td>
                                      <td>
                                            <a href="mailto:fruitsnectar@gmail.com" class="abouta">fruitsnectar@gmail.com</a>
                                      </td>
                                    </tr>
                                    <tr>
                                    <td>
                                      <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span></td>
                                      <td>
                                            <p>025-3247062</p>
                                      </td>
                                    </tr>
                                    <tr>
                                    <td>
                                      <span class="glyphicon glyphicon-phone" aria-hidden="true"></span></td>
                                        <td>
                                            <p>071-7802442</p>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>
                                      <span class="glyphicon glyphicon-phone" aria-hidden="true"></span></td>
                                        <td>
                                          <p>071-0129858</p>
                                        </td>
                                    </tr>
                             </table>

                      </div>
                        

          
          </div>
          
      </div>
    </div>
  
  
  	
    <div class="location">
            <div class="aboutcol4">
                <h1 class="abouthead3">Our Location</h1>
            </div>
            <div >
                <center>
                
                    <img class="aboImg" src="images/map.jpg">
                
                </center>             
            </div>
   	
  
    </div>
    
    
    
         <div class="qua">
               <div class="aboutcol4">
                   <h1 class="abouthead3">Our Qualifications</h1>
               </div>
                 
                 
                 
               <div class="aboutcol5">

                  <ul>
                     <li class="aboutlist">Manufactured by using Technical Support from Institute of Post Harvest Technology.</li>
                     <li class="aboutlist">The main activities of this institute,</li>
                    <ul>
                        <li class="aboutlist">Introduce new food processing technologies for both food items and support products.</li>
                        <li class="aboutlist">Offers food preservation,processing and control.</li>
                    </ul>
                  </ul>  <br><br>
                    <p class="aboutp">Furthermore details click this name to go to that page</p>
                    <p class="aboutp2"><a href="http://www.nara.ac.lk" class="abouta2" target="_blank">Institute of Post Harvest Technology</a></p>
              </div>
                
                 
                 
                 
                 
                 
        </div>
    
    
    
   
</div>   
    
    
    <?php    include("footer.php");   ?>
    
    
</body>
</html>