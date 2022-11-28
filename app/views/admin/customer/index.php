<?php 
include_once(__DIR__.'../../inc/header.php');
?>

<div class="container-fluid">
  <div class="row">
    
    <?php include_once(__DIR__.'../../inc/menu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customers</h1>
       
        <div>
            <a href="/website__mvc/admin/customers/create" class="btn btn-primary btn-sm">Thêm mới</a>
        </div>
      </div>

      <?php include_once(__DIR__.'../../inc/alert.php'); ?>

      <h2>Danh sách</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Họ Tên</th>
              <th scope="col">Email</th>
              <th scope="col">Điện thoại</th>
              <th scope="col">Tuỳ chọn</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              foreach ($data as $key => $row) {
                $row = (object)$row;
                ?>
                 <tr>
                  <td><?php echo $row->id ?></td>
                  <td><?php echo $row->fullname ?></td>
                  <td><?php echo $row->email ?></td>
                  <td><?php echo $row->phone ?></td>
                  <td>
                      <a class="btn btn-primary" href="/website__mvc/admin/customers/edit?id=<?php echo $row->id ?>">Chỉnh sửa</a>
                      <a class="btn btn-danger" href="/Webbanhang/admin/customers/delete?id=<?php echo $row->id ?>">Đuổi Việc</a>
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

       