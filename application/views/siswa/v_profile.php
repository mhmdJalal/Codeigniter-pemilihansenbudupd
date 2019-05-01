<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <br><br>
  <section class="content" style="margin-left: 50px;margin-right: 50px">
      <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-title">Ubah Password</div>
              <div class="card-body">
                <form method="post" action="<?= base_url('method/updatepassword/'.$this->session->userdata('nis')) ?>">

                  <?php if ($this->session->flashdata('result') == true): ?>
                    <?php if ($this->session->flashdata('code') == true): ?>
                      <div class="alert alert-primary alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $this->session->flashdata('pesan'); ?>
                      </div>
                    <?php else: ?>
                      <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $this->session->flashdata('pesan'); ?>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="password">Password</label>
                      <input class="form-control" id="password" type="password" name="password" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="repassword">Re-type Password</label>
                      <input class="form-control" id="repassword" type="password" name="repassword" required>
                    </div>
                  </div>

                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
      </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
