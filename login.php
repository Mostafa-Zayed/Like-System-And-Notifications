<?php 
include_once('database_connection.php');

$message = '';

if(isset($_POST['login'])){

	if(empty($_POST['user_email']) || empty($_POST['user_password'])){
		$message = '<label>Please Both Filed Is Required!!</label>';
		
	}else{
		//echo $_POST['user_password'];
		$query = "SELECT * FROM user_details";
		$statement = $connect->prepare($query);
		
		$statement->execute(
			array(
				'user_email' => $_POST['user_email']
			)
		);
		$count = $statement->rowCount();
		
		if($count > 0 ){
			$result = $statement->fetchAll();
			foreach($result as $row){

			if($_POST['user_password'] === $row['user_password']){
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['user_name'] = $row['user_name'];
				header('location:index.php');
				}else{
					$message='<label>Wrong Password!!</label>';
				}
			}
		}else{

			$message = '<label>Your Email Is Invalid !!';
			
		}
	}
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
			<div class="panel panel-default">
				<div class='panel-heading'>Login</div>
				<div class='pane-body'>
					<form action="" method="post">
						<span class='text-danger'><?php echo $message;?></span>
						<div class='form-group'>
							<label for='user_email'>User Email :</label>
							<input type="text" name='user_email' id='user_email' class='form-control'>
						</div>
						<div class='form-group'>
							<label id='user_password'>Password :</label>
							<input type="password" id="user_password" name="user_password" class='form-control'>
						</div>
						<div class='form-group'>
							<input type='submit' name='login' value='login' id='login' class='btn btn-info'>
						</div>
					</form>
				</div>
				<div class='panel-footer'></div>
			</div>
		</div>
	</body>
</html>
