<section class="text-lg-start">
  <div class="card mb-3">
    <div class="row g-0 d-flex">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="<?php echo BASE_URL ?>/public/upload/<?= $data['products']['thumb']?>"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">
            <div>
                <h1><?= $data['products']['product_name'] ?></h1>
                <h4><?= $data['products']['category_name']?></h4>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>