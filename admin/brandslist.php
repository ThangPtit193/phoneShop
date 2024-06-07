<?php require('includes/header.php');?>
<div>
    <h3>Danh sách thương hiệu</h3>
    

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách thương hiệu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên nhãn hiệu</th>
                            <th>Ký hiệu</th>
                            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                                <th>Hành động</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên nhãn hiệu</th>
                            <th>Ký hiệu</th>
                            <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                                <th>Hành động</th>
                            <?php } ?>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
    require('../db/conn.php');
    $sql_str = "select * from brands order by id";
    $result = mysqli_query($conn, $sql_str);
    while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?=$row['name']?></td>
                <td><?=$row['slug']?></td>
                <?php if ($_SESSION['user']['type'] === 'Admin'){
                    ?>
                        <td>
                            <a class="btn text-white" style="background: linear-gradient(to right, #0d5cb4,#4bc0da);" href="editbrand.php?id=<?=$row['id']?>">Cập nhật</a>
                            <a class="btn text-white" style="background: linear-gradient(to right, #FF0000, #CC3333);" href="deletebrand.php?id=<?=$row['id']?>"
                            onclick="return confirm ('Bạn có chắc chắn muốn xóa nhãn hàng này?');">Xóa</a>
                        </td>
                    <?php
                }
                ?>
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