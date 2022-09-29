<?php
class Product extends Controller
{
    function __construct(){
        $this->product = $this->model("ProductModels");
        $this->category = $this->model("CategoryModels");
    }
    function store(){
        if (isset($_POST['add-product'])) {
            $product_name = ucwords($_POST['product_name']);
            $category_id = $_POST['category_id'];
            $thumb = time().'.png';
            $this->product->insertProduct($category_id,$product_name,$thumb);
            //upload image
            $target_file ="public/upload/".$thumb;
            if(move_uploaded_file($_FILES['thumb']['tmp_name'],$target_file)){
                header('location:http://localhost/--Lession2/');
            }
            header('location:http://localhost/--Lession2/');
        }
    }
    function get($id){
        $this->view("master1",[
            "title" => 'Chi tiết sản phẩm',
            "pages" => 'detail_product',
            "categorys" => $this->category->get(),
            "products" => $this->product->getById($id),
        ]);
    }
    function show($id){
        $this->view("master1",[
            "title" => 'Sửa sản phẩm',
            "pages" => 'update_product',
            "categorys" => $this->category->get(),
            "products" => $this->product->getById($id),
        ]);
    }
    function update($id){
        if (isset($_POST['update-product'])) {
            $product_name = $_POST['product_name'];
            $category_id = $_POST['category_id'];
            $oldfile= $_POST['old'];
            $file =$_FILES['thumb']['name'];
            if($file !=""){
                $thumb = time().'.png';
                $target_file ="public/upload/".$thumb;
                move_uploaded_file($_FILES['thumb']['tmp_name'],$target_file);
                unlink('public/upload/'. $oldfile);
                header('location:http://localhost/--Lession2/');
            } else{
                $thumb = $oldfile;
            }
            $this->product->update($category_id,$product_name,$thumb,$id);
            header('location:http://localhost/--Lession2/');
        }
    }
    function destroy($id){
        $products = $this->product->getById($id);
        $this->product->delete($id);
        unlink('public/upload/'.$products['thumb']);
        header('location:http://localhost/--Lession2/');
    }
}
