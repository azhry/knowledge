<?php

	$this->load->view('staff_ahli/template/header', array('title' => $title));
	$this->load->view('staff_ahli/template/navbar');
	$this->load->view('staff_ahli/template/sidebar');
	$this->load->view($content);
	$this->load->view('staff_ahli/template/footer');
?>
