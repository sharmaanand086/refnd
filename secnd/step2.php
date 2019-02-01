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

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/resp.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="main-container">
    <div class="first_section">
        <div class="logo">
             <img src="images/logo.png">
        </div>
        <div class="main-text1">
            <p>Hope you enjoy<br> your new <br>Journey</p>
        </div>
        <div class="scroll">
            <p><i>Scroll to continue</i></p>
            <span class="glyphicon glyphicon-menu-down"></span>
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
     <div class="inner_container">
        <?php 
                $a=1;
                 $price = $_POST['pricevalueofhidden'];
                 $key = $_POST['keyvalueofhidden'];
                    $i=1;
                    
                         while ($a < 3){
                             $sql = "SELECT * FROM pack1 WHERE `price` = '$price' AND `matchkey`='$key' AND `packid` = '$a'";
                	$result = $conn->query($sql);
                    //while($row = $result->fetch_assoc()) 
                     //    $rows[] = $row;
                 ?>
                 
        <div class="product_listboot">
            <div class="row">
                <div class="col-sm-6 product_container">
                    <div class="product_img">
                        
                        
                          <?php   
                          while($rowss = $result->fetch_assoc()){
                              //var_dump($rowss['packimg']);
                          ?>
                          <img src="<?php echo $rowss['packimg']; ?>" alt="" style="width: 35%;!important">
                          <?php
                          }
                          ?>
                    </div>
                </div>
                <div class="col-sm-6 product_container">
                    <div class="product_desc">
                        <?php
                        if($a == 1){
                            ?>
                            <p class="product_heading"><b>PACKAGE ONE</b></p>
                            <?php
                        }
                        if($a == 2){
                            ?>
                            <p class="product_heading"><b>PACKAGE TWO</b></p>
                            <?php
                        }
                        ?>
                        <?php 
                        $j=1; 
                         $sql2 = "SELECT * FROM pack1 WHERE `price` = '$price' AND `matchkey`='$key' AND `packid` = '$a'";
                	$result2 = $conn->query($sql2);
                       while($row2= $result2->fetch_assoc()){
                        ?>
                        <p class="points"><span><?php echo $j++ ?>) </span><?php echo $row2['packname']; ?></p>
                        
                        <?php }  ?>
                        <?php
                        $sql1 = "SELECT DISTINCT price as total,yousaved as savedtotal FROM pack1 WHERE `price` = '$price' AND `matchkey`='$key' AND `packid` = '$a'";
                	    $result1 = $conn->query($sql1);
                        while($row1 = $result1->fetch_assoc()){
                           
                        
                        ?>
                        <p class="points_price">RS.<?php echo $row1['total']; ?><span>(You save Rs.<?php echo $row1['savedtotal']; ?> on this Package)</span></p>
                        <?php
                        
                        }?>
                        <div class="product_subheading">
                            <label class="cust-check">
                                <input class="styled-checkbox" id="<?php echo $a; ?>" type="checkbox" value="value2">
                               <span class="checkmark"></span>
                            </label>
                            <p class="cust-text">This is full and final settlement for my refund request.I have no claims for Refund after this.</p>
                        </div>
                        <!--<p class="product_price">MRP : 2500 </p>-->
                    </div>
                    <div class="buy_button">
                         <form action="invoice1.php" method="post"  id="invoiceid<?php echo $a; ?>">
                        <input type="hidden" id="productprice" name="productprice" value="<?php echo $price; ?>" />
                        <input type="hidden" id="productid" name="productid" value="<?php echo $a; ?>" />
                        <input type="hidden" id="productkey" name="productkey" value="<?php echo $key; ?>" />
                        <input type="hidden" id="email" name="email" value="<?php echo $_POST['email']; ?>">
                        </form>
                        <button id="sub<?php echo $a; ?>" type="button"  class="redeem_button" >REDEEM</button>
                    </div>
                </div>
            </div>
        </div>
         <div class="extra-border"></div>
         <?php
                 $a++;
                         }
                    
               ?>
         <script type="text/javascript">
             
            $('input.styled-checkbox').on('change', function() {
                $('input.styled-checkbox').not(this).prop('checked', false);
                var idofcb = $(this).attr('id');
                //alert(idofcb);
                if (document.getElementById(idofcb).checked) 
              {
                 $('.redeem_button').css('background-color', '#8d8c8c');
                 $('#sub'+idofcb).css('background-color', '#d5860a');
                 $('.three').addClass('active');
              } else {
                 $('#sub'+idofcb).css('background-color', '#8d8c8c');
                 $('.three').removeClass('active');
              }
            });
            $(".redeem_button").click(function(){
                var idofcb = $(this).attr('id');
                //alert(idofcb);
               var res = idofcb.slice(3,4);
                //alert(res);
                var abc= $('#'+res).prop('checked');
                //alert(abc);
                if (abc== true) 
              {
                  document.getElementById("invoiceid"+res).submit();
                  //window.location='invoice.php';
              }
              
            });
        </script>
    </div>

      
</div>
</body>
</html>