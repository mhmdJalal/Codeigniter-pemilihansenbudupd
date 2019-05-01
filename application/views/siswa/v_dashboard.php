<div class="container-fluid">
  <!-- Start Page Content -->
  <div class="row">
    <div class="ml-3">
        <div class="card p-20">
          <div class="card-title">
            Selamat Datang, <?= $this->session->userdata('name'); ?>
          </div>
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-title">Cara melakukan Pemilihan SENBUD dan UPD</div>
        <div class="card-body">
          <ul class="list-icons">
            <li><i class="ti-angle-right"></i> Siswa dapat memilih Senbud dan UPD di <a href="<?= base_url('Dashboard/pilihsenbudupd') ?>">Pilih Senbud dan UPD</a>.</li>
            <li><i class="ti-angle-right"></i> Siswa dapat melihat informasi Senbud dan UPD di menu <a href="<?= base_url('Dashboard/informasisenbudupd') ?>">Data Senbud dan UPD</a>.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-title">Ketentuan Pemilihan</div>
        <div class="card-body">
          <ul class="list-icons">
            <li><i class="ti-angle-right"></i> Siswa tidak bisa memilih Senbud dan UPD dihari yang sama.</li>
            <li><i class="ti-angle-right"></i> Siswa dapat memilih Senbud dan UPD dengan ketentuan kuota masih tersedia.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

</div>
