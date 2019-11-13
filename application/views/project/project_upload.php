<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">UPLOAD PROJECT</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="#">PROJECT</a></li>
          <li class="breadcrumb-item active">UPLOAD</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="content">
  <div class="container">
    <form action="<?= $project; ?>" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-8">
          <div class="box">
            <h2 class="text-uppercase"><center>Data Project</center></h2>
            <hr>
            <div class="form-group">
              <label for="nama-project">Nama Project</label>
              <input name="nama_project" id="nama_project" type="nama_project" class="form-control" required value="<?= $nama_project ?>">
              <?= form_error('nama_project') ?>
            </div>
            <div class="form-group">
              <label for="detail-project">Detail Project</label>
              <textarea class="form-control summernote" rows="3" name="detail" id="detail"><?= $detail; ?></textarea>
              <?= form_error('detail') ?>
            </div>
            <div class="form-group">
              <label for="dana-dibutuhkan">Dana Yang Dibutuhkan</label>
              <input name="dana_dibutuhkan" id="dana_dibutuhkan" type="text" class="form-control" required value="<?= $dana_dibutuhkan ?>" >
              <?= form_error('dana_dibutuhkan') ?>
            </div>
            <div class="text-center">
              <input name="tanggal_buat" type="hidden" value="<?= $tanggal_buat ?>">
              <input name="id_project" type="hidden" value="<?= $id_project ?>">
              <input name="id_user" type="hidden" value="<?= $id_user ?>">
              <button type="submit" name="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> <?= $button ?></button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <form action="<?= $aksi_foto ?>" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="box">
            <h2 class="text-uppercase"><center>Foto Project</center></h2>
            <hr>
            <div class="form-group">
              <label for="detail-project">Foto Project  <small> ( Unggah foto dalam format <b>.png | .jpg | .jpeg</b> )</small></label>
              <br>
              <?php if (!empty($file)) { ?>
                <center><img src="<?= base_url()?>assets/foto_project/<?= $file ?>" style="width: 100px"></center>
                <br>
                <input type="file" id="file" name="file" class="file-input" >
              <?php }else if(empty($file)){ ?>
                <input type="file" id="file" name="file" class="file-input" >
              <?php } ?>

              <?= form_error('file') ?>
            </div>
            <div class="text-center">
              <input name="id_project" type="hidden" value="<?= $id_project ?>">
              <input name="foto_old" type="hidden" value="<?= $file ?>">
              <button type="submit" name="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> <?= $button_foto ?></button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <form action="<?= $aksi_proposal?>" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="box">
            <h2 class="text-uppercase"><center>Proposal</center></h2>
            <hr>
            <div class="form-group">
              <label for="detail-project">Proposal Project  <small> ( Unggah dalam bentuk <b>.pdf</b> )</small></label>
              <?php if (!empty($proposal)) { ?>
                <embed src="<?= base_url()?>assets/proposal_project/<?= $proposal ?>" style="width: 100%; height: 200px"></embed>
                <a href="<?= site_url('project/download_proposal/'.$id_project) ?>" class="btn btn-success">
                  <i class="fa fa-download"></i> Download </a>
                  <br><br>
                  <input name="proposal" id="proposal" type="file" class="form-control" >
                <?php } else{?>
                  <input name="proposal" id="proposal" type="file" class="form-control" >
                <?php } ?>
                <?= form_error('proposal') ?>
              </div>
              <div class="text-center">
                <input name="id_project" type="hidden" value="<?= $id_project ?>">
                <input name="proposal_old" type="hidden" value="<?= $proposal ?>">
                <button type="submit" name="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> <?= $button_proposal ?></button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <form action="<?= $aksi_sp?>" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            <div class="box">
              <h2 class="text-uppercase"><center>Surat Perjanjian</center></h2>
              <hr>
              <?php 
              if (!empty($surat_perjanjian)) {
                $nama = $surat_perjanjian;
                $pdf = strpos($nama, ".pdf");
                $png = strpos($nama, ".png");
                $jpg = strpos($nama, ".jpg");
                $jpeg = strpos($nama, ".jpeg");
                if ($pdf) { ?>
                  <p>File Surat Perjanjian Yang Sudah Diunggah <small>( Silahkan upload ulang jika terjadi kesalahan! )</small></p>
                  <embed src="<?= base_url()?>assets/surat_perjanjian/<?= $surat_perjanjian ?>" style="width: 100%; height: 200px"></embed>
                  <div class="col-md-6">
                    <a href="<?= site_url('assets/surat_perjanjian/'.$id_project)?>" class="btn btn-success">
                      <i class="fa fa-download"></i> Download
                    </a>
                  </div>
                  <br>
                  <input name="surat_perjanjian" id="surat_perjanjian" type="file" class="form-control" >
                <?php } else if($pdf | $png | $jpg | $jpeg){ ?>
                  <p>File Surat Perjanjian Yang Sudah Diunggah <small>( Silahkan upload ulang jika terjadi kesalahan! )</small></p>
                  <center><img src="<?= base_url()?>assets/surat_perjanjian/<?= $surat_perjanjian ?>" style="width: 100px"></center>
                  <input name="surat_perjanjian" id="surat_perjanjian" type="file" class="form-control" >
                <?php }
              }else{ ?>
                <small class="text-muted">Download Surat Perjanjian di bawah ini! Kemudian isi sesuai data diri Anda disertai dengan tanda tangan di atas materai! Lalu upload surat perjanjian tersebut dalam bentuk <b>.pdf | .png | .jpg | .jpeg </b></small>
                <hr>
                <div class="col-md-6">
                  <a href="<?= base_url()?>assets/surat_perjanjian/surat_perjanjian.pdf" class="btn btn-success">
                    <i class="fa fa-download"></i> Download
                  </a>
                </div>
                <br>
                <input name="surat_perjanjian" id="surat_perjanjian" type="file" class="form-control" >
              <?php }
              ?>
            </div>
            <div class="text-center">
              <input name="id_project" type="hidden" value="<?= $id_project ?>">
              <input name="sp_old" type="hidden" value="<?= $surat_perjanjian ?>">
              <button type="submit" name="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> <?= $button_sp ?></button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<div id="content">
  <div class="container">
    <div class="row">


      <div class="col-lg-5">
        <form action="<?= $aksi_benefit?>" method="POST" enctype="multipart/form-data">
          <div class="box">
            <h2 class="text-uppercase"><center>Benefit Project</center></h2>
            <hr>
            <div class="form-group">
              <label for="nama-benefit">Nama Benefit</label>
              <input name="nama_benefit" id="nama_benefit" type="text" class="form-control" value="<?= $nama_benefit ?>">
              <?= form_error('nama_benefit') ?>
            </div>
            <div class="form-group">
              <label for="nama-benefit">Minimal Nominal <small>( Isi minimal nominal donasi yang diberikan dalam benefit ini )</small></label>
              <input name="minimal" id="minimal" type="text" class="form-control" value="<?= $minimal ?>">
              <?= form_error('minimal') ?>
            </div>
            <div class="form-group">
              <label for="nama-benefit">Maksmal Nominal <small>( Isi maksimal nominal donasi yang diberikan dalam benefit ini)</small></label>
              <input name="maksimal" id="maksimal" type="text" class="form-control" value="<?= $maksimal ?>">
              <?= form_error('maksimal') ?>
            </div>
            <div class="form-group">
              <label for="isi-benefit">Isi Benefit</label>
              <textarea class="form-control summernote" rows="3" name="isi" id="isi"><?= $isi; ?></textarea>
              <?= form_error('isi') ?>
            </div>
            <div class="text-center">
              <input type="hidden" name="id_project" value="<?= $id_project ?>">
              <button type="submit" name="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> <?= $benefit ?></button>
            </div>
          </div>
        </form>
      </div>


      <div class="col-lg-7">
        <div class="box">
          <h2 class="text-uppercase"><center>Detail Benefit Project</center></h2>
          <div class="box-tools pull-right">
            <a href="<?= site_url('benefit/delete_semua/'.$id_project) ?>" class="btn btn-danger clear-cart" title="Hapus Semua Detail Benefit Project"><i class="fa fa-trash"></i> Hapus Semua Benefit</a> 
            <br><br> 
          </div>
          <div><br></div>
          <table style="width: 100%; border:1px solid grey;">
            <thead>
              <tr style="border:1px solid grey;">
                <th style="border:1px solid grey; text-align: center;">No</th>
                <th style="border:1px solid grey; text-align: center; width: 25%">Nama</th>
                <th style="border:1px solid grey; text-align: center;">Minimal</th>
                <th style="border:1px solid grey; text-align: center;">Maksimal</th>
                <th style="border:1px solid grey; text-align: center; width: 40%">Isi Benefit</th>
                <th style="border:1px solid grey; text-align: center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($data_benefit)) {
                echo "";
              } else{ ?>
                <?php 
              $no = 1;
              foreach ($data_benefit as $value) { 
                ?>
                <tr> 
                  <td style="border:1px solid grey; text-align: center;"><?= $no++ ?></td>
                  <td style="border:1px solid grey;"><?= $value->nama_benefit?></td>
                  <td style="border:1px solid grey;"><?= $value->minimal?></td>
                  <td style="border:1px solid grey;"><?= $value->maksimal?></td>
                  <td style="border:1px solid grey;"><?= $value->isi?></td>
                  <td style="border:1px solid grey; text-align: center;">
                    <a href="<?= site_url('benefit/delete/'.$value->id_benefit) ?>" style="color: black"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php } }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div style="text-align: center;">
  <form action="<?= site_url('project/simpan/'.$id_project)?>" method="POST">
    <input type="hidden" name="id_project" value="<?= $id_project ?>">
    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>SIMPAN SEMUA DATA PROJECT</button>
  </form>
  <br><br><br>
</div>

</div>
</div>
</div>