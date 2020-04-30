<?php include 'include/header.php'; ?>
<!-- header Start -->
<nav class="navbar ">
  <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>

  <a class="india btn btn-primary" href="corona.php">India Stats</a>
</nav>
<!-- header Ends -->
<div class="main-body">
<!-- global Data Start -->
<br>
<br>
<div class="row jumbotron">
	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-dark-gradient">
		  <div class="card-body ">
		    <i class="fa fa-ambulance fa-2x"></i></br>
		    <h3 class="card-title " id="total-case"></h3>
		    <p class="card-text">Total Cases</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-danger-gradient">
		  <div class="card-body ">
		    <i class="fa fa-hotel fa-2x"></i></br>
		    <h3 class="card-title " id="total-deaths"></h3>
		    <p class="card-text">Total Deaths</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-primary-gradient">
		  <div class="card-body ">
		    <i class="fa fa-heartbeat fa-2x"></i></br>
		    <h3 class="card-title " id="total-recovered"></h3>
		    <p class="card-text">Total Recovered</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-secondary-gradient">
		  <div class="card-body ">
		    <i class="fa fa-plus-circle fa-2x"></i></br>
		    <h3 class="card-title " id="new-case"></h3>
		    <p class="card-text">New Case</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-info-gradient">
		  <div class="card-body ">
		    <i class="fa fa-minus fa-2x"></i></br>
		    <h3 class="card-title " id="new-deaths"></h3>
		    <p class="card-text">New Deaths</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-warning-gradient">
		  <div class="card-body ">
		    <i class="fa fa-exclamation-triangle fa-2x"></i></br>
		    <h3 class="card-title " id="new-recovered"></h3>
		    <p class="card-text">Critical Case</p>
		  </div>
		</div>
	</div>

</div>
<!-- global Data ends -->
<!-- global data on map start -->
<div class="card" id="regions-card">
	<div id="regions_div" style="width: auto; height: auto;" ></div>
</div>
<br>
<br>
<!-- global data on map ends -->

<div class="card" id="table-card">
<div class="table-responsive">
	<table class="table table-bordered  table-dark" id="tbval">
		<thead>
			<tr>
				<!-- <th></th> -->
				<th scope="col">Country</th>
				<th scope="col">Total Confirmed</th>
				<th scope="col">Total Recovered</th>
				<th scope="col">Total Deaths</th>
				<th scope="col">New Confirmed</th>
				<th scope="col">Active Cases</th>
				<th scope="col">Critical Cases</th>
			</tr>
		</thead>
	</table>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
<script type="text/javascript" src="https://projects.nodetent.com/coronatracker/assets/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://projects.nodetent.com/coronatracker/assets/js/dataTables.responsive.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var options = {
                colorAxis: {
                    colors: ['#D2E3FC', '#8AB4F8', '#4285F4', '#1967D2', '#174EA6', ]
                },
                backgroundColor: '#2A323C',
                legend: {
                    textStyle: {
                        color: '#000',
                        fontSize: 14
                    }
                }
            };
        var dimension = "Confirmed Cases";
        $.ajax({
          url: "https://corona.lmao.ninja/v2/countries?yesterday=false&sort=todayCases",
          dataType: "JSON"
        }).done(function(data) {
                var statesArray = [["Country",dimension]];
                for(var i=1; i<(data.length); i++){
                	var stateitem = [data[i-1]['countryInfo']['iso2'], data[i-1]['cases']];
                	// console.log(stateitem);
                    statesArray.push(stateitem);
                }
                // console.log(statesArray);
          var statesData = google.visualization.arrayToDataTable(statesArray);
          var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
          chart.draw(statesData, options);
          $("h3").append(" Sorted by  "+dimension);
        });
}
    </script>

<script type="text/javascript">
	


	function fetch(){
		$.get("https://covid19-server.chrismichael.now.sh/api/v1/AllReports",
			function (data){
				var tbval = document.getElementById('tbval')
				document.getElementById('total-case').innerHTML = data['reports'][0]['cases'];
				document.getElementById('total-deaths').innerHTML = data['reports'][0]['deaths'];
				document.getElementById('total-recovered').innerHTML = data['reports'][0]['recovered'];
				document.getElementById('new-case').innerHTML = data['reports'][0]['table'][0][0]['NewCases'];
				document.getElementById('new-deaths').innerHTML = data['reports'][0]['table'][0][0]['NewDeaths'];
				document.getElementById('new-recovered').innerHTML = data['reports'][0]['table'][0][0]['Serious_Critical'];
			}
		)

		$.get("https://corona.lmao.ninja/v2/countries?yesterday=false&sort=todayCases",
			function (data){
				// console.log(data['areas'][i-1]['displayName'])
				// dtSample.Columns.Add(new DataColumn("Tag"))
				// console.log(data.sort());
				for(var i=1; i<(data.length); i++){
					// console.log(data[i-1]['country']);
					var table = $('#tbval').DataTable(); 
					flag = data[i-1]["countryInfo"]["flag"];
					table.row.add( [
					// "<img src='" + flag + "'/>",
        			" <img src='" + flag + "'/> "+ data[i-1]['country'],
        			data[i-1]['cases'],
        			data[i-1]['recovered'],
        			data[i-1]['deaths'],
        			data[i-1]['todayCases'],
        			data[i-1]['active'],
        			data[i-1]['critical'],
        			
    				] ).draw();
				}
			}
		)
	}



    $(document).ready(function () {
        $('#tbval').DataTable({
            order: [[ 1, "desc" ]],
            paging: true,
            "pageLength": 10,
            "pagingType": "simple",
            "dom": '<"top"flp>rt<"bottom"ip><"clear">',
        });
        // console.clear();
    });

</script>

</body>
</html>