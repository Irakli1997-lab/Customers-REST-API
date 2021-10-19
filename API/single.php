<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  include_once '../DB/db.inc.php';
  include_once '../MODS/post.inc.php';
  $database = new Database();
  $db = $database  ->  connect();
  $post = new Post($db);
  $post -> id = isset($_GET['id']) ? $_GET['id'] : die();
  $post -> single();
  $post_arr = array(
    'ID' => $post -> id,
    'First_Name' =>$post -> First_Name,
    'Last_Name' =>$post -> Last_Name,
    'Date_of_Birth' =>$post -> Date_of_Birth,
    'Gender' =>$post -> Gender,
    'Country' =>$post -> Country,
    'Address' =>$post -> Address,
    'Job_Position' =>$post -> Job_Position,
    'Account_Date' =>$post -> Account_Date
  );
  print_r(json_encode($post_arr));