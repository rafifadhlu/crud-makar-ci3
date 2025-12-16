<div class="wrapper d-flex justify-content-between me-5 custom-bg-opacity" style=" height:500px;">

  <div class="welcomesign d-flex justify-content-center align-items-center ms-5 ">
    <h1>This is public dashboard</h1>
  </div>

  <?php echo validation_errors(); ?>

  <div class="wrapperform h-100 card d-flex justify-content-center align-items-center" style="width: 25%;">
    <form class="d-flex flex-column" action="<?php echo site_url('login') ?>" method="post">

      <label for="username">Username</label>
      <input type="text" id="username" name="username">

      <label for="password">Password</label>
      <input style="margin-bottom:20px;" type="password" id="password" name="password">

      <button type="submit">Login</button>
    </form>
  </div>

</div>

<div
  class="backgroundImage  d-flex justify-content-column align-items-start"
  style="
    background-image:url(https://picsum.photos/400/250);
    margin-top:200px;
    height:500px;
  ">

  <h2 class="fade-title w-100 d-flex justify-content-center pt-3">
    Manajemen Karyawan
  </h2>

  <div class="flyingBanner position-absolute start-50 translate-middle-x" style="bottom: -275px;">
    <p class="rounded-5 bg-white text-black p-2 small mb-0">
      © 2025 Rafi Fadhlurokhman
    </p>
  </div>


</div>