<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <br><br>
  <section class="content" style="margin-left: 50px;margin-right: 50px">
      <div class="row">
        <div class="col-lg-12">
                      <div class="card">
                          <div class="card-title">
                              <h4>Hasil Pemilihan Senbud dan UPD</h4>
                          </div>
                          <div class="card-body">
                              <div class="table-responsive">
                                  <table id="myTable" class="table">
                                      <thead>
                                          <tr>
                                              <th>NIS</th>
                                              <th>Nama</th>
                                              <th>Rombel</th>
                                              <th>Rayon</th>
                                              <th>Senbud</th>
                                              <th>Hari Senbud</th>
                                              <th>UPD</th>
                                              <th>Hari UPD</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($pilih as $row): ?>
                                          <tr>
                                            <td><?= $row['nis'] ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['nama_rombel'] ?></td>
                                            <td><?= $row['nama_rayon'] ?></td>
                                            <td><?= $row['senbud'] ?></td>
                                            <td><?= $row['hari_senbud'] ?></td>
                                            <td><?= $row['upd'] ?></td>
                                            <td><?= $row['hari'] ?></td>
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
