<?php
session_start();
$is_homepage = false;
require_once('components/header.php');

//lay từ khóa tìm kiếm
$danhmuc = $_GET['danhmuc'];
$tukhoa = $_GET['tukhoa'];
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Hoàng Thuấn Store</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Trang chủ </a>
                            <span>Cửa hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4 style="font-family: 'Open Sans', sans-serif;">Danh mục sản phẩm</h4>
                            <ul>
                <?php
                require('./db/conn.php');
                 $sql_str = "select * from categories order by name";
                 $result = mysqli_query($conn, $sql_str);
                    while ($row = mysqli_fetch_assoc($result)){
                ?>
                    <li><a href="search.php?danhmuc=<?= $row['slug'] ?>&tukhoa=<?= $row['slug'] ?>"><?=$row['name']?></a></li>
                <?php } ?>
                                
                            </ul>
                        </div>
                       
                        
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4 style="font-family: 'Open Sans', sans-serif;">Sản phẩm <br>mới nhất</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <?php
                                        $sql_str = "SELECT * FROM `products` order by created_at desc limit 0, 3";
                                        $result = mysqli_query($conn, $sql_str);
                                        while ($row = mysqli_fetch_assoc($result)){
                                            $anh_arr = explode(';', $row['images']);
                                        ?>
                                        <a href="sanpham.php?id=<?=$row['id']?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?="admin/".$anh_arr[0]?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?=$row['name']?></h6>
                                                <!-- <span><?=$row['price']?></span> -->
                                                <div class="prices">
                                                    <!-- <span class="old"><?= number_format($row['price'], 0, ',', ',') . '₫' ?></span> -->
                                                    <span class="curr"><?= number_format($row['disscounted_price'], 0, ',', ',') . '₫' ?></span>
                                                </div>
                                            </div>
                                        </a>
<?php
}
?>
                                        
                                    </div>
                                    <div class="latest-prdouct__slider__item">
<?php
$sql_str = "SELECT * FROM `products` order by created_at desc limit 3, 3";
$result = mysqli_query($conn, $sql_str);
while ($row = mysqli_fetch_assoc($result)){
    $anh_arr = explode(';', $row['images']);
?>
                                        <a href="sanpham.php?id=<?=$row['id']?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?="admin/".$anh_arr[0]?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?=$row['name']?></h6>
                                                <div class="prices">
                                                    <!-- <span class="old"><?= number_format($row['price'], 0, ',', ',') . '₫' ?></span> -->
                                                    <span class="curr"><?= number_format($row['disscounted_price'], 0, ',', ',') . '₫' ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                   <h3>Kết quả tìm kiếm</h3>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    
                                </div>
                            </div>
 <?php
 if ($danhmuc == '*'){ 
    $sql_str = "select * from products where
        
        name like '%$tukhoa%' 
        or description like '%$tukhoa%'
        or summary like '%$tukhoa%'
    order by name";
 } else {
    // $sql_str = "select * from products where
    //     (category_id = $danhmuc)
    //     and 
    //     (name like '%$tukhoa%' 
    //     or description like '%$tukhoa%'
    //     or summary like '%$tukhoa%')
    // order by name";
    $sql_str = "SELECT products.id as id, products.name as name, categories.name as cname, images, price, disscounted_price, round((price - disscounted_price)/price*100) as discount 
            FROM `products`, `categories` 
            WHERE products.category_id = categories.id 
            AND categories.slug = '$danhmuc'
            AND (products.name LIKE '%$tukhoa%' 
            ) 
            ORDER BY products.name";

 }
    $result = mysqli_query($conn, $sql_str);
    
?>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6>Có <span><?=mysqli_num_rows($result)?></span> sản phẩm</h6>
                                </div>
                            </div>
                            <!-- <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <?php
if (mysqli_num_rows($result) == 0) {
    echo "Không có sản phẩm nào thỏa mãn";
} else {
?>
     <div class="row">
<?php
while ($row = mysqli_fetch_assoc($result)){
    $anh_arr = explode(';', $row['images']);
?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?="admin/".$anh_arr[0]?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="sanpham.php?id=<?=$row['id']?>"><?=$row['name']?></a></h6>
                                    <!-- <h5><?=$row['price']?></h5> -->
                                    <div class="prices">
                                        <!-- <span class="old"><?=$row['price']?></span> -->
                                        <span class="curr"><?= number_format($row['disscounted_price'], 0, ',', ',') . '₫' ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php } ?>

                    </div>

<ul class="pagination d-flex justify-content-end">
    <li class="page-item"><a class="page-link"  id="pre"><span class="textcs text-black">Trước</span></a></li>
    <li class="page-item"><a class="page-link"  id="current"><span class="textcs text-black ">1</span></a></li>
    <li class="page-item"><a class="page-link"  id="next"><span class="textcs text-black">Sau</span></a></li>
</ul>
<?php } ?>
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Giảm giá</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                            <?php
$sql_str = "SELECT products.id as pid, products.name as pname, categories.name as cname, round((price - disscounted_price)/price*100) as discount, images, price, disscounted_price  FROM `products`, `categories` where products.category_id=categories.id order by discount desc limit 0, 6 ";
$result = mysqli_query($conn, $sql_str);
while ($row = mysqli_fetch_assoc($result)){
    $anh_arr = explode(';', $row['images']);
?>                                
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="<?="admin/".$anh_arr[0]?>">
                                            <div class="product__discount__percent">-<?=$row['discount']?>%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span><?=$row['cname']?></span>
                                            <h5><a href="sanpham.php?id=<?=$row['pid']?>"><?=$row['pname']?></a></h5>
                                            <!-- <div class="product__item__price"><?=$row['disscounted_price']?> <span><?=$row['price']?></span></div> -->
                                            <div class="product__item__price"><?=number_format($row['disscounted_price'], 0, ',', ',') . '₫'?><span><?=number_format($row['price'], 0, ',', ',') . '₫'?></span></div>

                                        </div>
                                    </div>
                                </div>
<?php } ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <script src="js/getproducts.js"></script>

    <?php

require_once('components/footer.php');
?>