<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">My Orders</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">My Orders</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="content">
  <div class="container">
    <div class="row bar mb-0">
      <div id="customer-orders" class="col-md-12">
        <p class="text-muted lead">Terima kasih sudah ikut berpartisipasi dengan memberikan donasi.</p>
        <div class="box mt-0 mb-lg-0">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Project</th>
                  <th>Foto Project</th>
                  <th>Donasi Yang Diberikan</th>
                  <th>Benefit Yang Diterima</th>
                  <th>Status Benefit</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($data_donasi as $value) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->nama ?></td>
                    <td><img src="<?= base_url()?>assets/foto_project/<?= $value->foto ?>"></td>
                    <td><?= number_format($value->nominal,2,',','.') ?></td>
                    <td><?= $value->isi ?></td>
                    <td>
                      <?php if ($value->status_benefit == 'Menunggu Konfirmasi') { ?>
                        <span class="badge badge-warning"><?= $value->status_benefit ?></span>
                      <?php }else if($value->status_benefit == 'Benefit Sudah Dikirim'){ ?>
                        <span class="badge badge-success"><?= $value->status_benefit ?></span>
                      <?php } ?>
                    </td>
                    <td><a href="<?= site_url('project/detail_project/'.$value->id_project)?>" class="btn btn-template-outlined btn-sm">View</a></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>