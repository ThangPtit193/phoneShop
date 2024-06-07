<?php
session_start();
$is_homepage = false;

require_once('./db/conn.php');
require_once('components/header.php');
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4 style="font-family: 'Open Sans', sans-serif;">Giỏ hàng</h4>

            <?php
            $cart = [];
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
            }
            $count = 0; // Số thứ tự
            $total = 0;
            if (empty($cart)) {
                echo '<p>Bạn chưa có đơn hàng nào!</p>';
            } else {
            ?>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="checkout__order">
                        <h4 style="font-family: 'Open Sans', sans-serif;">Đơn hàng của bạn</h4>
                        <div class="checkout__order__products">
                            Sản phẩm <span>Tổng</span>
                        </div>
                        <table class="table">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </tr>
                            <?php
                            foreach ($cart as $item) {
                                $total += $item['qty'] * $item['disscounted_price'];
                            ?>
                                <form action="updatecart.php?id=<?= $item['id'] ?>" method="post">
                                    <tr>
                                        <td class="pt-4">
                                            <?= ++$count ?>
                                        </td>
                                        <td class="pt-4">
                                            <?= $item['name'] ?>
                                        </td>
                                        <td class="pt-4">
                                            <?= number_format($item['disscounted_price'], 0, ',', ',') . '₫' ?>
                                        </td>
                                        <td class="pt-4"><input type="number" name="qty" value="<?= $item['qty'] ?>" min="1" /></td>
                                        <td class="pt-4">
                                            <?= number_format($item['disscounted_price'] * $item['qty'], 0, ',', ',') . '₫' ?>
                                        </td>
                                        <td><button class="btn rounded-pill border-0" style="background: linear-gradient(135deg, #51cddf, #0857b3); color: white">Cập nhật</button></td>
                                        <td><a href='./deletecart.php?id=<?= $item['id'] ?>' class="btn rounded-pill border-0" style="background: linear-gradient(70deg, #FF0000, #800000); color: white; margin-top:6px">Xóa</a></td>
                                    </tr>
                                </form>
                            <?php
                            }
                            ?>
                        </table>
                        <div class="checkout__order__total">
                            Tổng tiền: <span><?= number_format($total, 0, ',', ',') . '₫' ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="shop.php" class="btn rounded-pill border-0" style="background: linear-gradient(135deg, #51cddf, #0857b3); color: white">Tiếp tục mua sắm</a>
                            <a href="checkout.php" class="btn rounded-pill border-0" style="background: linear-gradient(135deg, #00FF00, #FFFF00); color: white; font-weight:600">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<?php
require_once('components/footer.php');
?>
