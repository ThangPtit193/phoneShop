<?php 
    require('includes/header.php');

    function handleimage($arrstr, $height){
        $arr = explode(';', $arrstr);
        return "<img src='$arr[0]' height=$height/>";
    }

?>
<div>
    <h3>Danh sách sản phẩm</h3>
    

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh đại diện</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                                <th>Hành động</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh đại diện</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                                <th>Hành động</th>
                            <?php } ?>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
    require('../db/conn.php');
    $sql_str = "select 
    products.id as pid, products.summary as ps, products.name as pname, images, categories.name as cname, brands.name as bname, products.status as pstatus
     from products, categories, brands where products.category_id = categories.id and 
     products.brand_id = brands.id order by products.name";
    $result = mysqli_query($conn, $sql_str);
    while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?=$row['pname']?></td>
                <td><?=handleimage($row['images'], "100px")?></td>
                <td><?=$row['cname']?></td>
                <td><?=$row['bname']?></td>
                <td><?= ($row['pstatus'] === 'Active') ? 'Còn hàng' : 'Đã bán' ?></td>
                <td><?=$row['ps']?></td>
                <?php if($_SESSION['user']['type'] === 'Admin'){
                    ?>
                        <td>
                            <a class="btn text-white" style="background: linear-gradient(to right, #0d5cb4,#4bc0da);" href="editproduct.php?id=<?=$row['pid']?>">Cập nhật</a>
                            <a class="btn text-white" style="background: linear-gradient(to right, #FF0000, #CC3333);" href="deleteproduct.php?id=<?=$row['pid']?>"
                            onclick="return confirm ('Bạn có chắc chắn muốn xóa danh mục này?');">Xóa</a>
                        </td>
                    <?php
                }?>
            </tr>
        <?php
        
    }
    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require('includes/footer.php');?>