<?php
    include_once(__DIR__.'./baseModel.php');
    class admin extends baseModel {
        public  function __construct()
        {
            parent::__construct();            
        }
        public function getAllData() {
            $sql = "SELECT * FROM admin ORDER BY id";
            $query = $this->db->query($sql);
            $data = $query->fetchAll();
            return $data;
        }
        public  function create($request) {
            try {
                $sql = "INSERT INTO admin(username,password,email,fullname,phone) VALUES (:username, :password, :email, :fullname, :phone)";
                $queryBinder = $this->db->prepare($sql);
                $queryBinder -> bindParam(':username', $username);
                $queryBinder -> bindParam(':password', $password);
                $queryBinder -> bindParam(':email', $email);
                $queryBinder -> bindParam(':fullname', $fullname);
                $queryBinder -> bindParam(':phone', $phone);

                $username = $request->username;
                $password = $request->password;
                $email = $request->email;
                $fullname = $request->fullname;
                $phone = $request->phone;

                $queryBinder ->execute();
                return true;
            }catch(Exception $e) {
                return false;
            }

        }

        public function getById($id) {
            $sql = "SELECT  * FROM  admin WHERE id = {$id}";
            $query = $this->db->query($sql);
            $data= $query->fetchAll();
            if(count($data)) {
                $data = $data[0];
            } else {
                $data = [];
            }

            return $data;
        }

        public  function update($id,$request) {
            try {
                $sql = "UPDATE admin SET  username=?, password =?, email=?, fullname=?, phone =? WHERE id = ?";
                $query = $this->db->prepare($sql);

                $username = $request->username;
                $password = $request->password;
                $email = $request->email;
                $fullname = $request->fullname;
                $phone = $request->phone;

                $query ->execute([$username ,$password,$email,$fullname,$phone,$id]);
                return true;
            }catch(Exception $e) {
                return false;
            }

        }

        public function delete($id){
            $sql = "DELETE FROM admin WHERE id= {$id}";
            try {
                $this->db->exec($sql);

                return true;
            } catch(Exception $e) {
                return false;
            }
        }

        public function login($username , $password) {
            $sql = "SELECT  * FROM  admin WHERE username = '{$username}' AND password = '{$password}'";
            $query = $this->db->query($sql);
            $data= $query->fetchAll();
            if(count($data)) {
                $data = $data[0];
            } else {
                $data = [];
            }

            return $data;
        }
        
    }