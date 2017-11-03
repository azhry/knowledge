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
}
