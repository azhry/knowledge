<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('tacit_m');
        $this->load->model('explicit_m');
        $this->load->model('komentar_m');
        $this->load->model('user_m');
    }

    public function index()
    {
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

    public function pengetahuan_tacit()
    {
        $this->load->model('pengetahuan_tacit_m');
        if ($this->POST('submit'))
        {
            $this->data['tacit'] = [
                'judul'         => $this->POST('judul'),
                'deskripsi'     => $this->POST('deskripsi')
            ];

            $this->pengetahuan_tacit_m->insert($this->data['tacit']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan tacit berhasil disimpan');
            redirect('admin/pengetahuan-tacit');
            exit;
        }

        $this->data['title']        = 'Pengetahuan Tacit';
        $this->data['content']      = 'admin/pengetahuan_tacit';
        $this->template($this->data);
    }

    public function daftar_pengetahuan_tacit()
    {
        $this->data['title']        = 'Daftar Pengetahuan Tacit';
        $this->data['content']      = 'admin/daftar_pengetahuan_tacit';
        $this->template($this->data);
    }

     public function data_tacit()
    {
        $this->data['data']        = $this->tacit_m->get();
        $this->data['title']        = 'Data Pengetahuan Tacit';
        $this->data['content']      = 'admin/data_tacit';
        $this->template($this->data);
    }

    public function tambah_data_tacit()
    {
        if($this->POST('simpan')){

            $this->data['data_tacit'] = [
                'nip'   => $this->POST('nip'),
                'judul'   => $this->POST('judul'),
                'kategori'   => $this->POST('kategori'),
                'masalah'   => $this->POST('masalah'),
                'solusi'   => $this->POST('solusi'),
                'waktu'   => $this->POST('waktu'),
                'status'   => $this->POST('status')
            ];

            $this->tacit_m->insert($this->data['data_tacit']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan tacit berhasil disimpan');

            redirect('admin/tambah_data_tacit');
            exit;
        }


        $this->data['title']        = 'Tambah Data Pengetahuan Tacit';
        $this->data['content']      = 'admin/tambah_data_tacit';
        $this->template($this->data);
    }

    public function edit_data_tacit($id)
    {   
        $id_tacit = $id;
        if($this->POST('simpan')){

            $this->data['data_tacit'] = [
                'nip'   => $this->POST('nip'),
                'judul'   => $this->POST('judul'),
                'kategori'   => $this->POST('kategori'),
                'masalah'   => $this->POST('masalah'),
                'solusi'   => $this->POST('solusi'),
                'waktu'   => $this->POST('waktu'),
                'status'   => $this->POST('status')
            ];

            $this->tacit_m->update($id_tacit,$this->data['data_tacit']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan tacit berhasil diedit');

            redirect('admin/edit_data_tacit/'.$id_tacit);
        }

        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $id]);
        $this->data['title']        = 'Edit Data Pengetahuan Tacit';
        $this->data['content']      = 'admin/edit_data_tacit';
        $this->template($this->data);
    }

    public function detail_data_tacit($id)
    {

        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $id]);
        $this->data['title']        = 'Detail Data Pengetahuan Tacit';
        $this->data['content']      = 'admin/detail_data_tacit';
        $this->template($this->data);
    }

    public function data_explicit()
    {
        $this->data['data']        = $this->explicit_m->get();
        $this->data['title']        = 'Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/data_explicit';
        $this->template($this->data);
    }

    public function tambah_data_explicit()
    {
        if($this->POST('simpan')){

            $this->data['data_explicit'] = [
                'nip'   => $this->POST('nip'),
                'judul'   => $this->POST('judul'),
                'kategori'   => $this->POST('kategori'),
                'keterangan'   => $this->POST('keterangan'),                
                'waktu'   => $this->POST('waktu'),
                'status'   => $this->POST('status')
            ];

            $this->upload($this->POST('nip'), 'dokumen', 'doc');

            $this->explicit_m->insert($this->data['data_explicit']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan explicit berhasil disimpan');

            redirect('admin/tambah_data_explicit');
            exit;
        }


        $this->data['title']        = 'Tambah Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/tambah_data_explicit';
        $this->template($this->data);
    }

    public function edit_data_explicit($id)
    {   
        $id_explicit = $id;
        if($this->POST('simpan')){

            $this->data['data_explicit'] = [
                'nip'   => $this->POST('nip'),
                'judul'   => $this->POST('judul'),
                'kategori'   => $this->POST('kategori'),
                'keterangan'   => $this->POST('keterangan'),                
                'waktu'   => $this->POST('waktu'),
                'status'   => $this->POST('status')
            ];

            $this->explicit_m->update($id_explicit,$this->data['data_explicit']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan explicit berhasil diedit');

            redirect('admin/edit_data_explicit/'.$id_explicit);
        }
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $id]);
        $this->data['title']        = 'Edit Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/edit_data_explicit';
        $this->template($this->data);
    }

    public function detail_data_explicit($id)
    {

        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $id]);
        $this->data['title']        = 'Detail Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/detail_data_explicit';
        $this->template($this->data);
    }

    public function data_komentar()
    {
        $this->data['data']        = $this->komentar_m->get();
        $this->data['title']        = 'Data Komentar';
        $this->data['content']      = 'admin/data_komentar';
        $this->template($this->data);
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

            redirect('admin/tambah_data_komentar');
            exit;
        }


        $this->data['title']        = 'Tambah Data Komentar';
        $this->data['content']      = 'admin/tambah_data_komentar';
        $this->template($this->data);
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

            redirect('admin/edit_data_komentar/'.$id_komentar);
        }
        $this->data['komentar']     = $this->komentar_m->get_row(['id_komentar' => $id]);
        $this->data['title']        = 'Edit Data Komentar';
        $this->data['content']      = 'admin/edit_data_komentar';
        $this->template($this->data);
    }

    public function detail_data_komentar($id)
    {

        $this->data['komentar']     = $this->komentar_m->get_row(['id_komentar' => $id]);
        $this->data['title']        = 'Detail Data Komentar';
        $this->data['content']      = 'admin/detail_data_komentar';
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
                'nip'   => $this->POST('nip'),
                'password'   => md5($this->POST('password')),
                'nama'   => $this->POST('nama'),
                'jabatan'   => $this->POST('jabatan'),
                'bagian'   => $this->POST('bagian'),                
                'email'   => $this->POST('email'),
                'no_hp'   => $this->POST('no_hp'),
                'alamat'   => $this->POST('alamat')
            ];

             $this->upload($this->POST('nip'), 'userfile', 'doc');

            $this->user_m->insert($this->data['data_user']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data User berhasil disimpan');

            redirect('admin/tambah_data_user');
            exit;
        }


        $this->data['title']        = 'Tambah Data User';
        $this->data['content']      = 'admin/tambah_data_user';
        $this->template($this->data);
    }

    public function edit_data_user($id)
    {   
        $nip = $id;
        if($this->POST('simpan')){

            $this->data['data_user'] = [
                'nip'   => $this->POST('nip'),
                'password'   => md5($this->POST('password')),
                'nama'   => $this->POST('nama'),
                'jabatan'   => $this->POST('jabatan'),
                'bagian'   => $this->POST('bagian'),                
                'email'   => $this->POST('email'),
                'no_hp'   => $this->POST('no_hp'),
                'alamat'   => $this->POST('alamat')
            ];

            $this->user_m->update($nip,$this->data['data_user']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data User berhasil diedit');

            redirect('admin/edit_data_user/'.$nip);
        }
        $this->data['user']     = $this->user_m->get_row(['nip' => $id]);
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
