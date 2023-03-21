<?php
  include_once "layouts/header.php";
?>

  <section class="bg-white text-black px-5 px-sm-5 px-md-5 px-lg-10">
    <h2 class="fw-bold my-1"><?= $ln['section_title_systems_1'] ?></h2>
    <p class="fw-bold my-1"><?= $ln['section_text_systems_1'] ?></p>
    <h4 class="fw-bold my-4"><?= $ln['section_title_systems_2'] ?></h4>
    <div class="row text-center fs-5">
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-white px-3 py-4 rounded shadow-sm h-100">
          <div class="d-flex justify-content-center mb-2">
            <img src="./assets/images/icons/system_clock.png" alt="clock" style="width:1.3em; height: 1.3em;" class="d-flex my-auto">
            <h6 class="fw-bold text-danger ms-2 mb-0"><?= $ln['simple_availability'] ?></h6>
          </div>
          <p class="fs-7 d-flex mb-0 fw-light"><?= $ln['simple_availability_text'] ?></p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-white px-3 py-4 rounded shadow-sm h-100">
          <div class="d-flex justify-content-center mb-2">
            <img src="./assets/images/icons/system_time.png" alt="time" style="width:1.3em; height: 1.3em;" class="d-flex my-auto">
            <h6 class="fw-bold text-danger ms-2 mb-0"><?= $ln['continuous_updates'] ?></h6>
          </div>
          <p class="fs-7 d-flex mb-0 fw-light"><?= $ln['continuous_updates_text'] ?></p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-white px-3 py-4 rounded shadow-sm h-100">
          <div class="d-flex justify-content-center mb-2">
            <img src="./assets/images/icons/system_frame.png" alt="frame" style="width:1.3em; height: 1.3em;" class="d-flex my-auto">
            <h6 class="fw-bold text-danger ms-2 mb-0"><?= $ln['compatible_ctrader'] ?></h6>
          </div>
          <p class="fs-7 d-flex mb-0 fw-light"><?= $ln['compatible_ctrader_text'] ?></p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-white px-3 py-4 rounded shadow-sm h-100">
          <div class="d-flex justify-content-center mb-2">
            <img src="./assets/images/icons/system_driver_license.png" alt="license" style="width:1.3em; height: 1.3em;" class="d-flex my-auto">
            <h6 class="fw-bold text-danger ms-2 mb-0"><?= $ln['automatic_license_renewal'] ?></h6>
          </div>
          <p class="fs-7 d-flex mb-0 fw-light"><?= $ln['automatic_license_renewal_text'] ?></p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-white px-3 py-4 rounded shadow-sm h-100">
          <div class="d-flex justify-content-center mb-2">
            <img src="./assets/images/icons/system_processor_security.png" alt="processor" style="width:1.3em; height: 1.3em;" class="d-flex my-auto">
            <h6 class="fw-bold text-danger ms-2 mb-0"><?= $ln['highest_server_security'] ?></h6>
          </div>
          <p class="fs-7 d-flex mb-0 fw-light"><?= $ln['highest_server_security_text'] ?></p>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4 p-2">
        <div class="bg-white px-3 py-4 rounded shadow-sm h-100">
          <div class="d-flex justify-content-center mb-2">
            <img src="./assets/images/icons/system_planning.png" alt="processor" style="width:1.3em; height: 1.3em;" class="d-flex my-auto">
            <h6 class="fw-bold text-danger ms-2 mb-0"><?= $ln['money_management_system'] ?></h6>
          </div>
          <p class="fs-7 d-flex mb-0 fw-light"><?= $ln['money_management_system_text'] ?></p>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-img bg-img-7 px-5 px-sm-5 px-md-5 px-lg-10 text-white text-center fs-6">
    <p class="fs-4">
      <?= $ln['section_text_systems_2'] ?>
    </p>
    <div class="text-center my-3 fw-bold justify-content-center d-flex flex-wrap fs-5">
      <div class="d-flex mx-4 my-2">
        <img src="./assets/images/icons/checkmark.png" alt="time" style="width:1.25em; height: 1.25em;" class="d-flex my-auto">
        <p class="ms-2 mb-0"><?= $ln['availability'] ?></p>
      </div>
      <div class="d-flex mx-4 my-2">
        <img src="./assets/images/icons/checkmark.png" alt="time" style="width:1.25em; height: 1.25em;" class="d-flex my-auto">
        <p class="ms-2 mb-0"><?= $ln['continuous_updates'] ?></p>
      </div>
      <div class="d-flex mx-4 my-2">
        <img src="./assets/images/icons/checkmark.png" alt="time" style="width:1.25em; height: 1.25em;" class="d-flex my-auto">
        <p class="ms-2 mb-0"><?= $ln['compatible_ctrader'] ?></p>
      </div>
      <div class="d-flex mx-4 my-2">
        <img src="./assets/images/icons/checkmark.png" alt="time" style="width:1.25em; height: 1.25em;" class="d-flex my-auto">
        <p class="ms-2 mb-0"><?= $ln['automatic_license_renewal'] ?></p>
      </div>
      <div class="d-flex mx-4 my-2">
        <img src="./assets/images/icons/checkmark.png" alt="time" style="width:1.25em; height: 1.25em;" class="d-flex my-auto">
        <p class="ms-2 mb-0"><?= $ln['highest_server_security'] ?></p>
      </div>
      <div class="d-flex mx-4 my-2">
        <img src="./assets/images/icons/checkmark.png" alt="time" style="width:1.25em; height: 1.25em;" class="d-flex my-auto">
        <p class="ms-2 mb-0"><?= $ln['money_management_system'] ?></p>
      </div>
    </div>
    <p class="fs-5 my-4">
      <?= $ln['section_text_systems_3'] ?>
    </p>
    <p class="fs-5 my-4">
      <?= $ln['section_text_systems_4'] ?>
    </p>
    <p class="fs-5 my-4">
      <?= $ln['section_text_systems_5'] ?>
    </p>
    <div class="d-flex justify-content-center mt-5 mx-3">
      <a href="" class="text-decoration-none d-flex position-relative" style="width: fit-content;">
        <div class="bg-red text-white text-center px-2 pb-1 d-flex fs-7 position-absolute rounded-2" style="top:-0.8em; right:-0.6em;">comming soon</div>
        <button class="btn bg-success text-white text-center px-5 d-flex"><?= $ln['free_activation'] ?></button>
      </a>
      <a href="" class="text-decoration-none d-flex position-relative mx-3" style="width: fit-content;">
        <div class="bg-red text-white text-center px-2 pb-1 d-flex fs-7 position-absolute rounded-2" style="top:-0.8em; right:-0.6em;">comming soon</div>
        <button class="btn bg-secondary-color text-black text-center px-3 d-flex"><?= $ln['start_with_better_fee'] ?></button>
      </a>
    </div>
  </section>
  <div class="bg-light py-5">
    <section class="px-5 px-sm-5 px-md-5 px-lg-10 py-4">
      <div class="row px-4 py-3 bg-white shadow-sm text-black position-relative">
        <div class="position-absolute p-2 bg-red text-white fs-5 strategy_number rounded-1 fw-bold lh-1">1</div>
        <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2 col-xxl-2 px-4 py-2 d-flex justify-content-center strategy-img">
          <img src="./assets/images/icons/sbtm.png" alt="time" height="auto" class="my-auto w-75">
        </div>
        <hr class="section_divide_1">
        <div class="col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 p-4 my-auto">
          <h5 class="text-primary-color fw-bold mt-auto mb-2">
            <?= $ln['section_title_systems_sbtm'] ?>
          </h5>
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_sbtm_short'] ?>
          </p>
        </div>
        <hr class="section_divide_2">
        <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 p-4 my-ayto">
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_sbtm_detail'] ?>
          </p>
        </div>
      </div>
    </section>
    <section class="px-5 px-sm-5 px-md-5 px-lg-10 py-4">
      <div class="row px-4 py-3 bg-white shadow-sm text-black position-relative">
        <div class="position-absolute p-2 bg-red text-white fs-5 strategy_number rounded-1 fw-bold lh-1">2</div>
        <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2 col-xxl-2 px-4 py-2 d-flex justify-content-center strategy-img">
          <img src="./assets/images/icons/scp.png" alt="time" height="auto" class="my-auto w-75">
        </div>
        <hr class="section_divide_1">
        <div class="col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 p-4 my-auto">
          <h5 class="text-primary-color fw-bold mt-auto mb-2">
            <?= $ln['section_title_systems_scp'] ?>
          </h5>
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_scp_short'] ?>
          </p>
        </div>
        <hr class="section_divide_2">
        <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 p-4 my-ayto">
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_scp_detail'] ?>
          </p>
        </div>
      </div>
    </section>
    <section class="px-5 px-sm-5 px-md-5 px-lg-10 py-4">
      <div class="row px-4 py-3 bg-white shadow-sm text-black position-relative">
        <div class="position-absolute p-2 bg-red text-white fs-5 strategy_number rounded-1 fw-bold lh-1">3</div>
        <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2 col-xxl-2 px-4 py-2 d-flex justify-content-center strategy-img">
          <img src="./assets/images/icons/srb.png" alt="time" height="auto" class="my-auto w-75">
        </div>
        <hr class="section_divide_1">
        <div class="col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 p-4 my-auto">
          <h5 class="text-primary-color fw-bold mt-auto mb-2">
            <?= $ln['section_title_systems_srb'] ?>
          </h5>
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_srb_short'] ?>
          </p>
        </div>
        <hr class="section_divide_2">
        <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 p-4 my-ayto">
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_srb_detail'] ?>
          </p>
        </div>
      </div>
    </section>
    <section class="px-5 px-sm-5 px-md-5 px-lg-10 py-4">
      <div class="row px-4 py-3 bg-white shadow-sm text-black position-relative">
        <div class="position-absolute p-2 bg-red text-white fs-5 strategy_number rounded-1 fw-bold lh-1">4</div>
        <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2 col-xxl-2 px-4 py-2 d-flex justify-content-center strategy-img">
          <img src="./assets/images/icons/srbv.png" alt="time" height="auto" class="my-auto w-75">
        </div>
        <hr class="section_divide_1">
        <div class="col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 p-4 my-auto">
          <h5 class="text-primary-color fw-bold mt-auto mb-2">
            <?= $ln['section_title_systems_srbv'] ?>
          </h5>
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_srbv_short'] ?>
          </p>
        </div>
        <hr class="section_divide_2">
        <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 p-4 my-ayto">
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_srbv_detail'] ?>
          </p>
        </div>
      </div>
    </section>
    <section class="px-5 px-sm-5 px-md-5 px-lg-10 py-4">
      <div class="row px-4 py-3 bg-white shadow-sm text-black position-relative">
        <div class="position-absolute p-2 bg-red text-white fs-5 strategy_number rounded-1 fw-bold lh-1">5</div>
        <div class="col-sm-12 col-md-4 col-lg-2 col-xl-2 col-xxl-2 px-4 py-2 d-flex justify-content-center strategy-img">
          <img src="./assets/images/icons/sec.png" alt="time" height="auto" class="my-auto w-75">
        </div>
        <hr class="section_divide_1">
        <div class="col-sm-12 col-md-8 col-lg-3 col-xl-3 col-xxl-3 p-4 my-auto">
          <h5 class="text-primary-color fw-bold mt-auto mb-2">
            <?= $ln['section_title_systems_sec'] ?>
          </h5>
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_sec_short'] ?>
          </p>
        </div>
        <hr class="section_divide_2">
        <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7 col-xxl-7 p-4 my-ayto">
          <p class="fs-7 fw-light mb-auto">
            <?= $ln['section_text_systems_sec_detail'] ?>
          </p>
        </div>
      </div>
    </section>
  </div>
  <section class="bg-img bg-img-3 px-5 px-sm-5 px-md-5 px-lg-10 text-white text-center fs-5 py-4">
    <p class="fs-6">
      <?= $ln['section_text_systems_info'] ?>
    </p>
    <a href="" class="text-decoration-none d-flex position-relative justify-content-center mx-auto fs-7" style="width: fit-content;">
      <div class="bg-red text-white text-center px-2 pb-1 d-flex fs-7 position-absolute rounded-2" style="top:-0.8em; right:-0.8em;">comming soon</div>
      <button class="btn bg-secondary-color text-black text-center px-5 d-flex fs-5"><?= $ln['more_information'] ?></button>
    </a>
  </section>
<?php
  include_once "layouts/footer.php";
?>
