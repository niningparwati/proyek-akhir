<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">DONASI PROJECT <?= $nama ?></h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item active">Donasi Project</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <section class="bar">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>BENEFIT YANG DITERIMA</h2>
          </div>
          <p class="lead">Jika Anda melakukan donasi pada project <b><?= $nama ?></b> , maka Anda akan mendapatkan benefit berikut : </p>
        </div>
      </div>
      <div class="row services text-center"> 
        <?php 
        foreach ($data_benefit as $value) { ?>
          <div class="col-md-4">
            <div class="box-simple">
              <div class="icon-outlined"><i class="fa fa-money"></i></div>
              <h3 class="h4"><?= $value->nama_benefit ?> </h3>
              <p><b>
                <?php if ($value->minimal == 0) { ?>
                  Rp 0
                <?php }else{ ?>
                  Rp <?= number_format($value->minimal,2,',','.') ?>
                <?php } ?>     
              </b> sampai <b><?= number_format($value->maksimal,2,',','.') ?></b></p>
              <p><?= $value->isi ?></p>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
    <section class="bar pt-0">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>Cara Pembayaran Donasi</h2>
          </div>
          <p class="lead">Anda dapat memberikan donasi dengan cara melakukan transaksi pembayaran melalui teller bank atau transfer melalui ATM.</p>
        </div>
        <div class="col-md-6">
          <h3>Transfer melalui Bank</h3>
          <p class="text-sm" style="text-align: justify;">Silahkan lakukan pembayaran melalui teller bank sesuai dengan besarnya donasi yang akan Anda berikan. Kirimkan donasi ke Bank BNI dengan nomor rekening <b>1234567890</b> a.n. <b>Nining Parwati</b>. </p>
        </div>
        <div class="col-md-6">
          <h3>Transfer melalui ATM</h3>
          <p class="text-sm" style="text-align: justify;">Silahkan lakukan pembayaran melalui ATM sesuai dengan besarnya donasi yang akan Anda berikan. Kirimkan donasi ke Bank BNI dengan nomor rekening <b>1234567890</b> a.n. <b>Nining Parwati</b>. Silahkan tambahkan kode bank BNI <b>009</b> jika Anda mengirimkan dari ATM bank yang berbeda.</p>
        </div>
      </div>
    </section>
  </div>
  <div class="col-md-12" >
    <blockquote class="blockquote" style="text-align: center">
      <p class="mb-0"><em>Pastikan pembayaran yang Anda lakukan sudah berhasil terkirim ke nomor rekening tujuan. <br> Selanjutnya, silahkan upload bukti pembayaran yang telah Anda lakukan.</em></p>
    </blockquote>
  </div>
  <section class="bar bg-gray no-mb">
    <div class="container">
      <div class="row showcase text-center">
        <div class="heading col-md-12">
          <h3>INPUT BUKTI PEMBAYARAN</h3>
          <form action="<?= site_url('donasi/create_action') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group" style="text-align: left;">
                  <br><br>
                  <label for="nominal">Nominal</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <br><br>
                  <input name="nominal" id="nominal" type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group" style="text-align: left;">
                  <label for="message">Bukti Pembayaran</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                </div>
              </div>
              <div class="col-md-12 text-center">
                <input type="hidden" name="id_project" value="<?= $id_project ?>">
                <button name="submit" type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i> Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>