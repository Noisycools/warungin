<?= $this->extend('layout/tem_contact_us'); ?>

<?= $this->section('content'); ?>
<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-left">
          <div class="screen-header-button close"></div>
          <div class="screen-header-button maximize"></div>
          <div class="screen-header-button minimize"></div>
        </div>
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>HUBUNGI</span>
            <span>KAMI</span>
          </div>
          <div class="app-contact">CONTACT INFO : (+62) 815-6395-7870</div>
        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <div class="app-form-group">
              <input class="app-form-control" placeholder="NAMA">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="EMAIL">
            </div>
            <div class="app-form-group">
              <input class="app-form-control" placeholder="NOMOR KONTAK">
            </div>
            <div class="app-form-group message">
              <input class="app-form-control" placeholder="PESAN">
            </div>
            <div class="app-form-group buttons">
              <button class="app-form-button">BATAL</button>
              <button class="app-form-button">KIRIM</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="credits">
      <!-- Marked -->
      <a href="/index"><img src="img/WarungIn.png" alt="warungin"></a>
      <!-- Marked -->
    </div>
  </div>
</div>
<?= $this->endSection(); ?>