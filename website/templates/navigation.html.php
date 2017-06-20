 <div id="header">
   
   <div id="headerlist">
   	<ul id="hlist">
   		<li id="hli"><a href="/home">Home</a></li>
   		<li id="hli"><a href="/statistic">Statistic</a></li>
   		<li id="hli">
   				<form action="home" method="post">
             <button  type = "submit" name = "home" id="linkbutt">Logout</button>
       		</form>
       </li>
       <li> 	<div id="username"><?php 
	echo $_SESSION["email"];
	?></div></li>
   	</ul>
  
   </div>
   </div>