<?php include 'include/india_header.php'; ?>

		<br>
		<h1 align="center">Latest Notification From Indian Goverment</h1>
		<br>
		<div class="container">
		<div class="main-body" id="main">
 
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

				

				$.get("https://api.rootnet.in/covid19-in/notifications",
					function (data){
						console.log(data['data']['notifications']);
						
							for(var i=1; i<(data['data']['notifications'].length); i++){
								
								var nodeM = document.createElement("div");
								  nodeM.className = "breaking_news";
								  document.getElementById("main").appendChild(nodeM);

								var node = document.createElement("div");
								  var textnode = document.createTextNode("Notification");
								  node.className = "label ripple";
								  node.appendChild(textnode);
								  nodeM.appendChild(node);

								var node3 = document.createElement("div");
								  node3.className = "news_title";
								  nodeM.appendChild(node3);

								  var node2 = document.createElement("a");
								  var textnode2 = document.createTextNode(data['data']['notifications'][i-1]['title']);
								  node2.setAttribute("href", data['data']['notifications'][i-1]['link']);
								  node2.appendChild(textnode2);
								  node3.appendChild(node2);
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