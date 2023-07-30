<?php
    session_start();
    $phone =  $_SESSION['phone'];
    require_once './admin/root/connect.php';

    $type = $_GET['type'];
    
    if($type == 'changeInfo') {
        $fullname = $_POST['fullname'];
        $dateofbirth = $_POST['dateofbirth'];
        $deliveryaddress = $_POST['deliveryaddress'];
        $conscious = $_POST['conscious'];
        $district = $_POST['district'];
        $wards = $_POST['wards'];

        $sql = "
            UPDATE `customers`
            SET `fullname`='$fullname',
                `dateofbirth`='$dateofbirth',
                `deliveryaddress`='$deliveryaddress',
                `conscious`='$conscious',
                `district`='$district',
                `wards`='$wards'
            WHERE `phone` = '$phone'
        ";
        mysqli_query($connect, $sql);
        $_SESSION['toast'] = 'Cập nhật thông tin thành công';
        header('location: ./index.php');
    } else if($type == 'changePassword') {
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $renewpassword = $_POST['renewpassword'];

        $sql = "
            SELECT * FROM `customers`
            WHERE `phone` = '$phone' AND `password` = '$oldpassword'
        ";
        $result = mysqli_query($connect, $sql);
        $number_rows = mysqli_num_rows($result);
        if ($number_rows == 1) {
            if ($newpassword == $renewpassword) {
                $sql = "
                    UPDATE `customers`
                    SET `password`='$newpassword'
                    WHERE `phone` = '$phone'
                ";
                mysqli_query($connect, $sql);
                $_SESSION['error'] = 'Đổi mật khẩu thành công';
                header('location: ./index.php');
            } else {
                $_SESSION['error'] = 'Mật khẩu mới không khớp';
                header('location: ./index.php');
            }
        } else {
            $_SESSION['error'] = 'Mật khẩu cũ không đúng';
            header('location: ./index.php');
        }
    }
?>