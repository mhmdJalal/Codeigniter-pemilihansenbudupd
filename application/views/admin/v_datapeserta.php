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
                  <?php if (@$edit == true): ?>
                    <div class="card-title">Update Peserta</div>
                  <?php else: ?>
                    <div class="card-title">Input Peserta</div>
                  <?php endif ?>
                <div class="card-body">
                    <?php if (@$edit == true): ?>
                      <form method="post" action="<?= base_url('method/updatepeserta/'.@$datapeserta['nis']) ?>">
                    <?php else: ?>
                      <form method="post" action="<?= base_url('method/savepeserta') ?>">
                    <?php endif ?>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>NIS</label>
                        <?php if (@$edit == true): ?>
                          <input class="form-control" type="number" name="nis" required readonly value="<?= @$datapeserta['nis'] ?>">
                        <?php else: ?>
                          <input class="form-control" type="number" name="nis" required>
                        <?php endif; ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" required value="<?= @$datapeserta['email'] ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Nama Siswa</label>
                        <input class="form-control" type="text" name="nama" required value="<?= @$datapeserta['nama'] ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" required value="<?= @$datapeserta['username'] ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Jenis Kelamin</label>
                        <select name="jk" class="form-control" required>
                          <?php if (@$datapeserta['jk'] == "L"): ?>
                            <option selected value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                          <?php elseif (@$datapeserta['jk'] == "P") : ?>
                            <option value="L">Laki-Laki</option>
                            <option selected value="P">Perempuan</option>
                          <?php else: ?>
                            <option>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                          <?php endif ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" required value="<?= @$datapeserta['password'] ?>">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Rombel</label>
                        <select class="form-control" name="rombel" required>
                          <option>Pilih Rombel</option>
                          <?php foreach ($rombel as $row): ?>
                            <option value="<?= $row['kd_rombel'] ?>" <?= ($row['kd_rombel'] == @$datapeserta['rombel']) ? 'selected' : '' ?>><?= $row['nama_rombel'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Rayon</label>
                        <select class="form-control" name="rayon" required>
                          <option>Pilih Rayon</option>
                          <?php foreach ($rayon as $row): ?>
                            <option value="<?= $row['kd_rayon'] ?>" <?= ($row['kd_rayon'] == @$datapeserta['rayon']) ? 'selected' : '' ?>><?= $row['nama_rayon'] ?></option>
                          <?php endforeach; ?>
                        </select>
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
                <div class="card-body">
                  <div class="card-title">Data Peserta</div>
                  <div class="table-responsive m-t-20">
                    <table id="myTable" class="table-hover table">
                      <thead>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>JK</th>
                        <th>Rayon</th>
                        <th>Rombel</th>
                        <th>Email</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($peserta as $row) : ?>
                            <tr>
                              <td><?= $row['nis'] ?></td>
                              <td><?= $row['nama'] ?></td>
                              <td><?= $row['jk'] ?></td>
                              <td><?= $row['nama_rayon'] ?></td>
                              <td><?= $row['nama_rombel'] ?></td>
                              <td><?= $row['email'] ?></td>
                              <td>
                                <a href="<?= base_url('Dashboard/editpeserta/'.$row['nis']) ?>">
                                  <span class="btn btn-info icon-pencil"></span>
                                </a>
                                <a onclick="return confirm('Yakin Ingin hapus?')" href="<?= base_url('Method/deletepeserta/'.$row['nis']) ?>">
                                  <span class="btn btn-danger icon-trash"></span>
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
        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
