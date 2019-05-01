<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <br><br>
  <section class="content" style="margin-left: 50px;margin-right: 50px">

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
              <div class="card-title">Input Seni Budaya</div>
              <div class="card-body">
                  <?php if (@$edit == true): ?>
                    <form method="post" action="<?= base_url('method/updatesenbud/'.@$datasenbud['kd_senbud']) ?>">
                  <?php else: ?>
                    <form method="post" action="<?= base_url('method/savesenbud') ?>">
                  <?php endif ?>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Kode Seni Budaya</label>
                      <?php if (@$edit == true): ?>
                        <input class="form-control" type="text" name="kd_senbud" value="<?= @$datasenbud['kd_senbud'] ?>" readonly>
                      <?php else: ?>
                        <input class="form-control" type="text" name="kd_senbud" value="<?= $kode_senbud ?>" readonly>
                      <?php endif; ?>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Nama Seni Budaya</label>
                      <input class="form-control" type="text" name="senbud" value="<?= @$datasenbud['senbud'] ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Nama Instruktur</label>
                      <input class="form-control" type="text" name="instruktur_senbud" value="<?= @$datasenbud['instruktur_senbud'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Hari</label>
                      <input class="form-control" type="text" name="hari_senbud"  value="<?= @$datasenbud['hari_senbud'] ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Kuota</label>
                      <input class="form-control" type="number" name="kuota_senbud" value="<?= @$datasenbud['kuota_senbud'] ?>">
                    </div>
                  </div>

                  <?php if (@$edit == true): ?>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                  <?php else: ?>
                    <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                  <?php endif ?>
                </form>
              </div>
            </div>
          </div>
      </div>

        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-title">Data Seni Budaya</div>
              <div class="table-responsive m-t-20">
                <table id="myTable" class="table-hover table">
                  <thead>
                    <th>Kode UPD</th>
                    <th>Nama UPD</th>
                    <th>Instruktur</th>
                    <th>Hari</th>
                    <th>Kuota</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($senbud as $row) : ?>
                        <tr>
                          <td><?= $row['kd_senbud'] ?></td>
                          <td><?= $row['senbud'] ?></td>
                          <td><?= $row['instruktur_senbud'] ?></td>
                          <td><?= $row['hari_senbud'] ?></td>
                          <td><?= $row['kuota_senbud'] ?></td>
                          <td>
                            <a onclick="return confirm('Yakin Ingin hapus?')" href="<?= base_url('Method/deletesenbud/'.$row['kd_senbud']) ?>">
                              <span class="btn btn-danger icon-trash"></span>
                            </a>
                            <a href="<?= base_url('Dashboard/editsenbud/'.$row['kd_senbud']) ?>">
                              <span class="btn btn-info icon-pencil"></span>
                            </a>
                          </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
