<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://kit.fontawesome.com/fa9b59c9b0.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://projects.nodetent.com/coronatracker/assets/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script data-ad-client="ca-pub-9482927953483307" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	</head>
	<body onload="fetch()">
		<!-- header Start -->
		<nav class="navbar navbar-expand-lg navbar-dark">
   <a class="navbar-brand" href="index.php" style="margin-right: 68px;"><img src="images/logo.png" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    	<li class="nav-item ">
    		<a class="india" href="corona.php">India Stats</a>
    	</li>
		<li class="nav-item ">
			<a href="india_hospital.php">Hospitals in India</a>
			</li>
		<li class="nav-item ">
			<a href="helpline.php">Helpline No.</a>
			</li>
		<li class="nav-item ">
			<a href="notification.php">Notification From Indian Goverment</a>
		</li>
		</ul>
  </div>
</nav>
		<!-- header Ends -->
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