<?php

    // header('Access-Control-Allow-Origin: *');
    header("HTTP/1.1 200 OK");
    
    if(isset($_SERVER["HTTP_ORIGIN"])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    } else {
        header("Access-Control-Allow-Origin: http://localhost:3000");
    }
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("response: 200");
    header('Content-Type: application/json');
    
    $conn = mysqli_connect("localhost","rhymarwo_all","rhymarwo_all","rhymarwo_all");

    // Check connection
    if($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }