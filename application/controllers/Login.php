<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{

	private $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->data['nip'] = $this->session->userdata('nip');
		if (isset($this->data['nip']))
		{
			$this->data['jabatan'] = $this->session->userdata('jabatan');
			switch ($this->data['jabatan'])
			{
				case 'Admin':
					redirect('admin');
					exit;

				case 'Staff':
					redirect('staff');
					exit;

				case 'Staff Ahli':
					redirect('staff-ahli');
					exit;

				case 'Kebagan':
					redirect('kebagan');
					exit;
			}
		}
	}

	public function index()
	{
		if ($this->POST('login'))
		{
			$this->load->model('login_m');
			if (!$this->login_m->required_input(['nip','password'])) 
			{
				$this->flashmsg('Data harus lengkap','warning');
				redirect('login');
				exit;
			}
			
			$this->data = [
				'nip'	=> $this->POST('nip'),
				'password'	=> md5($this->POST('password'))
			];

			$result = $this->login_m->login($this->data['nip'], $this->data['password']);
			if (!isset($result)) 
			{
				$this->flashmsg('NIP atau password salah','danger');
			}
			
			redirect('login');
			exit;
		}
		
		$this->data['title'] = 'LOGIN' . $this->title;
		$this->load->view('login', $this->data);
	}
}
