<?php
    
    require('../db/conn.php');
    $name = $_POST['name'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    $sumary = $_POST['sumary'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $giagoc = $_POST['giagoc'];
    $giaban = $_POST['giaban'];
    $danhmuc = $_POST['danhmuc'];
    $thuonghieu = $_POST['thuonghieu'];

    $countfiles = count($_FILES['pics']['name']);
    // $totalFileUploaded = 0;
    $imgs = '';
    for($i=0; $i < $countfiles; $i++){
        $filename = $_FILES['pics']['name'][$i];

        $location = "uploads/".uniqid().$filename;
        $extension = pathinfo($location, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        $valid_extensions = array("jpg", "jpeg", "png");

        $response = 0;

        if(in_array(strtolower($extension), $valid_extensions)){
            if(move_uploaded_file($_FILES['pics']['tmp_name'][$i], $location)){
                $imgs .= $location . ";";
            }
        }
    }
    $imgs = substr($imgs,0, -1);
    // echo substr($imgs, 0, -1);

    $sql_str = "INSERT INTO `products` (`id`, `name`, `slug`, `description`, `summary`,
     `stock`, `price`, `disscounted_price`, `images`, 
     `category_id`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES 
     (NULL, '$name', '$slug', '$description', '$sumary', '$stock', '$giagoc', '$giaban', '$imgs', '$danhmuc', '$thuonghieu', 'Active', NULL, NULL)
     ";
    mysqli_query($conn, $sql_str);
    header("location: productslist.php");
?>