<div class="row">
    <div class="col-lg-12">
        <div class="modal fade mt-5" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Thêm sản phẩm</h5>
                    </div>
                    <div class="modal-body">
                        <!-- Form tạo sản phẩm -->
                        <form method="post" enctype="multipart/form-data" action="<?= BASE_URL ?>/product/store" onsubmit="return validate_form()">
                            <span class="error text-danger"></span>
                            <div class="form-group">
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Tên sản phẩm">
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="0">Chọn danh mục</option>
                                    <?php foreach ($data['categorys'] as $item) :?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="thumb" name="thumb">
                                        <label class="custom-file-label image_name"></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <span class="show_image"></span>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="add-product" class="btn btn-primary" value="Thêm sản phẩm" id="btn-add">
                            </div>
                        </form>
                        <!-- Hết form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
