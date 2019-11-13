<?php 
$string = "<div class=\"row\">
    <div class=\"col-md-12\">
        <div class=\"box box-success box-solid\">
            <div class=\"box-header\">
                <h4><b><i class=\"fa fa-newspaper-o\"></i> Data ".ucfirst($table_name)."</b></h4>
            </div>
            <div class=\"box-body\">
                <div class=\"row\">
                    <div style=\"padding-left: 15px; padding-bottom: 15px;\">
                        <div class=\"col-md-9\">
                            <?= anchor(site_url('".$c_url."/create'), '<i class=\"fa fa-plus\" aria-hidden=\"true\"></i> Tambah Data', 'class=\"btn btn-primary\"'); ?>
                        </div>
                        <div class=\"col-md-3 text-right pull-right\">
                            <form action=\"<?= site_url('$c_url/index'); ?>\" class=\"form-inline\" method=\"get\">
                                <div class=\"input-group\">
                                    <div class=\"form-line\">
                                        <input type=\"text\" class=\"form-control\" name=\"q\" value=\"<?= \$q; ?>\">
                                    </div>
                                    <span class=\"input-group-btn\">
                                        <?php if (\$q <> '') { ?>
                                            <a href=\"<?= site_url('$c_url'); ?>\" class=\"btn btn-default\">Reset</a>
                                        <?php } ?>
                                        <button class=\"btn btn-primary\" type=\"submit\">Cari</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <div class=\"row\">
                    <div class=\"col-md-12 table-responsive\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th width=\"5%\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t\t\t\t\t\t\t\t<th width=\"15%\">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>";
$string .= "\n\t\t\t\t\t\t\t\t<?php foreach ($" . $c_url . "_data as \$$c_url) { ?>
                                <tr>";
$string .= "\n\t\t\t\t\t\t\t\t\t<td><?= ++\$start ?></td>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t\t<td><?= $" . $c_url ."->". $row['column_name'] . " ?></td>";
}
$string .= "\n\t\t\t\t\t\t\t\t\t<td style=\"text-align:center\">
                                        <a href=\"<?= site_url('".$c_url."/read/'.$".$c_url."->".$pk.") ?>\" title=\"Lihat Detail Data\"class=\"btn btn-success\"><i class=\"fa fa-eye\"></i></a>
                                        <a href=\"<?= site_url('".$c_url."/update/'.$".$c_url."->".$pk.") ?>\" title=\"Ubah Data\" class=\"btn btn-warning\"><i class=\"fa fa-pencil-square-o\"></i></a>
                                        <a href=\"<?= site_url('".$c_url."/delete/'.$".$c_url."->".$pk.") ?>\" title=\"Hapus Data\" class=\"btn btn-danger\"  onclick=\"javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')\"><i class=\"fa fa-trash-o\"></i></a>
                                    </td>
                                </tr>";
$string .=  "\n\t\t\t\t\t\t\t\t<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class=\"row\">
                    <div style=\"padding-left: 15px; padding-bottom: 15px;\">
                        <div class=\"col-md-6\">
                            <h5><b>Jumlah Data : <?= \$total_rows ?></b></h5>
                        </div>
                        <div class=\"col-md-6 text-right pull-right\">
                            <?= \$pagination ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>";

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