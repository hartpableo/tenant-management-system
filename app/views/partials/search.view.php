<div class="d-flex justify-content-between align-items-center mb-5">
  <form class="input-group" method="GET" style="max-width: calc(var(--bs-breakpoint-sm) - 5rem);">
    <label class="sr-only" for="search">Search</label>
    <input type="search" id="search" class="form-control" name="search" placeholder="Search by name..." value="<?php echo $_GET['search'] ?? ''; ?>">
    <button type="submit" class="btn btn-primary" aria-label="Filter Search">Search</button>
    <?php if (!searchIsEmpty()) : ?>
      <a href="/" class="btn btn-outline-info">Clear Filters</a>
    <?php endif; ?>
  </form>
  <div class="d-flex gap-2 justify-content-start align-items-start flex-wrap">
    <a href="/tenants/create" class="btn btn-success">Add new tenant</a>
  </div>
</div>