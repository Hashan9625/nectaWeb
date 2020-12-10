<?php
session_start();
include('conn.php');


$home = "";
$products = "";
$shopping = "";
$about = "";
$delive = "";
$contact = "active";



?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewpoint"
content="width=device-width,initial-scale=1">
    
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">

<style>
    
    
.contactRow2 {
    text-align: center;
}

.conImg {
    border: 1px solid blue;
    border-radius: 10px;
    margin: 0px 0 5% 0;

}



input[type=text],select,textarea{

	width:100%;
	padding:12px;
	border:1px solid #ccc;
    border-radius: 10px;
	margin-top:6px;
	margin-bottom:16px;
	resize:vertical;
}
input[type=email],select,textarea{

	width:100%;
	padding:12px;
	border:1px solid #ccc;
    border-radius: 10px;
	margin-top:6px;
	margin-bottom:16px;
	resize:vertical;
}
input[type=tel],select,textarea{

	width:100%;
	padding:12px;
	border:1px solid #ccc;
    border-radius: 10px;
	margin-top:6px;
	margin-bottom:16px;
	resize:vertical;
}
/*

input[type=submit]{
	background-color:#4CAF50;
	color:white;
	padding:12px 20px;
	border:none;
    border-radius: 5px;
	cursor:pointer;
}
input[type=submit]:hover{
	background-color:#45a049;
}
*/

.contact{
	padding:0;
    margin: 0;
}

	.contacth1{
    text-align: center;
    text-shadow: -5px -5px 10px green,5px 5px 5px blue;
    font-size: 55px;
    font-weight: 750;
    font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif";
	}
	
	.contactCol1{
    background-color: rgba(255,246,30,0.5);
    border-radius: 20px;
    margin: 1% 8%;
	}
	
	.contactp{
		font-size: 30px;
		font-weight: 600;
		color: black;
	}
	
	.row2{
        margin: 0;
		background-color: lightgray;
		width: auto;
		height: auto;
		border-radius: 15px;
        padding: 2%;
 
        
        

        
        
	}
</style>
<link href="css/contact.css" rel="stylesheet" type="text/css">
</head>
<body>
    
    
<?php include("header.php"); ?>
    
    
    
<?php
    
if(isset($_SESSION['id']))
{
    $cId = $_SESSION['id'];
    $sql = "SELECT * FROM `customer` WHERE `C_id`=$cId";
    $table = mysqli_query($conn,$sql);

    while($column = mysqli_fetch_assoc($table))
    {
        
        $cuName = $column['Cu_name'];
        $cuEmail = $column['Cu_email'];
        $cuContactNumber = $column['Cu_contact_number'];
        $cuCity = $column['City'];
    }


}


?>

    
    

<div class="contact">
     <div class="contactCol1">
         <h2 class="contacth1">Contact Us</h2>
     </div>
</div>
<div class="contactRow2">
	<p class="contactp"> If you want to contact with us please fill this form.</p>
 </div>
 <div class="row row2">
		<div class="Cmap col-lg-6">
		    <img src="images/map.jpg" alt="no" style="width:100%" class="conImg">
		</div>
     
     
		<div class="Cmap col-lg-6">
    <form method="post" action="contact.php">
		<label for="name" class="contactLb">Your Name</label>
		<input type="text" id="name" name="Con_name" placeholder="Your name.." required value="<?php if(isset($cuName)){echo($cuName);}?>"><br>

		<label for="email">Your Email</label>
		<input type="email" id="email" name="Con_email" placeholder="Your Email.." value="<?php if(isset($cuEmail)){echo($cuEmail);}?>" required><br>

		<label for="contactNo">Your Contact Number</label>
		<input type="tel" pattern="[0-9]{10}"  id="contactNo" name="Con_contact_number" placeholder="Your Contact Number.." value="<?php if(isset($cuContactNumber)){echo($cuContactNumber);}?>" required><br>

		<label for="city">City</label>
            
            <input type="text" name="Con_city" placeholder="Your city" value="<?php if(isset($cuCity)){echo($cuCity);}?>" required>

		<br><br><br>

	<label for="subject">Write message</label>
	<textarea id="subject" name="Con_text" placeholder="Write something.."
	class="writeMe" required></textarea>
        <div>
            <center>
                <input type="Submit" value="Submit" name="submitContact" class="btn btn-success btn-lg">
            </center>        
        </div>
	
	</form>
	</div>
</div>
    
   <?php  include("footer.php");  ?>
    
</body>
</html>
<?php

if(isset($_POST['submitContact']))
{
    $cuName = $_POST['Con_name'];
    $cuEmail = $_POST['Con_email'];
    $cuContactNumber = $_POST['Con_contact_number'];
    $cuCity = $_POST['Con_city'];
    $cuText = $_POST['Con_text'];
    
    $sqlI = "INSERT INTO `con_message` (`Con_id`, `Con_name`, `Con_email`, `Con_contact_number`, `Con_city`, `Con_text`) VALUES (NULL, '$cuName', '$cuEmail', '$cuContactNumber', '$cuCity', '$cuText');";
    
    if(mysqli_query($conn,$sqlI))
    {
        echo('<script>'.'window.alert("DONE")'.'</script>');
    }
    else
    {
        echo($sqlI);
    }
}
?>
