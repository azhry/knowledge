<?php 

class Staff_ahli extends MY_Controller
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

        if ($this->data['jabatan'] != 'Staff Ahli')
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }

        $this->load->model('komentar_m');
        $this->load->model('user_m');
	}

	public function index()
    {
        $this->load->model('tacit_m');
        $this->load->model('explicit_m');
        $this->load->model('komentar_m');
        $this->load->model('user_m');
        $this->data['tacit']        = $this->tacit_m->get();
        $this->data['explicit']     = $this->explicit_m->get();
        $this->data['komentar']     = $this->komentar_m->get();
        $this->data['user']         = $this->user_m->get(['jabatan' => 'Staff Ahli']);
        $this->data['title']        = 'Dashboard Staff Ahli';
        $this->data['content']      = 'staff_ahli/dashboard';
        $this->template($this->data, 'staff_ahli');
    }

    public function daftar_pengetahuan_tacit()
    {
        $this->load->model('tacit_m');
        if ($this->POST('id_tacit') && $this->POST('delete'))
        {
            $this->tacit_m->delete($this->POST('id_tacit'));
            exit;
        }

        if ($this->POST('id_tacit'))
        {
            $id_tacit   = $this->POST('id_tacit');
            $data       = $this->tacit_m->get_row(['id_tacit' => $id_tacit]);
            if (isset($data))
            {
                if ($data->status == 1)
                {
                    $this->tacit_m->update_where(['id_tacit' => $id_tacit], ['status' => 0]);
                    echo '<button class="btn btn-danger" onclick="changeStatus('.$id_tacit.')"><i class="fa fa-close"></i> Tidak Valid</button>';
                }
                else
                {
                    $this->tacit_m->update_where(['id_tacit' => $id_tacit], ['status' => 1]);
                    echo '<button class="btn btn-success" onclick="changeStatus('.$id_tacit.')"><i class="fa fa-check"></i> Valid</button>';   
                }
             } 

            exit;
        }

        $this->data['tacit']        = $this->tacit_m->get_tacit(['status' => 0]);
        $this->data['title']        = 'Daftar Pengetahuan Tacit';
        $this->data['content']      = 'staff_ahli/daftar_pengetahuan_tacit';
        $this->template($this->data, 'staff_ahli');
    }

    public function detail_data_tacit()
    {
        $this->data['id_tacit'] = $this->uri->segment(3);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('staff-ahli/daftar-pengetahuan-tacit');
            exit;
        }

        $this->load->model('user_m');
        $this->load->model('tacit_m');
        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $this->data['id_tacit']]);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan tacit tidak ditemukan', 'danger');
            redirect('staff-ahli/daftar-pengetahuan-tacit');
            exit;
        }

        $this->load->model('komentar_m');

        if ($this->POST('submit'))
        {
            $this->data['komentar'] = [
                'id_tacit'      => $this->data['id_tacit'],
                'id_explicit'   => 0,
                'nip'           => $this->data['nip'],
                'komentar'      => $this->POST('komentar')
            ];
            $this->komentar_m->insert($this->data['komentar']);
            $this->flashmsg('<i class="lnr lnr-success"></i> Komentar berhasil dimasukkan');
            redirect('staff-ahli/detail-data-tacit/' . $this->data['id_tacit']);
            exit;
        }

        $this->data['komentar']     = $this->komentar_m->get_by_order('waktu', 'ASC', ['id_tacit' => $this->data['id_tacit']]);
        $this->data['title']        = 'Detail Data Pengetahuan Tacit';
        $this->data['content']      = 'staff_ahli/detail_data_tacit';
        $this->template($this->data, 'staff_ahli');
    }

    public function tambah_data_tacit()
    {
        if($this->POST('simpan')){

            $this->data['data_tacit'] = [
                'nip'       => $this->data['nip'],
                'judul'     => $this->POST('judul'),
                'kategori'  => $this->POST('kategori'),
                'masalah'   => $this->POST('masalah'),
                'solusi'    => $this->POST('solusi'),
                'waktu'     => date('Y-m-d H:i:s')
            ];

            $this->load->model('tacit_m');
            $this->tacit_m->insert($this->data['data_tacit']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan tacit berhasil disimpan');

            redirect('staff-ahli/daftar-pengetahuan-tacit');
            exit;
        }


        $this->data['title']        = 'Tambah Data Pengetahuan Tacit';
        $this->data['content']      = 'staff_ahli/tambah_data_tacit';
        $this->template($this->data, 'staff_ahli');
    }

    public function edit_data_tacit()
    {   
        $this->data['id_tacit'] = $this->uri->segment(3);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('staff_ahli/daftar-pengetahuan-tacit');
            exit;
        }

        $this->load->model('tacit_m');
        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $this->data['id_tacit']]);
        if (!isset($this->data['tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan tacit tidak ditemukan', 'danger');
            redirect('staff_ahli/daftar-pengetahuan-tacit');
            exit;
        }

        if ($this->data['tacit']->nip != $this->data['nip'])
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Anda tidak diizinkan untuk mengubah data pengguna lain', 'danger');
            redirect('staff-ahli/daftar-pengetahuan-tacit');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_tacit'] = [
                'judul'         => $this->POST('judul'),
                'kategori'      => $this->POST('kategori'),
                'masalah'       => $this->POST('masalah'),
                'solusi'        => $this->POST('solusi'),
            ];

            $this->tacit_m->update($this->data['id_tacit'], $this->data['data_tacit']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan tacit berhasil diedit');
            redirect('staff_ahli/edit-data-tacit/' . $this->data['id_tacit']);
            exit;
        }

        $this->data['title']        = 'Edit Data Pengetahuan Tacit';
        $this->data['content']      = 'staff_ahli/edit_data_tacit';
        $this->template($this->data, 'staff_ahli');
    }

    public function daftar_pengetahuan_explicit()
    {
        $this->load->model('explicit_m');
        if ($this->POST('delete') && $this->POST('id_explicit'))
        {
            $this->explicit_m->delete($this->POST('id_explicit'));
            exit;
        }

        if ($this->POST('id_explicit'))
        {
            $id_explicit   = $this->POST('id_explicit');
            $data       = $this->explicit_m->get_row(['id_explicit' => $id_explicit]);
            if (isset($data))
            {
                if ($data->status == 1)
                {
                    $this->explicit_m->update_where(['id_explicit' => $id_explicit], ['status' => 0]);
                    echo '<button class="btn btn-danger" onclick="changeStatus('.$id_explicit.')"><i class="fa fa-close"></i> Tidak Valid</button>';
                }
                else
                {
                    $this->explicit_m->update_where(['id_explicit' => $id_explicit], ['status' => 1]);
                    echo '<button class="btn btn-success" onclick="changeStatus('.$id_explicit.')"><i class="fa fa-check"></i> Valid</button>';   
                }
             } 

            exit;
        }

        $this->data['data']        = $this->explicit_m->get_explicit(['status' => 0]);
        $this->data['title']        = 'Data Pengetahuan Explicit';
        $this->data['content']      = 'staff_ahli/data_explicit';
        $this->template($this->data, 'staff_ahli');
    }

    public function tambah_data_explicit()
    {
        if($this->POST('simpan'))
        {
            $filename = date('YmdHis');
            if ($this->upload($filename, 'dokumen', 'doc'))
            {
                $this->data['data_explicit'] = [
                    'nip'           => $this->data['nip'],
                    'judul'         => $this->POST('judul'),
                    'kategori'      => $this->POST('kategori'),
                    'keterangan'    => $this->POST('keterangan'),                
                    'waktu'         => date('Y-m-d H:i:s'),
                    'dokumen'       => $filename . '.pdf'
                ];

                $this->load->model('explicit_m');
                $this->explicit_m->insert($this->data['data_explicit']);
                $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan explicit berhasil disimpan');
            }
            else
            {
                $this->flashmsg('<i class="glyphicon glyphicon-warning"></i> Dokumen gagal diupload', 'danger');
            }

            redirect('staff-ahli/daftar-pengetahuan-explicit');
            exit;
        }

        $this->data['title']        = 'Tambah Data Pengetahuan Explicit';
        $this->data['content']      = 'staff_ahli/tambah_data_explicit';
        $this->template($this->data, 'staff_ahli');
    }

    public function edit_data_explicit()
    {   
        $this->data['id_explicit'] = $this->uri->segment(3);
        if (!isset($this->data['id_explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('staff_ahli/daftar-pengetahuan-explicit');
            exit;
        }

        $this->load->model('explicit_m');
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $this->data['id_explicit']]);
        if (!isset($this->data['explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan eksplisit tidak ditemukan', 'danger');
            redirect('staff_ahli/daftar-pengetahuan-explicit');
            exit;
        }

        if ($this->data['explicit']->nip != $this->data['nip'])
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Anda tidak diizinkan untuk mengubah data pengguna lain', 'danger');
            redirect('staff-ahli/daftar-pengetahuan-explicit');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_explicit'] = [
                'nip'           => $this->data['nip'],
                'judul'         => $this->POST('judul'),
                'kategori'      => $this->POST('kategori'),
                'keterangan'    => $this->POST('keterangan'),                
                'waktu'         => date('Y-m-d H:i:s')
            ];

            $filename = explode('.', $this->data['explicit']->dokumen);
            $this->upload($filename[0], 'dokumen', 'doc');

            $this->explicit_m->update($this->data['id_explicit'], $this->data['data_explicit']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan explicit berhasil diedit');
            redirect('staff_ahli/edit-data-explicit/' . $this->data['id_explicit']);
            exit;
        }

        $this->data['title']        = 'Edit Data Pengetahuan Explicit';
        $this->data['content']      = 'staff_ahli/edit_data_explicit';
        $this->template($this->data, 'staff_ahli');
    }

    public function detail_data_explicit()
    {
        $this->data['id_explicit'] = $this->uri->segment(3);
        if (!isset($this->data['id_explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('staff-ahli/daftar-pengetahuan-explicit');
            exit;
        }

        $this->load->model('user_m');
        $this->load->model('explicit_m');
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $this->data['id_explicit']]);
        if (!isset($this->data['explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan eksplisit tidak ditemukan', 'danger');
            redirect('staff-ahli/daftar-pengetahuan-explicit');
            exit;
        }

        $this->load->model('komentar_m');

        if ($this->POST('submit'))
        {
            $this->data['komentar'] = [
                'id_explicit'   => $this->data['id_explicit'],
                'id_tacit'      => 0,
                'nip'           => $this->data['nip'],
                'komentar'      => $this->POST('komentar')
            ];
            $this->komentar_m->insert($this->data['komentar']);
            $this->flashmsg('<i class="lnr lnr-success"></i> Komentar berhasil dimasukkan');
            redirect('staff-ahli/detail-data-explicit/' . $this->data['id_explicit']);
            exit;
        }

        $this->data['komentar']     = $this->komentar_m->get_by_order('waktu', 'ASC', ['id_explicit' => $this->data['id_explicit']]);
        $this->data['title']        = 'Detail Data Pengetahuan Explicit';
        $this->data['content']      = 'staff_ahli/detail_data_explicit';
        $this->template($this->data, 'staff_ahli');
    }

    public function data_komentar()
    {
        if ($this->POST('delete') && $this->POST('id_komentar'))
        {
            $this->komentar_m->delete($this->POST('id_komentar'));
            exit;
        }

        $this->load->model('komentar_m');
        $this->data['data']        = $this->komentar_m->get();
        $this->data['title']        = 'Data Komentar';
        $this->data['content']      = 'staff_ahli/data_komentar';
        $this->template($this->data, 'staff_ahli');
    }

    public function tambah_data_komentar()
    {
        if($this->POST('simpan')){

            $this->data['data_komentar'] = [
                'nip'   => $this->POST('nip'),
                'id_tacit'   => $this->POST('id_tacit'),
                'id_explicit'   => $this->POST('id_explicit'),
                'komentar'   => $this->POST('komentar'),                
                'waktu'   => $this->POST('waktu')
            ];

            $this->komentar_m->insert($this->data['data_komentar']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Komentar berhasil disimpan');

            redirect('staff_ahli/data_komentar');
            exit;
        }


        $this->data['title']        = 'Tambah Data Komentar';
        $this->data['content']      = 'staff_ahli/tambah_data_komentar';
        $this->template($this->data, 'staff_ahli');
    }

    public function edit_data_komentar($id)
    {   
        $id_komentar = $id;
        if($this->POST('simpan')){

            $this->data['data_komentar'] = [
                'nip'   => $this->POST('nip'),
                'id_tacit'   => $this->POST('id_tacit'),
                'id_explicit'   => $this->POST('id_explicit'),
                'komentar'   => $this->POST('komentar'),                
                'waktu'   => $this->POST('waktu')
            ];

            $this->komentar_m->update($id_komentar,$this->data['data_komentar']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Komentar berhasil diedit');

            redirect('staff_ahli/edit_data_komentar/'.$id_komentar);
        }
        $this->data['komentar']     = $this->komentar_m->get_row(['id_komentar' => $id]);
        if ($this->data['komentar']->nip != $this->data['nip'])
        {
            $this->flashmsg('<i class="fa fa-warning"></i> Anda tidak diizinkan untuk mengubah data pengguna lain', 'danger');
            redirect('staff-ahli/data-komentar');
            exit;
        }

        $this->data['title']        = 'Edit Data Komentar';
        $this->data['content']      = 'staff_ahli/edit_data_komentar';
        $this->template($this->data, 'staff_ahli');
    }

    public function detail_data_komentar($id)
    {

        $this->data['komentar']     = $this->komentar_m->get_row(['id_komentar' => $id]);
        $this->data['title']        = 'Detail Data Komentar';
        $this->data['content']      = 'staff_ahli/detail_data_komentar';
        $this->template($this->data, 'staff_ahli');
    }

    // user
    public function data_user()
    {
        if ($this->POST('nip') && $this->POST('delete'))
        {
            $this->user_m->delete($this->POST('nip'));
            exit;
        }
        
        $this->data['data']        = $this->user_m->get(['jabatan' => 'Staff Ahli']);
        $this->data['title']        = 'Data User';
        $this->data['content']      = 'staff_ahli/data_user';
        $this->template($this->data,'staff_ahli');
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

            $this->upload_img($this->POST('nip'), 'img/user', 'foto');

            $this->user_m->insert($this->data['data_user']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data User berhasil disimpan');
            redirect('staff_ahli/data_user');
            exit;
        }


        $this->data['title']        = 'Tambah Data User';
        $this->data['content']      = 'staff_ahli/tambah_data_user';
        $this->template($this->data,'staff_ahli');
    }

    public function edit_data_user()
    {   
        $this->data['nip']  = $this->uri->segment(3);
        if (!isset($this->data['nip']))
        {
            $this->flashmsg('<i class="fa fa-warning"></i> Required parameter is missing', 'danger');
            redirect('staff_ahli/data-user');
            exit;
        }

        $this->data['user'] = $this->user_m->get_row(['nip' => $this->data['nip']]);
        if (!isset($this->data['user']))
        {
            $this->flashmsg('<i class="fa fa-warning"></i> Data pengguna ' . $this->data['nip'] . ' tidak ditemukan', 'danger');
            redirect('staff_ahli/data-user');
            exit;
        }

        if ($this->data['user']->nip != $this->data['nip'])
        {
            $this->flashmsg('<i class="fa fa-warning"></i> Anda tidak diizinkan untuk mengubah data pengguna lain', 'danger');
            redirect('staff_ahli/data-user');
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

            $this->upload_img($this->POST('nip'), 'img/user', 'foto');
            $this->user_m->update($this->data['nip'], $this->data['data_user']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data User berhasil diedit');
            redirect('staff_ahli/edit-data-user/' . $this->data['nip']);
            exit;
        }

        $this->data['title']        = 'Edit Data User';
        $this->data['content']      = 'staff_ahli/edit_data_user';
        $this->template($this->data,'staff_ahli');
    }

    public function detail_data_user($id)
    {

        $this->data['user']         = $this->user_m->get_row(['nip' => $id]);
        $this->data['title']        = 'Detail Data  User';
        $this->data['content']      = 'staff_ahli/detail_data_user';
        $this->template($this->data,'staff_ahli');
    }

    public function pencarian()
    {
        if ($this->POST('cari'))
        {
            $start = microtime(true);
            $query = $this->POST('query');
            $this->load->model('turbo_bm_m');
            $this->load->model('explicit_m');
            $this->load->model('tacit_m');

            $this->data['result'] = [];
            $kategori = $this->POST('kategori');

            if ($kategori == 0)
            {
                $this->data['tacit_knowledge'] = $this->tacit_m->get_tacit(['status' => 1]);
                foreach ($this->data['tacit_knowledge'] as $tacit_knowledge)
                {
                    $text = strip_tags($tacit_knowledge->masalah);
                    $idx = $this->turbo_bm_m->search(strtolower($text), strtolower($query));
                    if ($idx != -1)
                    {
                        $tacit_knowledge->masalah = $text;
                        $this->data['result'] []= [
                            'index'     => $idx,
                            'knowledge' => $tacit_knowledge
                        ];
                    }
                    else
                    {
                        $text = strip_tags($tacit_knowledge->solusi);
                        $idx = $this->turbo_bm_m->search(strtolower($text), strtolower($query));
                        if ($idx != -1)
                        {
                            $tacit_knowledge->masalah = $text;
                            $this->data['result'] []= [
                                'index'     => $idx,
                                'knowledge' => $tacit_knowledge
                            ];
                        }
                    }
                }
            }
            else if ($kategori == 1)
            {
                $docsPath = FCPATH . '/assets/dokumen/';
                $this->data['explicit_knowledge'] = $this->explicit_m->get_explicit(['status' => 1]);
                foreach ($this->data['explicit_knowledge'] as $explicit_knowledge)
                {
                    if (file_exists($docsPath . $explicit_knowledge->dokumen))
                    {
                        $parser = new \Smalot\PdfParser\Parser();
                        $pdf = $parser->parseFile($docsPath . $explicit_knowledge->dokumen);
                        $text = $pdf->getText();
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
        $this->data['content']      = 'staff_ahli/hasil_pencarian';
        $this->template($this->data, 'staff_ahli');
    }

    public function profile()
    {
        $this->load->model('user_m');
        $this->data['user'] = $this->user_m->get_row(['nip' => $this->data['nip']]);

        if ($this->POST('submit'))
        {
            $msg        = 'Data profile berhasil diubah';
            $msg_type   = 'success';
            
            $this->upload_img($this->POST('nip'), 'img/user', 'foto');
            if ($this->user_m->update($this->data['nip'], [
                'nip'       => $this->POST('nip'),
                'nama'      => $this->POST('nama'),
                'bagian'    => $this->POST('bagian'),
                'email'     => $this->POST('email'),
                'no_hp'     => $this->POST('no_hp'),
                'alamat'    => $this->POST('alamat')
            ]))
            {
                $this->session->set_userdata('nip', $this->POST('nip'));
            }
            else
            {
                $msg = 'Data profile gagal diubah';
                $msg_type = 'danger';
            }

            $this->flashmsg($msg, $msg_type);
            redirect('staff-ahli/profile');
            exit;
        }

        $this->data['title']        = 'Profile';
        $this->data['content']      = 'staff_ahli/profile';
        $this->template($this->data, 'staff_ahli');
    }

    public function sunting_password()
    {
        $this->load->model('user_m');
        $this->data['user'] = $this->user_m->get_row(['nip' => $this->data['nip']]);

        if ($this->POST('submit'))
        {
            $msg        = 'Password berhasil diubah';
            $msg_type   = 'success';

            $password_lama = $this->POST('password_lama');
            $password_baru = $this->POST('password_baru');
            $password_lagi = $this->POST('password_lagi');
            if (!empty($password_lama) && !empty($password_baru) && !empty($password_lagi))
            {
                if (md5($password_lama) == $this->data['user']->password)
                {
                    if ($password_baru == $password_lagi)
                    {
                        $this->user_m->update($this->data['nip'], [
                            'password' => md5($password_baru)
                        ]);
                    }
                    else
                    {
                        $msg = 'Password baru dan password lagi tidak cocok';
                        $msg_type = 'danger';
                    }
                }
                else
                {
                    $msg = 'Password lama tidak cocok';
                    $msg_type = 'danger';
                }
            }
            else
            {
                $msg = 'Anda tidak mengubah password';
                $msg_type = 'warning';
            }

            $this->flashmsg($msg, $msg_type);
            redirect('staff-ahli/sunting-password');
            exit;
        }

        $this->data['title']        = 'Sunting Password';
        $this->data['content']      = 'staff_ahli/sunting_password';
        $this->template($this->data, 'staff_ahli');
    }

    public function knowledge_base()
    {
        $this->load->model('tacit_m');
        $this->load->model('explicit_m');
        $this->data['tacit']    = $this->tacit_m->get_tacit(['user.nip' => $this->data['nip']]);
        $this->data['explicit'] = $this->explicit_m->get_explicit(['user.nip' => $this->data['nip']]);
        $this->data['title']    = 'My Knowledge';
        $this->data['content']  = 'staff_ahli/knowledge_base';
        $this->template($this->data, 'staff_ahli');
    }
}