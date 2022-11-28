<?php
include_once(__DIR__.'../../inc/header.php');
?>



<div class="container-fluid">
  <div class="row">
    
    <?php include_once(__DIR__.'../../inc/menu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh mục</h1>
        <?php include_once(__DIR__.'../../inc/alert.php');?>
        <div>
            <a href="/website__mvc/admin/category/create" class="btn btn-primary btn-sm">Thêm mới</a>
        </div>
      </div>
      <h2>Danh sách</h2>
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
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Mã Danh Mục</th>
              <th scope="col">Tên</th>
              <th scope="col">Tuỳ chọn</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $i =0;
          foreach($data as $key => $val) {
            $val = (object)$val;
            ;
          ?>
                 <tr>
                 <td><?php echo $val->idCat ?></td>
                  <td><?php echo $val->nameCat ?></td>
                  <td>
                      <a class="btn btn-primary" href="/website__mvc/admin/category/edit?id=<?php echo $val->idCat ?>">Chỉnh sửa</a>
                      <a class="btn btn-danger" onclick="return confirm('Bạn Chắc Chắn Muốn Xóa ?')" href="/website__mvc/admin/category/delete?id=<?php echo $val->idCat ?>">Xoá</a>
                  </td>
                </tr>
          <?php 
          }
          ?>
                
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


<?php
include_once(__DIR__.'../../inc/footer.php');
?>