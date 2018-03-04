<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
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

        if ($this->data['jabatan'] != 'Admin')
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }

        $this->load->model('tacit_m');
        $this->load->model('explicit_m');
        $this->load->model('komentar_m');
        $this->load->model('user_m');
    }

    public function index()
    {
        $this->data['user']         = $this->user_m->get();
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    public function hasil_uji_daun()
    {
        $this->data['title']        = 'Data Hasil Uji Daun Sawit';
        $this->data['content']      = 'admin/hasil_uji_daun';
        $this->template($this->data);
    }

    public function data_tanah()
    {
        $this->data['title']        = 'Data Tanah Lab FP Kecil';
        $this->data['content']      = 'admin/data_tanah';
        $this->template($this->data);
    }

    // user
    public function data_user()
    {
        if ($this->POST('nip') && $this->POST('delete'))
        {
            $this->user_m->delete($this->POST('nip'));
            exit;
        }

        $this->data['data']        = $this->user_m->get();
        $this->data['title']        = 'Data User';
        $this->data['content']      = 'admin/data_user';
        $this->template($this->data);
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
            redirect('admin/tambah_data_user');
            exit;
        }


        $this->data['title']        = 'Tambah Data User';
        $this->data['content']      = 'admin/tambah_data_user';
        $this->template($this->data);
    }

    public function edit_data_user()
    {   
        $this->data['nip']  = $this->uri->segment(3);
        if (!isset($this->data['nip']))
        {
            $this->flashmsg('<i class="fa fa-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/data-user');
            exit;
        }

        $this->data['user'] = $this->user_m->get_row(['nip' => $this->data['nip']]);
        if (!isset($this->data['user']))
        {
            $this->flashmsg('<i class="fa fa-warning"></i> Data pengguna ' . $this->data['nip'] . ' tidak ditemukan', 'danger');
            redirect('admin/data-user');
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
            redirect('admin/edit-data-user/' . $this->data['nip']);
            exit;
        }

        $this->data['title']        = 'Edit Data User';
        $this->data['content']      = 'admin/edit_data_user';
        $this->template($this->data);
    }

    public function detail_data_user($id)
    {

        $this->data['user']         = $this->user_m->get_row(['nip' => $id]);
        $this->data['title']        = 'Detail Data  User';
        $this->data['content']      = 'admin/detail_data_user';
        $this->template($this->data);
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
        $this->data['content']      = 'admin/hasil_pencarian';
        $this->template($this->data, 'admin');
    }

    public function detail_data_tacit()
    {
        $this->data['id_tacit'] = $this->uri->segment(3);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/daftar-pengetahuan-tacit');
            exit;
        }

        $this->load->model('user_m');
        $this->load->model('tacit_m');
        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $this->data['id_tacit']]);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan tacit tidak ditemukan', 'danger');
            redirect('admin/daftar-pengetahuan-tacit');
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
            redirect('admin/detail-data-tacit/' . $this->data['id_tacit']);
            exit;
        }

        $this->data['komentar']     = $this->komentar_m->get_by_order('waktu', 'ASC', ['id_tacit' => $this->data['id_tacit']]);
        $this->data['title']        = 'Detail Data Pengetahuan Tacit';
        $this->data['content']      = 'admin/detail_data_tacit';
        $this->template($this->data, 'admin');
    }

    public function detail_data_explicit()
    {
        $this->data['id_explicit'] = $this->uri->segment(3);
        if (!isset($this->data['id_explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/daftar-pengetahuan-explicit');
            exit;
        }

        $this->load->model('user_m');
        $this->load->model('explicit_m');
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $this->data['id_explicit']]);
        if (!isset($this->data['explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan eksplisit tidak ditemukan', 'danger');
            redirect('admin/daftar-pengetahuan-explicit');
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
            redirect('admin/detail-data-explicit/' . $this->data['id_explicit']);
            exit;
        }

        $this->data['komentar']     = $this->komentar_m->get_by_order('waktu', 'ASC', ['id_explicit' => $this->data['id_explicit']]);
        $this->data['title']        = 'Detail Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/detail_data_explicit';
        $this->template($this->data, 'admin');
    }

    public function daftar_pengetahuan_tacit()
    {
        $this->load->model('tacit_m');
        if ($this->POST('id_tacit') && $this->POST('delete'))
        {
            $this->tacit_m->delete($this->POST('id_tacit'));
            exit;
        }

        $this->data['tacit']        = $this->tacit_m->get_tacit();
        $this->data['title']        = 'Daftar Pengetahuan Tacit';
        $this->data['content']      = 'admin/daftar_pengetahuan_tacit';
        $this->template($this->data, 'admin');
    }

    public function edit_data_tacit()
    {   
        $this->data['id_tacit'] = $this->uri->segment(3);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/daftar-pengetahuan-tacit');
            exit;
        }

        $this->load->model('tacit_m');
        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $this->data['id_tacit']]);
        if (!isset($this->data['tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan tacit tidak ditemukan', 'danger');
            redirect('admin/daftar-pengetahuan-tacit');
            exit;
        }

        // if ($this->data['tacit']->nip != $this->data['nip'])
        // {
        //     $this->flashmsg('<i class="lnr lnr-warning"></i> Anda tidak diizinkan untuk mengubah data pengguna lain', 'danger');
        //     redirect('admin/daftar-pengetahuan-tacit');
        //     exit;   
        // }

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
            redirect('admin/edit-data-tacit/' . $this->data['id_tacit']);
            exit;
        }

        $this->data['title']        = 'Edit Data Pengetahuan Tacit';
        $this->data['content']      = 'admin/edit_data_tacit';
        $this->template($this->data, 'admin');
    }

    public function daftar_pengetahuan_explicit()
    {
        $this->load->model('explicit_m');
        if ($this->POST('delete') && $this->POST('id_explicit'))
        {
            $this->explicit_m->delete($this->POST('id_explicit'));
            exit;
        }

        $this->data['data']        = $this->explicit_m->get_explicit();
        $this->data['title']        = 'Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/daftar_pengetahuan_explicit';
        $this->template($this->data, 'admin');
    }

    public function edit_data_explicit()
    {   
        $this->data['id_explicit'] = $this->uri->segment(3);
        if (!isset($this->data['id_explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/daftar-pengetahuan-explicit');
            exit;
        }

        $this->load->model('explicit_m');
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $this->data['id_explicit']]);
        if (!isset($this->data['explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan eksplisit tidak ditemukan', 'danger');
            redirect('admin/daftar-pengetahuan-explicit');
            exit;
        }

        // if ($this->data['explicit']->nip != $this->data['nip'])
        // {
        //     $this->flashmsg('<i class="lnr lnr-warning"></i> Anda tidak diizinkan untuk mengubah data pengguna lain', 'danger');
        //     redirect('admin/daftar-pengetahuan-explicit');
        //     exit;   
        // }

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
            redirect('admin/edit-data-explicit/' . $this->data['id_explicit']);
            exit;
        }

        $this->data['title']        = 'Edit Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/edit_data_explicit';
        $this->template($this->data, 'admin');
    }

    public function detail_profile()
    {
        $this->data['nip']  = $this->uri->segment(3);
        if (!isset($this->data['nip']))
        {
            $this->flashmsg('Required parameter is missing', 'danger');
            redirect('admin/pencarian');
            exit;
        }

        $this->load->model('user_m');
        $this->data['user'] = $this->user_m->get_row(['nip' => $this->data['nip']]);
        if (!isset($this->data['user']))
        {
            $this->flashmsg('Data not found', 'danger');
            redirect('admin/pencarian');
            exit;
        }

        $this->load->model('tacit_m');
        $this->load->model('explicit_m');

        $this->data['tacit']    = $this->tacit_m->get(['nip' => $this->data['nip']]);
        $this->data['explicit'] = $this->explicit_m->get(['nip' => $this->data['nip']]);
        $this->data['title']    = 'Detail Profile';
        $this->data['content']  = 'admin/detail_profile';
        $this->template($this->data, 'admin');
    }

    public function pengujian()
    {
        $this->data['title']        = 'Pengujian';
        $this->data['content']      = 'admin/pengujian';
        $this->template($this->data);
    }
}
