<?php 
include_once(__DIR__.'../../inc/header.php');
?>

<div class="container-fluid">
  <div class="row">
    
    <?php include_once(__DIR__.'../../inc/menu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Danh sách sản phẩm</h1>
        <?php include_once(__DIR__.'../../inc/alert.php'); ?>
        <div>
            <a href="/website__mvc/admin/product/create" class="btn btn-primary btn-sm">Thêm mới</a>
        </div>
      </div>
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

      <h2>Danh sách</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên</th>
              <th scope="col">Hình Ảnh</th>
              <th scope="col">Danh Mục</th>
              <th scope="col">Giá</th>
              <th scope="col">Trend</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            foreach($data as $key => $val){
                $val = (object)$val;
                ?>
                 <tr>
                  <td><?php echo $val->idPro ?></td>
                  <td ><?php echo $val->namePro ?></td>
                  <td><?php
                            if(!empty($val->imgPro)) {
                                ?>
                                
                                <img src="<?php echo '../../../../public/uploads/'.$val->imgPro?>" alt="<?php echo $val->imgPro?>" width="100px" height="100px">
                                <?php
                            }
                        ?></td>
                  <td><?php echo $val->nameCat ?></td>
                  <td><?php echo $val->price ?></td>
                  <td><?php 
                  if($val->trend == 0){
                    echo"Hot Trend";
                  }else{
                    echo "Down Trend";
                  }
                   ?></td>
                  <td>
                    <a class="btn btn-primary" href="/website__mvc/admin/product/detail?id=<?php echo $val->idPro ?>"> Chi Tiết</a>
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