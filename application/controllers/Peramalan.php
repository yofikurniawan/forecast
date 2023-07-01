<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peramalan extends CI_Controller {
	function __construct() {
		parent::__construct();
        check_not_login();
		// check_admin();
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    // Index Halaman Obat
    public function index() {
        $data['judul'] = 'Form Peramalan Data Obat';
		$data['sub_judul'] = '';
        $data['obat'] = $this->peramalan_m->get_obat();
		$this->template->load('template', 'peramalan/form_peramalan', $data);
	}

     public function index1() {
        $data['judul'] = 'Form Peramalan Data Obat';
        $data['sub_judul'] = '';
        $data['obat'] = $this->peramalan_m->get_obat();
        $this->template->load('template', 'peramalan/form_peramalan1', $data);
    }

    public function data_ramal() {
        $data['judul'] = 'Data Peramalan Obat';
        $data['sub_judul'] = '';
        $data['ramal'] = $this->peramalan_m->get_ramal();
        $this->template->load('template', 'peramalan/data_peramalan', $data);
    }

    public function del($id) {
        $this->peramalan_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0) {
            $this->session->set_flashdata('flash-error','Data Tidak bisa dihapus (Sudah Berelasi)');
            redirect('peramalan/data_ramal');
        }else {
            $this->session->set_flashdata('flash-delete','Data Peramalan Berhasil Dihapus');
            redirect('peramalan/data_ramal');
        }  
    }

    public function hasil_peramalan() {
        $kd_obat = $this->input->post('kd_obat');
        $data['judul'] = 'Hasil Peramalan Data Obat';
		$data['sub_judul'] = 'Obat';
        $data['pmei2019'] = $this->peramalan_m->querymei2019($kd_obat);
        $data['pjuni2019'] = $this->peramalan_m->queryjuni2019($kd_obat);
        $data['pjuli2019'] = $this->peramalan_m->queryjuli2019($kd_obat);
        $data['paugust2019'] = $this->peramalan_m->queryaugust2019($kd_obat);
        $data['pseptember2019'] = $this->peramalan_m->queryseptember2019($kd_obat);
        $data['poctober2019'] = $this->peramalan_m->queryoctober2019($kd_obat);
        $data['pnovember2019'] = $this->peramalan_m->querynovember2019($kd_obat);
        $data['pdesember2019'] = $this->peramalan_m->querydesember2019($kd_obat);
        $data['pjanuari2020'] = $this->peramalan_m->queryjanuari2020($kd_obat);
        $data['pfebruari2020'] = $this->peramalan_m->queryfebruari2020($kd_obat);
        $data['pmaret2020'] = $this->peramalan_m->querymaret2020($kd_obat);
        $data['papril2020'] = $this->peramalan_m->queryapril2020($kd_obat);
        $data['pmei2020'] = $this->peramalan_m->querymei2020($kd_obat);
        $data['pjuni2020'] = $this->peramalan_m->queryjuni2020($kd_obat);
        $data['pjuli2020'] = $this->peramalan_m->queryjuli2020($kd_obat);
        $data['pagustust2020'] = $this->peramalan_m->queryagustust2020($kd_obat);
        $data['pseptember2020'] = $this->peramalan_m->queryseptember2020($kd_obat);
        $data['poktober2020'] = $this->peramalan_m->queryoktober2020($kd_obat);
        $data['pnovember2020'] = $this->peramalan_m->querynovember2020($kd_obat);
        $data['pdesember2020'] = $this->peramalan_m->querydesember2020($kd_obat);
        $data['pjanuari2021'] = $this->peramalan_m->queryjanuari2021($kd_obat);
        $data['pfebruari2021'] = $this->peramalan_m->queryfebruari2021($kd_obat);
        $data['pmaret2021'] = $this->peramalan_m->querymaret2021($kd_obat);
        $data['papril2021'] = $this->peramalan_m->queryapril2021($kd_obat);
        $data['pmei2021'] = $this->peramalan_m->querymei2021($kd_obat);
        $data['bulan'] = $this->input->post('ip_periode');
		$this->template->load('template', 'peramalan/riwayat_peramalan', $data);

    }

        public function hasil_peramalan1() {
        $kd_obat = $this->input->post('kd_obat');
        $data['nama_obat'] = $this->input->post('kd_obat');
        $tgl= $this->input->post('bulan');
        $data['judul'] = 'Hasil Peramalan Data Obat';
        $data['sub_judul'] = 'Obat';
        $data['peramalan'] = $this->peramalan_m->data_peramalan($kd_obat);
        $data['peramalan1'] = $this->peramalan_m->peramalan_Selanjutnya($kd_obat);
        $data['pall'] = $this->peramalan_m->querysimpan($kd_obat,$tgl);
        $data['pmei2019'] = $this->peramalan_m->querymei2019($kd_obat);
        // $data['pjuni2019'] = $this->peramalan_m->queryjuni2019($kd_obat);
        // $data['pjuli2019'] = $this->peramalan_m->queryjuli2019($kd_obat);
        // $data['paugust2019'] = $this->peramalan_m->queryaugust2019($kd_obat);
        // $data['pseptember2019'] = $this->peramalan_m->queryseptember2019($kd_obat);
        // $data['poctober2019'] = $this->peramalan_m->queryoctober2019($kd_obat);
        // $data['pnovember2019'] = $this->peramalan_m->querynovember2019($kd_obat);
        // $data['pdesember2019'] = $this->peramalan_m->querydesember2019($kd_obat);
        // $data['pjanuari2020'] = $this->peramalan_m->queryjanuari2020($kd_obat);
        // $data['pfebruari2020'] = $this->peramalan_m->queryfebruari2020($kd_obat);
        // $data['pmaret2020'] = $this->peramalan_m->querymaret2020($kd_obat);
        // $data['papril2020'] = $this->peramalan_m->queryapril2020($kd_obat);
        // $data['pmei2020'] = $this->peramalan_m->querymei2020($kd_obat);
        // $data['pjuni2020'] = $this->peramalan_m->queryjuni2020($kd_obat);
        // $data['pjuli2020'] = $this->peramalan_m->queryjuli2020($kd_obat);
        // $data['pagustust2020'] = $this->peramalan_m->queryagustust2020($kd_obat);
        // $data['pseptember2020'] = $this->peramalan_m->queryseptember2020($kd_obat);
        // $data['poktober2020'] = $this->peramalan_m->queryoktober2020($kd_obat);
        // $data['pnovember2020'] = $this->peramalan_m->querynovember2020($kd_obat);
        // $data['pdesember2020'] = $this->peramalan_m->querydesember2020($kd_obat);
        // $data['pjanuari2021'] = $this->peramalan_m->queryjanuari2021($kd_obat);
        // $data['pfebruari2021'] = $this->peramalan_m->queryfebruari2021($kd_obat);
        // $data['pmaret2021'] = $this->peramalan_m->querymaret2021($kd_obat);
        // $data['papril2021'] = $this->peramalan_m->queryapril2021($kd_obat);
        $data['pmei2021'] = $this->peramalan_m->querymei2021($kd_obat);
        $data['bulan'] = $this->input->post('bulan');
        $this->template->load('template', 'peramalan/riwayat_peramalan1', $data);

    }

    public function save_peramalan() {

        $data = [
                'id_peramalan'  => '',
                'kd_obat'       => $this->input->post('kd_obat'),
                'data_ramal'    => $this->input->post('ramal'),
                'tanggal'       => $this->input->post('tanggal'),
                'bulan_tahun'   => $this->input->post('bulan'),
                'user_id'       => $this->input->post('user')
            ];
                $isi = $this->db->insert('peramalan', $data);
                if ($isi == TRUE ) {
                    $this->session->set_flashdata('flash', 'Data peramalan telah tersimpan');
                    redirect('peramalan/data_ramal');
                } else {
                    $this->session->set_flashdata('flash-error', 'Data peramalan gagal disimpan');
                    redirect('peramalan/data_ramal');
                }
    }

}    