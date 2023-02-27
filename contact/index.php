<?php
    require("../conn.php");

    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $name = $_POST['name'];

    if(empty($email) || empty($message) || empty($subject) || empty($name)) {
        echo json_encode([
            'status' => 'error',
            'error' => 'All fields are required'
        ]);
    } else {
        $sql = "INSERT INTO contacts(`email`, `name`, `message`, `subject`, `opened`) VALUES('$email', '$name', '$message', '$subject', 0)";
        $query = mysqli_query($conn, $sql);
    
        if($query) {
            echo json_encode([
                'status' => 'success',
                'count' => $responseCount,
                'states' => []
            ]);
        } else {
            $array = [];
            while($row = mysqli_fetch_assoc($check)) {
                $array[] = $row;
            }
            echo json_encode([
                'status' => 'success',
                'states' => $array,
                'total' => $responseCount,
            ]);
        }
    }
?>