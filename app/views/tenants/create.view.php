<?php get_template_part('header'); ?>

  <form action="/tenant/store" method="POST" class="mx-auto p-5 rounded-4 border shadow-lg" style="max-width: var(--bs-breakpoint-sm);">
    <h2 class="fs-4 m-0 fw-normal">Add new tenant profile</h2>
    
    <hr>

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="email" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
      <label class="form-label" for="number">Number input</label>
      <input type="number" id="number" name="number" class="form-control" placeholder="+63">
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

  <!-- <div class="mt-5 d-flex gap-2 justify-content-start align-items-start flex-wrap">
    <a href="/tenants/create" class="btn btn-success">Add new tenant</a>
  </div> -->

<?php get_template_part('footer'); ?>