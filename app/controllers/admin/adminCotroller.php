<?php 
    include_once(__DIR__.'/../baseController.php');
    include_once(__DIR__.'/../../models/admin.php');
    include_once(__DIR__.'/../../../config/session.php');

    class AdminController extends baseController {

        public function index(){
            return $this->renderView('views/admin/index');
        }
        
        public  function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $request = (object)$_POST;
                $errors = []; $data = []; 
                if($request->username == ''){
                    $errors['username'] = "Vui lòng nhập tên đăng nhập";
                }
                if($request->password == ''){
                    $errors['password'] = "Vui lòng nhập mật khẩu";
                }
                if(count($errors) == 0){
                    $adminModel = new Admin();
                    $admin = $adminModel->login($request->username, $request->password);
                    if($admin) {
                        // session::init();
                        // session::set('admin',true);
                        // session::set('id',$admin['id']);
                        // session::set('fullname',$admin['fullname']);
                        // session::set('email',$admin['email']);
                        // session::set('phone',$admin['phone']);
                    
                        $_SESSION["admin"] = [
                            "id" => $admin['id'],
                            "fullname" => $admin['fullname'],
                            "email" => $admin['email'],
                            "phone" => $admin['phone'],
                        ];
                        header("Location: /website__mvc/admin");
                    }
                } else {
                    $errors['error'] = "Thông tin không đúng vui lòng thử lại";
                }
                $data['error'] = $errors;
            }
            return $this->renderView('views/admin/login');
        }

        public function loguot(){
            if(!empty($_SESSION['admin'])){
                unset($_SESSION['admin']);
            }
            return $this->renderView('views/admin/login');
        }
    }