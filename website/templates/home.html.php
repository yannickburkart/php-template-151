
<html>
<head>
<style type="text/css">
<style>
<?php include ("style.css");?>
</style>
<title>Home</title>
</head>
<body onload="loaddata()" id="logbody" >
 <?php include ("navigation.html.php");?>
  
   <div id="content1">
 
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
	   	
	<div class="block">
	  <p><label id="hours">00</label> h <label id="minutes">00</label> m <label id="seconds">00</label> s</p> 
	  <p><label id="phours">00</label> h  <label id="pminutes">00</label> m <label id="pseconds">00</label>s</p> 
	 </div>
	 <div class="block">
	   	<p>working time</p>
   		<p>break time</p>
   		
	  </div>
	</div> 
   
  	 
    <div id="footer"><p>M151 - Yannick Burkart</p></div>
     	<p id="workh"  style="loat:left; visibility: hidden;height:0px; width:0px;"><?php echo $_SESSION["worksec"];?></p>
	   	<p id="breakh" style="visibility:  hidden; width:0px;float:left; height:0px"><?php echo $_SESSION["breaksec"];?></p>
	  	
    <script type="text/javascript">

  

 	
    var refreshIntervalID=0
    var prefreshIntervalID=0;
//work
function loaddata()
{
  	var text = document.getElementById("workh").innerHTML;
   	var text2 = document.getElementById("breakh").innerHTML;
    totalSeconds=text;
    ptotalSeconds=text2; 
    
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    var hoursLabel = document.getElementById("hours");

    secondsLabel.innerHTML = pad(totalSeconds%60);
    minutesLabel.innerHTML = pad(parseInt(totalSeconds/60)%60); 
    hoursLabel.innerHTML = pad(parseInt(totalSeconds/3600)%24);
    totalwsec.value=totalSeconds;

    //pause
  	var minutesLabel = document.getElementById("pminutes");
 	var secondsLabel = document.getElementById("pseconds");
    var hoursLabel = document.getElementById("phours");
 		
    secondsLabel.innerHTML = pad(ptotalSeconds%60);
    minutesLabel.innerHTML = pad(parseInt(ptotalSeconds/60)%60); 
    hoursLabel.innerHTML = pad(parseInt(ptotalSeconds/3600)%24);
    
    
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
			secondsLabel.innerHTML = pad(totalSeconds%60);
			minutesLabel.innerHTML = pad(parseInt(totalSeconds/60)%60); 
			hoursLabel.innerHTML = pad(parseInt(totalSeconds/3600)%24);
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
	    var hoursLabel = document.getElementById("phours");
	    
	    var totalpsec = document.getElementById("totalpsec");
	    
	    ptotalSeconds = ptotalSeconds;
	    prefreshIntervalID=setInterval(setTime, 1000);
	    
	    function setTime()
	    {
				++ptotalSeconds;
		        secondsLabel.innerHTML = pad(ptotalSeconds%60);
		        minutesLabel.innerHTML = pad(parseInt(ptotalSeconds/60)%60); 
		        hoursLabel.innerHTML = pad(parseInt(ptotalSeconds/3600)%24);
		        
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
