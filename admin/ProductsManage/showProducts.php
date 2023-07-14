<?php
    require_once '../root/connect.php';
    require_once '../root/func.php';

    $stringSQL = "SELECT `id`, `name`, `price`, `type` FROM `products` WHERE `name` LIKE '%$search%'";

    $result = mysqli_query($connect, $stringSQL);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $index => $each) {
            $index += 1;
            echo "<tr>";
                echo "<td style='width:4%'>$index</td>";
                echo "<td  style='width:21%'>" . $each['name'] . "</td>";
                echo "<td  style='width:21%'>" . product_price($each['price']) . "</td>";
                echo "<td  style='width:21%'>" . $each['type'] . "</td>";
                echo "<td>
                    <a href='detail_product.php?id=" . $each['id'] . "'>Xem chi tiết</a>
                </td>";
                echo "<td>
                        <a href='form_update.php?id=" . $each['id'] . "'>Sửa</a>
                    </td>";
                echo "<td>
                        <button value=" . $each['id'] . " class='btn-delete'>Xoá</button>
                    </td>";
            echo "</tr>";
        }
    }
?>