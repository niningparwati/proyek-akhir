<?php 

$string = "<div class=\"row\">
	<div class=\"col-md-12\">
		<div class=\"box box-success\">
			<div class=\"box-header\">
				<div class=\"box-title\">
                    <b><i class=\"fa fa-eye\"></i> Detail Data ".ucfirst($table_name)."</b>
                </div>
                <div class=\"box-tools pull-right\">
                    <button type=\"button\" class=\"toggle-expand-btn btn btn-default btn-sm\"><i class=\"fa fa-expand\"></i></button>
                </div>
			</div>
			<div class=\"box-body\">
				<div style=\"padding: 15px;\">
					<table class=\"table table-striped\">";
foreach ($non_pk as $row) {
	$string .= "\n\t\t\t\t\t\t<tr>\n\t\t\t\t\t\t\t<td width=\"20%\"><b>".label($row["column_name"])."</b></td>\n\t\t\t\t\t\t\t<td><?= $".$row["column_name"]."; ?></td>\n\t\t\t\t\t\t</tr>";
}
$string .= "\n\t\t\t\t\t</table>\n\t\t\t\t\t<a href=\"<?= site_url('".$c_url."') ?>\" class=\"btn btn-danger pull-right\">\n\t\t\t\t\t\t<i class=\"fa fa-sign-out\"></i> Kembali\n\t\t\t\t\t</a>
				</div>
			</div>
		</div>
	</div>
</div>";



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>