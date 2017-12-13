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

        $this->load->model('user_m');
	}

	public function index()
	{
		$this->data['user']         = $this->user_m->get();
        $this->data['title']        = 'Dashboard Kebagan';
        $this->data['content']      = 'kebagan/dashboard';
        $this->template($this->data,'kebagan');
	}

    public function hasil_pencarian()
    {
        $this->load->view('kebagan/hasil_pencarian');
    }    
}