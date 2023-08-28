<?php get_template_part('header'); ?>

  <?php if (!empty($tenants)) : ?>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Room</th>
            <th scope="col">Rent Start</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
    <?php foreach ($tenants as $tenant) : ?>
          <tr>
            <th scope="row"><?php echo $tenant['id']; ?></th>
            <td><?php echo $tenant['name']; ?></td>
            <td><a href="mailto:<?php echo $tenant['email']; ?>"><?php echo $tenant['email']; ?></a></td>
            <td><a href="tel:<?php echo $tenant['contact'];?>"><?php echo $tenant['contact'];?></a></td>
            <td><?php echo $tenant['room']; ?></td>
            <td><?php echo $tenant['rent_start']; ?></td>
            <td>
              <a href="#" class="btn btn-primary btn-sm">View Profile</a>
              <a href="#" class="btn btn-warning btn-sm">Edit Profile</a>
              <a href="#" class="btn btn-danger btn-sm">Remove</a>
            </td>
          </tr>
    <?php endforeach; ?>
      </tbody>
    </table>
  <?php else : ?>
    <h2>No tenants yet...</h2>
  <?php endif; ?>

  <div class="mt-5 d-flex gap-2 justify-content-start align-items-start flex-wrap">
    <a href="/tenants/create" class="btn btn-success">Add new tenant</a>
  </div>

<?php get_template_part('footer'); ?>