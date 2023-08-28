<?php
  use Core\Session;
?>

<?php if (!empty($errors)) : foreach ($errors as $error) : ?>
<div class="alert alert-danger" role="alert">
  <?php echo $error; ?>
</div>
<?php endforeach; endif; ?>

<?php if (Session::has('message', 'registered')) : ?>
<div class="alert alert-success" role="alert">
  <?php echo Session::get('message')['registered']; ?>
</div>
<?php endif; ?>