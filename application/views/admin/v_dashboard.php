  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <br><br>
    <section class="content" style="margin-left: 50px;margin-right: 50px">
        <div class="row">
          <div class="col-md-4">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-grav f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                      <?php if ($get_upd > 0): ?>
                        <h2><?= $get_upd ?></h2>
                      <?php else: ?>
                        <h2>0</h2>
                      <?php endif; ?>
                        <p class="m-b-0">Unit Pengembangan Diri</p>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-linode f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                      <?php if ($get_senbud > 0): ?>
                        <h2><?= $get_senbud ?></h2>
                      <?php else: ?>
                        <h2>0</h2>
                      <?php endif; ?>
                        <p class="m-b-0">Seni Budaya</p>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-check f-s-40 color-success"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                      <?php if ($get_pilih > 0): ?>
                        <h2><?= $get_pilih ?></h2>
                      <?php else: ?>
                        <h2>0</h2>
                      <?php endif; ?>
                        <p class="m-b-0">Sudah Memilih</p>
                    </div>
                </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-times f-s-40 color-danger"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2><?= $belum_pilih->num_rows() ?></h2>
                        <p class="m-b-0">Belum Memilih</p>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-9">
                        <div class="card">
                            <div class="card-title">
                                <h4>Data Siswa yang belum memilih Senbud dan UPD</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table">
                                        <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Rombel</th>
                                                <th>Rayon</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($belum_pilih->result_array() as $row): ?>
                                            <tr>
                                              <td><?= $row['nis'] ?></td>
                                              <td><?= $row['nama'] ?></td>
                                              <td><?= $row['jk'] ?></td>
                                              <td><?= $row['nama_rombel'] ?></td>
                                              <td><?= $row['nama_rayon'] ?></td>
                                            </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
