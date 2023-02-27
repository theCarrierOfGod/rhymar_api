<?php
    require("../../conn.php");

    $state_id = $_GET['state_id'];
    $check = mysqli_query($conn, "SELECT * FROM local_governments WHERE state_id='$state_id' ");
    $responseCount = mysqli_num_rows($check);
    
    if($responseCount == 0) {
        echo json_encode([
            'status' => 'success',
            'count' => $responseCount,
            'lgas' => []
        ]);
    } else {
        $array = [];
        while($row = mysqli_fetch_assoc($check)) {
            $array[] = $row;
        }
        
        echo json_encode([
            'status' => 'success',
            'lgas' => $array,
            'total' => $responseCount,
        ]);
    }