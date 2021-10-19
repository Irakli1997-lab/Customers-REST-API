<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once '../DB/db.inc.php';
include_once '../MODS/post.inc.php';
$database = new Database();
$db = $database->connect();
$post = new Post($db);
$data = json_decode(file_get_contents("php://input"));

$post->First_Name = $data->First_Name;
$post->Last_Name = $data->Last_Name;
$post->Date_of_Birth = $data->Date_of_Birth;
$post->Gender = $data->Gender;
$post->Country = $data->Country;
$post->Address = $data->Address;
$post->Job_Position = $data->Job_Position;

if($post->create())
{
  echo json_encode(
    array('message' => 'Customer Created/Added')
  );
}
else
{
  echo json_encode(
    array('message' => 'Customer Not Created/Added')
  );
}