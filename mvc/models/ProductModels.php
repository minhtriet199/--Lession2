<?php
    class ProductModels extends db{
        //Lấy danh sách sản phẩm
        public function get(){
            if(!isset($_GET['page'])) $page = 1;
            else $page = $_GET['page'];
            $start = ($page-1) *10;
            
            $query = "SELECT a.*,b.name as 'category_name',b.id as 'category_id' FROM product a
                INNER JOIN category b
                ON a.category_id = b.id
                ORDER BY a.id DESC
                LIMIT $start,10";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        //Phân trang
        public function page(){
            $product_all = $this->getall();
            $product_count = count($product_all);
            $product_button = round($product_count/10);
            return $product_button;
        }
        //Lấy toàn bộ sản phẩm
        public function getall(){
            $query = "SELECT a.*,b.name as 'category_name',b.id as 'category_id' FROM product a
                INNER JOIN category b
                ON a.category_id = b.id
                ORDER BY a.id DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        // Tạo sản phẩm
        public function insertProduct($category_id,$product_name,$thumb){
            $query = "INSERT INTO `product`(`category_id`,`product_name`,`thumb`) VALUES ('$category_id','$product_name','$thumb')";
            $stmt = $this->conn->prepare($query);
            $stmt ->execute();
            return $stmt;
        }
        //Tìm kiếm sản phẩm theo tên danh mục và sản phẩm
        public function search($search,$type){
            if($type=='category'){
                $query = " SELECT a.*,b.name as 'category_name' FROM product a
                INNER JOIN category b
                ON a.category_id = b.id
                WHERE b.name LIKE '%$search%' ";
            }
            else{
                $query = " SELECT a.*,b.name as 'category_name' FROM product a
                INNER JOIN category b
                ON a.category_id = b.id
                WHERE a.product_name LIKE '%$search%' ";
            }
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        //Lấy sản phẩm dựa trên id
        public function getById($id){
            $query = "SELECT a.*,b.name as 'category_name',b.id as 'category_id' FROM product a
                INNER JOIN category b
                ON a.category_id = b.id
                WHERE a.id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            return $stmt->fetch();
        }

        //Cập nhật sản phẩm
        public function update($category_id,$product_name,$thumb,$id){
            $query = "UPDATE product SET category_id = ?, product_name = ?, thumb = ?
            WHERE `id` = ?";
            $stmt = $this->conn->prepare($query);
            $stmt ->execute([$category_id,$product_name,$thumb,$id]);
            return $stmt;
        }
        //Xóa sản phẩm
        public function delete($id){
            $query = "DELETE FROM product WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt ->execute([$id]);
            return $stmt;
        }
    }
?>