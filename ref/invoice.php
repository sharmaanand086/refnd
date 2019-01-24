<?php
session_start();
$email = $_POST['email']; 
require_once('class.phpmailer.php');
include 'conn.php';
$key= $_POST['productkey'];
$price= $_POST['productprice'];
$packid =  $_POST['productid'];
$sql = "SELECT * FROM pack1 WHERE `price` = '$price' AND `matchkey`='$key' AND `packid` = '$packid'";
$result = $conn->query($sql);

$sql2 = "UPDATE `nuser` SET  `ftime`='1' WHERE email='$email'";
 $conn->query($sql2);

$abc="";
$a=1;
$total=0;

while($row = $result->fetch_assoc()) {

    $abc .='<tr style="font-size: 14px;">
										<td style="padding:5px;">'.$a.'</td>
										<td style="text-align:left ; padding: 5px;">'.$row["packname"].'</td>
										<td style="text-align:center; padding: 5px;">Rs.'.$row["packvalue"].'</td>
										<td style="text-align:center; padding: 5px;">Rs.'.$row["packvalue"].'</td>
									</tr>';
	$total = $total + $row["packvalue"];
	$adjustment = $row["yousaved"];
									$a++;
}
    $currentDate = date("d-m-Y");
    $invoiceId = rand(10,1000);
    $price = 1200;
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host = 'mail.xxxxxxxxxx.com';  // Specify main and backup servermail.domain.com
	$mail->Port = '26';
	$mail->SMTPAuth = 'true';                               // Enable SMTP authentication
	$mail->Username = 'xxxxxxxxxxxxxxxx';                            // SMTP username,abc@domain.com'
	$mail->Password = 'xxxxxxxxxxxxxxxxxxx';                           // SMTP password
	$mail->SMTPSecure = 'SSL/TLS';

	try 
	{
		$mail->SetFrom('abc@domain.com', 'abc');
		//$mail->AddAddress('support@arfeenkhan.com', '');
		$mail->AddAddress($email, '');
         
		$mail->Subject = 'Refund Invoice';
		$mail->Body= '<html>
  <head>
  </head>
  <body>
  <table id="mainTable" style="width: 650px;">
    <tbody>
      <tr>
        <td style="font-family: Tahoma, Arial, Verdana, sans-serif;font-size:
        12px;color: #000000;">
          <table style="width: 100%;">
            <tbody>
              <tr>
                <td nowrap="nowrap" style="font-family: Tahoma, Arial,
                Verdana, sans-serif;font-size: 12px;color: #000000;">
                  <img alt="Logo" border="0" src="https://ad129.infusionsoft.com/Logo" />
                <br />
                <br />
                gfadg<br />
               sgfdss,<br />
	          	address<br />
               Mumbai City - 400072 Maharashtra <br />
                India<br />
                <br />
                <!--~Company.Phone1~-->
              </td><td align="right" valign="top" style="font-family: Tahoma,
                Arial, Verdana, sans-serif;font-size: 12px;color: #000000;">
                <h1 style="margin: 1px;color: #000000;">
                  Invoice
                </h1>
                <table cellpadding="5" cellspacing="0" id="infoTable" style="border: solid
                #000000 1px;">
                  <tbody>
                    <tr>
                      <td class="info" style="font-family: Tahoma,
                      Arial, Verdana, sans-serif;font-size: 12px;color: #000000;text-align:
                      center;border: solid #000000 1px;">
                        Date
                      </td><td class="info" style="font-family: Tahoma,
                      Arial, Verdana, sans-serif;font-size: 12px;color: #000000;text-align:
                      center;border: solid #000000 1px;">
                      Invoice #
                      </td>
                    </tr>
                    <tr>
                      <td class="info" style="font-family: Tahoma,
                      Arial, Verdana, sans-serif;font-size: 12px;color: #000000;text-align:
                      center;border: solid #000000 1px;">
                        '.$currentDate.'
                      </td><td class="info" style="font-family: Tahoma,
                      Arial, Verdana, sans-serif;font-size: 12px;color: #000000;text-align:
                      center;border: solid #000000 1px;">
                      '.$invoiceId.'
                      </td>
                    </tr>
                  </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                    <tr>
                      <td class="spacer" style="font-family: Tahoma, Arial, Verdana,
                      sans-serif;font-size: 12px;color: #000000;height: 15px;">
                      </td>
                    </tr>                                  
                      <!-- new table -->
                              <tr>
                                <table width="100%" id="purchasesTable" style="margin-top:2%">
                                  <tr id="purchaseRowsHeader">
                                    <td><table width="100%" cellpadding="0" cellspacing="0">
                                      <tr style="background-color: #000;color: #fff;font-size: 16px;font-weight: bold; text-align:center">
                                        <td style="text-align:left;padding:5px;">Qty</td>
                                        <td>Description</td>
                                        <td>Unit Price</td>
                                        <td>Total</td>
                                      </tr>
									'.$abc.'
                                      <tr style="font-size: 14px;">
                                        <td style="padding:5px;"><b>Total Purchases</b></td>
                                        <td style="text-align:center; padding: 5px;">&nbsp;</td>
                                        <td style="text-align:center ; padding: 5px;">&nbsp;</td>
                                        <td style="text-align:center ; padding: 5px;">Rs.'.$total.'</td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <table width="100%" style="margin-top:2%">
                                  <tr>
                                    <td><table width="100%" cellpadding="0" cellspacing="0">
                                      <tr style="background-color: #000;color: #fff;font-size: 16px;font-weight: bold; ">
                                        <td style="padding:5px;">Payments Made</td>
                                        <td style="padding:5px;">&nbsp;</td>
                                        <td style="padding:5px;">&nbsp;</td>
                                      </tr>
                                      <tr style="font-size: 14px;">
                                        <td style="padding: 5px;">'.$currentDate.'</td>
                                        <td style="padding: 5px;">Refund</td>
                                        <td style="text-align:right; padding:5px;">Rs.'.$total.'</td>
                                      </tr>
                                      <tr style="font-size: 14px;">
                                        <td style="padding: 5px;"><b>Total Payment &amp; Adjustments</b></td>
                                        <td style="text-align:center;padding: 5px;">&nbsp;</td>
                                        <td style="text-align:right; padding: 5px;">Rs.'.$adjustment.'</td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                </td>
                                  </tr>
                                </table>
                              </tr>
                      <!-- new table -->
                              </tbody>
                              </table>
                                <p class="spacer" style="font-family: Tahoma, Arial, Verdana, sans-serif;color:
                                #000000;height: 15px;">
                                </p>
                                <p style="font-family: Tahoma, Arial, Verdana, sans-serif;color: #000000;">
                                  Thanks,<br />
                                  Arfeen Khan
                                </p>
								<p style="font-weight:500;font-size:14px;text-align:center;padding: 10px 0 20px 0;border-top: 1px solid #000;">Note : Money is non-refundable.</p>
                              </body>
                              </html>';
                              
                              $mail->IsHTML(true);
				$mail->Send();
			} 
			catch (phpmailerException $e) 
			{
				echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} 
			catch (Exception $e) 
			{
				echo $e->getMessage(); //Boring error messages from anything else!
			}
?> 
	<script>location.href = "http://doman.com/refund/thankyou.php";</script>