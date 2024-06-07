 <!-- Sidebar -->
 <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(to bottom, #2e96cb, #54d2e0);">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
        <img src="/img/logo.png" alt="" width="50px" height="50px">
    </div>
    <div class="sidebar-brand-text ">Hoàng Thuấn Store</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tổng quan</span>
    </a>
    <a class="nav-link" href="../index.php">
        <i class="fas fa-store"></i>
        <span>Trang bán hàng</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Chức năng chính
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-list"></i>
        <span>Thương hiệu - Brand</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="collapseOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Các chức năng:</h6>
            <a class="collapse-item" href="./brandslist.php">Liệt kê</a>
            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                <a class="collapse-item" href="./addbrand.php">Thêm mới</a>
            <?php } ?>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-project-diagram"></i>
        <span>Danh mục sản phẩm</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="collapseTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Các chức năng:</h6>
            <a class="collapse-item" href="./catslist.php">Liệt kê</a>
            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                <a class="collapse-item" href="./addcategory.php">Thêm mới</a>
            <?php } ?>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
        aria-expanded="true" aria-controls="collapseThree">
        <i class="fab fa-product-hunt"></i>
        <span>Sản phẩm</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="collapseThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Các chức năng:</h6>
            <a class="collapse-item" href="./productslist.php">Liệt kê</a>
            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                <a class="collapse-item" href="./addproduct.php">Thêm mới</a>
            <?php } ?>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNewsCat"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-project-diagram"></i>
        <span>Danh mục tin tức</span>
    </a>
    <div id="collapseNewsCat" class="collapse" aria-labelledby="collapseTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Các chức năng:</h6>
            <a class="collapse-item" href="./listnewscats.php">Liệt kê</a>
            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                <a class="collapse-item" href="./addnewscats.php">Thêm mới</a>
            <?php } ?>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews"
        aria-expanded="true" aria-controls="collapseThree">
        <i class="fab fa-product-hunt"></i>
        <span>Tin tức</span>
    </a>
    <div id="collapseNews" class="collapse" aria-labelledby="collapseThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Các chức năng:</h6>
            <a class="collapse-item" href="./listnews.php">Liệt kê</a>
            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                <a class="collapse-item" href="./addnews.php">Thêm mới</a>
            <?php } ?>
            
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
        aria-expanded="true" aria-controls="collapseFour">
        <i class="fas fa-cubes"></i>
        <span>Đơn hàng</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Các chức năng:</h6>
            <a class="collapse-item" href="./listorders.php">Liệt kê</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
        aria-expanded="true" aria-controls="collapseFive">
        <i class="fas fa-users"></i>
        <span>Người dùng</span>
    </a>
    <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Các chức năng:</h6>
            <a class="collapse-item" href="./listusers.php">Liệt kê</a>
            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                <a class="collapse-item" href="./addusers.php">Thêm mới</a>
            <?php } ?>
        
        </div>
    </div>
</li>


</ul>
<!-- End of Sidebar -->