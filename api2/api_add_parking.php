<?php

    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $vah_num = $_POST['vah_num'];
        $wing_id = $_POST['wing_id'];
        $florr_id = $_POST['florr_id'];
        $vah_type_id = $_POST['vah_type_id'];
        $price_id = $_POST['price_id'];
        $slot_id = $_POST['slot_id'];

        
        $res = $config->insert_parking($name, $vah_num, $vah_type_id, $wing_id, $florr_id, $slot_id, $price_id);

        if($res) {
            $arr['data'] = "Parking inserted successfully...";
            http_response_code(201);
        } else {
            $arr['data'] = "Parking insertion failed...";
        }

    } else {
        $arr['data'] = "only POST request is allowed...";
    }

    echo json_encode($arr);

?>