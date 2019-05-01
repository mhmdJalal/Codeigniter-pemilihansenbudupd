<div class="login-box">
  <div class="login-logo pt-5">
    <h1>Admin</h1>
  </div>
  <div class="card col-md-4" style="margin-left: 33%">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">Atur Semaumu</p> -->
      <br>
      <form class="form-horizontal" action="<?php echo base_url('Auth/login_admin') ?>" method="post">
        <div class="form-group has-feedback">
	      <div class="input-group mb-2 mb-sm-0">
	        <input type="text" class="form-control" name="username" placeholder="Username">
	      </div>
        </div>
        <div class="form-group has-feedback">
          <div class="input-group mb-2 mb-sm-0">
	        <input type="password" class="form-control" name="password" placeholder="Password">
	      </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </form>
      <br>
  </div>
</div>