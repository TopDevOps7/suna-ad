<?php

    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $pagePath = $link_array[count($link_array) - 2];
    $pagename = end($link_array);
    $page_ = explode(".", $pagename);
    $page =str_replace('_', '', ucwords($page_[0]));
    if ($page == "" | $page == "index" | $page == "Index") {
      $page = "Home";
    }
    $server_link = explode('/',$_SERVER['DOCUMENT_ROOT']);
    $server = end($server_link);

    include_once("lang/config.php");
?>

<!DOCTYPE html>

<html lang="<?= $lang ?>" class="notranslate" translate="no">

<head>
	<meta charset="UTF-8">
  <meta name="google" content="notranslate" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Suna <?php echo "| " . $page; ?></title>
  <meta name="title" content="FIGHT ENERGY SHORTAGE AND CLIMATE CHANGE!">
  
  <link rel="shortcut icon" href="./assets/images/icons/sunaicon.ico" type="image/x-icon">
  <link href="./assets/images/icons/sunaicon.ico" rel="suna-icon">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  
</head>
<body onload="">
	<!-- Header Navbar -->
  <header class="sticky-top">
    <div class="topbar row bg-secondary-color px-3 px-sm-4 px-md-5 px-lg-10 py-0">
      <div class="py-1 mt-1 mb-0 col-sm-12 col-lg-6 col-md-6"><?= $ln['welcome_suna'] ?></div>
      <nav class="navbar container py-1 col-sm-12 col-lg-6 col-md-6 px-3">
        <div class="lang_setting px-3 pt-1">
          <div class="dropdown-center" style="position: relative;">
            <div class="border-0 dropdown-toggle" data-bs-toggle="dropdown">
              <img src="./assets/images/flag/round-<?=$lang?>.png" alt="<?=$lang?>" class="me-1 pb-1" width=20>
              <span class="lh-sm"><?= $ln[$lang] ?></span>
            </div>
            <div class="dropdown-menu">
              <a class="my-1 dropdown-item <?=$lang == "de" ? "active" : ""?>" data-lang='de'><img src="./assets/images/flag/lang-de.svg" alt="de" class="me-2" width=25><?= $ln['de'] ?></a>
              <a class="my-1 dropdown-item <?=$lang == "en" ? "active" : ""?>" data-lang='en'><img src="./assets/images/flag/lang-en.svg" alt="en" class="me-2" width=25><?= $ln['en'] ?></a>
            </div>
          </div>
        </div>
        <div class="nav-item nav-link px-3">
          <a href="./login" class=""><?= $ln['login'] ?></a>
        </div>
        <div class="nav-item bg-white nav-link px-3 py-1">
          <a href="./register" class=""><?= $ln['create_account'] ?></a>
        </div>
      </nav>
    </div>
    <div class="nav-header <?php echo $page == "Home" ? "bg-img bg-img-1" : ""; ?>" >
      <nav class="justify-content-between navbar navbar-expand-md navbar-dark <?php echo $page == "Home" ? "" : "bg-primary-color"; ?> mobNavbar px-3 px-sm-3 px-md-5 px-lg-10 py-3">
        <a class="navbar-brand" href="./"> <img class="" src="./assets/images/icons/suna_logo_white.png" alt="logo" width="120"> </a>
        
        <a href="" class="text-decoration-none"><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button></a>
        <div class="collapse navbar-collapse pt-sm-4 pt-md-0" id="navbarNav">        
          <ul class="navbar-nav ms-auto ps-lg-5 ps-md-0">
            <li class="nav-item nav-link navbtnlinks px-lg-3 px-md-3 px-sm-4 py-sm-2 text-center">
              <a href="./" class="fs-6"><?= $ln['home'] ?></a>
            </li>
            <li class="nav-item navbtnlinks nav-link px-lg-3 px-md-3 px-sm-4 py-sm-2 text-center">
              <a href="./about_us" class="fs-6"><?= $ln['about_us'] ?></a>
            </li>
            <li class="nav-item navbtnlinks nav-link px-lg-3 px-md-3 px-sm-4 py-sm-2 text-center">
              <a href="./systems" class="fs-6"><?= $ln['systems'] ?></a>
            </li>
            <li class="nav-item navbtnlinks nav-link px-lg-3 px-md-3 px-sm-4 py-sm-2 text-center">
              <a href="./strategies" class="fs-6"><?= $ln['strategies'] ?></a>
            </li>       
          </ul>
        </div>
      </nav>
      <?php if($page == "Home") { ?>
      <section class="px-3 px-sm-4 px-md-5 px-lg-10">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6 pe-md-4 pd-sm-0 my-auto header_side">
            <h4 class="fw-bold text-white">
              <?= $ln['section_title_home_1'] ?>
            </h4>
            <h2 class="fw-bold text-white">
              <?= $ln['section_title_home_2'] ?>
            </h2>
            <p class="text-white fs-6 my-5">
              <?= $ln['section_text_readmore_1'] ?>
            </p>
            <a href="" class="text-decoration-none"><button class="btn bg-secondary-color text-black text-center px-4 d-flex"><?= $ln['start_receive'] ?></button></a> 
          </div>
          <div class="col-sm-12 col-md-6 col-lg-6 px-5 d-flex">
            <img src="./assets/images/section_1.png" alt="section1" class="w-100 my-auto">
          </div>
        </div>
      </section>
      <?php } ?>
    </div>
  </header>
