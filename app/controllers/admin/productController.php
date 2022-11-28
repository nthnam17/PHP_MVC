<?php
    include_once(__DIR__.'/../../models/product.php');
    include_once(__DIR__.'/../baseController.php');
class productController extends baseController {
    public function index() {
        $productModel = new product();
        $data = $productModel->getAllData();

        return $this->renderView('views/admin/product/index',$data);
    }

    public function create(){
        $data = [];
        $productModel = new product();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = (object)$_POST;
            $errors = [];
            //validate data
            if($request->namePro == '') {
                $errors['name'] = "Tên sản phẩm không được để trống";
            }

            if($request->price == '') {
                $errors['price'] = "Bạn chưa nhập giá bán cho sản phẩm";
            }

            if($request->priceBase == '') {
                $errors['price_sale'] = "Bạn chưa giá gốc cho sản phẩm";
            }
            
            if($request->color == '') {
                $errors['color'] = "Bạn chưa nhập màu cho sản phẩm";
            }

            if($request->size == '') {
                $errors['size'] = "Bạn chưa nhập size cho sản phẩm";
            }

            if($request->descPro == '') {
                $errors['descPro'] = "Bạn chưa thông tin cho sản phẩm";
            }

            if(count($errors) == 0) {
                //upload image
                
                if(!empty($_FILES['image'])) {
                    if($_FILES['image']['size'] > 0) {
                        $permited = array('jpg', 'png', 'gif', 'jprg');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                        
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unipue_image = substr(md5(time()), 0,10).'.'.$file_ext;
                        $uploaded_image = "public/uploads/".$unipue_image;
                        move_uploaded_file($file_temp, $uploaded_image);
                    }
                    
                }
                $request->imgPro = $unipue_image;
                //ep mau sac thanh chuoi
                $colorStr = implode(',', $request->color);
                $request->color = $colorStr;

                //ep size 
                $sizeStr = implode(',', $request->size);
                $request->size = $sizeStr;

                //insert database
                $status = $productModel->create($request);

                if($status) {
                    //dieu huong di ra trang danh sach
                    $_SESSION['alert-success'] = 'Thêm mới sản phẩm mục thành công';
                    header("Location: /website__mvc/admin/product");
                } else {
                    // Thong bao loi
                    $_SESSION['alert-danger'] = 'Thêm mới sản phẩm thất bại';
                }
            }

            $data['errors'] = $errors;
            $data['oldValue'] = $_POST;
        }

        return $this->renderView('views/admin/product/create',$data);
    }

    public function show(){
        $data = [];
        $id = $_GET['id'];
        $productModel = new Product();
        $data = $productModel->getById($id);

        return $this->renderView('views/admin/product/detail',$data);
    }

    public function edit(){
        $data = [];
        $id = $_GET['id'];
        $productModel = new Product();
        $data['default'] = $productModel->getById($id);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = (object)$_POST;
            $errors = [];
            //validate data
            if($request->namePro == '') {
                $errors['name'] = "Tên sản phẩm không được để trống";
            }

            if($request->price == '') {
                $errors['price'] = "Bạn chưa nhập giá bán cho sản phẩm";
            }

            if($request->priceBase == '') {
                $errors['price_sale'] = "Bạn chưa giá gốc cho sản phẩm";
            }
            
            if($request->color == '') {
                $errors['color'] = "Bạn chưa nhập màu cho sản phẩm";
            }

            if($request->size == '') {
                $errors['size'] = "Bạn chưa nhập size cho sản phẩm";
            }

            if($request->descPro == '') {
                $errors['descPro'] = "Bạn chưa thông tin cho sản phẩm";
            }

            if(count($errors) == 0) {
                //upload image
                
                if(!empty($_FILES['image'])) {
                    if($_FILES['image']['size'] > 0) {
                        $permited = array('jpg', 'png', 'gif', 'jprg');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                        
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unipue_image = substr(md5(time()), 0,10).'.'.$file_ext;
                        $uploaded_image = "public/uploads/".$unipue_image;
                        move_uploaded_file($file_temp, $uploaded_image);
                    }
                    
                }
                $request->imgPro = $unipue_image;
                //ep mau sac thanh chuoi
                $colorStr = implode(',', $request->color);
                $request->color = $colorStr;

                //ep size 
                $sizeStr = implode(',', $request->size);
                $request->size = $sizeStr;

                //insert database
                $status = $productModel->create($request);

                if($status) {
                    //dieu huong di ra trang danh sach
                    $_SESSION['alert-success'] = 'Sửa sản phẩm mục thành công';
                    header("Location: /website__mvc/admin/product");
                } else {
                    // Thong bao loi
                    $_SESSION['alert-danger'] = 'Sửa sản phẩm thất bại';
                }
            }

            $data['errors'] = $errors;
            $data['oldValue'] = $_POST;
        }

        return $this->renderView('views/admin/product/edit',$data);
    }

    public function delete(){
        $id = $_GET['id'];
            $productModel = new product();
            $status = $productModel->delete($id);

            if($status) {
                $_SESSION['alert-success'] = 'Xoá Sản Phẩm thành công';
            } else {
                $_SESSION['alert-danger'] = 'Xoá sản phẩm thất bại';
            }
    
            header("Location: /website__mvc/admin/product");
    }
}