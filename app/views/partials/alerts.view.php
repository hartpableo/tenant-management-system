<?php
  use Core\Session;
?>

<?php if (!empty($errors)) : foreach ($errors as $error) : ?>
<div class="alert alert-danger" role="alert">
  <?php echo $error; ?>
</div>
<?php endforeach; endif; ?>

<?php if (Session::has('message')) : ?>
  <?php foreach (Session::get('message') as $message) : ?>
    <div class="alert alert-success" role="alert">
      <?php echo $message; ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>