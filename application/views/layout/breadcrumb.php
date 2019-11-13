<?php 
if (!function_exists('generatedBreadcrumb')) {

    function generateBreadcrumb() {
        $ci = &get_instance();
        $i = 1;
        $uri = $ci->uri->segment($i);
        $link = '';

        while ($uri != '') {
            $prep_link = '';
            for ($j = 1; $j <= $i; $j++) {
                $prep_link .= $ci->uri->segment($j);
            }

            if ($ci->uri->segment($i + 1) == '') {
                $link .= '<li>';
                $link .=  ucwords(str_replace('_', ' ', $ci->uri->segment($i))) . '</li>';
            } else {
                $link .= '<li>';
                $link .= ucwords(str_replace('_', ' ', $ci->uri->segment($i))) . '<span class="divider"></span></li>';
            }

            $i++;
            $uri = $ci->uri->segment($i);
        }
        $link .= '';
        return $link;
    }

}
$link = generateBreadcrumb();

?>

<section class="content-header">
    <h1>
        <?php 
        $segment = str_replace('_', ' ', $this->uri->segment(1));
        echo ucwords($segment); 
        ?>
    </h1>
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
        </li>

        <?php
            if ($this->uri->segment(1) != 'dashboard') {
                echo $link;
            }
        ?>
    </ol>
</section>