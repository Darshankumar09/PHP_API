<?php

header("Access-Control-Allow-Methods: GET");

include("../Config/config.php");

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $res = $config->fetch_data();

    $my_all_data = [];

    while ($record = mysqli_fetch_assoc($res)) {
        array_push($my_all_data, $record);
    }

    $arr['data'] = $my_all_data;

} else {
    $arr['error'] = "Only GET HTTP Methods are Allowed...";
}

echo json_encode($arr);

?>