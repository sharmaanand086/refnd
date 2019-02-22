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
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
</head>
<body>
    <!--?php echo $_POST['email']; ?-->
<div class="main-container">
    <div class="first_section">
        <div class="logo">
             <img src="images/logo.png" />
        </div>
        <div class="main-text">
            <p>Refund Redemption is a 3 <br>step process</p>
        </div>
         <div class="steps">
            <p>Step <span>1:</span> Select the product you are planning to return.</p>
            <p>Step <span>2:</span> Select from the awesome package listed.</p>
            <p>Step <span>3:</span> Redeem & Use</p>
        </div>
        <div class="scroll">
        <p><i class="scrolldown">Scroll to continue</i></p>
        <span class="glyphicon glyphicon-menu-down scrolldown"></span>
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
                         <li class="one active"></li>
                         <li class="two"></li>
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
            <div class="step_number">
                <p>Step <span>1: </span>Select the product you want to refund</p>
            </div>
           <!--  <div class="products">
                <div class="row">
                    <div class="col-md-4 product_img">
                    </div>
                    <div class="col-md-8 product_text">

                    </div>
                </div>
            </div> -->
            <div class="product">
            <div class="product_listboot">
            <div class="row">
                <?php
                $email = $_POST['email'];
                $sql = "SELECT * FROM nuser WHERE `email` = '$email'";
            	$result = $conn->query($sql);
            	$abc=1;
                	while($row = $result->fetch_assoc()) {
                	    $keyword = $row['product'];
                	    $sql1 = "SELECT * FROM productinfo WHERE `matchkey` = '$keyword'";
            	        $result1 = $conn->query($sql1);
            	        
        	            	while($row1 = $result1->fetch_assoc()) {
        	            	    $abc = $abc+1;
                ?>
                    <div class="col-md-4  product_container" onclick="abc(this.id)" id="<?php echo $row['id'] ?>">
                        <input type="hidden" id="key<?php echo $row['id'] ?>" value="<?php echo $row['product']; ?>" /> 
                        <input type="hidden" id="price<?php echo $row['id'] ?>" value="<?php echo $row['amount']; ?>" />
                        <div class="product_images">
                            <img src="<?php echo $row1['image']; ?>"  alt="">
                        </div>
                        <div class="product_name">
                            <p><?php echo $row1['name']; ?><br><span>Rs. <?php echo $row['amount']; ?></span></p>
                             <label class="cust-check">
                                <input class="styled-checkbox" id="checkproduct<?php echo $abc; ?>" type="checkbox" name="check" value="value2" >
                               <span class="checkmark"></span>
                            </label>
                        </div>
                   </div>
                            
               <?php
               
        	            	}
                	}
                	
               ?>
               
                <div class="hello">
                    <form action="step2.php" method="post" id="stepone">
                <input type="hidden" id="keyvalueofhidden" name="keyvalueofhidden" value="" />
                <input type="hidden" id="pricevalueofhidden" name="pricevalueofhidden" value="" />
                <input type="hidden" id="email" name="email" value="<?php echo $_POST['email']; ?>">
                </form>
                <input type="button" class="start-button" id="proceedid" value="Proceed">
                
            </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    var progressBar = {
  Bar : $('#progress-bar'),
  Reset : function(){
    if (this.Bar){
      this.Bar.find('li').removeClass('active'); 
    }
  },
  Next: function(){
    $('#progress-bar li:not(.active):first').addClass('active');
  },
  Back: function(){
    $('#progress-bar li.active:last').removeClass('active');
  }
}

progressBar.Reset();

////
$("#Next").on('click', function(){
  progressBar.Next();
})
$("#Back").on('click', function(){
  progressBar.Back();
})
$("#Reset").on('click', function(){
  progressBar.Reset();
})

function abc(id){
    //$(this).css('background-color','#37a000');background-color: #adb1ab;
    var getkey="#key"+id;
    var key = $(getkey).val();
    //alert(key);
    document.getElementById("keyvalueofhidden").value =key;

    var getamount="#price"+id;
    var amount = $(getamount).val();
    //alert(amount);
    document.getElementById("pricevalueofhidden").value = amount;

    $(".scolor").css("background-color", "#fff");
    $("#desccolor"+id).css("background-color", "#b3d7f3");
    
}

$(document).ready(function() {
  
   $('.one').addClass('active');
});
$(document).ready(function() {
var list = document.querySelectorAll('input.styled-checkbox ');
for (var item of list) {
    item.checked = false;
}
});
$("#proceedid").click(function(){
    //alert('sdf');
    var abc= $('#checkproduct2').prop('checked');
    var abc1= $('#checkproduct3').prop('checked');
    var abc2= $('#checkproduct4').prop('checked');
    var abc4= $('#checkproduct5').prop('checked');
    //alert(abc);
    if(abc == true || abc1 == true || abc2 == true || abc4 == true){
   var key=  document.getElementById("keyvalueofhidden").value;
   if(key==""){
       alert("Please Select Any Product Proceed !");
   }else{
       document.getElementById("stepone").submit();
   }
    }
    else{
        alert("Please Select Any Product Proceed !");
    }
  
});
$('input.styled-checkbox').on('change', function() {
    $('input.styled-checkbox').not(this).prop('checked', false);  
});
$(".scrolldown").click(function() {
    $('html,body').animate({
        scrollTop: $(".step_bar").offset().top},
        'slow');
});
</script>



</body>
</html>
