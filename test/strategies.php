<?php
  include_once "layouts/header.php";
?>
  <section class="bg-img bg-img-3 px-54 px-sm-5 px-md-5 px-lg-10 text-center">
    <h2 class="fw-bold text-white text-center">
      <?= $ln['section_title_home_7'] ?>
    </h2>
    <h2 class="fw-bold text-secondary-color text-center">
      <?= $ln['section_title_home_8'] ?>
    </h2>
    <p class="text-white fs-5 my-4 w-50 mx-auto">
      <?= $ln['section_text_home_9'] ?>
    </p>
  </section>
  <section class="bg-white px-54 px-sm-5 px-md-5 px-lg-10 py-4">
    <p class="text-primary-color fs-5 my-4">
      <?= $ln['section_text_home_10'] ?>
    </p>
    <p class="text-primary-color fs-4 fw-bold my-3">
      <?= $ln['section_title_home_10'] ?>
    </p>
    <div class="d-flex my-1">
      <img src="./assets/images/icons/cate_item.png" alt="" style="width:1.5em; height: 1.5em;">
      <p class="text-black fs-7 ms-4 mb-1">
        <?= $ln['section_text_home_11'] ?>
      </p>
    </div>    
    <div class="d-flex">
      <img src="./assets/images/icons/cate_item.png" alt="" style="width:1.5em; height: 1.5em;">
      <p class="text-black fs-7 ms-4">
        <?= $ln['section_text_home_12'] ?>
      </p>
    </div>
  </section>
  <section class="bg-white px-54 px-sm-5 px-md-5 px-lg-10 py-4">
    <div class="row flex-row-reverse">
      <div class="col-12 col-sm-7 col-md-9 col-lg-9 col-xl-9 col-xxl-9 px-3 ps-md-4 ps-sm-3 ps-lg-3 ps-xl-4 ps-xxl-5 fs-7">
        <div class="bg-secondary-gradient ps-4 py-0 d-flex w-50">
          <img src="./assets/images/icons/target.png" alt="" class="my-auto" style="width: 1.8em;height: 1.8em;">
          <h3 class="text-black my-2 fw-bold ms-2">
            SUNA LITE $249
          </h3>
          <div class="bg-red text-white text-center px-3 pb-1 d-flex fs-6 rounded-2 ms-4 my-auto">comming soon</div>
        </div>
        <h5 class="text-black mt-3 mb-2 fw-bold">
          <?= $ln['min_capital'] ?>- $150
        </h5>
        <p class="text-black my-4">
          <?= $ln['section_text_lite_1'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_lite_2'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_lite_3'] ?>
        </p>
        <div class="d-flex justify-content-center mt-5">
          <a href="" class="text-decoration-none d-flex">
            <button class="btn bg-success text-white text-center px-5 d-flex mx-2 py-1"><?= $ln['free_activation'] ?></button>
          </a>
          <a href="" class="text-decoration-none d-flex">
            <button class="btn bg-secondary-color text-black text-center px-3 d-flex mx-2 py-1"><?= $ln['start_with_better_fee'] ?></button>
          </a>
        </div>
      </div>
      <div class="col-12 col-sm-5 col-md-3 col-lg-3 col-xl-3 col-xxl-3 px-3 pe-md-4 pe-sm-3 pe-lg-3 pe-xl-4 pe-xxl-5 pt-4">
        <div class="bg-white p-3 rounded shadow-sm h-auto position-relative">
          <img src="./assets/images/icons/award.png" alt="" class="position-absolute" style="width:2.25em; top:-1.9em; right: -1.2em;">
          <div class="d-flex justify-content-between">
            <div class="text-right">
              <h4 class="text-primary-color fw-light">Suna <span class="fw-bold">Lite</span></h4>
              <hr class="me-auto my-0 bg-primary-color w-25 opacity-100" style="height:0.3em;">
            </div>
            <div class="text-right">
              <div class="d-flex justify-content-end">
                <img src="./assets/images/icons/rounded_euro.png" alt="euro" style="width:1.6em; height: 1.6em;" class="d-flex my-auto">
                <h4 class="fw-bold text-primary-color ms-2 mb-0">$249</h4>
              </div>
              <p class="text-primary-color text-end fs-6 fw-bold mb-1"><?= $ln['annual_fees'] ?></p>
            </div>
          </div>
          <p class="text-primary-color fs-6 d-flex mb-2 fw-light"><?= $ln['min_capital'] ?> <img src="./assets/images/icons/rounded_euro.png" alt="euro" class="mx-1 d-flex my-auto" style="width: 1.1em; height: 1.1em;">150</p>
          <hr class="section_divide_horizental">
          <div class="action_buttons px-2 mt-2">
            <a href="./strategy_detail?strategy_type=Lite&strategy_name=6sym-2018" class="text-decoration-none d-flex">
              <button class="btn bg-primary-color text-white text-uppercase text-center px-1 my-2 fs-7 w-100 px-quto"><?= $ln['history'] ?></button>
            </a>
            <a href="" class="text-decoration-none d-flex">
              <button class="btn bg-success text-white text-uppercase text-center px-1 my-2 fs-7 w-100 px-quto"><?= $ln['pay_2years'] ?></button>
            </a>
            <a href="" class="text-decoration-none d-flex">
              <button class="btn bg-secondary-color text-black text-uppercase text-center px-3 my-2 fs-7 w-100 px-quto"><?= $ln['buy_now'] ?></button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-white px-54 px-sm-5 px-md-5 px-lg-10 py-4">
    <div class="row flex-row-reverse">
      <div class="col-12 col-sm-7 col-md-9 col-lg-9 col-xl-9 col-xxl-9 px-3 ps-md-4 ps-sm-3 ps-lg-3 ps-xl-4 ps-xxl-5 fs-7">
        <div class="bg-secondary-gradient ps-4 py-0 d-flex w-50">
          <img src="./assets/images/icons/target.png" alt="" class="my-auto" style="width: 1.8em;height: 1.8em;">
          <h3 class="text-black my-2 fw-bold ms-2">
            SUNA SMART $749
          </h3>
          <div class="bg-red text-white text-center px-3 pb-1 d-flex fs-6 rounded-2 ms-4 my-auto">comming soon</div>
        </div>
        <h5 class="text-black mt-3 mb-2 fw-bold">
          <?= $ln['min_capital'] ?>- $2,500
        </h5>
        <p class="text-black my-4">
          <?= $ln['section_text_smart_1'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_smart_2'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_smart_3'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_smart_4'] ?>
        </p>
        <div class="d-flex justify-content-center mt-5">
          <a href="" class="text-decoration-none d-flex">
            <button class="btn bg-success text-white text-center px-5 d-flex mx-2 py-1"><?= $ln['free_activation'] ?></button>
          </a>
          <a href="" class="text-decoration-none d-flex">
            <button class="btn bg-secondary-color text-black text-center px-3 d-flex mx-2 py-1"><?= $ln['start_with_better_fee'] ?></button>
          </a>
        </div>
      </div>
      <div class="col-12 col-sm-5 col-md-3 col-lg-3 col-xl-3 col-xxl-3 px-3 pe-md-4 pe-sm-3 pe-lg-3 pe-xl-4 pe-xxl-5 pt-4">
        <div class="bg-white p-3 rounded shadow-sm h-auto position-relative">
          <img src="./assets/images/icons/gold_medal.png" alt="" class="position-absolute" style="width:2.25em; top:-1.9em; right: -1.2em;">
          <div class="d-flex justify-content-between">
            <div class="text-right">
              <h4 class="text-primary-color fw-light">Suna <span class="fw-bold">Smart</span></h4>
              <hr class="me-auto my-0 bg-primary-color w-25 opacity-100" style="height:0.3em;">
            </div>
            <div class="text-right">
              <div class="d-flex justify-content-end">
                <img src="./assets/images/icons/rounded_euro.png" alt="euro" style="width: 1.3em; height: 1.3em;" class="d-flex my-auto">
                <h4 class="fw-bold text-primary-color ms-2 mb-0">$749</h4>
              </div>
              <p class="text-primary-color text-end fs-6 fw-bold mb-1"><?= $ln['annual_fees'] ?></p>
            </div>
          </div>
          <p class="text-primary-color fs-6 d-flex mb-2 fw-light"><?= $ln['min_capital'] ?> <img src="./assets/images/icons/rounded_euro.png" alt="euro" class="mx-1 d-flex my-auto" style="width: 1.1em; height: 1.1em;">2,500</p>
          <hr class="section_divide_horizental">
          <div class="action_buttons px-2 mt-2">
            <a href="./strategy_detail?strategy_type=Smart&strategy_name=6sym-2018" class="text-decoration-none d-flex">
              <button class="btn bg-primary-color text-white text-uppercase text-center px-1 my-2 fs-7 w-100 px-quto"><?= $ln['history'] ?></button>
            </a>
            <a href="" class="text-decoration-none d-flex">
              <button class="btn bg-success text-white text-uppercase text-center px-1 my-2 fs-7 w-100 px-quto"><?= $ln['pay_2years'] ?></button>
            </a>
            <a href="" class="text-decoration-none d-flex">
              <button class="btn bg-secondary-color text-black text-uppercase text-center px-3 my-2 fs-7 w-100 px-quto"><?= $ln['buy_now'] ?></button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-white px-54 px-sm-5 px-md-5 px-lg-10 py-4">
    <div class="row flex-row-reverse">
      <div class="col-12 col-sm-7 col-md-9 col-lg-9 col-xl-9 col-xxl-9 px-3 ps-md-4 ps-sm-3 ps-lg-3 ps-xl-4 ps-xxl-5 fs-7">
        <div class="bg-secondary-gradient ps-4 py-0 d-flex w-50">
          <img src="./assets/images/icons/target.png" alt="" class="my-auto" style="width: 1.8em;height: 1.8em;">
          <h3 class="text-black my-2 fw-bold ms-2">
            SUNA ADVANCE $1,449
          </h3>
          <div class="bg-red text-white text-center px-3 pb-1 d-flex fs-6 rounded-2 ms-4 my-auto">comming soon</div>
        </div>
        <h5 class="text-black mt-3 mb-2 fw-bold">
          <?= $ln['min_capital'] ?>- $5,000
        </h5>
        <p class="text-black my-4">
          <?= $ln['section_text_advance_1'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_advance_2'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_advance_3'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_advance_4'] ?>
        </p>
        <div class="d-flex justify-content-center mt-5">
          <a href="" class="text-decoration-none d-flex">
            <button class="btn bg-success text-white text-center px-5 d-flex mx-2 py-1"><?= $ln['free_activation'] ?></button>
          </a>
          <a href="" class="text-decoration-none d-flex">
            <button class="btn bg-secondary-color text-black text-center px-3 d-flex mx-2 py-1"><?= $ln['start_with_better_fee'] ?></button>
          </a>
        </div>
      </div>
      <div class="col-12 col-sm-5 col-md-3 col-lg-3 col-xl-3 col-xxl-3 px-3 pe-md-4 pe-sm-3 pe-lg-3 pe-xl-4 pe-xxl-5 pt-4">
        <div class="bg-white p-3 rounded shadow-sm h-auto position-relative">
          <img src="./assets/images/icons/trophy_cup.png" alt="" class="position-absolute" style="width:2.25em; top:-1.9em; right: -1.2em;">
          <div class="d-flex justify-content-between">
            <div class="text-right">
              <h4 class="text-primary-color fw-light">Suna <span class="fw-bold">Advance</span></h4>
              <hr class="me-auto my-0 bg-primary-color w-25 opacity-100" style="height:0.3em;">
            </div>
            <div class="text-right">
              <div class="d-flex justify-content-end">
                <img src="./assets/images/icons/rounded_euro.png" alt="euro" style="width:1.6em; height: 1.6em;" class="d-flex my-auto">
                <h4 class="fw-bold text-primary-color ms-2 mb-0">$1,449</h4>
              </div>
              <p class="text-primary-color text-end fs-6 fw-bold mb-1"><?= $ln['annual_fees'] ?></p>
            </div>
          </div>
          <p class="text-primary-color fs-6 d-flex mb-2 fw-light"><?= $ln['min_capital'] ?> <img src="./assets/images/icons/rounded_euro.png" alt="euro" class="mx-1 d-flex my-auto" style="width: 1.1em; height: 1.1em;">5,000</p>
          <hr class="section_divide_horizental">
          <div class="action_buttons px-2 mt-2">
            <a href="./strategy_detail?strategy_type=Advance&strategy_name=6sym-2018" class="text-decoration-none d-flex">
              <button class="btn bg-primary-color text-white text-uppercase text-center px-1 my-2 fs-7 w-100 px-quto"><?= $ln['history'] ?></button>
            </a>
            <a href="" class="text-decoration-none d-flex">
              <button class="btn bg-success text-white text-uppercase text-center px-1 my-2 fs-7 w-100 px-quto"><?= $ln['pay_2years'] ?></button>
            </a>
            <a href="" class="text-decoration-none d-flex">
              <button class="btn bg-secondary-color text-black text-uppercase text-center px-3 my-2 fs-7 w-100 px-quto"><?= $ln['buy_now'] ?></button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-white px-54 px-sm-5 px-md-5 px-lg-10 py-4">
    <div class="row flex-row-reverse">
      <div class="col-12 col-sm-7 col-md-9 col-lg-9 col-xl-9 col-xxl-9 px-3 ps-md-4 ps-sm-3 ps-lg-3 ps-xl-4 ps-xxl-5 fs-7">
        <div class="bg-secondary-gradient ps-4 py-0 d-flex w-50">
          <img src="./assets/images/icons/target.png" alt="" class="my-auto" style="width: 1.8em;height: 1.8em;">
          <h3 class="text-black my-2 fw-bold ms-2">
            SUNA PREMIUM $2,449
          </h3>
          <div class="bg-red text-white text-center px-3 pb-1 d-flex fs-6 rounded-2 ms-4 my-auto">comming soon</div>
        </div>
        <h5 class="text-black mt-3 mb-2 fw-bold">
          <?= $ln['min_capital'] ?>- $10,000
        </h5>
        <p class="text-black my-4">
          <?= $ln['section_text_premium_1'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_premium_2'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_premium_3'] ?>
        </p>
        <p class="text-black my-4">
          <?= $ln['section_text_premium_4'] ?>
        </p>
        <div class="d-flex justify-content-center mt-5">
          <a href="" class="text-decoration-none d-flex">
            <button class="btn bg-success text-white text-center px-5 d-flex mx-2 py-1"><?= $ln['free_activation'] ?></button>
          </a>
          <a href="" class="text-decoration-none d-flex">
            <button class="btn bg-secondary-color text-black text-center px-3 d-flex mx-2 py-1"><?= $ln['start_with_better_fee'] ?></button>
          </a>
        </div>
      </div>
      <div class="col-12 col-sm-5 col-md-3 col-lg-3 col-xl-3 col-xxl-3 px-3 pe-md-4 pe-sm-3 pe-lg-3 pe-xl-4 pe-xxl-5 pt-4">
        <div class="bg-white p-3 rounded shadow-sm h-auto position-relative">
          <img src="./assets/images/icons/trophy_star.png" alt="" class="position-absolute" style="width:2.25em; top:-1.9em; right: -1.2em;">
          <div class="d-flex justify-content-between">
            <div class="text-right">
              <h4 class="text-primary-color fw-light">Suna <span class="fw-bold">Premium</span></h4>
              <hr class="me-auto my-0 bg-primary-color w-25 opacity-100" style="height:0.3em;">
            </div>
            <div class="text-right">
              <div class="d-flex justify-content-end">
                <img src="./assets/images/icons/rounded_euro.png" alt="euro" style="width:1.6em; height: 1.6em;" class="d-flex my-auto">
                <h4 class="fw-bold text-primary-color ms-2 mb-0">$2,449</h4>
              </div>
              <p class="text-primary-color text-end fs-6 fw-bold mb-1"><?= $ln['annual_fees'] ?></p>
            </div>
          </div>
          <p class="text-primary-color fs-6 d-flex mb-2 fw-light"><?= $ln['min_capital'] ?> <img src="./assets/images/icons/rounded_euro.png" alt="euro" class="mx-1 d-flex my-auto" style="width: 1.1em; height: 1.1em;">10,000</p>
          <hr class="section_divide_horizental">
          <div class="action_buttons px-2 mt-2">
            <a href="./strategy_detail?strategy_type=Premium&strategy_name=6sym-2018" class="text-decoration-none d-flex">
              <button class="btn bg-primary-color text-white text-uppercase text-center px-1 my-2 fs-7 w-100 px-quto"><?= $ln['history'] ?></button>
            </a>
            <a href="" class="text-decoration-none d-flex">
              <button class="btn bg-success text-white text-uppercase text-center px-1 my-2 fs-7 w-100 px-quto"><?= $ln['pay_2years'] ?></button>
            </a>
            <a href="" class="text-decoration-none d-flex">
              <button class="btn bg-secondary-color text-black text-uppercase text-center px-3 my-2 fs-7 w-100 px-quto"><?= $ln['buy_now'] ?></button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-img bg-img-8 px-54 px-sm-5 px-md-5 px-lg-10 mt-5">
    <p class="text-white fs-6 my-4">
      <?= $ln['section_text_future_1'] ?>
    </p>
    <p class="text-white fs-6 my-4">
      <?= $ln['section_text_future_2'] ?>
    </p>
    <p class="text-white fs-6 my-4">
      <?= $ln['section_text_future_3'] ?>
    </p>
    <p class="text-white fs-6 my-4">
      <?= $ln['section_text_future_4'] ?>
    </p>
    <p class="text-white fs-6 my-4">
      <?= $ln['section_text_future_5'] ?>
    </p>
  </section>
  <section class="bg-secondary-gradient-bar row justify-content-start px-54 px-sm-5 px-md-5 px-lg-10 py-1 position-relative py-3">
    <img src="./assets/images/guaranteed.png" alt="" class="position-absolute" style="right: 5em; top: -3em; width: 12em; height: auto;">
    <div class="col-12 col-sm-11 col-md-11 col-lg-11 col-xl-11 col-xxl-11 d-flex">
      <div class="d-flex">
        <img src="./assets/images/icons/cate_item.png" alt="" width=40 height=40 class="my-auto">
      </div>
      <div class="text-left ms-3">
        <p class="text-primary-color fs-4 fw-bold mb-0">
          <?= $ln['section_text_guarantee_1'] ?>
        </p>
        <p class="text-black fs-6 mb-0">
          <?= $ln['section_text_guarantee_2'] ?>
        </p>
      </div>
    </div>
  </section>
<?php
  include_once "layouts/footer.php";
?>
