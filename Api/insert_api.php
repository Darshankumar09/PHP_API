<?php

header("Access-Control-Allow-Methods: POST");

include("../Config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $post = $_POST['post'];
    $salary = $_POST['salary'];

    $res = $config->insert($name, $post, $salary);

    if ($res) {
        $arr['msg'] = "Data inserted successfully...";
    } else {
        $arr['msg'] = "Data insertion failed...";
    }

} else {
    $arr['error'] = "Only POST HTTP Methods are Allowed...";
}

echo json_encode($arr);

?>