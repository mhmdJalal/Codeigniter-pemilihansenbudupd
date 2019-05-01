
<div class="container-fluid">
  <!-- Start Page Content -->

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
    <div class="col-sm-12">
      <div class="card">

        <?php if (@$pilih == $this->session->userdata('nis')): ?>
          <div class="card-title">Seni Budaya dan Unit Pengembangan Diri yang telah di pilih</div>
        <?php else: ?>
          <div class="card-title">Pilih Seni Budaya dan Unit Pengembangan Diri</div>
        <?php endif; ?>

        <div class="card-body">

            <?php if ($pilih == $this->session->userdata('nis')): ?>
              <div class="col-md-8">
                <div class="current-progress">
                  <div class="progress-content">

                      <div class="row">
                          <div class="col-lg-4">
                              <div class="">Seni Budaya </div>
                          </div>
                          <div class="col-lg-8">
                            <?php foreach ($pilihan as $row): ?>
                              <?= ': '.$row['senbud'] ?>
                            <?php endforeach; ?>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-4">
                              <div class="progress-text">Unit Pengembangan Diri </div>
                          </div>
                          <div class="col-lg-8">
                            <?php foreach ($pilihan as $row): ?>
                              <?= ': '.$row['upd'] ?>
                            <?php endforeach; ?>
                          </div>
                      </div>

                    </div>
                  </div>
              </div>
            <?php else: ?>
              <form method="post" action="<?= base_url('method/savepemilihan') ?>">
                <input class="form-control" type="hidden" name="kd_pilih" value="<?= $kode_pilih ?>">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="senbud">Seni Budaya</label>
                    <select class="form-control" id="senbud" name="senbud" required>
                      <option>Pilih Seni Budaya</option>
                      <?php foreach ($senbud as $row): ?>
                        <option value="<?= $row['kd_senbud'] ?>"><?= $row['senbud'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Unit Pengembangan Diri</label>
                    <select class="form-control" name="upd" required>
                      <option>Pilih Unit Pengembangan Diri</option>
                      <?php foreach ($upd as $row): ?>
                        <option value="<?= $row['kd_upd'] ?>"><?= $row['upd'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                  <button type="submit" name="save" class="btn btn-primary">Simpan</button>
              </form>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
