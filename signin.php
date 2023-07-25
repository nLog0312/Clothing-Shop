<?php
    $unameoremail = $_POST['unameoremail'];
    $password = $_POST['psw'];

    require_once './admin/root/connect.php';
    $sql = "
        SELECT * FROM `customers`
        WHERE (`customers`.`username` = '$unameoremail' OR `customers`.`email` = '$unameoremail') AND `customers`.`password` = '$password'
    ";
    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);
    
    if ($number_rows == 1) {
        session_start();
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        header('location: ./index.php');
        exit();
    } else {
        header('location: ./index.php');
    }
?>