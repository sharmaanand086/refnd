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
    <?php $email = $_GET['email']; ?>
      <form action="step1.php"  id="grupsubmit" method="post">
             <input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
            <button id="sub" type="submit"  >submit</button>
            </form>
      <script type="text/javascript">
	$( document ).ready(function() {
 		$('#grupsubmit')[0].submit();
});
</script>
</body>
</html>
        