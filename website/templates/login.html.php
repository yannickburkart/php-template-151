<html>
<head>
<title>Login</title>
<style type="text/css">
<?php include ("style.css");?>
</style>
</head>

<body id="logbody">
<div class="title">
<h1 style="margin: 0 auto; display: table;">M151</h1>
<hr>
<h1 style="margin: 0 auto; display: table;">Yannick Burkart</h1>
</div>
   <div id="content2">
	   <form action="" method="post">
		   <ul class="logul">
		   	<li class="logli"><label>Email</label></li>
		   	<li class="logli"> <input type="email" name="email"></li>
		   	<li class="logli"><label>Password</label></li>
		   	<li class="logli"> <input type="password" name="password"></li>
		   	<li class="logli"> <a href="createAccount">create account</a><li>
		   	<li class="logli"><button  type = "submit" name = "login">Login</button></li>
		   </ul>
	   </form>
   </div>
</body>


<!-- for encrzptioed password -->
<!-- $password=string; -->
<!-- $hash= password_hash($password, PASSWORD_DEFAULT); //generate -->

<!-- $success = password_verifz($password, $hash); //check login -->

</html>