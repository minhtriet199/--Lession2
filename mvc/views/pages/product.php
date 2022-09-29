<table class="table table-hover">
    <thead class="table-dark ">
        <tr>
            <th scope="col">Mã</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Hình sản phẩm</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">&nbsp</th>
        </tr>
    </thead>
    <tbody id="product_list">
        <?php foreach ($data['products'] as $product) :?>
            <tr data-id="<?= $product['id'] ?>">
                <th class="align-middle"><?= $product['id'] ?></th>
                <th class="align-middle" value="<?= $product['category_id'] ?>"><?= $product['category_name'] ?></th>
                <th class="align-middle"><img src="<?php echo BASE_URL ?>/public/upload/<?= $product['thumb'] ?>" width="80px";></th>
                <th class="align-middle"><?= $product['product_name'] ?></th>
                <th class="align-middle col-md-2 text-right">
                    <a class="btn btn-primary" href="<?php echo BASE_URL ?>/product/show/<?= $product['id'] ?>">
                        <i class="fa fa-edit"></i>
                    <a>
                    <a class="btn btn-primary" href="<?php echo BASE_URL ?>/product/get/<?= $product['id'] ?>">
                        <i class="fa fa-solid fa-eye"></i>
                    <a>
                    <a class="btn btn-primary" href="<?php echo BASE_URL ?>/product/destroy/<?= $product['id'] ?>">
                        <i class="fa fa-trash"></i>
                    <a>
                </th>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tbody id="search_result">

    </tbody>
</table>

<div class="d-flex justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="?page=1 ">Trang đầu</a></li>
            <?php 
                $current_page =!empty($_GET['page'])?$_GET['page']:1;
                for($i=1;$i<= $data['paginate'];$i++){
                    if($i > $current_page -3 && $i < $current_page +3){
            ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
            <?php 
                    }
                }
            ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $data['paginate']?>">Trang cuối</a></li>
        </ul>
    </nav>
</div>