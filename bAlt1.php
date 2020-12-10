<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--<title>bAlt1</title>-->
  
<link href="css/bAlt1.css" rel="stylesheet" type="text/css">
  
<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css">-->
<!--<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">    -->
    
<link href="css/order.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <div id="bAlt1" class="lay">
        <center>
        
        <div class="bAlt1l1">
            
            <div class="bAlt1l3">
            
                <?php   echo('<img src = "data:image;base64,'.base64_encode($coImg).'" alt="No image" class="bAltImg"');  ?>
                
                            
            
            </div>
            
            <div class="bAlt1l2">
                <form method="post">
            
                    <input type="button" onClick="singIn()" value="Sign in to checkout" class="bAlt1B btn btn-info btn-lg">
                    <input type="button" onClick="asGuest()" value="Check out as guest" class="bAlt1B btn btn-warning btn-lg">
                
                </form>
            
            </div>
            <hr>
            <div>
                    <input type="button" name="cancel" value="Cancel" class="btn btn-danger btn-lg bAlt1Can" onClick="document.getElementById('bAlt1').style.display='none'" >
            </div>
        
        </div>
        </center>
    </div>
    
</body>
    <script>
        
        function singIn(){
            document.getElementById('log').style.display = 'block';
//            document.getElementById('bAlt1').style.display = "none";
        }
        
        function asGuest(){
            document.getElementById('guestF').style.display = 'block';
        }
    
    
    
    </script>
</html>

 
<!--*********************************                                                               THIS for                TEST     -->   
<!-- <script>    document.getElementById('bAlt1').style.display = 'block'</script>-->
