<html>
<head>
<title>Statistic</title>
<style>
<?php include ("style.css");?>
</style>
</head>

<body id="logbody" onload="checkValue()">
   
<?php include ("navigation.html.php");?>
   <div id="content">
   <div class="block">
   <div class="switchlabl">all</div>
   		<label class="switch">
  			<input type="checkbox" id="lifecheck" onclick="checkValue()">
  			<div class="slider round"></div>
		</label>
		<div class="switchlabl" style="margin-left: 50px">heute</div>
		</div>
		<br>
   <div style="clear: both;"></div>
	  <div class="block">
	  <p>Total hours:</p> 
	  <p>Total breaks:</p> 
	   </div>
	   <div class="block">
	   	<p><label id="hours">00</label> h <label id="minutes">00</label> m <label id="seconds">00</label> s</p> 
	  	<p><label id="phours">00</label> h  <label id="pminutes">00</label> m <label id="pseconds">00</label>s</p> 
	   
	   </div>
	   
	   <div class="block">
	  	<p id="workh"  style="loat:left; visibility: hidden;height:0px; width:0px;"><?php echo $_SESSION["worksec"];?></p>
	   	<p id="breakh" style="visibility:  hidden; width:0px;float:left; height:0px"><?php echo $_SESSION["breaksec"];?></p>
	  	<p id="workhtoday"  style="loat:left; visibility: hidden;height:0px; width:0px;"><?php echo $_SESSION["worksectoday"];?></p>
	   	<p id="breakhtoday" style="visibility:  hidden; width:0px;float:left; height:0px"><?php echo $_SESSION["breaksectoday"];?></p>
	  	
	  	</div>
	   
	</div>
		       <div id="piechart" style="width: 900px; height: 500px; float:left; "></div>
	    <div id="footer"><p>M151 - Yannick Burkart</p></div>
	
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    function checkValue()
	{
	  var lfckv = document.getElementById("lifecheck").checked;
  		if(lfckv===true){
			//take today
			var text = document.getElementById("workhtoday").innerHTML;
		   	var text2 = document.getElementById("breakhtoday").innerHTML;
		}else{
			//take everything
			var text = document.getElementById("workh").innerHTML;
		   	var text2 = document.getElementById("breakh").innerHTML;
		}
		drawChart(text, text2);
	}
    
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      var lfckv = document.getElementById("lifecheck").checked;

      
      function drawChart(text, text2) {
          if(text==null){
      	   	var text = document.getElementById("workh").innerHTML;
      	   	var text2 = document.getElementById("breakh").innerHTML;
          }

	   	 		
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
          backgroundColor:'transparent',
          colors: ['#9F9F9F', '#555555', '#ec8f6e', '#f3b49f', '#f6c7b6'],
          legend: {'textStyle':{'color':'white'}},
          titleTextStyle: {
              color: 'white',    // any HTML string color ('red', '#cc00cc')
              bold: true,    // true or false
          },
          pieSliceBorderColor:'transparent',
         };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);   

		

 	    
  		var pminutesLabel = document.getElementById("pminutes");
	    var psecondsLabel = document.getElementById("pseconds");
	    var phoursLabel = document.getElementById("phours");

	    var minutesLabel = document.getElementById("minutes");
	    var secondsLabel = document.getElementById("seconds");
	    var hoursLabel = document.getElementById("hours");
	    
	    secondsLabel.innerHTML=text%60;
	    minutesLabel.innerHTML = pad(parseInt(text/60)%60);
	    hoursLabel.innerHTML = (parseInt(text/3600)%24);
	   
	    psecondsLabel.innerHTML=text2%60;
	    pminutesLabel.innerHTML = pad(parseInt(text2/60)%60);
	    phoursLabel.innerHTML = (parseInt(text2/3600)%24);

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