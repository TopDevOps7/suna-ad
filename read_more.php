<?php
  include_once "layouts/header.php";
?>

  <section class="bg-white px-54 px-sm-5 px-md-5 px-lg-10">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 pe-md-4 pd-sm-0 mt-3">
        <h2 class="fw-bold text-primary-color">
          <?= $ln['section_title_readmore_1'] ?>
        </h2>
        <p class="text-primary-color fs-5 my-4">
          <?= $ln['section_text_readmore_1'] ?>
        </p>
        <a href="" class="text-decoration-none d-flex"><button class="btn bg-primary-color text-white text-center px-5"><?= $ln['get_started_now'] ?></button></a>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 ps-md-4 ps-sm-2 mt-3">
        <img src="./assets/images/section_7.png" alt="section1" class="w-100">
      </div>
    </div>
  </section>
  <section class="bg-img bg-img-6 px-54 px-sm-5 px-md-5 px-lg-10">
    <h2 class="fw-bold text-white">
      <?= $ln['section_title_readmore_2'] ?>
    </h2>
    <p class="text-white fs-5 my-4">
      <?= $ln['section_text_readmore_2'] ?>
    </p>
    <p class="text-white fs-5 my-4">
      <?= $ln['section_text_readmore_3'] ?>
    </p>
    <a href="" class="text-decoration-none d-flex"><button class="btn bg-secondary-color text-black text-center px-5 d-flex mx-auto"><?= $ln['join_now'] ?></button></a>
  </section>
  <section class="bg-white px-54 px-sm-5 px-md-5 px-lg-10">
    <div class="row">
      <h2 class="fw-bold text-primary-color text-center mb-3"><?= $ln['section_title_readmore_3'] ?></h2>
      <div class="col-sm-12 col-md-6 col-lg-6 pe-md-4 pd-sm-0 mt-3">
        <img src="./assets/images/section_8.png" alt="section1" class="w-100">
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 ps-md-4 ps-sm-2 mt-3">
        <h2 class="fw-bold fs-5 text-primary-color">
          <?= $ln['section_title_readmore_4'] ?>
        </h2>
        <p class="text-primary-color fs-6 my-4">
          <?= $ln['section_text_readmore_4'] ?>
        </p>
        <a href="" class="text-decoration-none d-flex"><button class="btn bg-primary-color text-white text-center px-5"><?= $ln['start_immediately'] ?></button></a>
      </div>
    </div>
  </section>

<?php
  include_once "layouts/footer.php";
?>
