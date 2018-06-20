<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/database.php';
  include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();


$post = new Post($db);

 $data = json_decode(file_get_contents("php://input"));

$post->name = $data->name;
$post->email = $data->email;
$post->mobile_no = $data->mobile_no;
$post->username = $data->username;
$post->password = $data->password;

if($post->create()){
	echo json_encode(
		array('message' => 'Post Created!!')
		);
}
else{
	echo json_encode(
    array('message' => 'Post Not Created!!' )
		);
}
?>