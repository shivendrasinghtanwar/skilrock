<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();


$post = new Post($db);

$result = $post->read();

$num = $result->rowCount();

if($num>0){
	$post_arr=array();
	$post_arr['data'] = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);

		$post_item=array(
			'ID' => $ID,
			'name' => $name,
			'email' => $email,
			'mobile_no' => $mobile_no
		);

		array_push($post_arr['data'],$post_item);
	}

	echo json_encode($post_arr);
}
else
{

}

?>