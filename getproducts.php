<?php
    header("Access-Control-Allow-Origin: *");
    require_once('./db/conn.php');
    $item_per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 4;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $sqlQuery = "select products.id as pid, products.name as pname, images, disscounted_price, price, categories.slug as cslug  
    from products, categories where products.category_id = categories.id limit $offset, $item_per_page";
    $result = mysqli_query($conn, $sqlQuery);
    $data = new stdClass();
    $records = array();
    while($row = mysqli_fetch_assoc($result)){
        $records[] = $row;
    }
    $data->records = $records;

    $sql_strtotal = "select products.id as pid, products.name as pname, images, disscounted_price, price, categories.slug as cslug  
                    from products, categories where products.category_id = categories.id";
    $result_total = mysqli_query($conn, $sql_strtotal);
    $total_counts = mysqli_num_rows($result_total);
    $data->total_counts = $total_counts;
echo json_encode($data);