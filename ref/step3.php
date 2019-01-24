<?php 
include 'conn.php';
$key= $_POST['productkey'];
$price= $_POST['productprice'];
$packid =  $_POST['productid'];

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
                         <li class="three active"></li>
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
            <p>Step <span>3: </span>Confirm the Package.</p>
        </div>

        <div class="final_confirmation">
            <p class="mod-img"><span><img src="http://magicconversion.com/refund/img/icon.png"></span>Package successfully added</p>
<?php 
$sql = "SELECT * FROM pack1 WHERE `price` = '$price' AND `matchkey`='$key' AND `packid` = '$packid'";
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
                            <p class="product_heading"><b><?php echo $row['packname']; ?></b></p>
                            <p class="product_subheading"><?php echo $row['packdescr']; ?></p>
                            <p class="product_price">MRP : <?php echo $row['packvalue']; ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
              	}
               ?>
            <div class="extra-border"></div>

        <p class="saving">You Have save Rs.500 on this package</p>
        </div>
        <div class="final-text">
            <p><span><input type="checkbox" id="xxx" name="xxx" onclick="calc();"></span>This will be your final product of refund.</p>
        </div>
<!-- Modal -->
   
  <div class="modal" id="myModal">
    <div class="modal-dialog additionalclass">
      <div class="modal-content ">
       <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      
        <div class="modal-body">
            <p>This is your final refund.
Are you sure you want to go further.</p>
        </div>
 
        <!-- Modal footer -->
    <div class=" mod-but">
        <form action="step2.php" method="post" id="backid">
            <input type="hidden" name="pricevalueofhidden" id="pricevalueofhidden" value="<?php echo $price; ?>">
            <input type="hidden" name="keyvalueofhidden" id="keyvalueofhidden" value="<?php echo $key; ?>">
             <input type="hidden" id="email" name="email" value="<?php echo $_POST['email']; ?>">
        </form>
        <button type="button" id="backid1" class="btn btn-default hey" data-dismiss="modal">Back</button>
        
        <form action="invoice.php" method="post" id="invoiceid">
            <input type="hidden" name="productprice" id="productprice" value="<?php echo $price; ?>">
            <input type="hidden" name="productkey" id="productkey" value="<?php echo $key; ?>">
            <input type="hidden" name="productid" id="productid" value="<?php echo $packid; ?>">
             <input type="hidden" id="email" name="email" value="<?php echo $_POST['email']; ?>">
        </form>
        <button type="button" id="proceedid" class="btn btn-primary hey">Proceed</button>
         
    </div>
</div>
<script type="text/javascript">
 function calc()
{
  if (document.getElementById('xxx').checked) 
  {
     $('#myModal').show();
  } else {
      calculate();
  }
}

$("#proceedid").click(function(){
  document.getElementById("invoiceid").submit();
});
$("#backid1").click(function(){
  document.getElementById("backid").submit();
});

</script>
</body>
</html>