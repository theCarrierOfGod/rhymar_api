<?php
    require("../../conn.php");

    $product_id = $_GET['product_id'];
    
    
    if(mysqli_query($conn, "INSERT INTO carts() VALUES() ")) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Product added to cart',
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Product not added to cart',
        ]);
    }
    
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