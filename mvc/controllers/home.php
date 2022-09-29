<?php
class Home extends Controller
{
    function __construct(){
        $this->product = $this->model("ProductModels");
        $this->category = $this->model("CategoryModels");
    }
    function index(){
        $this->view("master",[
            "title" => 'Trang chủ',
            "pages" => 'product',
            "categorys" => $this->category->get(),
            "products" => $this->product->get(),
            "paginate" =>$this->product->page(), 
        ]);
    }

    function search(){
        $output= '';
        $search = $_POST['search'];
        $type= $_POST['type'];
        $results = $this->product->search($search,$type);
        foreach($results as $product){
            $output .=' 
                <tr data-id="'. $product['id'].'">
                    <th class="align-middle">'.$product['id'].'</th>
                    <th class="align-middle">'. $product['category_name'] .'</th>
                    <th class="align-middle"><img src="'. BASE_URL.' /public/upload/'.$product['thumb'].'" width="80px";></th>
                    <th class="align-middle">'. $product['product_name'] .'</th>
                    <th class="align-middle col-md-2 text-right">
                        <a class="btn btn-primary" href="'.BASE_URL.'/product/show/'. $product['id'].'">
                            <i class="fa fa-edit"></i>
                        <a>
                        <a class="btn btn-primary" href="'.BASE_URL.'/product/get/'. $product['id'].'">
                            <i class="fa fa-solid fa-eye"></i>
                        <a>
                        <a class="btn btn-primary" href="'.BASE_URL.'/product/destroy/'. $product['id'].'">
                            <i class="fa fa-trash"></i>
                        <a>   
                    </th>
                </tr>
            ';
        }
        echo $output;
    }
}
