<!-- Sub menu for booking section starts here -->
  <div class="container-fluid d-flex justify-content-center nav-bottom-color">
    <div class="sub-nav d-flex flex-wrap">
      <a class="text-decoration-none secondary-text-color mr-4 py-3 <?php echo ($profile_title == 'Bookings')? 'dashboard-active' : '' ; ?>" href="<?php echo base_url('user-staging/bookings'); ?>">
        <div class="sub-menu-link  ">
          My Bookings
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3 <?php echo ($profile_title == 'Inspections')? 'dashboard-active' : '' ; ?>" href="<?php echo base_url('user-staging/my-inspections'); ?>">
        <div class="sub-menu-link  ">
          Inspections
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3 <?php echo ($profile_title == 'Repairs')? 'dashboard-active' : '' ; ?>" href="<?php echo base_url('user-staging/repairs'); ?>">
        <div class="sub-menu-link  ">
          Request Repair
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3 <?php echo ($profile_title == 'Ratings')? 'dashboard-active' : '' ; ?>" href="<?php echo base_url('user-staging/property-rating'); ?>">
        <div class="sub-menu-link  ">
          Property Rating
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3" href="#">
        <div class="sub-menu-link  ">
          Subscription Agreement
        </div>
      </a>
      <a class="text-decoration-none secondary-text-color mr-4 py-3 <?php echo ($profile_title == 'Transactions')? 'dashboard-active' : '' ; ?>" href="<?php echo base_url('user-staging/transactions'); ?>">
        <div class="sub-menu-link  ">
          Transactions
        </div>
      </a>
    </div>
  </div>