<!DOCTYPE html>
<html>
	<head>
		<?php
			include("module/home/inc/home_top_page.php");
			session_start();
		?>
	</head>
	<body>
		<div id="menu">
			<?php include("module/client/view/inc/client_menu.php"); ?>
		</div>
		<div class="wrapper">  	
			<?php include("module/client/view/inc/header.php"); ?>

			<?php include("module/client/view/inc/client_pages.php"); ?>  
			<!-- FOOTER		 -->
				 	   
			<?php include("module/client/view/inc/client_footer.php"); ?>        
		</div>
	</body>
</html>