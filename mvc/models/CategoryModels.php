<?php
    //Lấy danh mục
    class CategoryModels extends db{
        public function get(){
            $query = "SELECT * FROM category";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        }

    }
?>