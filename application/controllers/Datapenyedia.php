<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class Datapenyedia extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_datapenyedia/M_datapenyedia');
		$this->load->model('M_jenis_usaha/M_jenis_usaha');
		$this->load->model('Wilayah/Wilayah_model');
		$this->load->helper('download');
		$id_vendor = $this->session->userdata('id_vendor');
		if (!$id_vendor) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/index');
		$this->load->view('template_menu/new_footer');
		$this->load->view('datapenyedia/ajax');
	}

	public function identitas_perusahaan()
	{
		$data['row_vendor'] = $this->vendor->get_vendor_url();
		$data['get_jenis_usaha']  = $this->M_jenis_usaha->get_result_jenis_usaha();
		$data['provinsi']  = $this->Wilayah_model->getProvinsi();
		$data['type']  = 'izin_usaha';
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/identitas/index', $data);
		$this->load->view('template_menu/new_footer');
		$this->load->view('js_file_on_session/index', $data);
	}

	public function izin_usaha()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$data['row_vendor']  = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$data['get_row_nib']  = $this->M_datapenyedia->get_row_nib($id_vendor);
		$data['kualifikasi']  = $this->M_datapenyedia->get_kualifikasi_izin();
		$data['data_kbli']  = $this->M_datapenyedia->get_kbli();
		$data['kualifikasi_sbu']  = $this->M_datapenyedia->get_kualifikasi_sbu();
		$data['data_sbu']  = $this->M_datapenyedia->get_sbu();
		$data['type']  = 'izin_usaha';
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/izin_usaha/singgah', $data);
		$this->load->view('template_menu/new_footer');
		$this->load->view('js_file_on_session/index', $data);
	}

	public function get_row_global_vendor($id_url_vendor)
	{
		$token = $this->input->post('secret_token');
		$row_vendor = $this->M_datapenyedia->get_row_vendor_by_id_url_vendor($id_url_vendor);
		$id_vendor = $row_vendor['id_vendor'];
		$row_nib = $this->M_datapenyedia->get_row_nib($id_vendor);
		$row_siup = $this->M_datapenyedia->get_row_siup($id_vendor);
		$row_sbu = $this->M_datapenyedia->get_row_sbu($id_vendor);
		$row_siujk = $this->M_datapenyedia->get_row_siujk($id_vendor);
		$row_akta_pendirian = $this->M_datapenyedia->get_row_akta_pendirian($id_vendor);
		$row_akta_perubahan = $this->M_datapenyedia->get_row_akta_perubahan($id_vendor);
		if ($token == $row_vendor['token_scure_vendor']) {
			$response = [
				'row_vendor' => $row_vendor,
				'row_nib' => $row_nib,
				'row_siup' => $row_siup,
				'row_sbu' => $row_sbu,
				'row_siujk' => $row_siujk,
				'row_akta_pendirian' => $row_akta_pendirian,
				'row_akta_perubahan' => $row_akta_perubahan,
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$response = [
				'maaf' => 'Anda Belum Beruntung',
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	// BATAS NIB

	public function add_nib()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_nib = $this->M_datapenyedia->get_row_nib($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$nomor_surat = $this->input->post('nomor_surat_nib');
		$kualifikasi_izin = $this->input->post('kualifikasi_izin_nib');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup_nib');
		$tgl_berlaku = $this->input->post('tgl_berlaku_nib');
		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/NIB-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/NIB-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/NIB-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		// $config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen_nib')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'tgl_berlaku' => $tgl_berlaku,
				'sts_token_dokumen' => 1,
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			if (!$row_nib) {
				$this->M_datapenyedia->tambah_nib($upload);
			} else {
				$this->M_datapenyedia->update_nib($upload, $where);
			}

			$response = [
				'row_nib' => $this->M_datapenyedia->get_row_nib($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'tgl_berlaku' => $tgl_berlaku,
			];
			if (!$row_nib) {
				$this->M_datapenyedia->tambah_nib($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_nib($upload, $where);
			}

			$response = [
				'row_nib' => $this->M_datapenyedia->get_row_nib($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			// redirect(base_url('upload'));
		}
	}

	public function encryption_nib($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_datapenyedia->get_row_nib_url($id_url);
		$secret_token = $this->input->post('secret_token');
		$chiper = "AES-128-ECB";
		$secret = $get_row_enkrip['token_dokumen'];
		if ($type == 'dekrip') {
			$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
			$data = [
				'sts_token_dokumen' => 2,
				'file_dokumen' => $encryption_string,
			];
		} else {
			$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
			$data = [
				'sts_token_dokumen' => 1,
				'file_dokumen' => $encryption_string,
			];
		}

		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$where = [
			'id_url' => $id_url
		];

		if ($secret_token == $row_vendor['token_scure_vendor']) {
			$response = [
				'message' => 'success'
			];
		} else {
			$response = [
				'maaf' => 'Anda Belum Beruntung',
			];
		}
		$this->M_datapenyedia->update_enkrip_nib($where, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function dekrip_nib()
	{
		$id_url = $this->input->post('id_url_nib');
		$token_dokumen = $this->input->post('token_dokumen_nib');
		$secret_token = $this->input->post('secret_token');
		$get_row_enkrip = $this->M_datapenyedia->get_row_nib_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$chiper = "AES-128-ECB";
		$secret_token_dokumen = $get_row_enkrip['token_dokumen'];
		$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret_token_dokumen);
		$where = [
			'id_url' => $id_url
		];
		$data = [
			'sts_token_dokumen' => 2,
			'file_dokumen' => $encryption_string,
		];
		if ($token_dokumen == $secret_token_dokumen) {
			$response = [
				'message' => 'success'
			];
			$this->M_datapenyedia->update_enkrip_nib($where, $data);
		} else {
			$response = [
				'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function url_download_nib($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_nib_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen =  $get_row_enkrip['file_dokumen'];
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/NIB-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}

	// get_data_kbli_nib
	public function get_data_kbli_nib()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_kbli_nib($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->kode_kbli . ' || ' . $rs->nama_kbli;
			$row[] = $rs->nama_kualifikasi;
			if ($rs->sts_kbli_nib == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			}
			$row[] = '<a  href="javascript:;" class="btn btn-warning btn-sm button_edit" onClick="byid_kbli_nib(' . "'" . $rs->id_url_kbli_nib . "','edit'" . ')"><i class="fa fa-edit"></i> Edit</a>
			<a  href="javascript:;" class="btn btn-danger btn-sm button_hapus" onClick="byid_kbli_nib(' . "'" . $rs->id_url_kbli_nib . "','hapus'" . ')"><i class="fas fa fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_kbli_siup($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_kbli_siup($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	function get_byid_kbli_nib($id_url_kbli_nib)
	{
		$response = [
			'row_kbli_nib' => $this->M_datapenyedia->get_row_kbli_nib($id_url_kbli_nib),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	// tambah kbli_nib 
	function tambah_kbli_nib()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$id_kbli = $this->input->post('id_kbli_nib');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_nib');
		$ket_kbli_nib = $this->input->post('ket_kbli_nib');
		$data = [
			'id_url_kbli_nib' => $id,
			'token_kbli_nib' => $token,
			'id_vendor' => $id_vendor,
			'id_kbli' => $id_kbli,
			'id_kualifikasi_izin' => $id_kualifikasi_izin,
			'ket_kbli_nib' => $ket_kbli_nib,
			'sts_kbli_nib' => 0,
		];
		$this->M_datapenyedia->tambah_kbli_nib($data);
		$response = [
			'message' => 'success',
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function edit_kbli_nib()
	{

		$id_url_kbli_nib = $this->input->post('id_url_kbli_nib');
		$token_kbli_nib = $this->input->post('token_kbli_nib');
		$id_kbli = $this->input->post('id_kbli_nib');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_nib');
		$ket_kbli_nib = $this->input->post('ket_kbli_nib');
		$cek_token = $this->M_datapenyedia->get_row_kbli_nib($id_url_kbli_nib);
		if ($token_kbli_nib == $cek_token['token_kbli_nib']) {
			$where = [
				'id_url_kbli_nib' => $id_url_kbli_nib
			];
			$data = [
				'id_kbli' => $id_kbli,
				'id_kualifikasi_izin' => $id_kualifikasi_izin,
				'ket_kbli_nib' => $ket_kbli_nib,
				'sts_kbli_nib' => 0,
			];
			$this->M_datapenyedia->edit_kbli_nib($data, $where);
			$response = [
				'message' => 'success',
			];
		} else {
			$response = [
				'maaf' => 'Token Tidak Valid !!!',
			];
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function hapus_kbli_nib()
	{
		$id_url_kbli_nib = $this->input->post('id_url_kbli_nib');
		$token_kbli_nib = $this->input->post('token_kbli_nib');
		$cek_token = $this->M_datapenyedia->get_row_kbli_nib($id_url_kbli_nib);
		if ($token_kbli_nib == $cek_token['token_kbli_nib']) {
			$where = [
				'id_url_kbli_nib' => $id_url_kbli_nib
			];
			$this->M_datapenyedia->hapus_kbli_nib($where);
			$response = [
				'message' => 'success',
			];
		} else {
			$response = [
				'maaf' => 'Token Tidak Valid !!!',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	// siup crud

	// BATAS siup

	public function add_siup()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_siup = $this->M_datapenyedia->get_row_siup($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$nomor_surat = $this->input->post('nomor_surat_siup');
		$kualifikasi_izin = $this->input->post('kualifikasi_izin_siup');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup_siup');
		$tgl_berlaku = $this->input->post('tgl_berlaku_siup');
		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/SIUP-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/SIUP-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/SIUP-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		// $config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen_siup')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'tgl_berlaku' => $tgl_berlaku,
				'sts_token_dokumen' => 1,
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			if (!$row_siup) {
				$this->M_datapenyedia->tambah_siup($upload);
			} else {
				$this->M_datapenyedia->update_siup($upload, $where);
			}

			$response = [
				'row_siup' => $this->M_datapenyedia->get_row_siup($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'tgl_berlaku' => $tgl_berlaku,
			];
			if (!$row_siup) {
				$this->M_datapenyedia->tambah_siup($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_siup($upload, $where);
			}

			$response = [
				'row_siup' => $this->M_datapenyedia->get_row_siup($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			// redirect(base_url('upload'));
		}
	}

	public function encryption_siup($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_datapenyedia->get_row_siup_url($id_url);
		$secret_token = $this->input->post('secret_token');
		$chiper = "AES-128-ECB";
		$secret = $get_row_enkrip['token_dokumen'];
		if ($type == 'dekrip') {
			$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
			$data = [
				'sts_token_dokumen' => 2,
				'file_dokumen' => $encryption_string,
			];
		} else {
			$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
			$data = [
				'sts_token_dokumen' => 1,
				'file_dokumen' => $encryption_string,
			];
		}

		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$where = [
			'id_url' => $id_url
		];

		if ($secret_token == $row_vendor['token_scure_vendor']) {
			$response = [
				'message' => 'success'
			];
		} else {
			$response = [
				'maaf' => 'Anda Belum Beruntung',
			];
		}
		$this->M_datapenyedia->update_enkrip_siup($where, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function dekrip_siup()
	{
		$id_url = $this->input->post('id_url_siup');
		$token_dokumen = $this->input->post('token_dokumen_siup');
		$secret_token = $this->input->post('secret_token');
		$get_row_enkrip = $this->M_datapenyedia->get_row_siup_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$chiper = "AES-128-ECB";
		$secret_token_dokumen = $get_row_enkrip['token_dokumen'];
		$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret_token_dokumen);
		$where = [
			'id_url' => $id_url
		];
		$data = [
			'sts_token_dokumen' => 2,
			'file_dokumen' => $encryption_string,
		];
		if ($token_dokumen == $secret_token_dokumen) {
			$response = [
				'message' => 'success'
			];
			$this->M_datapenyedia->update_enkrip_siup($where, $data);
		} else {
			$response = [
				'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function url_download_siup($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_siup_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen =  $get_row_enkrip['file_dokumen'];
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/SIUP-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}

	// get_data_kbli_siup
	public function get_data_kbli_siup()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_kbli_siup($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->kode_kbli . ' || ' . $rs->nama_kbli;
			$row[] = $rs->nama_kualifikasi;
			if ($rs->sts_kbli_siup == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			}
			$row[] = '<a  href="javascript:;" class="btn btn-warning btn-sm button_edit" onClick="byid_kbli_siup(' . "'" . $rs->id_url_kbli_siup . "','edit'" . ')"><i class="fa fa-edit"></i> Edit</a>
        <a  href="javascript:;" class="btn btn-danger btn-sm button_hapus" onClick="byid_kbli_siup(' . "'" . $rs->id_url_kbli_siup . "','hapus'" . ')"><i class="fas fa fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_kbli_siup($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_kbli_siup($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	function get_byid_kbli_siup($id_url_kbli_siup)
	{
		$response = [
			'row_kbli_siup' => $this->M_datapenyedia->get_row_kbli_siup($id_url_kbli_siup),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	// tambah kbli_siup 
	function tambah_kbli_siup()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$id_kbli = $this->input->post('id_kbli_siup');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_siup');
		$ket_kbli_siup = $this->input->post('ket_kbli_siup');
		$data = [
			'id_url_kbli_siup' => $id,
			'token_kbli_siup' => $token,
			'id_vendor' => $id_vendor,
			'id_kbli' => $id_kbli,
			'id_kualifikasi_izin' => $id_kualifikasi_izin,
			'ket_kbli_siup' => $ket_kbli_siup,
			'sts_kbli_siup' => 0,
		];
		$this->M_datapenyedia->tambah_kbli_siup($data);
		$response = [
			'message' => 'success',
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function edit_kbli_siup()
	{

		$id_url_kbli_siup = $this->input->post('id_url_kbli_siup');
		$token_kbli_siup = $this->input->post('token_kbli_siup');
		$id_kbli = $this->input->post('id_kbli_siup');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_siup');
		$ket_kbli_siup = $this->input->post('ket_kbli_siup');
		$cek_token = $this->M_datapenyedia->get_row_kbli_siup($id_url_kbli_siup);
		if ($token_kbli_siup == $cek_token['token_kbli_siup']) {
			$where = [
				'id_url_kbli_siup' => $id_url_kbli_siup
			];
			$data = [
				'id_kbli' => $id_kbli,
				'id_kualifikasi_izin' => $id_kualifikasi_izin,
				'ket_kbli_siup' => $ket_kbli_siup,
				'sts_kbli_siup' => 0,
			];
			$this->M_datapenyedia->edit_kbli_siup($data, $where);
			$response = [
				'message' => 'success',
			];
		} else {
			$response = [
				'maaf' => 'Token Tidak Valid !!!',
			];
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function hapus_kbli_siup()
	{
		$id_url_kbli_siup = $this->input->post('id_url_kbli_siup');
		$token_kbli_siup = $this->input->post('token_kbli_siup');
		$cek_token = $this->M_datapenyedia->get_row_kbli_siup($id_url_kbli_siup);
		if ($token_kbli_siup == $cek_token['token_kbli_siup']) {
			$where = [
				'id_url_kbli_siup' => $id_url_kbli_siup
			];
			$this->M_datapenyedia->hapus_kbli_siup($where);
			$response = [
				'message' => 'success',
			];
		} else {
			$response = [
				'maaf' => 'Token Tidak Valid !!!',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	// end siup crud


	// sbu crud

	// BATAS sbu

	public function add_sbu()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_sbu = $this->M_datapenyedia->get_row_sbu($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$nomor_surat = $this->input->post('nomor_surat_sbu');
		$kualifikasi_izin = $this->input->post('kualifikasi_izin_sbu');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup_sbu');
		$tgl_berlaku = $this->input->post('tgl_berlaku_sbu');
		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/SBU-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/SBU-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/SBU-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		// $config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen_sbu')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'tgl_berlaku' => $tgl_berlaku,
				'sts_token_dokumen' => 1,
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			if (!$row_sbu) {
				$this->M_datapenyedia->tambah_sbu($upload);
			} else {
				$this->M_datapenyedia->update_sbu($upload, $where);
			}

			$response = [
				'row_sbu' => $this->M_datapenyedia->get_row_sbu($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'tgl_berlaku' => $tgl_berlaku,
			];
			if (!$row_sbu) {
				$this->M_datapenyedia->tambah_sbu($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_sbu($upload, $where);
			}

			$response = [
				'row_sbu' => $this->M_datapenyedia->get_row_sbu($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			// redirect(base_url('upload'));
		}
	}

	public function encryption_sbu($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_datapenyedia->get_row_sbu_url($id_url);
		$secret_token = $this->input->post('secret_token');
		$chiper = "AES-128-ECB";
		$secret = $get_row_enkrip['token_dokumen'];
		if ($type == 'dekrip') {
			$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
			$data = [
				'sts_token_dokumen' => 2,
				'file_dokumen' => $encryption_string,
			];
		} else {
			$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret);
			$data = [
				'sts_token_dokumen' => 1,
				'file_dokumen' => $encryption_string,
			];
		}

		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$where = [
			'id_url' => $id_url
		];

		if ($secret_token == $row_vendor['token_scure_vendor']) {
			$response = [
				'message' => 'success'
			];
		} else {
			$response = [
				'maaf' => 'Anda Belum Beruntung',
			];
		}
		$this->M_datapenyedia->update_enkrip_sbu($where, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function dekrip_sbu()
	{
		$id_url = $this->input->post('id_url_sbu');
		$token_dokumen = $this->input->post('token_dokumen_sbu');
		$secret_token = $this->input->post('secret_token');
		$get_row_enkrip = $this->M_datapenyedia->get_row_sbu_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$chiper = "AES-128-ECB";
		$secret_token_dokumen = $get_row_enkrip['token_dokumen'];
		$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret_token_dokumen);
		$where = [
			'id_url' => $id_url
		];
		$data = [
			'sts_token_dokumen' => 2,
			'file_dokumen' => $encryption_string,
		];
		if ($token_dokumen == $secret_token_dokumen) {
			$response = [
				'message' => 'success'
			];
			$this->M_datapenyedia->update_enkrip_sbu($where, $data);
		} else {
			$response = [
				'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function url_download_sbu($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_sbu_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen =  $get_row_enkrip['file_dokumen'];
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/SBU-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}

	// get_data_kbli_sbu
	public function get_data_kbli_sbu()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_kbli_sbu($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->kode_sbu . ' || ' . $rs->nama_sbu;
			$row[] = $rs->nama_kualifikasi;
			if ($rs->sts_kbli_sbu == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			}
			$row[] = '<a  href="javascript:;" class="btn btn-warning btn-sm button_edit" onClick="byid_kbli_sbu(' . "'" . $rs->id_url_kbli_sbu . "','edit'" . ')"><i class="fa fa-edit"></i> Edit</a>
    <a  href="javascript:;" class="btn btn-danger btn-sm button_hapus" onClick="byid_kbli_sbu(' . "'" . $rs->id_url_kbli_sbu . "','hapus'" . ')"><i class="fas fa fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_kbli_sbu($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_kbli_sbu($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	function get_byid_kbli_sbu($id_url_kbli_sbu)
	{
		$response = [
			'row_kbli_sbu' => $this->M_datapenyedia->get_row_kbli_sbu($id_url_kbli_sbu),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	// tambah kbli_sbu 
	function tambah_kbli_sbu()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$id_sbu = $this->input->post('id_kbli_sbu');
		$id_kualifikasi_sbu = $this->input->post('id_kualifikasi_izin_kbli_sbu');
		$ket_kbli_sbu = $this->input->post('ket_kbli_sbu');
		$data = [
			'id_url_kbli_sbu' => $id,
			'token_kbli_sbu' => $token,
			'id_vendor' => $id_vendor,
			'id_sbu' => $id_sbu,
			'id_kualifikasi_sbu' => $id_kualifikasi_sbu,
			'ket_kbli_sbu' => $ket_kbli_sbu,
			'sts_kbli_sbu' => 0,
		];
		$this->M_datapenyedia->tambah_kbli_sbu($data);
		$response = [
			'message' => 'success',
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function edit_kbli_sbu()
	{

		$id_url_kbli_sbu = $this->input->post('id_url_kbli_sbu');
		$token_kbli_sbu = $this->input->post('token_kbli_sbu');
		$id_sbu = $this->input->post('id_kbli_sbu');
		$id_kualifikasi_sbu = $this->input->post('id_kualifikasi_izin_kbli_sbu');
		$ket_kbli_sbu = $this->input->post('ket_kbli_sbu');
		$cek_token = $this->M_datapenyedia->get_row_kbli_sbu($id_url_kbli_sbu);
		if ($token_kbli_sbu == $cek_token['token_kbli_sbu']) {
			$where = [
				'id_url_kbli_sbu' => $id_url_kbli_sbu
			];
			$data = [
				'id_sbu' => $id_sbu,
				'id_kualifikasi_sbu' => $id_kualifikasi_sbu,
				'ket_kbli_sbu' => $ket_kbli_sbu,
				'sts_kbli_sbu' => 0,
			];
			$this->M_datapenyedia->edit_kbli_sbu($data, $where);
			$response = [
				'message' => 'success',
			];
		} else {
			$response = [
				'maaf' => 'Token Tidak Valid !!!',
			];
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function hapus_kbli_sbu()
	{
		$id_url_kbli_sbu = $this->input->post('id_url_kbli_sbu');
		$token_kbli_sbu = $this->input->post('token_kbli_sbu');
		$cek_token = $this->M_datapenyedia->get_row_kbli_sbu($id_url_kbli_sbu);
		if ($token_kbli_sbu == $cek_token['token_kbli_sbu']) {
			$where = [
				'id_url_kbli_sbu' => $id_url_kbli_sbu
			];
			$this->M_datapenyedia->hapus_kbli_sbu($where);
			$response = [
				'message' => 'success',
			];
		} else {
			$response = [
				'maaf' => 'Token Tidak Valid !!!',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}



	public function akta_pendirian()
	{
		$data['row_vendor'] = $this->vendor->get_vendor_url();
		$data['type']  = 'akta';
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/akta_pendirian/singga', $data);
		$this->load->view('template_menu/new_footer');
		$this->load->view('js_file_on_session/index', $data);
	}


	public function add_akta_pendirian()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_akta_pendirian = $this->M_datapenyedia->get_row_akta_pendirian($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();

		// post
		$nomor_surat = $this->input->post('no_surat');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup');
		$jumlah_setor_modal = $this->input->post('jumlah_setor_modal');
		$kualifikasi_usaha = $this->input->post('kualifikasi_usaha');
		$tgl_berlaku_akta = $this->input->post('berlaku_sampai');

		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/Akta_Pendirian-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/Akta_Pendirian-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/Akta_Pendirian-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		// $config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_surat' => $nomor_surat,
				'kualifikasi_usaha' => $kualifikasi_usaha,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'tgl_berlaku_akta' => $tgl_berlaku_akta,
				'jumlah_setor_modal' => $jumlah_setor_modal,
				'sts_token_dokumen' => 1,
			];
			// var_dump($upload);
			// die;
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			if (!$row_akta_pendirian) {
				$this->M_datapenyedia->tambah_akta_pendirian($upload);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			} else {
				$this->M_datapenyedia->update_akta_pendirian($upload, $where);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			}

			$response = [
				'row_akta' => $this->M_datapenyedia->get_row_akta_pendirian($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_surat' => $nomor_surat,
				'kualifikasi_usaha' => $kualifikasi_usaha,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'tgl_berlaku_akta' => $tgl_berlaku_akta,
				'jumlah_setor_modal' => $jumlah_setor_modal,
				'sts_token_dokumen' => 1,
			];
			if (!$row_akta_pendirian) {
				$this->M_datapenyedia->tambah_akta_pendirian($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_akta_pendirian($upload, $where);
			}

			$response = [
				'row_akta' => $this->M_datapenyedia->get_row_akta_pendirian($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			// redirect(base_url('upload'));
		}
	}


	public function encryption_akta_pendirian($id_url)
	{
		$id_url = $this->input->post('id_url');
		$token_dokumen = $this->input->post('token_dokumen');
		// $secret_token = $this->input->post('secret_token');

		$type = $this->input->post('type');

		$get_row_enkrip = $this->M_datapenyedia->get_row_akta_pendirian_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		// $row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$chiper = "AES-128-ECB";
		$secret_token_dokumen = $get_row_enkrip['token_dokumen'];

		if ($type == 'enkrip') {

			$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret_token_dokumen);
			$where = [
				'id_url' => $id_url
			];
			$data = [
				'sts_token_dokumen' => 1,
				'file_dokumen' => $encryption_string,
			];
			if ($token_dokumen == $secret_token_dokumen) {
				$response = [
					'message' => 'success'
				];
				$this->M_datapenyedia->update_akta_pendirian($data, $where);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		} else {
			$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret_token_dokumen);
			$where = [
				'id_url' => $id_url
			];
			$data = [
				'sts_token_dokumen' => 2,
				'file_dokumen' => $encryption_string,
			];
			if ($token_dokumen == $secret_token_dokumen) {
				$response = [
					'message' => 'success'
				];
				$this->M_datapenyedia->update_akta_pendirian($data, $where);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function url_download_pendirian($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_akta_pendirian_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen =  $get_row_enkrip['file_dokumen'];
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/Akta_Pendirian-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}

	// end akta pendirian


	// add akta pendirian
	public function add_akta_perubahan()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_akta_perubahan = $this->M_datapenyedia->get_row_akta_perubahan($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();

		// post
		$nomor_surat = $this->input->post('no_surat_perubahan');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup_perubahan');
		$tgl_berlaku_akta = $this->input->post('tgl_masa_berlaku_perubahan');
		$jumlah_setor_modal = $this->input->post('jumlah_setor_perubahan');
		$kualifikasi_usaha = $this->input->post('kualifikasi_usaha_perubahan');


		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/Akta_Perubahan-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/Akta_Perubahan-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/Akta_Perubahan-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		// $config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen_perubahan')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_surat' => $nomor_surat,
				'kualifikasi_usaha' => $kualifikasi_usaha,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'tgl_berlaku_akta' => $tgl_berlaku_akta,
				'jumlah_setor_modal' => $jumlah_setor_modal,
				'sts_token_dokumen' => 1,
			];
			// var_dump($upload);
			// die;
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			if (!$row_akta_perubahan) {
				$this->M_datapenyedia->tambah_akta_perubahan($upload);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			} else {
				$this->M_datapenyedia->update_akta_perubahan($upload, $where);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			}

			$response = [
				'row_akta' => $this->M_datapenyedia->get_row_akta_perubahan($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_surat' => $nomor_surat,
				'kualifikasi_usaha' => $kualifikasi_usaha,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'tgl_berlaku_akta' => $tgl_berlaku_akta,
				'jumlah_setor_modal' => $jumlah_setor_modal,
				'sts_token_dokumen' => 1,
			];
			if (!$row_akta_perubahan) {
				$this->M_datapenyedia->tambah_akta_perubahan($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_akta_perubahan($upload, $where);
			}

			$response = [
				'row_akta_perubahan' => $this->M_datapenyedia->get_row_akta_perubahan($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			// redirect(base_url('upload'));
		}
	}

	public function encryption_akta_perubahan($id_url)
	{
		$token_dokumen = $this->input->post('token_dokumen');

		// $secret_token = $this->input->post('secret_token');
		$type = $this->input->post('type');

		$get_row_enkrip = $this->M_datapenyedia->get_row_akta_perubahan_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$chiper = "AES-128-ECB";
		$secret_token_dokumen = $get_row_enkrip['token_dokumen'];

		if ($type == 'enkrip') {

			$encryption_string = openssl_encrypt($get_row_enkrip['file_dokumen'], $chiper, $secret_token_dokumen);
			$where = [
				'id_url' => $id_url
			];
			$data = [
				'sts_token_dokumen' => 1,
				'file_dokumen' => $encryption_string,
			];
			if ($token_dokumen == $secret_token_dokumen) {
				$response = [
					'message' => 'success'
				];
				$this->M_datapenyedia->update_akta_perubahan($data, $where);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		} else {
			$encryption_string = openssl_decrypt($get_row_enkrip['file_dokumen'], $chiper, $secret_token_dokumen);
			$where = [
				'id_url' => $id_url
			];
			$data = [
				'sts_token_dokumen' => 2,
				'file_dokumen' => $encryption_string,
			];
			if ($token_dokumen == $secret_token_dokumen) {
				$response = [
					'message' => 'success'
				];
				$this->M_datapenyedia->update_akta_perubahan($data, $where);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	// end akta pendirian


	public function manajerial()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/manajerial/singgah');
		$this->load->view('template_menu/new_footer');
		$this->load->view('js_folder/pemilik_perusahaan/file_public');
	}

	function import_pemilik_perusahaan()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name'] = 'doc' . time();
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('importexcel')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();
			$reader->open('uploads/' . $file['file_name']);
			foreach ($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 2) {
						$data = array(
							'id_vendor' => $id_vendor,
							'id_url' => $id,
							'nik' => $row->getCellAtIndex(0),
							'npwp' => $row->getCellAtIndex(1),
							'nama_pemilik' => $row->getCellAtIndex(2),
							'warganegara' => $row->getCellAtIndex(3),
							'jns_pemilik' => $row->getCellAtIndex(4),
							'saham' => $row->getCellAtIndex(5),
							'alamat_pemilik' => $row->getCellAtIndex(6),
						);
						$this->M_datapenyedia->insert_pemilik($data);
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/' . $file['file_name']);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Import');
				redirect('datapenyedia/manajerial');
			}
		} else {
			echo "Error : " . $this->upload->display_errors();
		}
	}

	public function sdm()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/sdm/index');
		$this->load->view('template_menu/new_footer');
	}

	public function pengalaman()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/pengalaman/singgah');
		$this->load->view('template_menu/new_footer');
	}

	public function pajak()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/pajak/singgah');
		$this->load->view('template_menu/new_footer');
	}
}
