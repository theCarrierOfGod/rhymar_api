<?php
    require("../../conn.php");

    $category = $_GET['category'];
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];
    $check = mysqli_query($conn, "SELECT * FROM products WHERE category='$category' ORDER BY id DESC LIMIT $limit OFFSET $offset ");
    $responseCount = mysqli_num_rows($check);
    
    if($responseCount == 0) {
        echo json_encode([
            'status' => 'success',
            'count' => $responseCount,
            'data' => []
        ]);
    } else {
        $array = [];
        while($row = mysqli_fetch_assoc($check)) {
            $array[] = $row;
        }
        
        echo json_encode([
            'status' => 'success',
            'products' => $array,
            'total' => $responseCount,
            'skip' => $offset,
            'limit' => $limit
        ]);
    }