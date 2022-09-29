<div class="modal-header">
    <h5>Sửa sản phẩm <?= $data['products']['product_name']?></h5>
</div>
<div class="modal-body">
    <!-- Form tạo sản phẩm -->
    <form method="post" enctype="multipart/form-data" action="<?= BASE_URL ?>/product/update/<?=  $data['products']['id'] ?>">
        <span class="error text-danger"></span>
        <div class="form-group">
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Tên sản phẩm" value="<?= $data['products']['product_name']?>">
        </div>

        <div class="form-group">
            <select class="form-control" name="category_id" id="category_id">
                <option value="0">Chọn danh mục</option>
                <?php foreach ($data['categorys'] as $item) :?>
                    <option value="<?= $item['id'] ?>" <?php if($data['products']['category_id'] == $item['id']) echo "selected" ?> >
                        <?= $item['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="thumb" name="thumb" value="">
                    <label class="custom-file-label" class="image_name"></label>
                    <input type="hidden" value="<?= $data['products']['thumb']?>" name="old">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <span class="show_image">
                <img src="<?php echo BASE_URL ?>/public/upload/<?= $data['products']['thumb']?>" width="80px";>
            </span>
        </div>
        <div class="modal-footer">
            <input type="submit" name="update-product"  class="btn btn-primary" value="Cập nhật sản phẩm" id="btn-add">
        </div>
    </form>
    <!-- Hết form -->
</div>
