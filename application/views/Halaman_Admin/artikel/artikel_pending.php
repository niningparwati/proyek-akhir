<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <div class="box-title">
                    <b><i class="fa fa-list-alt"></i> Data Artikel Pending</b>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered table-striped table-hover" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align: center;">No</th>
                                <th style="text-align: center;">Judul</th>
                                <th style="text-align: center;">Foto</th>                              
                                <th style="text-align: center;">Isi</th>
                                <th width="15%" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($data_artikel as $artikel) { ?>
                            <tr>
                                <td style="vertical-align: middle; text-align: center;"><?= $no++; ?></td>
                                <td style="vertical-align: middle; text-align: center;"><?= $artikel->judul?></td>
                                <?php if (!empty($artikel->judul)) { ?>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <img src="<?= base_url()?>assets/artikel/<?= $artikel->foto ?>" style="width: 100px; height: 100px;">
                                    </td>
                                <?php }else {?>
                                    <td style="vertical-align: middle; text-align: center;">
                                       Belum Ada Foto
                                   <?php } ?>                        
                               </td>
                               <td style="vertical-align: middle; text-align: left;  width: 40%"><?= $artikel->isi ?></td>
                               <td style="vertical-align: middle; text-align: center; width: 17%">
                                <a href="<?= site_url('artikel/aksi/'.$artikel->id_artikel.'/yes') ?>" class="btn btn-success proses" style="background:#00b3b3">Aktifkan</a>
                                <a href="<?= site_url('artikel/aksi/'.$artikel->id_artikel.'/no') ?>" class="btn btn-danger tolak" >Batalkan</a>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<?= call_datatable("#mytable") ?>

<script>
    $(document).ready(function () {
        $('.proses').on('click', function(e){
            e.preventDefault();
            const proses = $('.proses').attr('href');
            Swal.fire({
                title: 'Artikel ini akan diaktifkan?',
                text: 'Pastikan data sudah lengkap',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.value) {
                    document.location.href = proses;
                }
            })
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.tolak').on('click', function(e){
            e.preventDefault();
            const tolak = $('.tolak').attr('href');
            Swal.fire({
                title: 'Artikel ini akan dibatalkan?',
                text: 'Artikel akan masuk ke history artikel',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Tidak',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.value) {
                    document.location.href = tolak;
                }
            })
        });
    });
</script>