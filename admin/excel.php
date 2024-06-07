<?php
    require('../db/conn.php');
    $output="";
    if(isset($_POST["export_excel"])){
        $sql_str = "SELECT orders.phone as phone, orders.created_at as created_at, order_details.total as total, status FROM `orders`, `order_details` WHERE orders.id = order_details.order_id ORDER BY created_at;";
        $result = mysqli_query($conn, $sql_str);
        if(mysqli_num_rows($result) > 0){
            $output .= '
                <table class="table" bordered="1" style="text-align: center;">
                    <tr>
                        <th>STT</th>
                        <th style="width: 250px;">Số điện thoại đặt hàng</th>
                        <th style="width: 300px;">Ngày đặt</th>
                        <th style="width: 300px;">Tổng tiền</th>
                        <th style="width: 300px;">Trạng thái</th>                   
                        
                    </tr>
            ';
            $stt = 0;
            while($row = mysqli_fetch_array($result)){
                $stt++;
                $statusLabels = array(
                    'Processing' => 'Đang xử lý',
                    'Shipping' => 'Đang giao hàng',
                    'Delivered' => 'Đã giao hàng',
                    'Cancelled' => 'Đã hủy',
                    'Confirmed' => 'Đã xác nhận'
                );
                $statusText = isset($statusLabels[$row['status']]) ? $statusLabels[$row['status']] : $row['status'];
                $output .= '
                    <tr>
                        <td style="text-align: center;">'.$stt.'</td>
                        <td style="text-align: center;">'.$row['phone'].'</td>
                        <td style="text-align: center;">'.$row['created_at'].'</td>
                        <td style="text-align: center;">'.number_format($row['total'], 0, ',', ',') . '₫'.'</td>
                        <td style="text-align: center;"><span class='.$row['status'].'>'.$statusText.'</span></td>
                    </tr>
                ';
            }
            $output .= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=baocao.xls");
            echo $output;
        }
    }
?>