<?php
    $email = $_GET['email'];

    require_once './admin/root/connect.php';
    $sql = "
        SELECT COUNT(*) FROM customers
        WHERE email = '$email'
    ";
    $result = mysqli_query($connect, $sql);
    $number_of_rows = mysqli_fetch_array($result)['COUNT(*)'];

    if ($number_of_rows > 0) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
?>