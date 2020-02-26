<?php
function is_user_has_already_like_content($connect,$user_id,$content_id){

	$query = "SELECT * FROM user_content_like WHERE content_id = :content_id AND user_id = :user_id ";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			'content_id'=>$content_id,
			'user_id'=>$user_id
		)
	);

	$count= $statement->rowCount();

	if($count > 0){
		return true;
	}else{
		return false;
	}
}

function count_content_like($connect,$content_id){

	$query = "SELECT * FROM user_content_like WHERE content_id = :content_id ";
	$statement = $connect->prepare($query);
	$statement->execute(array('content_id'=>$content_id));
	$count = $statement->rowCount();
	return $count;
}
?>