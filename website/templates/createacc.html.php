<html>
<head>
<title>Create account</title>
<style type="text/css">
<?php include ("style.css");?>
</style>

</head>

<body id="logbody">
   <div id="content2">
	   <form action="" method="post">
		   <ul class="logul">
		   	<li class="logli"><label>Email</label></li>
		   	<li class="logli"> <input type="email" name="email" value=""></li>
		   	<li class="logli"><label>Password</label></li>
		   	<li class="logli"> <input type="password" name="password" id="password"></li>
		   	<li class="logli"><label>Repeat password</label></li>
		   	<li class="logli"> <input type="password" name="passwordr" id="password_confirm" oninput="check(this)"></li>
   		   	<li class="logli"> <a href="login">login</a><li>  	
		   	<li class="logli"><button type="submit" name="create">create</button></li>
		   </ul>
	   </form>
   </div>
</body>
<script type='text/javascript'>
function check(input) {
    if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('Password Must be Matching.');
    } else {
        // input is valid -- reset the error message
        input.setCustomValidity('');
    }
}
</script>

<!-- for encrzptioed password -->
<!-- $password=string; -->
<!-- $hash= password_hash($password, PASSWORD_DEFAULT); //generate -->

<!-- $success = password_verifz($password, $hash); //check login -->

</html>