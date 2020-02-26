<?php
include_once('database_connection.php');
if(!isset($_SESSION['user_id'])){
	header('location:logout.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP Like System With Notification Using Ajax Jquery</title>
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>
		<div class="container">
			<h2 align="center"> Link System Notification</h2>
			<br>
			<div align="right">
				<a href='logout.php'>Logout</a>
			</div>
			<br>
			<form method="post" id='form_wall'>
				<textarea name='content' id='content' class='form-control' placeholder="Share Any Thing">
				</textarea>
				<br>
				<div align='right'>
					<input type='submit' name='submit' id='submit' class='btn btn-primary btn-sm' value='Post'>
				</div>
			</form>
			<br>
			<br>
			<h4>Latest Posts:</h4>
			<br>
			<div id='website_stuff'>
			</div>
		
		</div>
		
	</body>
</html>

<script>
	$(document).ready(function(){
		load_stuff();
		function load_stuff(){
			$.ajax({

				url:'load_stuff.php',
				method:'POST',
				success:function(data){
					$('#website_stuff').html(data);
				}
			})
		}

		$('#form_wall').on('submit',function(event){
			event.preventDefeault();
			if($.trim($('#content').val()).length == 0){
				alert('tet');
			}else{

			}
			
		});
	}); 
</script>

