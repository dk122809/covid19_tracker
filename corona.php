<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="https://kit.fontawesome.com/fa9b59c9b0.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://projects.nodetent.com/coronatracker/assets/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body onload="fetch()">
		<!-- header Start -->
		<nav class="navbar ">
			<a class="navbar-brand" href="/"><img src="images/logo.png"></a>
		</nav>
		<!-- header Ends -->
		<div class="main-body">
			<div class="card" id="table-card">
				<table class="table table-bordered  table-dark" id="tbval">
					<thead>
						<tr>
							<!-- <th></th> -->
							<th scope="col">State</th>
							<th scope="col">Total Confirmed</th>
							<th scope="col">Total Recovered</th>
							<th scope="col">Total Deaths</th>
						</tr>
					</thead>
				</table>
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
				const countryCode = urlParams.get('countrycode')
				// console.log(countryCode);
				$.get("https://bing.com/covid/data",
					function (data){
						// console.log(data['areas']);
						// dtSample.Columns.Add(new DataColumn("Tag"))
							for(var i=1; i<(data['areas'][countryCode]['areas'].length); i++){
								var table = $('#tbval').DataTable();
								// flag = data[i-1]["countryInfo"]["flag"];
								table.row.add( [
								// "<img src='" + flag + "'/>",
						data['areas'][countryCode]['areas'][i-1]['displayName'],
						data['areas'][countryCode]['areas'][i-1]['totalConfirmed'],
						data['areas'][countryCode]['areas'][i-1]['totalRecovered'],
						data['areas'][countryCode]['areas'][i-1]['totalDeaths']
						
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