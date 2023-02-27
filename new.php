<?php
    require('conn.php');
    
    $fetch = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 24");
    $responseCount = mysqli_num_rows($fetch);
    if(mysqli_num_rows($fetch) == 0) {
        echo json_encode(['status' => 'success', "count" => 0]);
    } else {
        $array;
        
        while($row = mysqli_fetch_assoc($fetch)){
            $array[] = $row;
        }
        
        echo json_encode([
            'status' => 'success',
            'data' => $array,
            'total' => $responseCount,
            'skip' => 0,
            'limit' => 24
        ]);
    }

?>