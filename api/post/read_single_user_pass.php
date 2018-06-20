<?php 
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$post->username = isset($_GET['username']) ? $_GET['username'] : die();

$post->password = isset($_GET['password']) ? $_GET['password'] : die();

//Get post 
$post->read_single_user_pass();

$post_arr = array(
	'ID' => $post->ID,
	'name' => $post->name,
	'email' => $post->email,
	'mobile_no' => $post->mobile_no,
	'image' => $post->image

	);

print_r(json_encode($post_arr))
?>