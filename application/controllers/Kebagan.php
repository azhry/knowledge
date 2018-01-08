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
		$this->data['user']         = $this->user_m->get(['jabatan' => 'Kebagan']);
        $this->data['title']        = 'Dashboard Kebagan';
        $this->data['content']      = 'kebagan/dashboard';
        $this->template($this->data,'kebagan');
	}

    public function pencarian()
    {
        if ($this->POST('cari'))
        {
            $start = microtime(true);
            $query = $this->POST('query');
            $this->load->model('turbo_bm_m');
            $this->load->model('explicit_m');
            $this->data['explicit_knowledge'] = $this->explicit_m->get();
            $this->data['result'] = [];
            foreach ($this->data['explicit_knowledge'] as $explicit_knowledge)
            {
                $text = strip_tags($explicit_knowledge->keterangan);
                $idx = $this->turbo_bm_m->search(strtolower($text), strtolower($query));
                if ($idx != -1)
                {
                    $explicit_knowledge->keterangan = $text;
                    $this->data['result'] []= [
                        'index'     => $idx,
                        'knowledge' => $explicit_knowledge
                    ];
                }
            }
            $time_elapsed = microtime(true) - $start;
            $this->data['response'] = [
                'result'    => $this->data['result'],
                'num_rows'  => count($this->data['result']),
                'elapsed'   => $time_elapsed
            ];
            echo json_encode($this->data['response']);
            exit;
        }

        $this->data['title']        = 'Hasil Pencarian';
        $this->data['content']      = 'kebagan/hasil_pencarian';
        $this->template($this->data,'kebagan');
    }   

    // user
    public function data_user()
    {
        if ($this->POST('nip') && $this->POST('delete'))
        {
            $this->user_m->delete($this->POST('nip'));
            exit;
        }
        
        $this->data['data']        = $this->user_m->get(['jabatan' => 'Kebagan']);
        $this->data['title']        = 'Data User';
        $this->data['content']      = 'kebagan/data_user';
        $this->template($this->data,'kebagan');
    }

    public function tambah_data_user()
    {
        if($this->POST('simpan')){

            $this->data['data_user'] = [
                'nip'       => $this->POST('nip'),
                'password'  => md5($this->POST('password')),
                'nama'      => $this->POST('nama'),
                'jabatan'   => $this->POST('jabatan'),
                'bagian'    => $this->POST('bagian'),                
                'email'     => $this->POST('email'),
                'no_hp'     => $this->POST('no_hp'),
                'alamat'    => $this->POST('alamat')
            ];

            // $this->upload($this->POST('nip'), 'userfile', 'doc');

            $this->user_m->insert($this->data['data_user']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data User berhasil disimpan');
            redirect('kebagan/tambah_data_user');
            exit;
        }


        $this->data['title']        = 'Tambah Data User';
        $this->data['content']      = 'kebagan/tambah_data_user';
        $this->template($this->data,'kebagan');
    }

    public function edit_data_user()
    {   
        $this->data['nip']  = $this->uri->segment(3);
        if (!isset($this->data['nip']))
        {
            $this->flashmsg('<i class="fa fa-warning"></i> Required parameter is missing', 'danger');
            redirect('kebagan/data-user');
            exit;
        }

        $this->data['user'] = $this->user_m->get_row(['nip' => $this->data['nip']]);
        if (!isset($this->data['user']))
        {
            $this->flashmsg('<i class="fa fa-warning"></i> Data pengguna ' . $this->data['nip'] . ' tidak ditemukan', 'danger');
            redirect('kebagan/data-user');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_user'] = [
                'nip'       => $this->POST('nip'),
                'nama'      => $this->POST('nama'),
                'jabatan'   => $this->POST('jabatan'),
                'bagian'    => $this->POST('bagian'),                
                'email'     => $this->POST('email'),
                'no_hp'     => $this->POST('no_hp'),
                'alamat'    => $this->POST('alamat')
            ];

            $password = $this->POST('password');
            if (!empty($password) or strlen($password) > 0)
            {
                $this->data['data_user']['password'] = md5($password);
            }

            $this->user_m->update($this->data['nip'], $this->data['data_user']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data User berhasil diedit');
            redirect('kebagan/edit-data-user/' . $this->data['nip']);
            exit;
        }

        $this->data['title']        = 'Edit Data User';
        $this->data['content']      = 'kebagan/edit_data_user';
        $this->template($this->data,'kebagan');
    }

    public function detail_data_user($id)
    {

        $this->data['user']         = $this->user_m->get_row(['nip' => $id]);
        $this->data['title']        = 'Detail Data  User';
        $this->data['content']      = 'kebagan/detail_data_user';
        $this->template($this->data,'kebagan');
    }

    public function detail_data_explicit()
    {
        $this->data['id_explicit'] = $this->uri->segment(3);
        if (!isset($this->data['id_explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('kebagan/pencarian');
            exit;
        }

        $this->load->model('user_m');
        $this->load->model('explicit_m');
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $this->data['id_explicit']]);
        if (!isset($this->data['explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan eksplisit tidak ditemukan', 'danger');
            redirect('kebagan/pencarian');
            exit;
        }

        $this->data['title']        = 'Detail Data Pengetahuan Explicit';
        $this->data['content']      = 'staff/detail_data_explicit';
        $this->template($this->data, 'staff');
    }

}