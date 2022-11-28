<?php
include_once(__DIR__ .'../../inc/header.php');
?>

<div class="container-fluid">
    <div class="row">

        <?php include_once(__DIR__.'../../inc/menu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
            <h2>Thông tín sản phẩm</h2>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    
                    <th scope="col">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID sản phẩm</td>
                        <td><?php echo $data['idPro'] ?></td>
                    </tr>
                    
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><?php echo $data["namePro"]?></td>
                    </tr>
                    <tr>
                        <td>Danh mục</td>
                        <td><?php echo  $data['nameCat'] ?></td>
                    </tr>
                    <tr>
                        <td>Giá gốc</td>
                        <td><?php echo monneyFormat( $data['priceBase'])?></td>
                    </tr>
                    <tr>
                        <td>Giá bán</td>
                       
                        <td><?php echo monneyFormat( $data['price'])?></td>
                    </tr>
                    <tr>
                        <td>Mô tả ngắn</td>
                        <td><?php echo  $data['descPro'] ?></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td><?php
                            if(!empty( $data['imgPro'])) {
                                ?>
                                
                                <img src="<?php echo '../../../../public/uploads/'. $data['imgPro']?>" alt="<?php echo $data['imgPro'] ?>" width="150px" height="150px">
                                <?php
                            }
                        ?></td>
                    </tr>
                    <tr>
                        <td>Trending</td>
                        <td>
                        <?php 
                            if( $data['trend'] == 0){
                                echo "Hot Trend";
                            }else {
                                echo "Down Trend";
                            }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Size</td>
                        <td>
                            <?php 
                            $arrSize = explode(',',$data['size']);
                            foreach ($arrSize as $size){
                                if($size == 1){
                                    echo "S";
                                }elseif ($size == 2){
                                    echo "-M";
                                }elseif ($size == 3){
                                    echo "-L";
                                }elseif ($size == 4){
                                    echo "-XL";
                                }else {
                                    echo "-XXL";
                                }
                            }
                            ?>
                    </td>
                    </tr>
                    <tr>
                        <td>Màu Sắc</td>
                        <td>
                            <?php 
                            $arrColor = explode(',', $data['color']);
                            foreach ($arrColor as $color){
                                if($color == 1){
                                    echo "Xanh";
                                }elseif ($color == 2){
                                    echo "-Đỏ";
                                }elseif ($color == 3){
                                    echo "-Be";
                                }elseif ($color == 4){
                                    echo "-Hạt Rẻ";
                                }elseif ($color == 5){
                                    echo "-Trắng";
                                }elseif ($color == 6){
                                    echo "-Đen";
                                }elseif ($color == 7){
                                    echo "-Hồng Phấn ";
                                }else {
                                    echo "-Cam Đất";
                                }
                            }
                            ?>
                    </td>
                    </tr>
                    
                </tbody>
                </table>
                <div class="d-flex flex-row  justify-content-end mb-3">
                <a href="/website__mvc/admin/product/edit?id=<?php echo $data['idPro'] ?>" class="btn btn-primary d-flex align-items-center mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil-square mx-1" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>Sửa
                </a>
                <a class="btn btn-danger d-flex align-items-center mx-2" href="/website__mvc/admin/product/delete?id=<?php echo  $data['idPro'] ?>"  onclick="return confirm('Bạn Chắc Chắn Muốn Xóa ?')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash mx-1 " viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>Xóa
                </a>
               
                </div>
                
            </div>
            

            
        </main>
    </div>
</div>


<?php 
    include_once(__DIR__.'../../inc/footer.php');
?>