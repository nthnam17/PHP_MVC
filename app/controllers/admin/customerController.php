<?php
    include_once(__DIR__.'/../../models/admin.php');
    include_once(__DIR__.'/../baseController.php');
    class CustomerController extends baseController {

        public function index(){
            $modelAdmin = new admin();
            $data = $modelAdmin->getAllData();
            return $this->renderView('views/admin/customer/index',$data);
        }

        public function create() {
                $data = [];
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $request = (object)$_POST;
                $errors = [];
                //validate data
                if($request->username == '') {
                    $errors['email'] = "Địa chỉ email không được để trống";
                }

                if($request->fullname == '') {
                    $errors['name'] = "Tên không được để trống";
                }

                if($request->phone == '') {
                    $errors['phone'] = "Địa chỉ không được để trống";
                }

                if($request->password == '') {
                    $errors['password'] = "Mật khẩu không được để trống";
                }

                if($request->password != $request->re_password) {
                    $errors['re_password'] = "Xác nhận mật không trùng mới mật khẩu";
                }

                if(count($errors) == 0) {
                    //insert database
                    $modelAdmin = new admin();
                    $status = $modelAdmin->create($request);

                    if($status) {
                        //dieu huong di ra trang danh sach
                        $_SESSION['alert-success'] = 'Thêm mới người dùng thành công';
                        header("Location: /Webbanhang/admin/customers");
                    } else {
                        // Thong bao loi
                        $_SESSION['alert-danger'] = 'Thêm mới người dùng thất bại';
                    }
                }

                $data['errors'] = $errors;
                $data['oldValue'] = $_POST;
            }
            return $this->renderView('views/admin/customer/create');
        }

        public function edit(){
            $id = $_GET['id'];
            $modelAdmin = new admin();
            $data["default"] = $modelAdmin->getById($id);
            if (!(array)$data["default"]) {
                $_SESSION['alert-danger'] = 'Không tìm thấy bản ghi, vui lòng thử lại';
                header("Location: /website__mvc/admin/customers");
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $request = (object)$_POST;
                $errors = [];
                //validate data
                if($request->email == '') {
                    $errors['email'] = "Địa chỉ email không được để trống";
                }

                if($request->fullname == '') {
                    $errors['name'] = "Tên không được để trống";
                }

                if($request->phone == '') {
                    $errors['phone'] = "Địa chỉ không được để trống";
                }

                if($request->password == '') {
                    $errors['password'] = "Mật khẩu không được để trống";
                }


                if(count($errors) == 0) {
                    //insert database
                    $modelAdmin = new admin();
                    $status = $modelAdmin->update($id,$request);

                    if($status) {
                        //dieu huong di ra trang danh sach
                        $_SESSION['alert-success'] = 'Sửa người dùng thành công';
                        header("Location: /Webbanhang/admin/customers");
                    } else {
                        // Thong bao loi
                        $_SESSION['alert-danger'] = 'Sửa người dùng thất bại';
                    }
                }

                $data['errors'] = $errors;
                $data['oldValue'] = $_POST;
            }
            return $this->renderView('views/admin/customer/edit',$data);
        }

        public function delete(){
            $id = $_GET['id'];
            $modelAdmin = new admin();
            $status = $modelAdmin->delete($id);

            if($status) {
                $_SESSION['alert-success'] = 'Xoá Người Dùng thành công';
            } else {
                $_SESSION['alert-danger'] = 'Xoá Người Dùng thất bại';
            }
    
            header("Location: /website__mvc/admin/customers");
        }
       
    }