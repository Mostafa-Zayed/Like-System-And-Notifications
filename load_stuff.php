<?php
include_once('database_connection.php');
include_once('functions.php');
if(isset($_SESSION['user_id'])){
	

	$output = '';
	$query = "SELECT  content.content_id,content.user_id,content.description,user_details.user_name,user_details.user_image FROM content INNER JOIN user_details ON user_details.user_id = content.user_id ORDER BY content_id DESC";
	
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$count = $statement->rowCount();
	if($count > 0){
		foreach($result as $row){

			$like_button='';
			if(!is_user_has_already_like_content($connect,$_SESSION['user_id'],$row['content_id'])){

				$like_button = '<button name="like_button" class="btn btn-info btn-xs like_button" type="button" data-content_id="'.$row["content_id"].'">Like</button>';
			}
			$count_like = count_content_like($connect,$row['content_id']);

			$output .='
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<img src="images/'.$row["user_image"].'" class="img-thumbnail" width="40" heigh="40" />  By '.ucfirst($row["user_name"]).' &nbsp; &nbsp; &nbsp;
						<button type="button" class="btn btn-warning btn-xs" id="total_like" name="total_like"> '.$count_like.' &nbsp; Like </button>
					</h3>
				</div>
				<div class="panel-body">'.$row['description'].'
				</div>
				<div class="panel-footer" align="right">'.$like_button.'</div>
			</div>';

		}

	}else{
		$output .='Nobody has shair any thing';
	}
	echo $output;
}

?>