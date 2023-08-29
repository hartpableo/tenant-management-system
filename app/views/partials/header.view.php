<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo APP_DESC ?>">
  <title><?php echo APP_NAME ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo assetPath('css/style.css'); ?>">
</head>
<body>
  <header class="mb-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <?php if (isHome()) : ?>
          <h1 class="m-0 text-black"><?php echo COMPANY_NAME; ?></h1>
          <?php else : ?>
          <h1 class="m-0"><a href="/" class="text-black text-decoration-none" aria-label="link to home page"><?php echo COMPANY_NAME; ?></a></h1>
          <?php endif; ?>
          <p class="m-0 fw-light"><?php echo APP_NAME; ?></p>
        </div>
        <div class="col-12 col-md-6 text-md-end d-flex justify-content-end align-items-center gap-2">
          <?php if (auth()) : ?>
            <a href="#">Exit</a>
          <?php else : ?>
            <a href="#">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>
  <main>

  <?php $containerClasses = (urlIs('/') || isset($_GET['search'])) ? 'container py-5' : 'container' ?>
  
  <section>
    <div class="<?php echo $containerClasses ?>">