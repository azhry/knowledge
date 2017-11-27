<?php

	$this->load->view('staff/template/header', array('title' => $title));
	$this->load->view('staff/template/navbar');
	$this->load->view('staff/template/sidebar');
	$this->load->view($content);
	$this->load->view('staff/template/footer');
?>
