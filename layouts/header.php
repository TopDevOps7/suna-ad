<?php

    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $pagePath = $link_array[count($link_array) - 2];
    $page = end($link_array);

    $server_link = explode('/',$_SERVER['DOCUMENT_ROOT']);
    $server = end($server_link);

    include_once("lang/config.php");
    include_once("utils/config.php");
?>

<!DOCTYPE html>

<html lang="<?= $lang ?>" class="notranslate" translate="no">
<script>
let page = "<?php echo $page; ?>";
let server = "<?php echo $server; ?>";
</script>

<head>
	<meta charset="UTF-8">
  <meta name="google" content="notranslate" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Suna</title>
  <meta name="title" content="FIGHT ENERGY SHORTAGE AND CLIMATE CHANGE!">
  
  <link rel="shortcut icon" href="./assets/images/icons/sunaicon.ico" type="image/x-icon">
  <link href="./assets/images/icons/sunaicon.ico" rel="suna-icon">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Boostrap icon -->
  <!-- <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"> -->
  <!-- Bootstrap 5 CSS -->
  <!-- <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css"> -->
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  
</head>
<body onload="">
	<!-- Header Navbar -->
  <header class="sticky-top">
    <div class="topbar row bg-secondary-color px-3 px-sm-4 px-md-5 px-lg-10 py-0">
      <div class="py-1 mt-1 mb-0 col-sm-12 col-lg-6 col-md-6"><?= $ln['welcome_suna'] ?></div>
      <nav class="navbar container py-1 col-sm-12 col-lg-6 col-md-6">
        <div class="lang_setting px-3">
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
    <div class="nav-header">
      <nav class="justify-content-between navbar navbar-expand-md navbar-dark bg-primary-color mobNavbar px-3 px-sm-3 px-md-5 px-lg-10 py-3">
        <a class="navbar-brand" href="./"> <img class="" src="./assets/images/icons/suna_logo_white.png" alt="logo" width="120"> </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pt-sm-4" id="navbarNav">        
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
    </div>
  </header>
