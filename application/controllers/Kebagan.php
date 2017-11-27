<?php 

class Kebagan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['nip']      = $this->session->userdata('nip');
        $this->data['jabatan']  = $this->session->userdata('jabatan');
        if (!isset($this->data['nip'], $this->data['jabatan']))
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }

        if ($this->data['jabatan'] != 'Kebagan')
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }
	}

	public function index()
	{
		echo 'Dashboard kebagan';
	}
}