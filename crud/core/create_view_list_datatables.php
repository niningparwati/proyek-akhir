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
                        </thead>";
$column_non_pk = array();
foreach ($non_pk as $row) {
    $column_non_pk[] .= "\n\t\t\t\t\t\t\t\t\t{\n\t\t\t\t\t\t\t\t\t\t\"data\": \"".$row['column_name']."\"\n\t\t\t\t\t\t\t\t\t}";
}
$col_non_pk = implode(',', $column_non_pk);
$string .= "    
                    </table>

                    <script src=\"<?= base_url('assets/js/jquery-1.11.2.min.js') ?>\"></script>
                    <script type=\"text/javascript\">
                        $(document).ready(function() {
                            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                            {
                                return {
                                    \"iStart\": oSettings._iDisplayStart,
                                    \"iEnd\": oSettings.fnDisplayEnd(),
                                    \"iLength\": oSettings._iDisplayLength,
                                    \"iTotal\": oSettings.fnRecordsTotal(),
                                    \"iFilteredTotal\": oSettings.fnRecordsDisplay(),
                                    \"iPage\": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                                    \"iTotalPages\": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                                };
                            };

                            var t = $(\"#mytable\").dataTable({
                                \"processing\"  : true,
                                \"serverSide\"  : true,
                                \"oLanguage\"   : { sProcessing : \"Loading. . .\" },
                                \"ajax\"        : { \"url\" : \"<?= site_url('".$c_url."/json') ?>\", \"type\": \"POST\"},
                                \"columns\"     : [
                                    {
                                        \"data\": \"$pk\",
                                        \"orderable\": false,
                                        \"className\" : \"text-center\"
                                    },".$col_non_pk.",
                                    {
                                        \"data\" : \"action\",
                                        \"orderable\": false,
                                        \"className\" : \"text-center\"
                                    }
                                ],
                                order: [[0, 'desc']],
                                rowCallback: function(row, data, iDisplayIndex) {
                                    var info = this.fnPagingInfo();
                                    var page = info.iPage;
                                    var length = info.iLength;
                                    var index = page * length + (iDisplayIndex + 1);
                                    $('td:eq(0)', row).html(index);
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
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