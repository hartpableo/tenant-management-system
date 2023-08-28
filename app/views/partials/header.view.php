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
          <h1 class="m-0"><?php echo COMPANY_NAME; ?></h1>
          <p class="m-0 fw-light"><?php echo APP_NAME; ?></p>
        </div>
        <div class="col-12 col-md-6 text-md-end d-flex flex-column justify-content-center align-items-end">
          <a href="#">Exit</a>
        </div>
      </div>
    </div>
  </header>
  <main>