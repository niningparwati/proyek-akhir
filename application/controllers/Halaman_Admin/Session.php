<?php
	if($this->session->userdata('status') != 'admin'){
		redirect(base_url("index.php/Halaman_Admin/Login"));
	}
?>