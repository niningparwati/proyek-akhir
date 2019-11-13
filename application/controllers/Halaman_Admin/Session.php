<?php
	if($this->session->userdata('status') != 'admin'){
		redirect(base_url("index.php/Admin"));
	}
?>