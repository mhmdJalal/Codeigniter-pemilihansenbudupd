<div class="container-fluid">
  <!-- Start Page Content -->
  <div class="row">
    <div class="col-md-4">
        <div class="card p-20">
                <div class="card-title">
                  Pilih SENBUD dan UPD
                </div>
                <a class="btn btn-primary" href="<?= base_url('Dashboard/pilihsenbudupd')?>">
                  <i class=" m-r-10"></i>Click Disini
                </a>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <div class="card-title">Informasi Seni Budaya</div>
          <div class="table-responsive m-t-20">
            <table id="myTable" class="table-hover table">
              <thead>
                <th>Seni Budaya</th>
                <th>Hari</th>
                <th>Kuota</th>
              </thead>
              <tbody>
                <?php
                  foreach ($senbud as $row) : ?>
                    <tr>
                      <td><?= $row['senbud'] ?></td>
                      <td><?= $row['hari_senbud'] ?></td>
                      <td><?= $row['kuota_senbud'] ?></td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <div class="card-title">Informasi Unit Pengembangan Diri</div>
          <div class="table-responsive m-t-20">
            <table id="myTable1" class="table-hover table">
              <thead>
                <th>Unit Pengembangan Diri</th>
                <th>Hari</th>
                <th>Kuota</th>
              </thead>
              <tbody>
                <?php
                  foreach ($upd as $row) : ?>
                    <tr>
                      <td><?= $row['upd'] ?></td>
                      <td><?= $row['hari'] ?></td>
                      <td><?= $row['kuota'] ?></td>
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
