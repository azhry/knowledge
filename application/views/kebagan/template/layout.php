<?php

	$this->load->view('kebagan/template/header', array('title' => $title));
	$this->load->view('kebagan/template/navbar');
	$this->load->view('kebagan/template/sidebar');
	$this->load->view($content);
	$this->load->view('kebagan/template/footer');
?>
