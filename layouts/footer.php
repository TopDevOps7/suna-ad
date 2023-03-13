<footer class="">
  <div class="border-top-footer"></div>
  <div class="bg-white px-auto py-4 text-center">
    <a class="navbar-brand" href="./"> <img class="" src="./assets/images/icons/suna_logo_dark.png" alt="logo" width="120"> </a>
    <h6 class="fw-bold fs-5 my-1"><?= $ln['best_experience'] ?></h6>
    <p class="advanced_system"><?= $ln['advanced_system'] ?></p>
  </div>
  <div class="row bottombar bg-primary-color px-3 px-sm-4 px-md-5 px-lg-10 py-0">
    <div class="py-1 mt-1 mb-0 col-sm-12 col-lg-6 col-md-6 text-light"><?= $ln['copyright_suna'] ?></div>
    <nav class="navbar container py-0 col-sm-12 col-lg-6 col-md-6">      
      <div class="nav-item nav-link px-3">
        <a href="./terms" class="text-light">Terms</a>
      </div>
      <div class="nav-item nav-link px-3">
        <a href="./privacy" class="text-light">Privacy</a>
      </div>
      <div class="nav-item nav-link px-3">
        <a href="./cookies" class="text-light">Cookies</a>
      </div>
    </nav>
  </div>
</footer>

<?php
  include_once "additionalFooter.php";
?>
