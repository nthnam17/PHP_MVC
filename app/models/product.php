<?php 
    include_once(__DIR__.'./baseModel.php');
    class product extends baseModel {

        public function __construct(){
            parent::__construct();
        }

        public function getAllData(){
            $sql = "SELECT product.* , category.nameCat FROM product INNER JOIN category ON product.idCat = category.idCat ORDER BY product.idPro";
            $query = $this->db->query($sql);
            $result = $query->fetchAll();
            return  $result;
        }

        public function create($request){
            $sql = "INSERT INTO product(namePro, price, priceBase, color, size, idCat, imgPro, trend, descPro) VALUE (?,?,?,?,?,?,?,?,?)";
            try {
                $stmt= $this->db->prepare($sql);
                $stmt->execute([
                    $request->namePro,
                    $request->price,
                    $request->priceBase,
                    $request->color,
                    $request->size,
                    $request->idCat,
                    $request->imgPro,
                    $request->trend,
                    $request->descPro
                ]);
    
                return true;
            } catch(Exception $e) {
                return false;
            }
        }

        public function getById($id){
            $sql = "SELECT product.* , category.nameCat FROM product INNER JOIN category ON product.idCat = category.idCat WHERE product.idPro";
            $stmt = $this->db->query($sql);
            $data = $stmt->fetchAll();
            if(count($data)) {
                $data = $data[0];
            } else {
                $data = [];
            }

            return $data;

        }
        public function update($id, $request){
            $sql = "UPDATE product SET namePro=?, price= ?,  priceBase= ?, color= ?, size= ?, idCat= ?, imgPro= ?, trend= ?, descPro= ? WHERE idCat=?";
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
            $sql = "DELETE FROM product WHERE idPro= {$id}";
            try {
                $this->db->exec($sql);

                return true;
            } catch(Exception $e) {
                return false;
            }
        }
        
            
        
    }