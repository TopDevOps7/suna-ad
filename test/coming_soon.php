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
  <meta name="title" content="WORLD BEST AUTOMATIC TRADING SYSTEM EXPERIENCE">
  
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
    <div class="nav-header bg-img-coming" >
      <nav class="justify-content-between navbar navbar-expand-md navbar-dark mobNavbar px-5 px-sm-5 px-md-5 px-lg-10 py-3">
        <a class="fs-6 navbar-brand" href="./"> <img class="" src="./assets/images/icons/suna_logo_white.png" alt="logo" style="width: 7em"> </a>
        <div class="collapse navbar-collapse pt-0" id="navbarNav">        
          <ul class="navbar-nav ms-auto ps-lg-5 ps-md-0">
            <li class="nav-item nav-link navbtnlinks px-lg-3 px-md-3 px-sm-4 py-sm-2 text-center contact_link">
              <a href="" class="fs-6"><?= $ln['contact_us'] ?></a>
            </li>            
          </ul>
        </div>
      </nav>      
      <section class="px-5 px-sm-5 px-md-5 px-lg-10 flex-column d-flex my-auto" style="min-height: calc(100vh - 8em);">
        <div class="row my-auto d-flex fs-4">
          <div class="col-sm-12 col-md-6 col-lg-6 pe-0 my-auto header_side mt-0 mb-5">
            <h2 class="fw-bold text-secondary-color text-uppercase">
              <?= $ln['section_title_coming'] ?>
            </h2>
            <p class="text-white fs-7 my-2">
              <?= $ln['section_text_coming'] ?>
            </p>            
          </div>
        </div>
      </section>
    </div>
  </header>

  <style>
    .nav-item.nav-link.contact_link:hover {
      background: transparent !important;
    }
    .nav-item.nav-link.contact_link:hover a {
      color: #e9d16f !important;
      font-weight: normal !important;
    }
  </style>