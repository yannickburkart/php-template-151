
<html>
<head>
<style type="text/css">
#hlist {
	list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333333;
    height:50px;
}

#hli {
    float: left;
}

#hli a {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}
#hli button {
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    border:none;
    background:none;
    font-size:15px;
}

#hli a:hover {
    background-color: #111111;
    cursor:pointer;
}
#hli button:hover {
    background-color: #111111;
    cursor:pointer;
}
#buttonlist{
	list-style-type: none;
    margin: 0;
    padding: 0;
    
}
#bli{
	margin:10px;
}
.block{
float:left;
margin-right: 10px;
}
#content{
width: 500px;
display: block;
margin-left: auto;
margin-right: auto;
}

#footer{
 	position:fixed;
    bottom:0;
    background-color:#333;
    width:100%;
    text-align:center;
}
#footer p{
display: inline-block;
color:white;

}
button{
    cursor:pointer;
}
</style>
<title>Home</title>
</head>
<body>

   <div id="header">
   <div id="username"><?php 
	echo $_SESSION["email"];
	?></div>
   <div id="headerlist">
   	<ul id="hlist">
   		<li id="hli"><a href="">Home</a></li>
   		<li id="hli"><a href="statistic">Statistic</a></li>
   		<li id="hli"><a>Options</a></li>
   		<li id="hli">
   			<form action="" method="post">
             <button  type = "submit" name = "home">Logout</button>
       		</form>
       </li>
   	</ul>
   </div>
   </div>
   <div id="content">
	   <div class="block">
	   	<ul id="buttonlist">
	   		<li id="bli"><button id="start" onclick="countupFunction()">Start</button></li>
	   		<li id="bli"><button id="pause" onclick="pauseupFunction()">Pause</button></li>
	   		<li id="bli"><button id="stop"  onclick="stopFunction()">Stop</button></li>
   			<li id="bli">
   				<form action="savetime" method="post">
   					<input style="visibility: hidden; width: 0px; " name="wsec" id="totalwsec" >
   					<input style="visibility: hidden; width: 0px;" name="psec" id="totalpsec" >
   					<button id="save" type="submit" style="float:left;" disabled>Save</button>
   				</form>
   			</li>
	   		
	   	</ul>
	   </div>
	   <div class="block" onchange="drawChart()">
	  <p><label id="hours">00</label> h <label id="minutes">00</label> m <label id="seconds">00</label> s</p> 
	  <p> <label id="pminutes">00</label> m <label id="pseconds">00</label>s</p> 
	   </div>
	   <div class="block">
	   	<p>working time</p>
   		<p>break time</p>
	   </div>

	</div>
   
   
   
   
  	 
    <div id="footer"><p>asdf</p></div>
    <script type="text/javascript">
    totalSeconds=0;
    ptotalSeconds=0; 
   
    var refreshIntervalID=0;
    var prefreshIntervalID=0;

 
	function countupFunction(){
		clearInterval(prefreshIntervalID);
		
		document.getElementById("start").disabled = true; 
		document.getElementById("pause").disabled=false;
		document.getElementById("save").disabled = true; 
		
	    var minutesLabel = document.getElementById("minutes");
	    var secondsLabel = document.getElementById("seconds");
	    var hoursLabel = document.getElementById("hours");
	    var totalwsec = document.getElementById("totalwsec");
	    		    
	    totalSeconds = totalSeconds;
           
	    refreshIntervalID=setInterval(setTime, 1000);
	    
	    function setTime()
	    {
				++totalSeconds;
				secondsLabel.innerHTML=pad(totalSeconds%60); 
		        minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));     
		        hoursLabel.innerHTML = pad(parseInt(totalSeconds/3600));
		        totalwsec.value=totalSeconds;
	    }
	
	    function pad(val)
	    {
	        var valString = val + "";
	        if(valString.length < 2)
	        {
	            return "0" + valString;
	        }
	        else
	        {
	            return valString;
	        }
	    }
		
	}
	function pauseupFunction(){
		document.getElementById("start").disabled = false; 
		document.getElementById("save").disabled = true; 
		
		clearInterval(refreshIntervalID);

		document.getElementById("pause").disabled = true; 
	    var minutesLabel = document.getElementById("pminutes");
	    var secondsLabel = document.getElementById("pseconds");
	    var totalpsec = document.getElementById("totalpsec");
	    
	    ptotalSeconds = ptotalSeconds;
	    prefreshIntervalID=setInterval(setTime, 1000);
	    
	    function setTime()
	    {
				++ptotalSeconds;
		        secondsLabel.innerHTML = pad(ptotalSeconds%60);
		        minutesLabel.innerHTML = pad(parseInt(ptotalSeconds/60)); 
		        totalpsec.value=ptotalSeconds;	            
	    }
	
	    function pad(val)
	    {
	        var valString = val + "";
	        if(valString.length < 2)
	        {
	            return "0" + valString;
	        }
	        else
	        {
	            return valString;
	        }
	    }
	}
	function stopFunction(){
		document.getElementById("start").disabled = false; 
		document.getElementById("pause").disabled = false; 
		document.getElementById("save").disabled = false; 
		
		clearInterval(refreshIntervalID);
		clearInterval(prefreshIntervalID);
   	}
	
    </script>

</body>


<!-- for encrzptioed password -->
<!-- $password=string; -->
<!-- $hash= password_hash($password, PASSWORD_DEFAULT); //generate -->

<!-- $success = password_verifz($password, $hash); //check login -->
