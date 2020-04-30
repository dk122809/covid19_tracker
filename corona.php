<?php include 'include/india_header.php'; ?>

		<div class="main-body">
			<h1 align="center">India</h1><br>
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
		    <p class="card-text">Active Case</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-info-gradient">
		  <div class="card-body ">
		    <i class="fa fa-minus fa-2x"></i></br>
		    <h3 class="card-title " id="new-deaths"></h3>
		    <p class="card-text">Total Tests</p>
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

<br><br>
			<h2 align="center">State Wise Data Of India</h2>
			<div class="card" id="table-card">
				<div class="table-responsive">
				<table class="table table-bordered  table-dark" id="tbval">
					<thead>
						<tr>
							<th>State</th>
							<th scope="col">Total Confirmed</th>
							<th scope="col">Total Discharged</th>
							<th scope="col">Total Deaths</th>
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
		<script type="text/javascript">
			
			function fetch(){
				const queryString = window.location.search;
				const urlParams = new URLSearchParams(queryString);
				const countryCode = urlParams.get('countrycode');
				$.get("https://api.rootnet.in/covid19-in/stats/latest",
					function (data){
							for(var i=1; i<(data['data']['regional'].length); i++){
								var table = $('#tbval').DataTable();
								table.row.add( [
						data['data']['regional'][i-1]['loc'],
						data['data']['regional'][i-1]['totalConfirmed'],
						data['data']['regional'][i-1]['discharged'],
						data['data']['regional'][i-1]['deaths']
						
							] ).draw();
							}
					}
				)

				$.get("https://corona.lmao.ninja/v2/countries?yesterday=false&sort=todayCases",
			function (data){
				for(var i=1; i<(data.length); i++){
					if(data[i-1]['country'] == 'India'){
						document.getElementById('total-case').innerHTML = data[i-1]['cases'];
				document.getElementById('total-deaths').innerHTML = data[i-1]['deaths'];
				document.getElementById('total-recovered').innerHTML = data[i-1]['recovered'];
				document.getElementById('new-case').innerHTML = data[i-1]['active'];
				document.getElementById('new-deaths').innerHTML = data[i-1]['tests'];
				document.getElementById('new-recovered').innerHTML = data[i-1]['critical'];
					}
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
		});
		</script>
	</body>
</html>