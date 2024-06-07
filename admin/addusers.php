<?php
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
                            <h1 class="h4 text-gray-900 mb-4">Thêm mới người dùng</h1>
                        </div>
                        <form class="user" method="post" action="confirmusers.php" >
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name"
                                    aria-describedby="emailHelp" placeholder="Tên người dùng" required oninvalid="this.setCustomValidity('Vui lòng nhập tên người dùng')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="Email" required oninvalid="this.setCustomValidity('Vui lòng nhập email')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password"
                                    aria-describedby="emailHelp" placeholder="Password" required oninvalid="this.setCustomValidity('Vui lòng nhập password')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="phone" name="phone"
                                    aria-describedby="emailHelp" placeholder="Số điện thoại" required oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="address" name="address"
                                    aria-describedby="emailHelp" placeholder="Địa chỉ" required oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Chức vụ:</label>
                                <select class="form-control" name="type" required oninvalid="this.setCustomValidity('Vui lòng chọn chức vụ')" oninput="setCustomValidity('')">
                                    <option value="" disabled selected>Chọn chức vụ</option>
                                    <option value="Admin">Quản trị</option>
                                    <option value="Staff">Cộng tác viên</option>
                                </select>
                            </div>


                            <button class="btn text-white" style="background: linear-gradient(to right, #0d5cb4,#4bc0da);">Tạo mới</button>
                        </form>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
require('includes/footer.php');
?>