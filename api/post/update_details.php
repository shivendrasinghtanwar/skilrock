<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/database.php';
  include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();


$post = new Post($db);

 $data = json_decode(file_get_contents("php://input"));

$post->ID = $data->ID;

$post->name = $data->name;
$post->email = $data->email;
$post->mobile_no = $data->mobile_no;

if($post->update_details()){
	echo json_encode(
		array('message' => 'Post Updated!!')
		);
}
else{
	echo json_encode(
    array('message' => 'Post Not Updated!!' )
		);
}
?>