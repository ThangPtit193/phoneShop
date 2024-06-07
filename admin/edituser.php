<?php 
    $id = $_GET['id'];
    require('../db/conn.php');
    $sql_str = "select * from admins where id=$id";
    $res = mysqli_query($conn, $sql_str);
    $userAdmin = mysqli_fetch_assoc($res);
    if (isset($_POST['btnUpdate'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $type = $_POST['type'];


        $sql_str2 = "update admins set name = '$name', email='$email', password='$password', phone='$phone', address='$address', type='$type'
                     where id = $id";
        mysqli_query($conn, $sql_str2);
        header("location: listusers.php");
    } else {
        require('includes/header.php');
?>

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa người dùng</h1>
                            </div>
                            <form class="user" method="post" action="#">
                               
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    id="name" name="name" aria-describedby="emailHelp"
                                    required oninvalid="this.setCustomValidity('Vui lòng nhập tên người dùng')" oninput="setCustomValidity('')"
                                    placeholder="Tên người dùng"
                                    value="<?php echo $userAdmin['name'];?>"
                                >
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email"
                                    required oninvalid="this.setCustomValidity('Vui lòng nhập email')" oninput="setCustomValidity('')"
                                    aria-describedby="emailHelp" placeholder="Email" value="<?php echo $userAdmin['email'];?>">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password"
                                    required oninvalid="this.setCustomValidity('Vui lòng nhập password')" oninput="setCustomValidity('')"
                                    aria-describedby="emailHelp" placeholder="Password" value="<?php echo $userAdmin['password'];?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="phone" name="phone"
                                    required oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')" oninput="setCustomValidity('')"
                                    aria-describedby="emailHelp" placeholder="Số điện thoại" value="<?php echo $userAdmin['phone'];?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="address" name="address"
                                    required oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ')" oninput="setCustomValidity('')"
                                    aria-describedby="emailHelp" placeholder="Địa chỉ" value="<?php echo $userAdmin['address'];?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Chức vụ:</label>
                                <select class="form-control" name="type" value="<?php echo $userAdmin['type'];?>">
                                    <?php if ($userAdmin['type'] === 'Admin'): ?>
                                        <option selected>Quản trị</option>
                                        <option value="Staff">Cộng tác viên</option>
                                    <?php elseif ($userAdmin['type'] === 'Staff'): ?>
                                        <option selected>Cộng tác viên</option>
                                        <option value="Admin">Quản trị</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                           
                            <button class="btn text-white" style="background: linear-gradient(to right, #0d5cb4,#4bc0da);" name="btnUpdate">Cập nhật</button>
                            </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php require('includes/footer.php');
}
?>