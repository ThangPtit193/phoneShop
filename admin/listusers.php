<?php 
require('includes/header.php');

if ($_SESSION['user']['type'] != 'Admin')
?>

<div>


    

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Người dùng</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Chức vụ</th>
                    <th>Trạng thái</th>
                    <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                        <th>Hành động</th>
                    <?php } ?>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Chức vụ</th>
                    <th>Trạng thái</th>
                    <?php if ($_SESSION['user']['type'] === 'Admin') { ?>
                        <th>Hành động</th>
                    <?php } ?>
                </tr>
            </tfoot>
            <tbody>
            <?php 
    require('../db/conn.php');
    $sql_str = "select 
    * from admins ";
    $result = mysqli_query($conn, $sql_str);
    $stt = 0;
    while ($row = mysqli_fetch_assoc($result)){
        $stt++;
        ?>

        
            <tr>
                <td><?=$stt?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['email']?></td>
                <td><?php echo ($row['type'] === 'Admin') ? 'Quản trị' : 'Cộng tác viên'; ?></td>
                <td><?php echo ($row['status'] === 'Active') ? 'Hoạt động' : 'Nghỉ'; ?></td>
                <?php if($_SESSION['user']['type'] === 'Admin'){
                    ?>
                        <td>
                            <a class="btn text-white" style="background: linear-gradient(to right, #0d5cb4,#4bc0da);" href="edituser.php?id=<?=$row['id']?>">Cập nhật</a>  
                            <a class="btn text-white" style="background: linear-gradient(to right, #FF0000, #CC3333);"
                            href="deleteuser.php?id=<?=$row['id']?>"
                            onclick="return confirm('Bạn chắc chắn xóa người dùng này?');">Xóa</a>
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
         

      
<?php
require('includes/footer.php');
?>