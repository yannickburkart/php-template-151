<html>
<head>
<title>Login</title>
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
		   	<li> <input type="email" name="email"></li>
		   	<li><label>Password</label></li>
		   	<li> <input type="password" name="password"></li>
		   	<li> <a href="createAccount">create account</a><li>
		   	<li><button  type = "submit" name = "login">Login</button></li>
		   </ul>
	   </form>
   </div>
</body>


<!-- for encrzptioed password -->
<!-- $password=string; -->
<!-- $hash= password_hash($password, PASSWORD_DEFAULT); //generate -->

<!-- $success = password_verifz($password, $hash); //check login -->

</html>