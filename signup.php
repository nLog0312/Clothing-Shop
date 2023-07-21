<?php
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['psw'];

    require_once './admin/root/connect.php';
    $sql = "
        SELECT COUNT(*) FROM customers
        WHERE email = '$email'
    ";
    $result = mysqli_query($connect, $sql);
    $number_of_rows = mysqli_fetch_array($result)['COUNT(*)'];

    if ($number_of_rows > 0) {
        echo "Email đã tồn tại";
    } else {
        $sql = "
            INSERT INTO customers (name, email, password)
            VALUES ('$name', '$email', '$password')
        ";
        mysqli_query($connect, $sql);
        
        header('Location: index.php');
    }
?>