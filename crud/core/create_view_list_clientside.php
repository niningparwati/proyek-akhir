<?php 
$string = "<div class=\"row\">
    <div class=\"col-md-12\">
        <div class=\"box box-success\">
            <div class=\"box-header with-border\">
                <div class=\"box-title\">
                    <b><i class=\"fa fa-list-alt\"></i> Data ".ucfirst($table_name)."</b>
                </div>
                <div class=\"box-tools pull-right\">
                    <button type=\"button\" class=\"toggle-expand-btn btn btn-default btn-sm\"><i class=\"fa fa-expand\"></i></button>
                </div>
            </div>
            <div class=\"box-body\">
                <a href=\"<?= site_url('".$c_url."/create') ?>\" class=\"btn btn-primary\" style=\"margin-left : 15px\"><i class=\"fa fa-plus\"></i> Tambah Data</a>
                <div class=\"table-responsive\" style=\"padding: 15px\">
                    <table class=\"table table-bordered table-striped table-hover\" width=\"100%\" id=\"mytable\">
                        <thead>
                            <tr>
                                <th width=\"5%\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t\t\t\t\t\t\t<th width=\"15%\">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";
$string .= "\n\t\t\t\t\t\t<?php
                            \$no = 1;
                            foreach ($" . $c_url . "_data as \$$c_url) { ?>
                            <tr>";
$string .= "\n\t\t\t\t\t\t\t\t<td style=\"text-align:center;\"><?= \$no++; ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t<td><?= $" . $c_url ."->". $row['column_name'] . " ?></td>";
}
$string .= "\n\t\t\t\t\t\t\t\t<td style=\"text-align:center\">
                                    <a href=\"<?= site_url('".$c_url."/read/'.$".$c_url."->".$pk.") ?>\" title=\"Lihat Detail Data\"class=\"btn btn-success\"><i class=\"fa fa-eye\"></i></a>
                                    <a href=\"<?= site_url('".$c_url."/update/'.$".$c_url."->".$pk.") ?>\" title=\"Ubah Data\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\"></i></a>
                                    <a href=\"<?= site_url('".$c_url."/delete/'.$".$c_url."->".$pk.") ?>\" title=\"Hapus Data\" class=\"btn btn-danger hapus\"><i class=\"fa fa-trash-o\"></i></a>
                                </td>
                            </tr>";
$string .=  "\n\t\t\t\t\t\t<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= call_datatable(\"#mytable\") ?>
<?= swal_delete(\"#mytable\",\".hapus\") ?>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?= anchor(site_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\" aria-hidden=\"true\"></i> Export Excel', 'class=\"btn btn-success\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?= anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\" aria-hidden=\"true\"></i> Export Word', 'class=\"btn btn-info\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?= anchor(site_url('".$c_url."/pdf'), 'Export PDF', 'class=\"btn btn-danger\"'); ?>";
}
$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>