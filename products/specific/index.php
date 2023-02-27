<?php
    require("../../conn.php");

    $product = $_GET['uid'];
    
    $check = mysqli_query($conn, "SELECT * FROM products WHERE product_id='$product' ");
    $responseCount = mysqli_num_rows($check);
    
    if($responseCount == 0) {
        echo json_encode([
            'status' => 'success',
            'data' => []
        ]);
    } else {
        $array = [];
        while($row = mysqli_fetch_assoc($check)) {
            $array[] = $row;
        }
        
        echo json_encode([
            'status' => 'success',
            'product' => $array,
            'total' => $responseCount,
        ]);
    }