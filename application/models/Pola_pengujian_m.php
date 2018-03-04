<?php 

class Pola_pengujian_m extends MY_Model {

	public function __construct() {

		parent::__construct();
		$this->data['table_name']	= 'pola_pengujian';
		$this->data['primary_key']	= 'id_pola';

	}

}