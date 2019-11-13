<?php 
$string = "<div class=\"row\">
    <div class=\"col-md-12\">
        <div class=\"box box-success\">
            <div class=\"box-header\">
                <div class=\"box-title\">
                    <b><i class=\"fa fa-tasks\"></i> <?= \$button ?> Data ".ucfirst($table_name)."</b>
                </div>
                <div class=\"box-tools pull-right\">
                    <button type=\"button\" class=\"toggle-expand-btn btn btn-default btn-sm\"><i class=\"fa fa-expand\"></i></button>
                </div>
            </div>
            <div class=\"box-body\">
                <form style=\"padding: 15px;\" action=\"<?= \$action; ?>\" method=\"POST\" enctype=\"multipart/form-data\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t\t\t\t\t<div class=\"form-group\">
                        <div class=\"row\">
                            <label class=\"col-md-2\" for=\"".$row["column_name"]."\">".label($row["column_name"])."</label>
                            <div class=\"col-md-6\">
                                <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?= $".$row["column_name"]."; ?></textarea>
                                <? form_error('".$row["column_name"]."')?>
                            </div>
                        </div>
                    </div>";
    } else if ($row['data_type'] == 'date') {
    $string .= "\n\t\t\t\t\t<div class=\"form-group\">
                        <div class=\"row\">
                            <label class=\"col-md-2\" for=\"".$row["data_type"]."\">".label($row["column_name"])."</label>
                            <div class=\"col-md-4\">
                                <input type=\"text\" class=\"form-control datepicker\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" data-date-format=\"yyyy-mm-dd\" placeholder=\"".label($row["column_name"])."\" value=\"<?= $".$row["column_name"]."; ?>\" readonly/>
                                <?= form_error('".$row["column_name"]."') ?>
                            </div>
                        </div>
                    </div>";
    } else {
    $string .= "\n\t\t\t\t\t<div class=\"form-group\">
                        <div class=\"row\">
                            <label class=\"col-md-2\" for=\"".$row["data_type"]."\">".label($row["column_name"])."</label>
                            <div class=\"col-md-6\">
                                <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?= $".$row["column_name"]."; ?>\" />
                                <?= form_error('".$row["column_name"]."') ?>
                            </div>
                        </div>
                    </div>";
    }
}
$string .= "\n\t\t\t\t\t<div class=\"form-group\">
                        <div class=\"row\">
                            <div class=\"col-md-6 col-md-offset-2\">
                                <input type=\"hidden\" name=\"".$pk."\" value=\"<?= $".$pk."; ?>\" />
                                <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-floppy-o\"></i> <?= \$button ?></button>
                                <a href=\"<?= site_url('".$c_url."') ?>\" class=\"btn btn-danger\"><i class=\"fa fa-sign-out\"></i> Kembali</a>
                            </div>
                        </div>
                    </div>";
$string .= "\n\t\t\t\t</form>
            </div>
        </div>
    </div>
</div>";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>