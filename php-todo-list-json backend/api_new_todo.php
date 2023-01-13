<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");

header('Content-Type: application/json');

$new_todo = $_GET["new_to_do"];
$json_todo_list = file_get_contents("todo.json", true);
$todo_list = json_decode($json_todo_list);

$todo_list[] = [
    "text" => $new_todo,
    "completed" => false
];
$json_todo_list = json_encode($todo_list);
file_put_contents("todo.json", $json_todo_list);