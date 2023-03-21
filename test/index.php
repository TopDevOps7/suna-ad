<?php
  include_once "layouts/header.php";
?>
  <section class="bg-secondary-color text-center px-5 px-sm-5 px-md-5 px-lg-10 py-1">
    <p class="text-black text-uppercase fs-6 my-0">
      <?= $ln['section_title_home_3'] ?>
    </p>
  </section>
  <section class="bg-white px-5 px-sm-5 px-md-5 px-lg-10">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 pe-md-4 pd-sm-0 mt-3">
        <img src="./assets/images/section_2.png" alt="section1" class="w-100">
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 ps-md-4 ps-sm-2 mt-3">
        <h2 class="fw-bold text-black">
          <?= $ln['section_title_home_4'] ?>
        </h2>
        <p class="text-black fs-6 my-4">
          <?= $ln['section_text_home_1'] ?>
        </p>
        <p class="text-black fs-6 my-4">
          <?= $ln['section_text_home_2'] ?>
        </p>
        <p class="text-black fs-6 my-4">
          <?= $ln['section_text_home_3'] ?>
        </p>
        <a href="./read_more"><button class="btn bg-primary-color text-white uppercase text-center px-5"><?= $ln['read_more'] ?></button></a>
      </div>
    </div>
  </section>
  <section class="bg-img bg-img-2 px-5 px-sm-5 px-md-5 px-lg-10">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 pe-md-4 pd-sm-0 mt-3">
        <h2 class="fw-bold text-white">
          <?= $ln['section_title_home_5'] ?>
        </h2>
        <p class="text-white fs-7 my-4">
          <?= $ln['section_text_home_4'] ?>
        </p>
        <p class="text-white fs-7 my-4">
          <?= $ln['section_text_home_5'] ?>
        </p>        
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 ps-md-4 ps-sm-2 mt-3">
        <img src="./assets/images/section_3.png" alt="section1" class="w-100">
      </div>
    </div>
    <div class="row mt-5 text-center overview fs-7">
      <div class="col-sm-12 col-md-4 col-lg-4 py-5 px-md-3 px-lg-5 px-sm-5 bg-white-10 border border-white rounded-start border-end-0">
        <img src="./assets/images/icons/home_1.png" alt="section1" style="width: 5em;">
        <p class="text-white mt-sm-5 mb-sm-0 my-md-5 my-lg-4 px-1">
          <?= $ln['section_text_home_6'] ?>
        </p>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 py-5 px-md-3 px-lg-5 px-sm-5 bg-secondary-color rounded">
        <img src="./assets/images/icons/home_2.png" alt="section1" style="width: 5em;">
        <p class="text-black fs-5 my-5 px-3">
          <?= $ln['section_text_home_7'] ?>
        </p>
        <hr class="mx-auto w-25 bg-black opacity-50" style="height: 0.2em;">
      </div>
      <div class="col-sm-12 col-md-4 col-lg-4 py-5 px-md-3 px-lg-5 px-sm-5 bg-white-10 border border-white rounded-end border-start-0">
        <img src="./assets/images/icons/home_3.png" alt="section1" class="my-sm-0 my-md-3 my-lg-3" style="width: 5em;">
        <p class="text-white mt-sm-5 mb-sm-0 my-md-5 my-lg-4 px-1">
          <?= $ln['section_text_home_8'] ?>
        </p>
      </div>
  </section>
  <section class="bg-red d-flex justify-content-between px-5 px-sm-5 px-md-5 px-lg-10 py-1">
    <p class="text-white text-uppercase fs-6 my-auto">
      <?= $ln['section_title_home_6'] ?>
    </p>
    <a href="" class="text-decoration-none d-flex position-relative" style="width: fit-content;">
      <div class="bg-red text-white text-center px-2 pb-1 d-flex fs-7 position-absolute rounded-2" style="top:-0.8em; right:-0.8em;">comming soon</div>
      <button class="btn bg-secondary-color text-black text-center px-5 my-1"><?= $ln['get_started'] ?></button>
    </a>
  </section> 
  <section class="bg-img bg-img-3 px-5 px-sm-5 px-md-5 px-lg-10 text-center">
    <h2 class="fw-bold text-white text-center">
      <?= $ln['section_title_home_7'] ?>
    </h2>
    <h2 class="fw-bold text-secondary-color text-center">
      <?= $ln['section_title_home_8'] ?>
    </h2>
    <p class="text-white fs-5 my-4 w-75 mx-auto">
      <?= $ln['section_text_home_9'] ?>
    </p>
    <a href="" class="text-decoration-none d-flex position-relative justify-content-center" style="width: fit-content;">
      <div class="bg-red text-white text-center px-2 pb-1 d-flex fs-7 position-absolute rounded-2" style="top:-0.8em; right:-0.8em;">comming soon</div>
      <button class="btn bg-secondary-color text-uppercase text-black text-center px-5 my-1"><?= $ln['activate_your_strategy'] ?></button>
    </a>
  </section>
  <section class="bg-white px-5 px-sm-5 px-md-5 px-lg-10">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-6 pe-md-4 pd-sm-0 mt-3">
        <h4 class="text-primary-color">
          <?= $ln['section_title_home_9'] ?> <span class="btn bg-secondary-color text-primary-color text-center px-2 my-10 ms-2 fw-normal" style="font-size: 0.45em;"><?= $ln['pay_off'] ?></span>
        </h4>
        <p class="text-black fs-7 my-4">
          <?= $ln['section_text_home_10'] ?>
        </p>
        <p class="text-primary-color fs-5 my-3">
          <?= $ln['section_title_home_10'] ?>
        </p>
        <div class="d-flex my-1">
          <img src="./assets/images/icons/cate_item.png" alt="" style="width: 1.3em; height: 1.3em;" class="d-flex my-auto">
          <p class="text-black fs-7 ms-4 mb-0">
            <?= $ln['section_text_home_11'] ?>
          </p>
        </div>    
        <div class="d-flex">
          <img src="./assets/images/icons/cate_item.png" alt="" style="width: 1.3em; height: 1.3em;" class="d-flex my-auto">
          <p class="text-black fs-7 ms-4 mb-0">
            <?= $ln['section_text_home_12'] ?>
          </p>
        </div>    
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6 ps-md-4 ps-sm-2 mt-3">
        <img src="./assets/images/section_4.png" alt="section1" class="w-100">
      </div>
    </div>
  </section>
  <section class="bg-white row px-5 px-sm-5 px-md-5 px-lg-10 pt-0">
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 p-2">
      <div class="bg-primary-color p-3 rounded shadow-sm h-100">
        <div class="d-flex justify-content-between">
          <div class="text-right">
            <h5 class="text-white fw-lighter">Suna <span class="fw-bold">Light</span></h5>
            <hr class="me-auto my-0 bg-white w-25 opacity-100" style="height: 0.2em;">
          </div>
          <div class="text-right">
            <div class="d-flex justify-content-end">
              <img src="./assets/images/icons/rounded_euro.png" alt="euro" style="width:1.1em; height:1.1em;" class="d-flex my-auto">
              <h5 class="fw-bold text-white ms-1 mb-0">$249</h5>
            </div>
            <p class="text-white text-end fs-7 fw-bold mb-1"><?= $ln['annual_fees'] ?></p>
          </div>
        </div>
        <p class="text-white fs-7 d-flex mb-0 fw-light"><?= $ln['min_capital'] ?> <img src="./assets/images/icons/rounded_euro.png" alt="euro" class="mx-1 d-flex my-auto" style="width:1em; height: 1em;">150</p>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 p-2">
      <div class="bg-white p-3 rounded shadow-sm h-100">
        <div class="d-flex justify-content-between">
          <div class="text-right">
            <h5 class="text-primary-color fw-light">Suna <span class="fw-bold">Smart</span></h5>
            <hr class="me-auto my-0 bg-primary-color w-25 opacity-100" style="height: 0.2em;">
          </div>
          <div class="text-right">
            <div class="d-flex justify-content-end">
              <img src="./assets/images/icons/rounded_euro.png" alt="euro" style="width:1.1em; height:1.1em;" class="d-flex my-auto">
              <h5 class="fw-bold text-primary-color ms-1 mb-0">$749</h5>
            </div>
            <p class="text-primary-color text-end fs-7 fw-bold mb-1"><?= $ln['annual_fees'] ?></p>
          </div>
        </div>
        <p class="text-primary-color fs-7 d-flex mb-0 fw-light"><?= $ln['min_capital'] ?> <img src="./assets/images/icons/rounded_euro.png" alt="euro" class="mx-1 d-flex my-auto" style="width:1em; height: 1em;">2,500</p>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 p-2">
      <div class="bg-white p-3 rounded shadow-sm h-100">
        <div class="d-flex justify-content-between">
          <div class="text-right">
            <h5 class="text-primary-color fw-light">Suna <span class="fw-bold">Advance</span></h5>
            <hr class="me-auto my-0 bg-primary-color w-25 opacity-100" style="height: 0.2em;">
          </div>
          <div class="text-right">
            <div class="d-flex justify-content-end">
              <img src="./assets/images/icons/rounded_euro.png" alt="euro" style="width:1.1em; height:1.1em;" class="d-flex my-auto">
              <h5 class="fw-bold text-primary-color ms-1 mb-0">$1,449</h5>
            </div>
            <p class="text-primary-color text-end fs-7 fw-bold mb-1"><?= $ln['annual_fees'] ?></p>
          </div>
        </div>
        <p class="text-primary-color fs-7 d-flex mb-0 fw-light"><?= $ln['min_capital'] ?> <img src="./assets/images/icons/rounded_euro.png" alt="euro" class="mx-1 d-flex my-auto" style="width:1em; height: 1em;">5,000</p>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 p-2">
      <div class="bg-white p-3 rounded shadow-sm h-100">
        <div class="d-flex justify-content-between">
          <div class="text-right">
            <h5 class="text-primary-color fw-light">Suna <span class="fw-bold">Premium</span></h5>
            <hr class="me-auto my-0 bg-primary-color w-25 opacity-100" style="height: 0.2em;">
          </div>
          <div class="text-right">
            <div class="d-flex justify-content-end">
              <img src="./assets/images/icons/rounded_euro.png" alt="euro" style="width:1.1em; height:1.1em;" class="d-flex my-auto">
              <h5 class="fw-bold text-primary-color ms-1 mb-0">$2,449</h5>
            </div>
            <p class="text-primary-color text-end fs-7 fw-bold mb-1"><?= $ln['annual_fees'] ?></p>
          </div>
        </div>
        <p class="text-primary-color fs-7 d-flex mb-0 fw-light"><?= $ln['min_capital'] ?> <img src="./assets/images/icons/rounded_euro.png" alt="euro" class="mx-1 d-flex my-auto" style="width:1em; height: 1em;">10,000</p>
      </div>
    </div>
  </section>
  <div class="bg-white shadow-sm mb-1 py-4">
    <div class="row px-5 px-sm-5 px-md-5 px-lg-10">
      <div class="d-flex col-sm-12 col-md-8 col-lg-8 px-1">
        <img src="./assets/images/icons/cate_item.png" alt="" style="width: 3em; height:3em;" class="d-flex my-auto">
        <div class="ms-4">
          <h4 class="text-primary-color mb-0">
            <?= $ln['section_title_home_11'] ?>
          </h4>
          <p class="text-black mt-1 mb-0 fs-7">
            <?= $ln['section_text_home_13'] ?>
          </p>
        </div>
      </div>
      <div class="d-flex col-sm-12 col-md-4 col-lg-4 ps-md-3 ps-sm-0 justify-content-end py-sm-2">
        <a href="" class="text-decoration-none d-flex position-relative" style="width: fit-content;">
          <div class="bg-red text-white text-center px-2 pb-1 d-flex fs-7 position-absolute rounded-2" style="top:-0.8em; right:-0.8em;">comming soon</div>
          <button class="btn bg-primary-color text-uppercase text-white text-center px-5 my-auto ms-auto"><?= $ln['start_your_trading_now'] ?></button>
        </a>
      </div>
    </div>
  </div>
  <section class="bg-white text-center px-5 px-sm-5 px-md-5 px-lg-10">
    <h3 class="text-primary-color"><?= $ln['section_title_home_12'] ?></h3>
    <p class="text-primary-color fs-6 w-50 mx-auto"><?= $ln['section_text_home_14'] ?></p>
    <div class="row fs-7">
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-img bg-img-section-1 p-3h-100 position-relative">
          <img src="./assets/images/bg-img-section-1.png" alt="section1" class="w-100">
          <div class="bg-black-gradient position-absolute row ms-0 w-100">
            <div class="col-2 ps-3 pe-2 d-flex">
              <img src="./assets/images/icons/globe.png" alt="" class="w-100 my-auto d-flex">
            </div>
            <div class="col-10 px-2 d-flex lh-sm">
              <p class="my-auto text-white fw-lighter fs-7 text-start"><?= $ln['section_text_home_15'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-img bg-img-section-1 p-3h-100 position-relative">
          <img src="./assets/images/bg-img-section-2.png" alt="section1" class="w-100">
          <div class="bg-black-gradient position-absolute row ms-0 w-100">
            <div class="col-2 ps-3 pe-2 d-flex">
              <img src="./assets/images/icons/hourglass.png" alt="" class="w-100 my-auto d-flex">
            </div>
            <div class="col-10 px-2 d-flex lh-sm flex-column">
              <p class="mt-auto mb-1 text-white fw-bolder fs-7 text-start"><?= $ln['section_text_home_16'] ?></p>
              <p class="mb-auto text-white fw-lighter fs-7 text-start"><?= $ln['section_text_home_17'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-img bg-img-section-3 p-3h-100 position-relative">
          <img src="./assets/images/bg-img-section-3.png" alt="section1" class="w-100">
          <div class="bg-black-gradient position-absolute row ms-0 w-100">
            <div class="col-2 ps-3 pe-2 d-flex">
              <img src="./assets/images/icons/server.png" alt="" class="w-100 my-auto d-flex">
            </div>
            <div class="col-10 px-2 d-flex lh-sm d-flex">
              <p class="my-auto text-white fw-lighter fs-7 text-start"><?= $ln['section_text_home_18'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-img bg-img-section-3 p-3h-100 position-relative">
          <img src="./assets/images/bg-img-section-4.png" alt="section1" class="w-100">
          <div class="bg-black-gradient position-absolute row ms-0 w-100">
            <div class="col-2 ps-3 pe-2 d-flex">
              <img src="./assets/images/icons/stock.png" alt="" class="w-100 my-auto d-flex">
            </div>
            <div class="col-10 px-2 d-flex lh-sm">
              <p class="my-auto text-white fw-lighter fs-7 text-start"><?= $ln['section_text_home_19'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-img bg-img-section-3 p-3h-100 position-relative">
          <img src="./assets/images/bg-img-section-5.png" alt="section1" class="w-100">
          <div class="bg-black-gradient position-absolute row ms-0 w-100">
            <div class="col-2 ps-3 pe-2 d-flex">
              <img src="./assets/images/icons/chart.png" alt="" class="w-100 my-auto d-flex">
            </div>
            <div class="col-10 px-2 d-flex lh-sm">
              <p class="my-auto text-white fw-lighter fs-7 text-start"><?= $ln['section_text_home_20'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-img bg-img-section-3 p-3h-100 position-relative">
          <img src="./assets/images/bg-img-section-6.png" alt="section1" class="w-100">
          <div class="bg-black-gradient position-absolute row ms-0 w-100">
            <div class="col-2 ps-3 pe-2 d-flex">
              <img src="./assets/images/icons/success.png" alt="" class="w-100 my-auto d-flex">
            </div>
            <div class="col-10 px-2 d-flex lh-sm">
              <p class="my-auto text-white fw-lighter fs-7 text-start"><?= $ln['section_text_home_21'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="bg-secondary-color row text-center p-3 px-md-5 px-lg-10">
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">
      <div class="text-black rounded h-100 text-center">
        <h2 class="fw-bold mb-0">123.09%</h2>
        <p class="fs-4 mb-0 fw-normal"><?= $ln['annual_return'] ?></p>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">
      <div class="text-black rounded h-100 text-center">
        <h2 class="fw-bold mb-0">353.93 million</h2>
        <p class="fs-4 mb-0 fw-normal"><?= $ln['total_investment'] ?></p>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">
      <div class="text-black rounded h-100 text-center">
        <h2 class="fw-bold mb-0">565,604</h2>
        <p class="fs-4 mb-0 fw-normal"><?= $ln['live_investor'] ?></p>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-2">
      <div class="text-black rounded h-100 text-center">
        <h2 class="fw-bold mb-0"><?= $ln['year10'] ?></h2>
        <p class="fs-4 mb-0 fw-normal"><?= $ln['market_experience'] ?></p>
      </div>
    </div>
  </div>
  <section class="px-5 px-sm-5 px-md-5 px-lg-10 fs-7">
    <h2 class="text-primary-color text-center"><?= $ln['section_title_home_13'] ?></h2>
    <div class="row px-5 px-sm-5 px-md-5 px-lg-10">
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 px-3 py-3">
        <div class="bg-white p-4 rounded shadow-sm h-100">
          <div class="row ms-0 w-100 text-black">
            <div class="col-2 px-2 d-flex">
              <img src="./assets/images/client_michael.png" alt="" class="w-100 my-auto d-flex">
            </div>
            <div class="col-10 px-3 my-auto d-flex flex-column">
              <p class="my-auto fw-bold text-start">Michael Duncan</p>
              <div class="d-flex mt-2 text-warning">
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
              </div>
            </div>
            <p class="fw-bold mt-3 mb-2"><?= $ln['great_system'] ?></p>
            <p class="fst-italic fw-light"><?= $ln['section_text_home_22'] ?></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 px-3 py-3">
        <div class="bg-white p-4 rounded shadow-sm h-100">
          <div class="row ms-0 w-100 text-black">
            <div class="col-2 px-2 d-flex">
              <img src="./assets/images/client_lisa.png" alt="" class="w-100 my-auto d-flex">
            </div>
            <div class="col-10 px-3 my-auto d-flex flex-column">
              <p class="my-auto fw-bold text-start">Lisa Damiano</p>
              <div class="d-flex mt-2 text-warning">
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
              </div>
            </div>
            <p class="fw-bold mt-3 mb-2">Wow</p>
            <p class="fst-italic fw-light"><?= $ln['section_text_home_23'] ?></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 px-53 py-3">
        <div class="bg-white p-4 rounded shadow-sm h-100">
          <div class="row ms-0 w-100 text-black">
            <div class="col-2 px-2 d-flex">
              <img src="./assets/images/client_paul.png" alt="" class="w-100 my-auto d-flex">
            </div>
            <div class="col-10 px-3 my-auto d-flex flex-column">
              <p class="my-auto fw-bold text-start">Paul Givens</p>
              <div class="d-flex mt-2 text-warning">
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
                <i class="fa fa-star me-1"></i>
              </div>
            </div>
            <p class="fw-bold mt-3 mb-2"><?= $ln['fast_easy'] ?></p>
            <p class="fst-italic fw-light"><?= $ln['section_text_home_24'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="bg-white shadow-sm py-4">
    <div class="row px-5 px-sm-5 px-md-5 px-lg-10 fs-7">
      <div class="d-flex col-sm-12 col-md-6 col-lg-6 pe-md-4 pe-sm-0">
        <h3 class="text-primary-color fw-bold my-auto w-75">
          <?= $ln['section_title_home_14'] ?>
        </h3>
      </div>
      <div class="d-flex col-sm-12 col-md-3 col-lg-3 px-5">
        <img src="./assets/images/icons/c_trader.png" alt="" class="d-flex w-100 my-auto" style="max-width: 15em;">
      </div>
      <div class="d-flex col-sm-12 col-md-3 col-lg-3 ps-md-3 ps-sm-0 justify-content-end fs-6">
        <a href="" class="text-decoration-none d-flex position-relative" style="width: fit-content;">
          <div class="bg-red text-white text-center px-2 pb-1 d-flex fs-7 position-absolute rounded-2" style="top:-0.8em; right:-0.8em;">comming soon</div>
          <button class="btn bg-success text-white text-center px-4 my-auto ms-auto">
            <h5 class="my-1"><?= $ln['start_copying'] ?></h5>
            <p class="fs-7 my-1">P: 30.00% | M: 0.00% | V: USD 5.00</p>
          </button>
        </a>
      </div>
    </div>
  </div>
<?php
  include_once "layouts/footer.php";
?>
