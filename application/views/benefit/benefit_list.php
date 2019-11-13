<div class="row">
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <div class="box-title">
                    <b><i class="fa fa-list-alt"></i> Data Benefit</b>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="toggle-expand-btn btn btn-default btn-sm"><i class="fa fa-expand"></i></button>
                </div>
            </div>
            <div class="box-body">
                <a href="<?= site_url('benefit/create') ?>" class="btn btn-primary" style="margin-left : 15px"><i class="fa fa-plus"></i> Tambah Data</a>
                <div class="table-responsive" style="padding: 15px">
                    <table class="table table-bordered table-striped table-hover" width="100%" id="mytable">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
								<th>Id Project</th>
								<th>Nama Benefit</th>
								<th>Isi</th>
								<th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            $no = 1;
                            foreach ($benefit_data as $benefit) { ?>
                            <tr>
								<td style="text-align:center;"><?= $no++; ?></td>
								<td><?= $benefit->id_project ?></td>
								<td><?= $benefit->nama_benefit ?></td>
								<td><?= $benefit->isi ?></td>
								<td style="text-align:center">
                                    <a href="<?= site_url('benefit/read/'.$benefit->id_benefit) ?>" title="Lihat Detail Data"class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <a href="<?= site_url('benefit/update/'.$benefit->id_benefit) ?>" title="Ubah Data" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?= site_url('benefit/delete/'.$benefit->id_benefit) ?>" title="Hapus Data" class="btn btn-danger hapus"><i class="fa fa-trash-o"></i></a>
                                </td>
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
<?= swal_delete("#mytable",".hapus") ?>