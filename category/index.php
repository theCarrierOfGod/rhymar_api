<?php

require("../conn.php");

$check = mysqli_query($conn, "SELECT * FROM category WHERE deleted=0");
if(mysqli_num_rows($check) > 0) {
    $array = [];
    while($row = mysqli_fetch_assoc($check)){
        $array[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'text' => $row['description'],
            'image' => $row['image']
        ];
    }
    echo json_encode([
        'status' => 'success',
        'category' => $array
    ]);
}