<?php
    session_start();
    $is_homepage = true;
    require_once('components/header.php');
?>
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2 style="font-family: 'Open Sans', sans-serif;">Danh mục sản phẩm</h2>
                </div>
                
                <div class="categories__slider owl-carousel">
                <?php
                    $sql_str = "select * from categories order by name";
                    $result = mysqli_query($conn, $sql_str);
                    while ($row = mysqli_fetch_assoc($result)){
                        ?>
                            <div class="col-lg-3">
                                <!-- <div class="categories__item set-bg" data-setbg="img/hero/iphone.png" > -->
                                <div class="categories__item">
                                    <img src="img/hero/<?=$row['name']?>.png" width="200px" height="200px">
                                    <h5><a href="search.php?danhmuc=<?= $row['slug'] ?>&tukhoa=<?= $row['slug'] ?>"><?=$row['name']?></a></h5>
                                </div>
                            </div>
                        <?php
                    } 
                ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 style="font-family: 'Open Sans', sans-serif;">Sản phẩm đặc trưng</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Tất cả</li>
                            <?php
                                $sql_str = "select * from categories order by name";
                                $result = mysqli_query($conn, $sql_str);
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                    <li data-filter=".<?=$row['slug']?>"><?=$row['name']?></li>
                                <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter" id="content">
                
            </div>
            
                    <ul class="pagination d-flex justify-content-end">
                        <li class="page-item"><a class="page-link"  id="pre"><span class="textcs text-black">Trước</span></a></li>
                        <li class="page-item"><a class="page-link"  id="current"><span class="textcs text-black ">1</span></a></li>
                        <li class="page-item"><a class="page-link"  id="next"><span class="textcs text-black">Sau</span></a></li>
                    </ul>
                
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic" >
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới nhất</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                    $sql_str = "select * from products order by created_at desc limit 0,3; ";
                                    $result = mysqli_query($conn, $sql_str);
                                    while($row= mysqli_fetch_assoc($result)){
                                        $pic_arr = explode(';', $row['images']);
                                        ?>
                                        <a href="sanpham.php?id=<?=$row['id']?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?="admin/".$pic_arr[0]?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?=$row['name']?></h6>
                                                <span><?=number_format($row['disscounted_price'], 0, ',', ',') . '₫'?></span>
                                            </div>
                                        </a>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php
                                    $sql_str = "select * from products order by created_at desc limit 3,3; ";
                                    $result = mysqli_query($conn, $sql_str);
                                    while($row= mysqli_fetch_assoc($result)){
                                        $pic_arr = explode(';', $row['images']);
                                        ?>
                                        <a href="sanpham.php?id=<?=$row['id']?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?="admin/".$pic_arr[0]?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?=$row['name']?></h6>
                                                <span><?=number_format($row['disscounted_price'], 0, ',', ',') . '₫'?></span>
                                            </div>
                                        </a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm giảm giá sâu</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                    $sql_str = "select * from products order by disscounted_price desc limit 0,3; ";
                                    $result = mysqli_query($conn, $sql_str);
                                    while($row= mysqli_fetch_assoc($result)){
                                        $pic_arr = explode(';', $row['images']);
                                        ?>
                                        <a href="sanpham.php?id=<?=$row['id']?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?="admin/".$pic_arr[0]?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?=$row['name']?></h6>
                                                <span><?=number_format($row['disscounted_price'], 0, ',', ',') . '₫'?></span>
                                            </div>
                                        </a>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php
                                    $sql_str = "select * from products order by disscounted_price desc limit 3,3; ";
                                    $result = mysqli_query($conn, $sql_str);
                                    while($row= mysqli_fetch_assoc($result)){
                                        $pic_arr = explode(';', $row['images']);
                                        ?>
                                        <a href="sanpham.php?id=<?=$row['id']?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?="admin/".$pic_arr[0]?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?=$row['name']?></h6>
                                                <span><?=number_format($row['disscounted_price'], 0, ',', ',') . '₫'?></span>
                                            </div>
                                        </a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2 style="font-family: 'Open Sans', sans-serif;">Tin tức</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $sql_str = "select * from news order by created_at desc limit 0,3";
                    $result = mysqli_query($conn, $sql_str);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="<?='admin/'.$row['avatar']?>" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> <?=$row['created_at']?></li>
                                            <li><i class="fa fa-comment-o"></i> 5</li>
                                        </ul>
                                        <h5><a href="tintuc.php?id=<?=$row['id']?>"><?=$row['title']?></a></h5>
                                        <p><?=$row['sumary']?> </p>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    <script src="js/getproducts.js"></script>
<?php
require_once('components/footer.php');
?>