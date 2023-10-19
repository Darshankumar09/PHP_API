<?php

header("Access-Control-Allow-Methods: PUT");

include("../Config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $input = file_get_contents("php://input");

    parse_str($input, $_PUT);

    $name = $_PUT['name'];
    $post = $_PUT['post'];
    $salary = $_PUT['salary'];
    $id = $_PUT['id'];

    $res = $config->update($name, $post, $salary, $id);

    if ($res) {
        $arr['msg'] = "Data Updated successfully...";
    } else {
        $arr['msg'] = "Data Updation failed...";
    }

} else {
    $arr['error'] = "Only PUT HTTP Methods are Allowed...";
}

echo json_encode($arr);

?>