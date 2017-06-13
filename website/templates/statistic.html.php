
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
width: 350px;
float:left;
margin-left: 150px;
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
<title>Statistic</title>
</head>
<body>
   <div id="header">
   <div id="username"><?php 
	echo $_SESSION["email"];
	?></div>
   <div id="headerlist">
   	<ul id="hlist">
   		<li id="hli"><a href="/home">Home</a></li>
   		<li id="hli"><a href="">Statistic</a></li>
   		<li id="hli"><a>Options</a></li>
   		<li id="hli">
   				<form action="home" method="post">
             <button  type = "submit" name = "home">Logout</button>
       		</form>
       </li>
   	</ul>
   </div>
   </div>
   <div id="content">
   <p id="test"></p>
	  <div class="block">
	  <p>Total hours:</p> 
	  <p>Total breaks:</p> 
	   </div>
	   <div class="block">
	   	<p><label id="hours">00</label> h <label id="minutes">00</label> m <label id="seconds">00</label> s</p> 
	  	<p><label id="phours">00</label> h  <label id="pminutes">00</label> m <label id="pseconds">00</label>s</p> 
	   
	   </div>
	   
	   <div class="block">
	  	<p id="workh" onload="loaddataFunction()" style="loat:left; visibility: hidden;height:0px; width:0px;"><?php echo $_SESSION["worksec"];?></p>
	   	<p id="breakh" style="visibility:  hidden; width:0px;float:left; height:0px"><?php echo $_SESSION["breaksec"];?></p>
	  	</div>
	   
	</div>
		       <div id="piechart" style="width: 900px; height: 500px; float:left"></div>
	
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
	   	var text = document.getElementById("workh").innerHTML;
	   	var text2 = document.getElementById("breakh").innerHTML;
	   	 		
        var data = google.visualization.arrayToDataTable([
          ['Task', 'a'],
          ['Work', text*100],
          ['Break',text2*100]
         ]);

        var options = {
          title: 'Work/Break',
          pieHole:0.4,
          pieSliceText:'label',
          tooltip: {trigger:'none'},
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);   
 	    
  		var pminutesLabel = document.getElementById("pminutes");
	    var psecondsLabel = document.getElementById("pseconds");
	    var phoursLabel = document.getElementById("phours");

	    var minutesLabel = document.getElementById("minutes");
	    var secondsLabel = document.getElementById("seconds");
	    var hoursLabel = document.getElementById("hours");
	    
	    secondsLabel.innerHTML=pad(text);
	    minutesLabel.innerHTML = pad(parseInt(text/60));
	    hoursLabel.innerHTML = pad(parseInt(text/3600));
	   
	    psecondsLabel.innerHTML=pad(text2);
	    pminutesLabel.innerHTML = pad(parseInt(text2/60));
	    phoursLabel.innerHTML = pad(parseInt(text2/3600));

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
    </script>
</body>