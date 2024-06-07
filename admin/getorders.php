<?php
    header("Access-Control-Allow-Origin: *");
    require_once('../db/conn.php');
    $item_per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 6;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $sqlQuery = "SELECT orders.phone as phone, 
        orders.created_at as created_at, 
        order_details.total as total,
        orders.id as id, 
        status FROM `orders`, 
        `order_details` WHERE orders.id = order_details.order_id ORDER BY created_at limit $offset, $item_per_page";
    $result = mysqli_query($conn, $sqlQuery);
    $data = new stdClass();
    $records = array();
    while($row = mysqli_fetch_assoc($result)){
        $records[] = $row;
    }
    $data->records = $records;

    $sql_strtotal = "SELECT orders.id as id, 
        orders.created_at as created_at, 
        order_details.total as total, 
        status FROM `orders`, 
        `order_details` WHERE orders.id = order_details.order_id ORDER BY created_at;";
    $result_total = mysqli_query($conn, $sql_strtotal);
    $total_counts = mysqli_num_rows($result_total);
    $data->total_counts = $total_counts;
echo json_encode($data);