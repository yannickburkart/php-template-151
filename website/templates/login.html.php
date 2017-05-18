<html>
<head>
<title>Login Test</title>
</head>
<body>
   
  	  <form action="" method="post">
      <h2>Enter Username and Password</h2> 
      <label>email:</label>
      <input type="email" name="email" >
      <label>Email:</label>
      <input type="password" name="password">
       <button  type = "submit" name = "login">Login</button>
       </form>
</body>


<!-- for encrzptioed password -->
$password=string;
$hash= password_hash($password, PASSWORD_DEFAULT); //generate

$success = password_verifz($password, $hash); //check login

</html>