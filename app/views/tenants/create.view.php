<?php
  get_template_part('header');
  get_template_part('alerts', [
    'errors' => $errors
  ]);
?>

  <form action="/tenant/store" method="POST" class="mx-auto p-5 rounded-4 border shadow-lg" style="max-width: var(--bs-breakpoint-sm);">
    <h2 class="fs-4 m-0 fw-normal">Add new tenant profile</h2>
    
    <hr>

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
      <label class="form-label" for="contact">Contact Number</label>
      <input type="number" id="contact" name="contact" class="form-control" placeholder="+63">
    </div>
    <div class="mb-3">
      <label class="form-label" for="room">Room</label>
      <input type="text" id="room" name="room" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label" for="rent_start">Rent Started</label>
      <input type="date" id="rent_start" name="rent_start" class="form-control">
    </div>
    <div class="btn-group btn-group mt-3">
      <button type="submit" class="btn btn-primary">Create</button>
      <a href="/" class="btn btn-secondary">Go Back</a>
    </div>
  </form>

<?php get_template_part('footer'); ?>