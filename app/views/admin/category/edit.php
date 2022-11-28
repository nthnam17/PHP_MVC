<?php
include_once(__DIR__.'../../inc/header.php');
?>

<div class="container-fluid">
    <div class="row">

        <?php include_once(__DIR__.'../../inc/menu.php');?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
            <?php include_once(__DIR__.'../../inc/alert.php');?>
            <?php
            ?>
            <h2>Sửa danh mục</h2>
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
            <?php
            foreach($data['default'] as $default => $val) {
                $val = (object)$val;
                ?>
            <form class="mb-5" action="/website__mvc/admin/category/edit?id=<?php echo $val -> idCat?>" method="post">
              
                <div class="mb-3">
                    <label for="input-name" class="form-label">Tên Danh Mục</label>
                    <input type="text" class="form-control" 
                        value="<?php echo $val->nameCat ?>" id="input-name" name="nameCat">
                </div>

                <button type="submit" class="btn btn-primary">Sửa</button>
            </form>
            <?php 
            }
            ?>
        </main>
    </div>
</div>

<?php
include_once(__DIR__.'../../inc/footer.php');
  

