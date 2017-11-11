<?php 

class Explicit_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'explicit';
		$this->data['primary_key']	= 'id_explicit';
	}
}