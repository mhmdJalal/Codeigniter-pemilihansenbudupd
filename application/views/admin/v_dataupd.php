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
                <div class="card-title">Input UPD</div>
                <div class="card-body">
                    <?php if (@$edit == true): ?>
                      <form method="post" action="<?= base_url('method/updateupd/'.@$dataupd['kd_upd']) ?>">
                    <?php else: ?>
                      <form method="post" action="<?= base_url('method/saveupd') ?>">
                    <?php endif ?>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Kode UPD</label>
                        <?php if (@$edit == true): ?>
                          <input class="form-control" type="text" name="kd_upd" value="<?= @$dataupd['kd_upd'] ?>" readonly>
                        <?php else: ?>
                          <input class="form-control" type="text" name="kd_upd" value="<?= $kode_upd ?>" readonly>
                        <?php endif; ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Nama UPD</label>
                        <input class="form-control" type="text" name="upd" value="<?= @$dataupd['upd'] ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Nama Instruktur</label>
                        <input class="form-control" type="text" name="instruktur" value="<?= @$dataupd['instruktur'] ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Hari</label>
                        <input class="form-control" type="text" name="hari"  value="<?= @$dataupd['hari'] ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Kuota</label>
                        <input class="form-control" type="number" name="kuota" value="<?= @$dataupd['kuota'] ?>">
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
                <div class="card-title">Data UPD</div>
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
                        foreach ($upd as $row) : ?>
                          <tr>
                            <td><?= $row['kd_upd'] ?></td>
                            <td><?= $row['upd'] ?></td>
                            <td><?= $row['instruktur'] ?></td>
                            <td><?= $row['hari'] ?></td>
                            <td><?= $row['kuota'] ?></td>
                            <td>
                              <a onclick="return confirm('Yakin Ingin hapus?')" href="<?= base_url('Method/deleteupd/'.$row['kd_upd']) ?>">
                                <span class="btn btn-danger icon-trash"></span>
                              </a>
                              <a href="<?= base_url('Dashboard/editupd/'.$row['kd_upd']) ?>">
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
