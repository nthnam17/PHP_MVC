<?php 
include_once(__DIR__.'../../../models/category.php');


    class categoryController extends baseController{
        public function index(){
            $modelCategory = new Category();
            $data = $modelCategory->getAllCategory();
            return $this->renderView('views/admin/category/listCategory', $data);
        }
        public function create() {
            $data = [];
            $modelCategory = new Category();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $request = (object)$_POST;
                $error = [];
                if($request -> nameCat == ''){
                $errors['name'] = "Tên danh mục không được để trống";

                }
                if(count($error) == 0){
                    $status = $modelCategory -> create($request);
                    if($status){
                        //dieu huong di ra trang danh sach
                        $_SESSION['alert-success'] = 'Thêm mới danh mục thành công';
                        header("Location: /website__mvc/admin/category");
                    }else {
                        // Thong bao loi
                        $_SESSION['alert-danger'] = 'Thêm mới danh mục thất bại';
                    }
                }
                $data['error'] = $error;
            }
            return $this->renderView('views/admin/category/create',$data);
        }
        public function edit(){
            $id = $_GET['id'];
            $modelCategory = new Category();
            $data['default'] = $modelCategory->getById($id);

            if(!(array)$data["default"]){
                $_SESSION['alert-danger'] = 'Không tìm thấy bản ghi, vui lòng thử lại';
                header("Location: /website__mvc/admin/category");
            }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $request = (object)$_POST;
            $error = [];
            if($request -> nameCat == ''){
                $errors['name'] = "Tên danh mục không được để trống";
            }
            if(count($error) == 0){
                $status = $modelCategory ->update($id,$request);
                if($status){
                    //dieu huong di ra trang danh sach
                    $_SESSION['alert-success'] = 'Sửa danh mục thành công';
                    header("Location: /website__mvc/admin/category");
                }else {
                    // Thong bao loi
                    $_SESSION['alert-danger'] = 'Sửa danh mục thất bại';
                }
            }
            $data['error'] = $error;
        }
        return $this->renderView('views/admin/category/edit',$data);

        }

        public function delete(){
            $id = $_GET['id'];
            $modelCategory = new Category();
            $status = $modelCategory->delete($id);

            if($status) {
                $_SESSION['alert-success'] = 'Xoá danh mục thành công';
            } else {
                $_SESSION['alert-danger'] = 'Xoá danh mục thất bại';
            }
    
            header("Location: /website__mvc/admin/category");
        }
    }