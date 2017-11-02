<?php 

class Pengetahuan_tacit_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'pengetahuan_tacit';
		$this->data['primary_key']	= 'id_pengetahuan';
	}
}