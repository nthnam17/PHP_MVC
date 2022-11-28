<?php
include_once(__DIR__ . '../../inc/header.php');
?>

<div class="container-fluid">
    <div class="row">

        <?php include_once(__DIR__ . '../../inc/menu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
            <?php include_once(__DIR__.'../../inc/alert.php'); ?>
            <h2>Chỉnh sửa người dùng</h2>
            <?php
            if (!empty($data['errors'])) {
            ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                    foreach ($data['errors'] as $error) {
                        echo "<p>{$error}</p>";
                    }
                    ?>
                </div>
            <?php
            }
            ?>
            <form class="mb-5" action="/website__mvc/admin/customers/edit?id=<?php echo $data['default']['id'] ?>" method="post">
                <div class="mb-3">
                    <label for="input-email" class="form-label">Địa chỉ email</label>
                    <input type="email" class="form-control" id="input-email" 
                        name="email" 
                        value="<?php 
                            if(!empty($data['oldValue']['email'])) {
                                echo $data['oldValue']['email'];
                            } else if(!empty($data['default']['email'])) {
                                echo $data['default']['email'];
                            } else {
                                echo "";
                            }
                        ?>"
                        readonly="true"
                        aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Vui lòng nhập địa chỉ email của người dùng</div>
                </div>
                <div class="mb-3">
                    <label for="input-name" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" 
                    value="<?php 
                            if(!empty($data['oldValue']['fullname'])) {
                                echo $data['oldValue']['fullname'];
                            } else if(!empty($data['default']['fullname'])) {
                                echo $data['default']['fullname'];
                            } else {
                                echo "";
                            }
                        ?>"
                    id="input-name" name="fullname">
                </div>
                
                <div class="mb-3">
                    <label for="input-phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" 
                    value="<?php 
                            if(!empty($data['oldValue']['phone'])) {
                                echo $data['oldValue']['phone'];
                            } else if(!empty($data['default']['phone'])) {
                                echo $data['default']['phone'];
                            } else {
                                echo "";
                            }
                        ?>"
                    id="input-phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="input-password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="input-password" name="password" value="
                    <?php
                        if(!empty($data['oldValue']['password'])) {
                            echo $data['oldValue']['password'];
                        }elseif(!empty($data['default']['password'])) {
                            echo   $data['default']['password'];
                        }else {
                            echo "";
                        }
                     ?>
                    ">
                </div>
                <div class="mb-3">
                    <label for="input-re-password" class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="input-re-password" name="re_password">
                </div>

                

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </main>
    </div>
</div>

<?php
include_once(__DIR__ . '../../inc/footer.php');
?>