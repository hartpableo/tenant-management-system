<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo APP_DESC ?>">
  <title><?php echo APP_NAME ?></title>
  <link rel="stylesheet" href="<?php echo assetPath('css/style.css'); ?>">
</head>
<body>
  <header>
    <div><strong><u><small><a href="/" style="color: black;">simple notes app</a></small></u></strong></div>
    
    <?php if (auth()) : ?>
      <form action="/user/logout" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit"><strong>logout</strong></button>
      </form>
    <?php else : ?>
      <a href="user/login"><strong>login</strong></a>
    <?php endif; ?>

  </header>
  <main>