<?php
include_once(__DIR__.'../../inc/header.php');
?>


<div class="container-fluid">
    <div class="row">

        <?php include_once(__DIR__.'../../inc/menu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
            <?php include_once(__DIR__.'../../inc/alert.php');?>
            <h2>Tạo mới danh mục</h2>
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
            <form class="mb-5" action="/website__mvc/admin/category/create" method="post">

                <div class="mb-3">
                    <label for="input-name" class="form-label">Tên Danh Mục</label>
                    <input type="text" class="form-control" 
                        value="" id="input-name" name="nameCat">
                </div>


                <!-- <div class="mb-3">
                    <label for="input-parent" class="form-label">Danh mục cha</label>
                    <select class="form-select form-select-lg mb-3" name="parent_id" id="input-parent">
                        <option value="0">Root</option>
                        
                    </select>
                </div>
                

                <div class="mb-3">
                    <label for="input-type" class="form-label">Kiểu</label>
                    <select class="form-select form-select-lg mb-3" name="type" id="input-type">
                        <option value="product">Sản phẩm</option>
                        <option value="news">Tin tức</option>
                    </select>
                </div> -->

                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </form>
        </main>
    </div>
</div>

<?php
include_once(__DIR__.'../../inc/footer.php');
  

