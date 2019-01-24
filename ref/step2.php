<?php 
include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/resp.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
</head>
<body>
<div class="main-container">
    <div class="first_section">
        <div class="logo">
             <img src="images/logo.png" />
        </div>
        <div class="main-text">
            <p>Would you like to <br>return one of your <br>Transformation Product?</p>
        </div>
    </div>
</div>
<div class="second_section">
        <div class="container">
            <div class="step_bar">
                <div class="container">
                   <div class="row">
                     <div class="col">
                       <ul id="progress-bar" class="progressbar">
                         <li class="active one"></li>
                         <li class="two active"></li>
                         <li class="three"></li>
                      </ul>
                     </div>
                  </div>
                </div>
                <div class="btn-container" style="display: none;">
                  <button class="btn" id="Next">Next</button>
                  <button class="btn" id="Back">Back</button>
                  <button class="btn" id="Reset">Reset</button>
                </div>
            </div>
        </div>
            <div class="step_number">
                <p>Step <span>2: </span>Select the package you like to refund and click REDEEM.</p>
            </div>
    
        <?php 
                $price = $_POST['pricevalueofhidden'];
                 $key = $_POST['keyvalueofhidden'];
                $i=1;
                $sqlcount = "SELECT COUNT(DISTINCT packid) as total FROM pack1 WHERE `price` = '$price' AND `matchkey`='$key'";
            	$resultcount = $conn->query($sqlcount);
            	//$num_rows = mysqli_num_rows($resultcount);
            	//$final = ($num_rows / 2) ;
            	while($row1 = $resultcount->fetch_assoc()) {
            	$final=$row1['total'];
            	}
            	
                while($i <= $final){
                	?>
                	
        <div class="inner_container">
            <?php
            if($i == 1){
                ?>
                <p class="product_title">PACKAGE ONE</p>
                <?php
            }
            ?>
            <?php
            if($i == 2){
                ?>
                <p class="product_title">PACKAGE TWO</p>
                <?php
            }
            ?>
        <?php
        $sql = "SELECT * FROM pack1 WHERE `price` = '$price' AND `matchkey`='$key' AND `packid` = '$i'";
            	$result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
        
        ?>
        <div class="product_listboot">
            <div class="row">
                <div class="col-md-4 product_container">
                    <div class="product_img">
                        <img src="<?php echo $row['packimg']; ?>" alt="">
                    </div>
                </div>
                <div class="col-md-8 product_container">
                    <div class="product_desc">
                        <p class="product_heading" ><b><?php echo $row['packname']; ?></b></p>
                        <p class="product_subheading" ><?php echo $row['packdescr']; ?></p>
                        <p class="product_price" >MRP : <?php echo $row['packvalue']; ?> </p>
                    </div>
                </div>
            </div>
        </div>
         <div class="extra-border"></div>
         <?php
              	}
               ?>
        <div class="buy_button">
            <form action="step3.php" method="post">
            <input type="hidden" name="productprice" id="productprice" value="<?php echo $price; ?>">
            <input type="hidden" name="productkey" id="productkey" value="<?php echo $key; ?>">
            <input type="hidden" name="productid" id="productid" value="<?php echo $i; ?>">
             <input type="hidden" id="email" name="email" value="<?php echo $_POST['email']; ?>">
            <button id="sub" type="submit" class="refund_button hide buy" data-toggle="modal" data-target="#myModal">REDEEM</button>
            </form>
        </div>
          
    </div>
<?php

$i++;
 }
?>
    
      
</div>
</body>
</html>