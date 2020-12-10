<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Product</title>
<link href="css/addNewProduct.css" rel="stylesheet" type="text/css">
<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css">-->
<!--<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">-->

</head>

<body>
<div class="addNewPro" id="addNewProduct">
    <div class="addNewProB">
        <form method="post" enctype="multipart/form-data">
    


        <div class="shorH" >
                    <h3 class="shorT">ADD NEW PRODUCT</h3>
        </div>
         <div class="row1">
         <div class="row col">
                <div class="col-lg-2 addcol1">
                    <p class="addp1">Add Food type</p>
                    <select class="form-control" name="Fo_id">
                        <option selected="selected" value="New Food">New Food</option>
                        
                        
                        <?php
                        
                        $sqlF = "SELECT * FROM `food`;";
                        $tableF = mysqli_query($conn,$sqlF);
                        
                        while($columnF = mysqli_fetch_assoc($tableF))
                        {
                           $foId = $columnF['Fo_id'] ;
                           $foName = $columnF['Fo_name'] ;
                            
                            ?>
                       
                        <option onClick="food<?php echo($foId); ?>()" value="<?php echo($foId);  ?>"><?php echo($foName);  ?></option>
                        
                        <script>
                        
                            function food<?php echo($foId); ?>(){
                                
                                var y = document.getElementsByClassName("coList");                                           
                                
                                var i;
                                for(i = 0 ; i < y.length ; i++)
                                    {
                                        y[i].style.display ="none"; 
                                    }
                                
                                
                               
                                var x = document.getElementsByClassName("foId<?php  echo($foId);  ?>");                
                                
                                var i;
                                for(i = 0 ; i < x.length ; i++)
                                    {
                                        x[i].style.display ="block"; 
                                    }
 
      
                            }
                        
                        </script>
                        
                        
                            
                            <?php
                            
                        }
                        
                        
                        ?>
                        

                    </select>	
                </div>
                <div class="col-lg-2 addcol2">
                        <p class="addp1">New Food</p>
                        <textarea name="Fo_name" row="3" col="5" class="form-control" placeholder="If you add new Food write it name"></textarea>
                </div>
                <div class="col-lg-2 addcol3">
                    <p class="addp1">Add Contains</p>
                    <select class="form-control" name="Co_id">
                        <option selected="selected" value="New Contain">New Contain</option>
  <?php
    $sqlC ="SELECT * FROM `contain`;";
    $tableC = mysqli_query($conn,$sqlC);
    
    while($columnC = mysqli_fetch_assoc($tableC))
    {
        $coId = $columnC['Co_id'];
        $coName = $columnC['Co_name'];
        $foId = $columnC['Fo_id'];
        $unitPrice = $columnC['Unit_price'];
        $ingredeant = $columnC['Ingredeant'];
        ?>
                        
                         <option onClick="contain<?php echo($coId); ?>()" class="foId<?php  echo($foId);  ?> coList" value="<?php echo($coId);  ?>"><?php   echo($coName);   ?></option>   
                        
                        
                        <script>
                        
                            function contain<?php echo($coId) ?>(){
                                
                                document.getElementById("Unit_price").value = "<?php  echo($unitPrice);  ?>";
                                
                                document.getElementById("Ingredeant").value = "<?php  echo($ingredeant);  ?>";
                                
                                
                                
                                var z = document.getElementsByClassName("pPrice"); 

                    

                                var i;
                                for(i = 0 ; i < z.length ; i++)
                                    {
                                        z[i].value =""; 
                                    }
  
                                
                                <?php
        
                                $sqlP = "SELECT * FROM `product` WHERE `Co_id`=$coId;";
                                $tableP = mysqli_query($conn,$sqlP);
        
                                while($columnP = mysqli_fetch_assoc($tableP))
                                {
                                    $prSize = $columnP['Pr_size'];
                                    $price = $columnP['Price'];
                                    
                                    if($prSize == 190 || $prSize == 200 || $prSize == 500 || $prSize == 1000)
                                    {
                                      ?>
                                            document.getElementById("price<?php   echo($prSize);  ?>").value = <?php  echo($price);  ?> ;
                                      <?php 
 
                                    }
                                 }
                                
                                ?>

      
                            }
                        
                        </script>
                        

                        
                        
                        
        <?php
       
        
    }
                        
                        
    ?>                      


                    </select>
                </div>
                <div class="col-lg-2 addcol4">
                        <p class="addp1">New contain</p>
                        <textarea name="Co_name" row="3" col="5" class="form-control" placeholder="If you add new Contain write it name"></textarea>
                </div>
                <div class="col-lg-1 addcol5">
                <p class="addp1">Ingredient</p>
                    <textarea id="Ingredeant" class="form-control" name="Ingredeant" required></textarea>
                </div>
                <div class="col-lg-1 addcol6">
                <p class="addp1">Unit Price</p>
                <input id="Unit_price" type="text" class="form-control" name="Unit_price" placeholder="Ex 130/= 500ml" required>
                </div>
                <div class="col-lg-2 addcol7">
                <p class="addp1">Photo  - 500*600 pixels</p>
                <input type="file" value="Choose Photo" name="Co_img">
                </div>
         </div>
         </div>	



         <div class="rowtwo">
             <div class="coltwo">


        <!--
                 <div class="row2">
                 <center><h1 class="addheader">Product Details</h1></center>
                 </div>

        -->

                 <div class="row row3">
                         <div class="col-sm-4 addcol8">
                             <div class="addcol8i">

                                  <center>
                                 <p class="addp2">Product Size</p>
                                 <input id="size190" name="Pr_size[]" value="190" type="checkbox" class="sCheck"> 190ml
                                 <br>
                                 <input id="size200" name="Pr_size[]" value="200" type="checkbox" class="sCheck"> 200ml
                                 <br>
                                 <input id="size500" name="Pr_size[]" value="500" type="checkbox" class="sCheck"> 500ml
                                 <br>
                                 <input id="size1000" name="Pr_size[]" value="1000" type="checkbox" class="sCheck"> 1000ml 
                                      <br>
                                 <input type="number" name="Pr_sizeOther" class="other" placeholder="other"> 
                                 </center>

                             </div>
                         </div>
                        <div class="col-sm-4 addcol8">
                            <div class="addcol8i">

                                 <center>
                                <p class="addp2">Product Price</p>
                                <input id="price190" name="Price190" type="text" class="pPrice">
                                <br>
                                <input id="price200" name="Price200" type="text" class="pPrice">
                                <br>
                                <input id="price500" name="Price500" type="text" class="pPrice">
                                <br>
                                <input id="price1000" name="Price1000" type="text" class="pPrice">
                                     <br>
                                <input id="priceOther" name="PriceOther" type="text" class="pPrice">
                                </center>

                            </div>
                         </div>
                        <div class="col-sm-4 addcol8">
                            <div class="addcol8i">
                                <center>
                                <p class="addp2">Product Image - 1280*1080px</p>
                                <input id="img190" name="Pr_img190" type="file" class="prImg">
                                <br>
                                <input id="img200" name="Pr_img200" type="file" class="prImg">
                                <br>
                                <input id="img500"  name="Pr_img500" type="file" class="prImg">
                                <br>
                                <input id="img1000" name="Pr_img1000" type="file" class="prImg">
                                    <br>
                                <input id="imgOther" name="Pr_imgOther" type="file" class="prImg">
                                </center>

                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="row4">
            <center>
            <input type="submit" class="btn btn-success btn-lg" value="SUBMIT" name="addNewProduct">
            </center>
        </div>

        </form>
    </div>
