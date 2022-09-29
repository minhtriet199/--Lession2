<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title><?= $data['title'] ?></title>
</head>
<body>  
    <div class="container mt-5 ">
        <div class="row mt-5">
           <div class="col-lg-10">
                <div class="input-group">
                    <input type="text" class="form-control " placeholder="Tìm kiếm" name="search-box" id="search-box">
                    <div class="input-group-append">
                        <select class="form-select" id="type">
                            <option value="category">Danh mục</option>
                            <option value="product">Sản phẩm</option>
                        </select>
                    </div>
                </div>
           </div>
           <div class="col-lg-2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    <i class="fa fa-solid fa-circle-plus"></i> Thêm sản phẩm
                </button>
            </div>
        </div>
        <div class="mt-4">
            <?php
                require_once 'mvc/views/pages/'. $data['pages'] .'.php';
                include 'mvc/views/modal/add_product.php';
            ?>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo BASE_URL; ?>/public/assets/js/main.js"></script>
<script>
    $(document).ready(function(){
        $('#search-box').keyup(function(e){
            const search = $('input[name="search-box"]').val();
            const type = $('#type :selected').val();  
            if(search != ''){
                $.ajax({
                    url: `<?= BASE_URL ?>/home/search`,
                    method: "POST",
                    data:{
                        search:search,
                        type:type,
                    },
                    success: function(data){
                        $("#search_result").show();
                        $('#search_result').html(data);
                        $("#product_list").hide();  
                    }
                });
            }
            else{
                $("#product_list").show();  
                $("#search_result").hide();
            }
        });
    });
</script> 