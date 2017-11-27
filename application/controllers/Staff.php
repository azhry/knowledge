<?php 

class Staff extends MY_Controller
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

        if ($this->data['jabatan'] != 'Staff')
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }
	}

	public function index()
	{
        $this->load->model('tacit_m');
        $this->load->model('explicit_m');
        $this->load->model('user_m');
        $this->data['tacit']        = $this->tacit_m->get();
        $this->data['explicit']     = $this->explicit_m->get();
        $this->data['staff']        = $this->user_m->get(['jabatan' => 'Staff']);
		$this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'staff/dashboard';
        $this->template($this->data, 'staff');
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
        $this->data['content']      = 'staff/daftar_pengetahuan_tacit';
        $this->template($this->data, 'staff');
    }

    public function detail_data_tacit()
    {
        $this->data['id_tacit'] = $this->uri->segment(3);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('staff/daftar-pengetahuan-tacit');
            exit;
        }

        $this->load->model('user_m');
        $this->load->model('tacit_m');
        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $this->data['id_tacit']]);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan tacit tidak ditemukan', 'danger');
            redirect('staff/daftar-pengetahuan-tacit');
            exit;
        }

        $this->data['title']        = 'Detail Data Pengetahuan Tacit';
        $this->data['content']      = 'staff/detail_data_tacit';
        $this->template($this->data, 'staff');
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

            redirect('staff/tambah-data-tacit');
            exit;
        }


        $this->data['title']        = 'Tambah Data Pengetahuan Tacit';
        $this->data['content']      = 'staff/tambah_data_tacit';
        $this->template($this->data, 'staff');
    }

    public function edit_data_tacit()
    {   
        $this->data['id_tacit'] = $this->uri->segment(3);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('staff/daftar-pengetahuan-tacit');
            exit;
        }

        $this->load->model('tacit_m');
        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $this->data['id_tacit']]);
        if (!isset($this->data['tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan tacit tidak ditemukan', 'danger');
            redirect('staff/daftar-pengetahuan-tacit');
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
            redirect('staff/edit-data-tacit/' . $this->data['id_tacit']);
            exit;
        }

        $this->data['title']        = 'Edit Data Pengetahuan Tacit';
        $this->data['content']      = 'staff/edit_data_tacit';
        $this->template($this->data, 'staff');
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
        $this->data['content']      = 'staff/data_explicit';
        $this->template($this->data, 'staff');
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

            redirect('staff/tambah-data-explicit');
            exit;
        }

        $this->data['title']        = 'Tambah Data Pengetahuan Explicit';
        $this->data['content']      = 'staff/tambah_data_explicit';
        $this->template($this->data, 'staff');
    }

    public function edit_data_explicit()
    {   
        $this->data['id_explicit'] = $this->uri->segment(3);
        if (!isset($this->data['id_explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('staff/daftar-pengetahuan-explicit');
            exit;
        }

        $this->load->model('explicit_m');
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $this->data['id_explicit']]);
        if (!isset($this->data['explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan eksplisit tidak ditemukan', 'danger');
            redirect('staff/daftar-pengetahuan-explicit');
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
            redirect('staff/edit-data-explicit/' . $this->data['id_explicit']);
            exit;
        }

        $this->data['title']        = 'Edit Data Pengetahuan Explicit';
        $this->data['content']      = 'staff/edit_data_explicit';
        $this->template($this->data, 'staff');
    }

    public function detail_data_explicit()
    {
        $this->data['id_explicit'] = $this->uri->segment(3);
        if (!isset($this->data['id_explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('staff/daftar-pengetahuan-explicit');
            exit;
        }

        $this->load->model('user_m');
        $this->load->model('explicit_m');
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $this->data['id_explicit']]);
        if (!isset($this->data['explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan eksplisit tidak ditemukan', 'danger');
            redirect('staff/daftar-pengetahuan-explicit');
            exit;
        }

        $this->data['title']        = 'Detail Data Pengetahuan Explicit';
        $this->data['content']      = 'staff/detail_data_explicit';
        $this->template($this->data, 'staff');
    }

    public function data_komentar()
    {
        $this->data['data']        = $this->komentar_m->get();
        $this->data['title']        = 'Data Komentar';
        $this->data['content']      = 'admin/data_komentar';
        $this->template($this->data, 'staff');
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
        $this->template($this->data, 'staff');
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
        $this->template($this->data, 'staff');
    }

    public function detail_data_komentar($id)
    {

        $this->data['komentar']     = $this->komentar_m->get_row(['id_komentar' => $id]);
        $this->data['title']        = 'Detail Data Komentar';
        $this->data['content']      = 'admin/detail_data_komentar';
        $this->template($this->data, 'staff');
    }
}