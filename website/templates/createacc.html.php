<html>
<head>
<title>Create account</title>
<style type="text/css">


ul{
	list-style-type: none;
	margin:5px;
}
li{
margin:5px;
}
</style>
</head>

<body>
   <div>
	   <form action="" method="post">
		   <ul>
		   	<li><label>Email</label></li>
		   	<li> <input type="email" name="email" value=""></li>
		   	<li><label>Password</label></li>
		   	<li> <input type="password" name="password" id="password"></li>
		   	<li><label>Repeat password</label></li>
		   	<li> <input type="password" name="passwordr" id="password_confirm" oninput="check(this)"></li>
		   	<li><button type="submit" name="create">create</button></li>
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