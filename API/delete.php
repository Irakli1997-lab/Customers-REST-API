<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  include_once '../DB/db.inc.php';
  include_once '../MODS/post.inc.php';
  $database = new Database();
  $db = $database->connect();
  $post = new Post($db);
  $data = json_decode(file_get_contents("php://input"));
  $post->ID = $data->ID;
  if($post->delete())
  {
    echo json_encode(
      array('message' => 'Customer Deleted')
    );
  }
  else
  {
    echo json_encode(
      array('message' => 'Customer Not Deleted')
    );
  }