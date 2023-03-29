<?php
  include_once "layouts/header.php";
  $strategy_type = $_GET['strategy_type'];
  $strategy_name = $_GET['strategy_name'];
  $annual_fee = [
    'Lite' => 249,
    'Smart' => 749,
    'Advance' => "1,449",
    'Premium' => "2,449"
  ];
  $min_capital = [
    'Lite' => 150,
    'Smart' => "2,500",
    'Advance' => "5,000",
    'Premium' => "10,000"
  ]
?>
  <section class="bg-white text-center px-5 px-sm-5 px-md-5 px-lg-10 py-1 my-4">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 fs-7">
        <div class="bg-secondary-gradient ps-4 py-0 d-flex w-100">
          <img src="./assets/images/icons/target.png" alt="" class="my-auto" style="width: 1.8em;height: 1.8em;">
          <div class="text-black my-2 ms-2">
            <span class="fs-4">SUNA <span class="text-uppercase"><?= $strategy_type?></span></span>
            <span class="fw-bold"><span class="fs-4">$<?= $annual_fee[$strategy_type]?></span>
              <span class="fs-6"><?= $ln['annual_fees'] ?> </span>
              <span class="fs-5 ms-3"><?= $ln['min_capital'] ?>- $<?= $min_capital[$strategy_type]?></span>
            </span> 
          </div>          
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 fs-7 my-auto">
        <a href="" class="text-decoration-none d-flex w-100">
          <button class="btn bg-success text-uppercase text-white text-center px-auto d-flex mx-2 py-2 w-100 fs-6 d-flex justify-content-center"><?= $ln['free_activation'] ?></button>
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 fs-7 my-auto">
        <a href="" class="text-decoration-none d-flex w-100">
          <button class="btn bg-secondary-color text-uppercase text-black text-center px-auto d-flex mx-2 py-2 w-100 fs-6 d-flex justify-content-center"><?= $ln['buy_better_fee'] ?></button>
        </a>
      </div>
    </div>
  </section>
  <iframe src="https://analysis.suna.ai/public/<?= $strategy_name ?>" title="Suna Analysis <?= $strategy_type ?>" class="w-100"  scrolling="no" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+20)+'px'" style="min-height: 250rem">
  </iframe>
<?php
  include_once "layouts/footer.php";
?>
