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

        $this->load->model('Pemohon_m');
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

    public function input_judul()
    {
        $this->data['title']        = 'Input Judul';
        $this->data['content']      = 'admin/input_judul';
        $this->template($this->data);
    }
}
