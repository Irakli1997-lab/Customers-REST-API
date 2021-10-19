<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../DB/db.inc.php';
include_once '../MODS/post.inc.php';
$database = new Database();
$db = $database->connect();
$post = new Post($db);
$result = $post->read();
$num = $result->rowCount();

if($num > 0)
{
    $posts_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
      extract($row);
      $post_item = array(
        'ID' => $id,
        'First_Name' => $firstName,
        'Last_Name' => $lastName,
        'Date_of_Birth' => $birth,
        'Gender' => $gender,
        'Country' => $country,
        'Address' => $address,
        'Job_Position' => $position,
        'Account_Date' => $date
    );
      array_push($posts_arr, $post_item);
    }
    echo json_encode($posts_arr);
}
else
{
    echo json_encode(
      array('message' => 'No Posts Found')
    );
}