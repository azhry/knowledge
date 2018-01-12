<?php 

class Explicit_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'explicit';
		$this->data['primary_key']	= 'id_explicit';
	}

	public function get_explicit($cond = '')
	{
		$this->db->select('*');
		$this->db->from($this->data['table_name']);
		$this->db->order_by($this->data['table_name'] . '.waktu', 'DESC');
		$this->db->join('user', $this->data['table_name'] . '.nip = user.nip');
		if ((is_array($cond) && count($cond) > 0) || (is_string($cond) && strlen($cond) >= 3))
			$this->db->where($cond);
		$query = $this->db->get();
		return $query->result();
	}
}