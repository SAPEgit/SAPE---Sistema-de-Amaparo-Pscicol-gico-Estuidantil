<html>
  <head>
  	<title>Grefico de ansiedade</title>
  </head>
  <body>
  	<?php
	  	if($_POST){
				$res = array(
					$_POST['q1'],
					$_POST['q2'],
					$_POST['q3'],
					$_POST['q4'],
					$_POST['q5'],
				);
				
				$qtRep1 = 0;
				$qtRep2 = 0;
				$qtRep3 = 0;
				$nivel = null;

				foreach ($res as $key => $value) {
					if($res[$key] == 1){
						$qtRep1+=1;
					}elseif($res[$key] == 2){
						$qtRep2+=1;
					}elseif($res[$key] == 3){
						$qtRep3+=1;
					}
				}

				if($qtRep1 > $qtRep2 && $qtRep1 > $qtRep3){
					$nivel = "Nível de estresse e ansiedade considerados médio (normal)";
				}elseif($qtRep2 > $qtRep1 && $qtRep2 > $qtRep3){
					$nivel = "Nível de estresse e ansiedade acima do normal";
				}elseif($qtRep3 > $qtRep1 && $qtRep3 > $qtRep2){
					$nivel = "Alto nível de estresse e ansiedade";
				}elseif($qtRep1 == 2 && $qtRep2 == 2){
					$nivel = "Nível de estresse e ansiedade considerados médio (normal)";
				}elseif($qtRep2 == 2 && $qtRep3 == 2){
					$nivel = "Alto nível de estresse e ansiedade";
				}elseif($qtRep1 == 2 && $qtRep3 == 2){
					$nivel = "Nível de estresse e ansiedade acima do normal";
				}
			} 
	  	?>
  	<form id="form" method="post">
		<input type="number" name="q1" max="3" required/>
		<input type="number" name="q2" max="3" required/>
		<input type="number" name="q3" max="3" required/>
		<input type="number" name="q4" max="3" required/>
		<input type="number" name="q5" max="3" required/>
		<input type="submit" value="calcular">
	</form>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
			$("#form").submit(function( event ) {
			  event.preventDefault();
			  google.charts.load("current", {packages:["corechart"]});
		      google.charts.setOnLoadCallback(drawChart);
		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['Task', 'Hours per Day'],
		          ['Normal',     11],
		          ['Moderado',      30],
		          ['Alto',  20]
		        ]);

		        var options = {
		          title: 'Gráfico de Ansiedade',
		          pieHole: 0.4,
		        };

		        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
		        chart.draw(data, options);
		      }
			})
    	});
    </script>
  </body>
</html>