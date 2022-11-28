<?php
include_once(__DIR__.'./baseModel.php');
    class category extends baseModel {

        public  function   __construct(){
            parent::__construct();
        }
        public function getAllCategory(){
            $sql = "SELECT * FROM category ORDER BY idCat";
            $query = $this->db->query($sql);
            $result = $query->fetchAll();
            return  $result;

        }

        public function create($request){
            $sql = "INSERT INTO category(nameCat) VALUE (?)";
            try {
                $stmt= $this->db->prepare($sql);
                $stmt->execute([
                    $request->nameCat
                ]);
    
                return true;
            } catch(Exception $e) {
                return false;
            }
        }

        public function getById($id){
            $sql = "SELECT * FROM category WHERE idcat = {$id}";
            $query = $this->db->query($sql);
            $result = $query->fetchAll();
            return  $result;

        }
        public function update($id, $request){
            $sql = "UPDATE category SET nameCat=? WHERE idCat=?";
            try {
                $stmt= $this->db->prepare($sql);
                $stmt->execute([
                    $request->nameCat,
                    $id
                ]);
    
                return true;
            } catch(Exception $e) {
                return false;
            }
        }
        public function delete($id){
            $sql = "DELETE FROM category WHERE idCat= {$id}";
            try {
                $this->db->exec($sql);

                return true;
            } catch(Exception $e) {
                return false;
            }
        }
        
    }

?>