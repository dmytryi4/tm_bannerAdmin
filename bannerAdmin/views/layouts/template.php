<!DOCTYPE html>
<html>
	<head>
		<title>Banner Admin</title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	   	<link rel="stylesheet" type="text/css" href="css/style.css">
	   	<script src="js/banner.js"></script>
	   	<script src="js/highlight.js"></script>
	</head>
<body onload="highlight();">
	<div class="container">
			<div class="row">
				<div id="header">
				<?php if(Session::get('loggedIn') == true){?>
					<div class="autorization">
					  <a href="http://localhost/logout">Logout</a>
					
					</div>
					<?php }?>
					<?php if($_SERVER['REQUEST_URI'] != '/login'){?>
						<div class="header-menu">
							<ul>
								<li class="nav"><a href="/">Home</a></li>
								<li class="nav"><a href="templates">Templates</a></li>
								<li class="nav"><a href="search">Search</a></li>
								<li class="nav"><a href="category">Category</a></li>
								<li class="nav"><a href="contact">Contact us</a></li>
							</ul>
						</div> 
					<?php }?>
				</div>
				<div id="content"> 
							<?php include ($contentPage);?>				
				</div>
				<div id="footer">
						<p>© 2015 All rights reserved.</p>
				</div>
		</div>
	</div>
</body>
</html>
