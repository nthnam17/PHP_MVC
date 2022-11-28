<?php
include_once(__DIR__ .'../../inc/header.php');
include_once(__DIR__.'../../../../models/category.php')
?>

<div class="container-fluid">
    <div class="row">

        <?php include_once(__DIR__.'../../inc/menu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
            <?php include_once(__DIR__.'../../inc/alert.php');?>
            <h2>Tạo mới sản phẩm</h2>
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
                
            <form class="mb-5" action="/website__mvc/admin/product/create" method="post" enctype='multipart/form-data'>
                
                <div class="mb-3">
                    <label for="input-name" class="form-label">Tên</label>
                    <input type="text" class="form-control" 
                        value="" name="namePro">
                </div>

                <div class="mb-3">
                    <label for="input-parent" class="form-label">Danh mục</label>
                    <select class="form-select form-select-lg mb-3" name="idCat" id="input-parent">
                        <?php
                            $cat = new category();
                            $listCat = $cat->getAllCategory();
                            foreach ($listCat as $itemCat) {
                               ?>
                                    <option value="<?php echo  $itemCat['idCat'] ?>"><?php echo  $itemCat['nameCat'] ?></option>
                               <?php
                            }
                        ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="input-price" class="form-label">Giá gốc</label>
                    <input type="number" class="form-control" 
                        value="" name="priceBase">
                </div>

                <div class="mb-3">
                    <label for="input-price-sale" class="form-label">Giá bán</label>
                    <input type="number" class="form-control" 
                        value="" id="input-price-sale" name="price">
                </div>

                <div class="mb-3">
                    <label for="input-description" class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control" id="input-description" name="descPro"></textarea>
                </div>

                <div class="mb-3">
                    <label for="input-image" class="form-label">Ảnh</label>
                    <input type="file" class="form-control" id="input-image" name="imgPro">
                </div>
                <div class="mb-3">
                    <select class="form-select form-select-sm" name="trend" aria-label=".form-select-sm example">
                        <option selected>Best Seller</option>
                        <option value="0">Có</option>
                        <option value="1">Không</option>
                    </select>
                </div>
                <label for="" class="form-label">Kích Cỡ</label>
                <div class="flex_box mb-3" style="display: flex;">
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="size[]" value="1" id="size_1">
                        <label class="form-check-label" for="size_1">
                            Size S
                        </label>
                    </div>
                        <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="size[]" value="2" id="size_2">
                        <label class="form-check-label" for="size_2">
                            Size M
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="size[]" value="3" id="size_3">
                        <label class="form-check-label" for="size_3">
                            Size L
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="size[]" value="4" id="size_4">
                        <label class="form-check-label" for="size_4">
                            Size XL
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="size[]" value="5" id="size_5">
                        <label class="form-check-label" for="size_5">
                            Size XXL
                        </label>
                    </div>
                </div>
                <label for="" class="form-label">Kích Cỡ</label>
                <div class="flex_box mb-3" style="display: flex;">
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="color[]" value="1" id="color1">
                        <label class="form-check-label" for="color1">
                            Màu Xanh
                        </label>
                    </div>
                        <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="color[]" value="2" id="color2">
                        <label class="form-check-label" for="color2">
                            Màu Đỏ
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="color[]" value="3" id="color3">
                        <label class="form-check-label" for="color3">
                            Màu Be
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="color[]" value="4" id="color4">
                        <label class="form-check-label" for="color4">
                            Màu Hạt Rẻ
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="color[]" value="5" id="color5">
                        <label class="form-check-label" for="color5">
                            Màu Trắng
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="color[]" value="6" id="color6">
                        <label class="form-check-label" for="color6">
                            Màu Đen
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="color[]" value="7" id="color7">
                        <label class="form-check-label" for="color7">
                            Màu Hồng Phấn
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" name="color[]" value="8" id="color8">
                        <label class="form-check-label" for="color8">
                            Màu Cam Đất
                        </label>
                    </div>
                </div>
                
                


                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </form>
        </main>
    </div>
</div>


<?php 
    include_once(__DIR__.'../../inc/footer.php');
?>