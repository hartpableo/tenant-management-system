<?php
  get_template_part('header');
  get_template_part('alerts', [
    'errors' => $errors
  ]);
?>

  <form action="/manager/authenticate" method="POST" class="mx-auto p-5 rounded-4 border shadow-lg" style="max-width: var(--bs-breakpoint-sm);">
    <h2 class="fs-4 m-0 fw-normal">Management Login</h2>
    
    <hr>

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo old('name') ?? ''; ?>">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="<?php echo old('password') ?? ''; ?>">
    </div>
    <div class="btn-group btn-group mt-3">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </form>

<?php get_template_part('footer'); ?>