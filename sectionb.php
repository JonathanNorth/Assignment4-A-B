<!DOCTYPE html>
<html lang="en-US">
	<head>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
		<script type="text/javascript">
			
			
			// Load google charts
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			
			// Draw the chart and set the chart values
			function drawChart() {
			  var data = google.visualization.arrayToDataTable([
<?php
	$conn = new mysqli('localhost','northj_pbl','mypassword','northj_pbl');
	if($conn->error) echo "connection failed";
	
	$query = "SELECT category, count(*) as cnt FROM `classics` group by category";
	$result = $conn->query($query);
	$numRows = $result->num_rows;

echo <<<_END
				['Category','Number'],
_END;


for($j=0; $j<$numRows-1; ++$j){
$result->data_seek($j);
$row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END

				['$row[0]',$row[1]],
_END;
}
$result->data_seek($j);
$row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END

				['$row[0]',$row[1]]
				]);
				
_END;
	


?>
	
			  

			   // Optional; add a title and set the width and height of the chart
			  var options = {'title':'Question B', 'width':550, 'height':400};
			   //the chart will show the percentage of each task based on the Hours per day values
			  // Display the chart inside the <div> element with id="piechart"
			  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			  chart.draw(data, options);
			}
		</script>

	</head>
	<body>
		<h1>Question B</h1>
		<div id="piechart"></div>
	</body>
</html>
