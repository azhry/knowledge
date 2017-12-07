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

            // $this->upload($this->POST('nip'), 'userfile', 'doc');

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
        $this->data['title']        = 'Detail Data User';
        $this->data['content']      = 'admin/detail_data_user';
        $this->template($this->data);
    }
}