</div>
    

</body>
</html>


<?php

if(isset($_POST['addNewProduct']))
{

    if($_POST['Fo_id'] == "New Food" )
    {
        $foName = $_POST['Fo_name'];
        
        $sqlFN = "INSERT INTO `food` (`Fo_id`, `Fo_name`, `Description`, `Fo_img`) VALUES (NULL, '$foName', NULL, NULL);";
        
        if(mysqli_query($conn,$sqlFN))
        {
           $foId = mysqli_insert_id($conn);
            
            
            
            $coName = $_POST['Co_name'];
            $ingredeant = $_POST['Ingredeant'];
            $unitPrice = $_POST['Unit_price'];
            
            $coImg = addslashes(file_get_contents($_FILES['Co_img']['tmp_name']));
            
            $sqlCN = "INSERT INTO `contain` (`Co_id`, `Fo_id`, `Co_name`, `Ingredeant`, `Unit_price`, `Co_img`) VALUES (NULL, '$foId', '$coName', '$ingredeant', '$unitPrice', '$coImg');";
            
            if(mysqli_query($conn,$sqlCN))
            {
                $coId = mysqli_insert_id($conn);
                
                if($_POST['Pr_sizeOther'])
                {
                    $prSize = $_POST['Pr_sizeOther'];
                    $price = $_POST['PriceOther'];
                    $prImg = addslashes(file_get_contents($_FILES['Pr_imgOther']['tmp_name']));

                    $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$prSize', '$price', '$prImg');";

                    if(mysqli_query($conn,$sqlF))
                    {
                        echo('<script>'.'window.alert("done");'.'</script>');
                        echo('<script>'.'window.location = "adminAcco.php?id=addNewProduct";'.'</script>');
                    }
                    else
                    {
                        echo($sqlF);
                    }
                }



                if(isset($_POST['Pr_size']))
                {
                    $prSize = $_POST['Pr_size'];

                    foreach($prSize as $size)
                    {
                        if($size == "190")
                        {
                            $price = $_POST['Price190'];
                            $prImg = addslashes(file_get_contents($_FILES['Pr_img190']['tmp_name']));

                            $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                            if(mysqli_query($conn,$sqlF))
                            {


                            }
                            else
                            {
                                echo($sqlF);
                            }

                        }

                       if($size == "200")
                        {
                            $price = $_POST['Price200'];
                            $prImg = addslashes(file_get_contents($_FILES['Pr_img200']['tmp_name']));

                            $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                            if(mysqli_query($conn,$sqlF))
                            {

                            }
                            else
                            {
                               echo($sqlF);
                            }


                        }

                       if($size == "500")
                        {
                            $price = $_POST['Price500'];
                            $prImg = addslashes(file_get_contents($_FILES['Pr_img500']['tmp_name']));

                            $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                            if(mysqli_query($conn,$sqlF))
                            {

                            }
                            else
                            {
                                echo($sqlF);
                            }


                        }

                       if($size == "1000")
                        {
                            $price = $_POST['Price1000'];
                            $prImg = addslashes(file_get_contents($_FILES['Pr_img1000']['tmp_name']));

                            $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                            if(mysqli_query($conn,$sqlF))
                            {

                            }
                            else
                            {
                                echo('<script>'.'window.alert("'.$sqlF.'");'.'</script>');
                            }


                        }


                    }

                    echo('<script>'.'window.alert("done");'.'</script>');
                    echo('<script>'.'window.location = "adminAcco.php?id=addNewProduct";'.'</script>');

                }
  
            }
  
            
            
        }
        else
        {
            echo($sqlFN);
        }
        
    }
    else
    {
        $foId = $_POST['Fo_id'];
        
        if($_POST['Co_id'] == "New Contain")
        {
            $coName = $_POST['Co_name'];
            $ingredeant = $_POST['Ingredeant'];
            $unitPrice = $_POST['Unit_price'];
            
            $coImg = addslashes(file_get_contents($_FILES['Co_img']['tmp_name']));
            
            $sqlCN = "INSERT INTO `contain` (`Co_id`, `Fo_id`, `Co_name`, `Ingredeant`, `Unit_price`, `Co_img`) VALUES (NULL, '$foId', '$coName', '$ingredeant', '$unitPrice', '$coImg');";
            
            if(mysqli_query($conn,$sqlCN))
            {
                $coId = mysqli_insert_id($conn);
                
                if($_POST['Pr_sizeOther'])
                {
                    $prSize = $_POST['Pr_sizeOther'];
                    $price = $_POST['PriceOther'];
                    $prImg = addslashes(file_get_contents($_FILES['Pr_imgOther']['tmp_name']));

                    $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$prSize', '$price', '$prImg');";

                    if(mysqli_query($conn,$sqlF))
                    {
                        echo('<script>'.'window.alert("done");'.'</script>');
                        echo('<script>'.'window.location = "adminAcco.php?id=addNewProduct";'.'</script>');
                    }
                    else
                    {
                        echo($sqlF);
                    }
                }



                if(isset($_POST['Pr_size']))
                {
                    $prSize = $_POST['Pr_size'];

                    foreach($prSize as $size)
                    {
                        if($size == "190")
                        {
                            $price = $_POST['Price190'];
                            $prImg = addslashes(file_get_contents($_FILES['Pr_img190']['tmp_name']));

                            $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                            if(mysqli_query($conn,$sqlF))
                            {


                            }
                            else
                            {
                                echo($sqlF);
                            }

                        }

                       if($size == "200")
                        {
                            $price = $_POST['Price200'];
                            $prImg = addslashes(file_get_contents($_FILES['Pr_img200']['tmp_name']));

                            $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                            if(mysqli_query($conn,$sqlF))
                            {

                            }
                            else
                            {
                               echo($sqlF);
                            }


                        }

                       if($size == "500")
                        {
                            $price = $_POST['Price500'];
                            $prImg = addslashes(file_get_contents($_FILES['Pr_img500']['tmp_name']));

                            $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                            if(mysqli_query($conn,$sqlF))
                            {

                            }
                            else
                            {
                                echo($sqlF);
                            }


                        }

                       if($size == "1000")
                        {
                            $price = $_POST['Price1000'];
                            $prImg = addslashes(file_get_contents($_FILES['Pr_img1000']['tmp_name']));

                            $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                            if(mysqli_query($conn,$sqlF))
                            {

                            }
                            else
                            {
                                echo('<script>'.'window.alert("'.$sqlF.'");'.'</script>');
                            }


                        }


                    }

                    echo('<script>'.'window.alert("done");'.'</script>');
                    echo('<script>'.'window.location = "adminAcco.php?id=addNewProduct";'.'</script>');

                }
  
            }
            
        }
        else
        {
            
            $coId = $_POST['Co_id'];
            
            if($_POST['Pr_sizeOther'])
            {
                $prSize = $_POST['Pr_sizeOther'];
                $price = $_POST['PriceOther'];
                $prImg = addslashes(file_get_contents($_FILES['Pr_imgOther']['tmp_name']));
                
                $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$prSize', '$price', '$prImg');";
                
                if(mysqli_query($conn,$sqlF))
                {
                    echo('<script>'.'window.alert("done");'.'</script>');
                    echo('<script>'.'window.location = "adminAcco.php?id=addNewProduct";'.'</script>');
                }
                else
                {
                    echo($sqlF);
                }
            }
            
            
            
            if(isset($_POST['Pr_size']))
            {
                $prSize = $_POST['Pr_size'];
                
                foreach($prSize as $size)
                {
                    if($size == "190")
                    {
                        $price = $_POST['Price190'];
                        $prImg = addslashes(file_get_contents($_FILES['Pr_img190']['tmp_name']));
                        
                        $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";
 

                        if(mysqli_query($conn,$sqlF))
                        {
                            
                            
                        }
                        else
                        {
                            echo($sqlF);
                        }

                    }
                    
                   if($size == "200")
                    {
                        $price = $_POST['Price200'];
                        $prImg = addslashes(file_get_contents($_FILES['Pr_img200']['tmp_name']));
                        
                        $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                        if(mysqli_query($conn,$sqlF))
                        {
                            
                        }
                        else
                        {
                           echo($sqlF);
                        }

 
                    }
                    
                   if($size == "500")
                    {
                        $price = $_POST['Price500'];
                        $prImg = addslashes(file_get_contents($_FILES['Pr_img500']['tmp_name']));
                        
                        $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";


                        if(mysqli_query($conn,$sqlF))
                        {
                    
                        }
                        else
                        {
                            echo($sqlF);
                        }

 
                    }
                    
                   if($size == "1000")
                    {
                        $price = $_POST['Price1000'];
                        $prImg = addslashes(file_get_contents($_FILES['Pr_img1000']['tmp_name']));
                        
                        $sqlF = "INSERT INTO `product` (`P_id`, `Co_id`, `Pr_quntity`, `Pr_size`, `Price`, `Pr_img`) VALUES (NULL, '$coId', '0', '$size', '$price', '$prImg');";
                       

                        if(mysqli_query($conn,$sqlF))
                        {
                        
                        }
                        else
                        {
                            echo('<script>'.'window.alert("'.$sqlF.'");'.'</script>');
                        }

 
                    }
                    
                    
                }
                
                echo('<script>'.'window.alert("done");'.'</script>');
                echo('<script>'.'window.location = "adminAcco.php?id=addNewProduct";'.'</script>');
                
            }
            
            
        }
        
    }
    
    
}



?>
