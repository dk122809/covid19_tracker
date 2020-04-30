<?php include 'include/india_header.php'; ?>

		<h1 align="center">Helpline No.</h1>
		<div class="main-body">

			<div class="row jumbotron">
	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-dark-gradient">
		  <div class="card-body ">
		    <i class="fas fa-phone-volume fa-2x"></i></br>
		    <h3 class="card-title " id="total-case"></h3>
		    <p class="card-text">Number</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-danger-gradient">
		  <div class="card-body ">
		    <i class="fas fa-phone-volume fa-2x"></i></br>
		    <h3 class="card-title " id="total-deaths"></h3>
		    <p class="card-text">Tollfree <br> Number</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-2 col-md-6 col-sm-12">
		<div class="card bg-primary-gradient">
		  <div class="card-body ">
		    <i class="fas fa-envelope-open-text fa-2x"></i></br>
		    <h3 class="card-title " id="total-recovered"></h3>
		    <p class="card-text">Email</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-12">
		<div class="card bg-secondary-gradient">
		  <div class="card-body ">
		    <i class="fab fa-twitter-square fa-2x"></i></br>
		    <h3 class="card-title " id="new-case"></h3>
		    <p class="card-text">Twitter</p>
		  </div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-12">
		<div class="card bg-info-gradient">
		  <div class="card-body ">
		    <i class="fab fa-facebook-f fa-2x"></i></br>
		    <h3 class="card-title " id="new-deaths"></h3>
		    <p class="card-text">Facebook</p>
		  </div>
		</div>
	</div>

	

</div>

<br><br>
			<h1 align="center">State Wise Helpline No.</h1>
			<div class="card" id="table-card">
				<div class="table-responsive">
				<table class="table table-bordered  table-dark" id="tbval">
					<thead>
						<tr>
							<th>State</th>
							<th scope="col">Helpline No.</th>
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
				$.get("https://api.rootnet.in/covid19-in/contacts",
					function (data){
							for(var i=1; i<(data['data']['contacts']['regional'].length); i++){
								var table = $('#tbval').DataTable();
								table.row.add( [
						data['data']['contacts']['regional'][i-1]['loc'],
						" <a style='color:#fff' href='tel:" + data['data']['contacts']['regional'][i-1]['number'] + "'> "+ data['data']['contacts']['regional'][i-1]['number'] + "</a>",
											
						
							] ).draw();
							}
					}
				)

				$.get("https://api.rootnet.in/covid19-in/contacts",
			function (data){
				document.getElementById('total-case').innerHTML = "<a style='color:#fff' href='tel:" +data['data']['contacts']['primary']['number'] + "'>"+ data['data']['contacts']['primary']['number'] + "</a>";
				document.getElementById('total-deaths').innerHTML = "<a style='color:#fff' href='tel:" + data['data']['contacts']['primary']['number-tollfree'] + "'>" + data['data']['contacts']['primary']['number-tollfree']  + "</a>";
				document.getElementById('total-recovered').innerHTML = "<a style='color:#fff' href='mailto:" + data['data']['contacts']['primary']['email'] + "'>" + data['data']['contacts']['primary']['email'] + "</a>";
				document.getElementById('new-case').innerHTML = "<a target='block' style='color:#fff' href='" +  data['data']['contacts']['primary']['twitter'] + "'>" + data['data']['contacts']['primary']['twitter']  + "</a>";
				document.getElementById('new-deaths').innerHTML = "<a target='block' style='color:#fff' href='" + data['data']['contacts']['primary']['facebook'] + "'>" + data['data']['contacts']['primary']['facebook'] + "</a>";
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