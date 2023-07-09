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
		$row_siujk = $this->M_datapenyedia->get_row_siujk($id_vendor);
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


	// siujk crud

	// BATAS siujk

	public function add_siujk()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_siujk = $this->M_datapenyedia->get_row_siujk($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$nomor_surat = $this->input->post('nomor_surat_siujk');
		$kualifikasi_izin = $this->input->post('kualifikasi_izin_siujk');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup_siujk');
		$tgl_berlaku = $this->input->post('tgl_berlaku_siujk');
		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/siujk-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/siujk-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/siujk-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		// $config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen_siujk')) {
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
			if (!$row_siujk) {
				$this->M_datapenyedia->tambah_siujk($upload);
			} else {
				$this->M_datapenyedia->update_siujk($upload, $where);
			}

			$response = [
				'row_siujk' => $this->M_datapenyedia->get_row_siujk($id_vendor),
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
			if (!$row_siujk) {
				$this->M_datapenyedia->tambah_siujk($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_siujk($upload, $where);
			}

			$response = [
				'row_siujk' => $this->M_datapenyedia->get_row_siujk($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			// redirect(base_url('upload'));
		}
	}

	public function encryption_siujk($id_url)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_datapenyedia->get_row_siujk_url($id_url);
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
		$this->M_datapenyedia->update_enkrip_siujk($where, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function dekrip_siujk()
	{
		$id_url = $this->input->post('id_url_siujk');
		$token_dokumen = $this->input->post('token_dokumen_siujk');
		$secret_token = $this->input->post('secret_token');
		$get_row_enkrip = $this->M_datapenyedia->get_row_siujk_url($id_url);
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
			$this->M_datapenyedia->update_enkrip_siujk($where, $data);
		} else {
			$response = [
				'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function url_download_siujk($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_siujk_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen =  $get_row_enkrip['file_dokumen'];
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/siujk-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}

	// get_data_kbli_siujk
	public function get_data_kbli_siujk()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_kbli_siujk($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->kode_kbli . ' || ' . $rs->nama_kbli;
			$row[] = $rs->nama_kualifikasi;
			if ($rs->sts_kbli_siujk == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			}
			$row[] = '<a  href="javascript:;" class="btn btn-warning btn-sm button_edit" onClick="byid_kbli_siujk(' . "'" . $rs->id_url_kbli_siujk . "','edit'" . ')"><i class="fa fa-edit"></i> Edit</a>
    <a  href="javascript:;" class="btn btn-danger btn-sm button_hapus" onClick="byid_kbli_siujk(' . "'" . $rs->id_url_kbli_siujk . "','hapus'" . ')"><i class="fas fa fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_kbli_siujk($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_kbli_siujk($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	function get_byid_kbli_siujk($id_url_kbli_siujk)
	{
		$response = [
			'row_kbli_siujk' => $this->M_datapenyedia->get_row_kbli_siujk($id_url_kbli_siujk),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	// tambah kbli_siujk 
	function tambah_kbli_siujk()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$id_kbli = $this->input->post('id_kbli_siujk');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_siujk');
		$ket_kbli_siujk = $this->input->post('ket_kbli_siujk');
		$data = [
			'id_url_kbli_siujk' => $id,
			'token_kbli_siujk' => $token,
			'id_vendor' => $id_vendor,
			'id_kbli' => $id_kbli,
			'id_kualifikasi_izin' => $id_kualifikasi_izin,
			'ket_kbli_siujk' => $ket_kbli_siujk,
			'sts_kbli_siujk' => 0,
		];
		$this->M_datapenyedia->tambah_kbli_siujk($data);
		$response = [
			'message' => 'success',
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	function edit_kbli_siujk()
	{

		$id_url_kbli_siujk = $this->input->post('id_url_kbli_siujk');
		$token_kbli_siujk = $this->input->post('token_kbli_siujk');
		$id_kbli = $this->input->post('id_kbli_siujk');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_siujk');
		$ket_kbli_siujk = $this->input->post('ket_kbli_siujk');
		$cek_token = $this->M_datapenyedia->get_row_kbli_siujk($id_url_kbli_siujk);
		if ($token_kbli_siujk == $cek_token['token_kbli_siujk']) {
			$where = [
				'id_url_kbli_siujk' => $id_url_kbli_siujk
			];
			$data = [
				'id_kbli' => $id_kbli,
				'id_kualifikasi_izin' => $id_kualifikasi_izin,
				'ket_kbli_siujk' => $ket_kbli_siujk,
				'sts_kbli_siujk' => 0,
			];
			$this->M_datapenyedia->edit_kbli_siujk($data, $where);
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
	function hapus_kbli_siujk()
	{
		$id_url_kbli_siujk = $this->input->post('id_url_kbli_siujk');
		$token_kbli_siujk = $this->input->post('token_kbli_siujk');
		$cek_token = $this->M_datapenyedia->get_row_kbli_siujk($id_url_kbli_siujk);
		if ($token_kbli_siujk == $cek_token['token_kbli_siujk']) {
			$where = [
				'id_url_kbli_siujk' => $id_url_kbli_siujk
			];
			$this->M_datapenyedia->hapus_kbli_siujk($where);
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
	// end siujk crud

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


	// crud manajerial

	public function manajerial()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/manajerial/singgah');
		$this->load->view('template_menu/new_footer');
		$this->load->view('js_folder/pemilik_perusahaan/file_public');
	}

	public function get_data_pemilik_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_pemilik_manajerial($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nik;
			$row[] = $rs->npwp;
			$row[] = $rs->nama_pemilik;
			$row[] = $rs->warganegara;
			$row[] = $rs->alamat_pemilik;
			$row[] = $rs->saham;
			if ($rs->sts_validasi == 1 || $rs->sts_validasi == 0) {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			}
			$row[] = '<a  href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pemilik_manajerial(' . "'" . $rs->id_pemilik . "','edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> View</a>
			<a  href="javascript:;" class="btn btn-danger btn-sm" onClick="by_id_pemilik_manajerial(' . "'" . $rs->id_pemilik . "','hapus'" . ')"><i class="fas fa fa-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_pemilik_manajerial($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_pemilik_manajerial($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}


	function by_id_pemilik_manajerial($id_pemilik)
	{
		$response = [
			'row_pemilik_manajerial' => $this->M_datapenyedia->get_row_pemilik_manajerial($id_pemilik),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function hapus_row_pemilik($id_url)
	{
		$where = [
			'id_url' => $id_url
		];
		$this->M_datapenyedia->delete_pemilik($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}



	public function get_data_excel_pemilik_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_excel_pemilik_manajerial($id_vendor);
		$data = [];
		$no = $_POST['start'];
		$nama_usaha = $this->session->userdata('nama_usaha');
		$date = date('Y');
		$file_path = 'file_vms/' . $nama_usaha . '/Pemilik-' . $date;
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nik;
			$row[] = $rs->nama_pemilik;
			$row[] = $rs->jns_pemilik;
			$row[] = $rs->alamat_pemilik;
			$row[] = $rs->warganegara;
			$row[] = $rs->saham;
			$row[] = '<a  href="javascript:;" class="btn btn-warning btn-sm d-md-block" onClick="by_id_excel_pemilik_manajerial(' . "'" . $rs->id_pemilik . "','edit'" . ')"><i class="fa fa-edit"></i></a>
			<a  href="javascript:;" class="btn btn-danger btn-sm d-md-block" onClick="by_id_excel_pemilik_manajerial(' . "'" . $rs->id_pemilik . "','hapus'" . ')"><i class="fas fa fa-trash"></i></a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_excel_pemilik_manajerial($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_excel_pemilik_manajerial($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}




	function by_id_excel_pemilik_menajerial($id_pemilik)
	{
		$response = [
			'row_excel_pemilik_manajerial' => $this->M_datapenyedia->get_row_excel_pemilik_manajerial($id_pemilik),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function buat_pemilik_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$id_pemilik = $this->input->post('id_pemilik');
		$nik = $this->input->post('nik');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$jns_pemilik = $this->input->post('jns_pemilik');
		$alamat_pemilik = $this->input->post('alamat_pemilik');
		$npwp = $this->input->post('npwp');
		$warganegara = $this->input->post('warganegara');
		$saham = $this->input->post('saham');
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		// seeting enkrip dokumen
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $id;
		$secret_token_dokumen2 = 'jmto.2' . $id;
		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/Pemilik-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/Pemilik-' . $date, 0777, TRUE);
		}
		$config['upload_path'] = './file_vms/' . $nama_usaha . '/Pemilik-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_ktp')) {
			$fileDataKtp = $this->upload->data();
		}
		if ($this->upload->do_upload('file_npwp')) {
			$fileData_npwp = $this->upload->data();
		}
		$upload = [
			'id_vendor' => $id_vendor,
			'id_url' => $id,
			'nik' => $nik,
			'nama_pemilik' => $nama_pemilik,
			'jns_pemilik' => $jns_pemilik,
			'alamat_pemilik' => $alamat_pemilik,
			'npwp' => $npwp,
			'warganegara' => $warganegara,
			'saham' => $saham,
			'file_ktp' => openssl_encrypt($fileDataKtp['file_name'], $chiper, $secret_token_dokumen1),
			'file_npwp' => openssl_encrypt($fileData_npwp['file_name'], $chiper, $secret_token_dokumen2),
			'sts_token_dokumen_pemilik' => 1,
		];
		$this->M_datapenyedia->tambah_tbl_vendor_pemilik($upload);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function edit_excel_pemilik_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$id_pemilik = $this->input->post('id_pemilik');
		$type_edit_pemilik = $this->input->post('type_edit_pemilik');
		if ($type_edit_pemilik == 'edit_excel') {
			$get_row_enkrip = $this->M_datapenyedia->get_row_excel_pemilik_manajerial($id_pemilik);
		} else {
			$get_row_enkrip = $this->M_datapenyedia->get_row_pemilik_manajerial($id_pemilik);
		}
		$nik = $this->input->post('nik');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$jns_pemilik = $this->input->post('jns_pemilik');
		$alamat_pemilik = $this->input->post('alamat_pemilik');
		$npwp = $this->input->post('npwp');
		$warganegara = $this->input->post('warganegara');
		$saham = $this->input->post('saham');
		// seeting enkrip dokumen
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/Pemilik-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/Pemilik-' . $date, 0777, TRUE);
		}
		$config['upload_path'] = './file_vms/' . $nama_usaha . '/Pemilik-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_ktp')) {
			$fileDataKtp = $this->upload->data();
			$post_file_ktp = openssl_encrypt($fileDataKtp['file_name'], $chiper, $secret_token_dokumen1);
		} else {
			$fileDataKtp = $get_row_enkrip['file_ktp'];
			$post_file_ktp = $fileDataKtp;
		}
		if ($this->upload->do_upload('file_npwp')) {
			$fileData_npwp = $this->upload->data();
			$post_file_npwp = openssl_encrypt($fileData_npwp['file_name'], $chiper, $secret_token_dokumen2);
		} else {
			$fileData_npwp = $get_row_enkrip['file_npwp'];
			$post_file_npwp = $fileData_npwp;
		}
		$where = [
			'id_pemilik' => $id_pemilik
		];
		$upload = [
			'id_vendor' => $id_vendor,
			'nik' => $nik,
			'nama_pemilik' => $nama_pemilik,
			'jns_pemilik' => $jns_pemilik,
			'alamat_pemilik' => $alamat_pemilik,
			'npwp' => $npwp,
			'warganegara' => $warganegara,
			'saham' => $saham,
			'file_ktp' => $post_file_ktp,
			'file_npwp' => $post_file_npwp,
			'sts_token_dokumen_pemilik' => 1,
		];
		if ($type_edit_pemilik == 'edit_excel') {
			$this->M_datapenyedia->update_excel_pemilik_manajerial($upload, $where);
		} else {
			$this->M_datapenyedia->update_pemilik_manajerial($upload, $where);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function dekrip_enkrip_pemilik($id_url)
	{
		$type = $this->input->post('type');
		$type_edit_pemilik = $this->input->post('type_edit_pemilik');
		if ($type_edit_pemilik == 'edit_excel') {
			$get_row_enkrip = $this->M_datapenyedia->get_row_excel_pemilik_manajerial_enkription($id_url);
		} else {
			$get_row_enkrip = $this->M_datapenyedia->get_row_pemilik_manajerial_enkription($id_url);
		}
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
		$where = [
			'id_url' => $id_url
		];
		if ($type == 'dekrip') {
			$file_ktp = openssl_decrypt($get_row_enkrip['file_ktp'], $chiper, $secret_token_dokumen1);
			$file_npwp = openssl_decrypt($get_row_enkrip['file_npwp'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen_pemilik' => 2,
				'file_ktp' => $file_ktp,
				'file_npwp' => $file_npwp,
			];
		} else {
			$file_ktp = openssl_encrypt($get_row_enkrip['file_ktp'], $chiper, $secret_token_dokumen1);
			$file_npwp = openssl_encrypt($get_row_enkrip['file_npwp'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen_pemilik' => 1,
				'file_ktp' => $file_ktp,
				'file_npwp' => $file_npwp,
			];
		}
		if ($type_edit_pemilik == 'edit_excel') {
			$this->M_datapenyedia->update_excel_pemilik_manajerial_enkription($where, $data);
		} else {
			$this->M_datapenyedia->update_pemilik_manajerial_enkription($where, $data);
		}
		$response = [
			'type_edit_pemilik' => $type_edit_pemilik,
			'row_excel_pemilik_manajerial' => $this->M_datapenyedia->get_row_excel_pemilik_manajerial($get_row_enkrip['id_pemilik']),
			'row_pemilik_manajerial' => $this->M_datapenyedia->get_row_pemilik_manajerial($get_row_enkrip['id_pemilik']),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_pemilik()
	{
		$id_url = $this->uri->segment(3);
		$type = $this->uri->segment(4);
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_excel_pemilik_manajerial_enkription($id_url);
		if ($type == 'pemilik_ktp') {
			$fileDownload = $get_row_enkrip['file_ktp'];
		}
		if ($type == 'pemilik_npwp') {
			$fileDownload = $get_row_enkrip['file_npwp'];
		}
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/Pemilik-' . $date . '/' . $fileDownload, NULL);
	}


	public function hapus_row_import_excel_pemilik($id_url)
	{
		$where = [
			'id_url' => $id_url
		];
		$this->M_datapenyedia->delete_import_excel_pemilik($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	function import_pemilik_perusahaan()
	{
		$id_vendor = $this->session->userdata('id_vendor');

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
						$id = $this->uuid->v4();
						$id = str_replace('-', '', $id);
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
				$response = [
					'message' => 'Data Berhasil Di Upload',
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
		} else {
			$response = [
				'error' => 'error',
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}
	public function hapus_import_excel_pemilik()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$where = [
			'id_vendor' => $id_vendor
		];
		$this->M_datapenyedia->delete_import_excel_pemilik($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function simpan_import_excel_pemilik()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$cek_table = $this->M_datapenyedia->get_result_pemilik_manajerial($id_vendor);
		$cek_table_excel_validasi = $this->M_datapenyedia->result_excel_pemilik($id_vendor);
		$result = $this->M_datapenyedia->get_result_excel_pemilik_manajerial($id_vendor, $cek_table);
		$data_tervalidasi = $this->M_datapenyedia->get_result_validasi_excel_pemilik_manajerial($id_vendor, $cek_table_excel_validasi);
		foreach ($result as $key => $value) {
			$data = [
				'id_vendor' => $value['id_vendor'],
				'id_url' => $value['id_url'],
				'nik' => $value['nik'],
				'npwp' => $value['npwp'],
				'nama_pemilik' => $value['nama_pemilik'],
				'warganegara' => $value['warganegara'],
				'jns_pemilik' => $value['jns_pemilik'],
				'saham' => $value['saham'],
				'alamat_pemilik' => $value['alamat_pemilik'],
			];
			$this->M_datapenyedia->tambah_tbl_vendor_pemilik($data);
		}
		$where = [
			'id_vendor' => $id_vendor
		];
		$this->M_datapenyedia->delete_import_excel_pemilik($where);
		if ($data_tervalidasi == null) {
			$response = [
				'error' => 'maaf'
			];
		} else {
			$response = [
				'validasi' => $data_tervalidasi,
			];
		}


		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}



	// INI UNTUK BAGIAN PENGURUS

	public function get_data_pengurus_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_pengurus_manajerial($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nik;
			$row[] = $rs->npwp;
			$row[] = $rs->nama_pengurus;
			$row[] = $rs->warganegara;
			$row[] = $rs->jabatan_pengurus;
			$row[] = $rs->jabatan_mulai;
			$row[] = $rs->jabatan_selesai;
			if ($rs->sts_validasi == 1 || $rs->sts_validasi == 0) {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			}
			$row[] = '<a  href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pengurus_manajerial(' . "'" . $rs->id_pengurus . "','edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> View</a>
			<a  href="javascript:;" class="btn btn-danger btn-sm" onClick="by_id_pengurus_manajerial(' . "'" . $rs->id_pengurus . "','hapus'" . ')"><i class="fas fa fa-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_pengurus_manajerial($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_pengurus_manajerial($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function buat_pengurus_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$nik = $this->input->post('nik_pengurus');
		$nama_pengurus = $this->input->post('nama_pengurus');
		$jabatan_pengurus = $this->input->post('jabatan_pengurus');
		$alamat_pengurus = $this->input->post('alamat_pengurus');
		$npwp = $this->input->post('npwp_pengurus');
		$warganegara = $this->input->post('warganegara_pengurus');
		$jabatan_mulai = $this->input->post('jabatan_mulai');
		$jabatan_selesai = $this->input->post('jabatan_selesai');
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		// seeting enkrip dokumen
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $id;
		$secret_token_dokumen2 = 'jmto.2' . $id;
		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/Pengurus-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/Pengurus-' . $date, 0777, TRUE);
		}
		$config['upload_path'] = './file_vms/' . $nama_usaha . '/Pengurus-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_ktp_pengurus')) {
			$fileDataKtp = $this->upload->data();
		}
		if ($this->upload->do_upload('file_npwp_pengurus')) {
			$fileData_npwp = $this->upload->data();
		}
		$upload = [
			'id_vendor' => $id_vendor,
			'id_url' => $id,
			'nik' => $nik,
			'nama_pengurus' => $nama_pengurus,
			'jabatan_pengurus' => $jabatan_pengurus,
			'alamat_pengurus' => $alamat_pengurus,
			'npwp' => $npwp,
			'warganegara' => $warganegara,
			'jabatan_mulai' => $jabatan_mulai,
			'jabatan_selesai' => $jabatan_selesai,
			'file_ktp_pengurus' => openssl_encrypt($fileDataKtp['file_name'], $chiper, $secret_token_dokumen1),
			'file_npwp_pengurus' => openssl_encrypt($fileData_npwp['file_name'], $chiper, $secret_token_dokumen2),
			'sts_token_dokumen_pengurus' => 1,
		];
		$this->M_datapenyedia->tambah_tbl_vendor_pengurus($upload);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function get_data_excel_pengurus_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_excel_pengurus_manajerial($id_vendor);
		$data = [];
		$no = $_POST['start'];
		$nama_usaha = $this->session->userdata('nama_usaha');
		$date = date('Y');
		$file_path = 'file_vms/' . $nama_usaha . '/PENGURUS-' . $date;
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nik;
			$row[] = $rs->npwp;
			$row[] = $rs->nama_pengurus;
			$row[] = $rs->warganegara;
			$row[] = $rs->jabatan_pengurus;
			$row[] = $rs->jabatan_mulai;
			$row[] = $rs->jabatan_selesai;
			$row[] = '<a  href="javascript:;" class="btn btn-warning btn-sm d-md-block" onClick="by_id_excel_pengurus_manajerial(' . "'" . $rs->id_pengurus . "','edit'" . ')"><i class="fa fa-edit"></i></a>
			<a  href="javascript:;" class="btn btn-danger btn-sm d-md-block" onClick="by_id_excel_pengurus_manajerial(' . "'" . $rs->id_pengurus . "','hapus'" . ')"><i class="fas fa fa-trash"></i></a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_excel_pengurus_manajerial($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_excel_pengurus_manajerial($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function by_id_excel_pengurus_menajerial($id_pengurus)
	{
		$response = [
			'row_excel_pengurus_manajerial' => $this->M_datapenyedia->get_row_excel_pengurus_manajerial($id_pengurus),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	function import_pengurus_perusahaan()
	{
		$id_vendor = $this->session->userdata('id_vendor');
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
						$id = $this->uuid->v4();
						$id = str_replace('-', '', $id);
						$data = array(
							'id_vendor' => $id_vendor,
							'id_url' => $id,
							'nik' => $row->getCellAtIndex(0),
							'npwp' => $row->getCellAtIndex(1),
							'nama_pengurus' => $row->getCellAtIndex(2),
							'warganegara' => $row->getCellAtIndex(3),
							'jabatan_pengurus' => $row->getCellAtIndex(4),
							'jabatan_mulai' => $row->getCellAtIndex(5),
							'jabatan_selesai' => $row->getCellAtIndex(6),
							'alamat_pengurus' => $row->getCellAtIndex(7),
						);
						$this->M_datapenyedia->insert_pengurus($data);
					}
					$numRow++;
				}
				$reader->close();
				unlink('uploads/' . $file['file_name']);
				$response = [
					'message' => 'Data Berhasil Di Upload',
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
		} else {
			$response = [
				'error' => 'error',
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}


	public function edit_excel_pengurus_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$id_pengurus = $this->input->post('id_pengurus');
		$type_edit_pengurus = $this->input->post('type_edit_pengurus');
		if ($type_edit_pengurus == 'edit_excel') {
			$get_row_enkrip = $this->M_datapenyedia->get_row_excel_pengurus_manajerial($id_pengurus);
		} else {
			$get_row_enkrip = $this->M_datapenyedia->get_row_pengurus_manajerial($id_pengurus);
		}
		$nik = $this->input->post('nik_pengurus');
		$nama_pengurus = $this->input->post('nama_pengurus');
		$alamat_pengurus = $this->input->post('alamat_pengurus');
		$npwp = $this->input->post('npwp_pengurus');
		$warganegara = $this->input->post('warganegara');
		$jabatan_pengurus = $this->input->post('jabatan_pengurus');
		$jabatan_mulai = $this->input->post('jabatan_mulai');
		$jabatan_selesai = $this->input->post('jabatan_selesai');
		// seeting enkrip dokumen
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/PENGURUS-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/PENGURUS-' . $date, 0777, TRUE);
		}
		$config['upload_path'] = './file_vms/' . $nama_usaha . '/PENGURUS-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_ktp_pengurus')) {
			$fileDataKtp = $this->upload->data();
			$post_file_ktp_pengurus = openssl_encrypt($fileDataKtp['file_name'], $chiper, $secret_token_dokumen1);
		} else {
			$fileDataKtp = $get_row_enkrip['file_ktp_pengurus'];
			$post_file_ktp_pengurus = $fileDataKtp;
		}
		if ($this->upload->do_upload('file_npwp_pengurus')) {
			$fileData_npwp = $this->upload->data();
			$post_file_npwp_pengurus = openssl_encrypt($fileData_npwp['file_name'], $chiper, $secret_token_dokumen2);
		} else {
			$fileData_npwp = $get_row_enkrip['file_npwp_pengurus'];
			$post_file_npwp_pengurus = $fileData_npwp;
		}
		$where = [
			'id_pengurus' => $id_pengurus
		];
		$upload = [
			'id_vendor' => $id_vendor,
			'nik' => $nik,
			'nama_pengurus' => $nama_pengurus,
			'jabatan_pengurus' => $jabatan_pengurus,
			'alamat_pengurus' => $alamat_pengurus,
			'npwp' => $npwp,
			'warganegara' => $warganegara,
			'jabatan_mulai' => $jabatan_mulai,
			'jabatan_selesai' => $jabatan_selesai,
			'file_ktp_pengurus' => $post_file_ktp_pengurus,
			'file_npwp_pengurus' => $post_file_npwp_pengurus,
			'sts_token_dokumen_pengurus' => 1,
		];
		if ($type_edit_pengurus == 'edit_excel') {
			$this->M_datapenyedia->update_excel_pengurus_manajerial($upload, $where);
		} else {
			$this->M_datapenyedia->update_pengurus_manajerial($upload, $where);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function hapus_row_import_excel_pengurus($id_url)
	{
		$where = [
			'id_url' => $id_url
		];
		$this->M_datapenyedia->delete_import_excel_pengurus($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	public function hapus_import_excel_pengurus()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$where = [
			'id_vendor' => $id_vendor
		];
		$this->M_datapenyedia->delete_import_excel_pengurus($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function dekrip_enkrip_pengurus($id_url)
	{
		$type = $this->input->post('type');
		$type_edit_pengurus = $this->input->post('type_edit_pengurus');
		if ($type_edit_pengurus == 'edit_excel') {
			$get_row_enkrip = $this->M_datapenyedia->get_row_excel_pengurus_manajerial_enkription($id_url);
		} else {
			$get_row_enkrip = $this->M_datapenyedia->get_row_pengurus_manajerial_enkription($id_url);
		}
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
		$where = [
			'id_url' => $id_url
		];
		if ($type == 'dekrip') {
			$file_ktp_pengurus = openssl_decrypt($get_row_enkrip['file_ktp_pengurus'], $chiper, $secret_token_dokumen1);
			$file_npwp_pengurus = openssl_decrypt($get_row_enkrip['file_npwp_pengurus'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen_pengurus' => 2,
				'file_ktp_pengurus' => $file_ktp_pengurus,
				'file_npwp_pengurus' => $file_npwp_pengurus,
			];
		} else {
			$file_ktp_pengurus = openssl_encrypt($get_row_enkrip['file_ktp_pengurus'], $chiper, $secret_token_dokumen1);
			$file_npwp_pengurus = openssl_encrypt($get_row_enkrip['file_npwp_pengurus'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen_pengurus' => 1,
				'file_ktp_pengurus' => $file_ktp_pengurus,
				'file_npwp_pengurus' => $file_npwp_pengurus,
			];
		}
		if ($type_edit_pengurus == 'edit_excel') {
			$this->M_datapenyedia->update_excel_pengurus_manajerial_enkription($where, $data);
		} else {
			$this->M_datapenyedia->update_pengurus_manajerial_enkription($where, $data);
		}
		$response = [
			'type_edit_pengurus' => $type_edit_pengurus,
			'row_excel_pengurus_manajerial' => $this->M_datapenyedia->get_row_excel_pengurus_manajerial($get_row_enkrip['id_pengurus']),
			'row_pengurus_manajerial' => $this->M_datapenyedia->get_row_pengurus_manajerial($get_row_enkrip['id_pengurus']),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_pengurus()
	{
		$id_url = $this->uri->segment(3);
		$type = $this->uri->segment(4);
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_excel_pengurus_manajerial_enkription($id_url);
		if ($type == 'pengurus_ktp') {
			$fileDownload = $get_row_enkrip['file_ktp_pengurus'];
		}
		if ($type == 'pengurus_npwp') {
			$fileDownload = $get_row_enkrip['file_npwp_pengurus'];
		}
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/PENGURUS-' . $date . '/' . $fileDownload, NULL);
	}

	public function simpan_import_excel_pengurus()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$cek_table = $this->M_datapenyedia->get_result_pengurus_manajerial($id_vendor);
		$cek_table_excel_validasi = $this->M_datapenyedia->result_excel_pengurus($id_vendor);
		$result = $this->M_datapenyedia->get_result_excel_pengurus_manajerial($id_vendor, $cek_table);
		$data_tervalidasi = $this->M_datapenyedia->get_result_validasi_excel_pengurus_manajerial($id_vendor, $cek_table_excel_validasi);
		foreach ($result as $key => $value) {
			$data = [
				'id_vendor' => $value['id_vendor'],
				'id_url' => $value['id_url'],
				'nik' => $value['nik'],
				'npwp' => $value['npwp'],
				'nama_pengurus' => $value['nama_pengurus'],
				'warganegara' => $value['warganegara'],
				'jabatan_pengurus' => $value['jabatan_pengurus'],
				'jabatan_mulai' => $value['jabatan_mulai'],
				'jabatan_selesai' => $value['jabatan_selesai'],
				'alamat_pengurus' => $value['alamat_pengurus'],
			];
			$this->M_datapenyedia->tambah_tbl_vendor_pengurus($data);
		}
		$where = [
			'id_vendor' => $id_vendor
		];
		$this->M_datapenyedia->delete_import_excel_pengurus($where);
		if ($data_tervalidasi == null) {
			$response = [
				'error' => 'maaf'
			];
		} else {
			$response = [
				'validasi' => $data_tervalidasi,
			];
		}


		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	function by_id_pengurus_manajerial($id_pengurus)
	{
		$response = [
			'row_pengurus_manajerial' => $this->M_datapenyedia->get_row_pengurus_manajerial($id_pengurus),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function hapus_row_pengurus($id_url)
	{
		$where = [
			'id_url' => $id_url
		];
		$this->M_datapenyedia->delete_pengurus($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	// end crud manajerial

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

	// crud pajak


	public function pajak()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$data['row_vendor']  = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/pajak/singgah', $data);
		$this->load->view('template_menu/new_footer');
		$this->load->view('datapenyedia/pajak/file_public');
		$this->load->view('datapenyedia/pajak/file_public_neraca');
	}

	public function get_row_global_pajak($id_url_vendor)
	{
		$token = $this->input->post('secret_token');
		$row_vendor = $this->M_datapenyedia->get_row_vendor_by_id_url_vendor($id_url_vendor);
		$id_vendor = $row_vendor['id_vendor'];
		$row_sppkp = $this->M_datapenyedia->get_row_sppkp($id_vendor);
		$row_npwp = $this->M_datapenyedia->get_row_npwp($id_vendor);
		$row_neraca = $this->M_datapenyedia->get_row_neraca($id_vendor);
		// $row_siujk = $this->M_datapenyedia->get_row_siujk($id_vendor);
		if ($token == $row_vendor['token_scure_vendor']) {
			$response = [
				'row_vendor' => $row_vendor,
				'row_sppkp' => $row_sppkp,
				'row_npwp' => $row_npwp,
				'row_neraca' => $row_neraca,
				'id_vendor' => 	$id_vendor
				// 'row_siujk' => $row_siujk
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$response = [
				'maaf' => 'Anda Belum Beruntung',
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	function add_sppkp()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_sppkp = $this->M_datapenyedia->get_row_sppkp($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$no_surat = $this->input->post('no_surat_sppkp');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup_sppkp');
		$tgl_berlaku = $this->input->post('tgl_berlaku_sppkp');
		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/SPPKP-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/SPPKP-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/SPPKP-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		// $config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_sppkp')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_surat' => $no_surat,
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
			if (!$row_sppkp) {
				$this->M_datapenyedia->tambah_sppkp($upload);
			} else {
				$this->M_datapenyedia->update_sppkp($upload, $where);
			}

			$response = [
				'row_sppkp' => $this->M_datapenyedia->get_row_sppkp($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_surat' => $no_surat,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'tgl_berlaku' => $tgl_berlaku,
			];
			if (!$row_sppkp) {
				$this->M_datapenyedia->tambah_sppkp($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_sppkp($upload, $where);
			}

			$response = [
				'row_sppkp' => $this->M_datapenyedia->get_row_sppkp($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			// redirect(base_url('upload'));
		}
	}

	public function encryption_sppkp($id_url)
	{
		$id_url = $this->input->post('id_url_sppkp');
		$token_dokumen = $this->input->post('token_dokumen');
		// $secret_token = $this->input->post('secret_token');

		$type = $this->input->post('type');

		$get_row_enkrip = $this->M_datapenyedia->get_row_sppkp_url($id_url);
		// $id_vendor = $get_row_enkrip['id_vendor'];
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
				$this->M_datapenyedia->update_sppkp($data, $where);
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
				$this->M_datapenyedia->update_sppkp($data, $where);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_sppkp($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_sppkp_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen =  $get_row_enkrip['file_dokumen'];
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/SPPKP-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}


	function add_npwp()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_npwp = $this->M_datapenyedia->get_row_npwp($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$no_surat = $this->input->post('no_npwp');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup_npwp');
		$tgl_berlaku = $this->input->post('tgl_berlaku_npwp');
		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/NPWP-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/NPWP-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/NPWP-' . $date;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 0;
		$config['remove_spaces'] = TRUE;
		// $config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_npwp')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_npwp' => $no_surat,
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
			if (!$row_npwp) {
				$this->M_datapenyedia->tambah_npwp($upload);
			} else {
				$this->M_datapenyedia->update_npwp($upload, $where);
			}

			$response = [
				'row_npwp' => $this->M_datapenyedia->get_row_npwp($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_npwp' => $no_surat,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'tgl_berlaku' => $tgl_berlaku,
			];
			if (!$row_npwp) {
				$this->M_datapenyedia->tambah_npwp($upload);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_npwp($upload, $where);
			}

			$response = [
				'row_npwp' => $this->M_datapenyedia->get_row_npwp($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
			// redirect(base_url('upload'));
		}
	}

	public function encryption_npwp($id_url)
	{
		$id_url = $this->input->post('id_url_npwp');
		$token_dokumen = $this->input->post('token_dokumen');
		// $secret_token = $this->input->post('secret_token');

		$type = $this->input->post('type');

		$get_row_enkrip = $this->M_datapenyedia->get_row_npwp_url($id_url);
		// $id_vendor = $get_row_enkrip['id_vendor'];
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
				$this->M_datapenyedia->update_npwp($data, $where);
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
				$this->M_datapenyedia->update_npwp($data, $where);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_npwp($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_npwp_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen =  $get_row_enkrip['file_dokumen'];
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/NPWP-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}
	// end crud pajak

	// CRUD NERACA
	function get_neraca_keuangan($id_vendor)
	{
		$result = $this->M_datapenyedia->gettable_neraca_keuangan($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {

			$row = array();
			$row[] = ++$no;
			$row[] = $rs->tahun_laporan1;
			$row[] = $rs->tahun_laporan1;
			$row[] = $rs->uraian;
			$row[] = $rs->tanggal_laporan;
			if ($rs->sts_upload_dokumen == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Upload Dokumen</span></small>';
			} else {
				$row[] = '<small><span class="badge bg-warning text-white">Belum Upload Dokumen</span></small>';
			}
			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_validasi == NULL) {
				$row[] = '<small><span class="badge swatch-orange text-white">Belum Di Periksa</span></small>';
			} else if ($rs->sts_validasi == 1) {
				$row[] = '<small><span class="badge bg-success text-white">Sudah Valid</span></small>';
			} else if ($rs->sts_validasi == 2) {
				$row[] = '<small><span class="badge bg-danger text-white">Belum Valid</span></small>';
			}

			$row[] = '<a href="' . base_url('validator/rekanan_neraca/cek_dokumen/' . $rs->id_neraca) . '" class="btn btn-warning btn-block btn-sm shadow-lg" ><i class="fa-solid fa-share-from-square px-1"></i> Cek Dokumen</a><br>
            <a href="javascript:;" class="btn btn-success btn-block btn-sm shadow-lg" onClick="byid_vendor(' . "'" . $rs->id_neraca . "','terima'" . ')"> <i class="fa-solid fa-envelope px-1"></i> Pesan</a> <a href="javascript:;" class="btn btn-primary btn-block btn-sm shadow-lg" onClick="byid_vendor(' . "'" . $rs->id_neraca . "','tolak'" . ')"> <i class="fa-solid fa-paper-plane px-1"></i> Undang</a>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_neraca_keuangan($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_neraca_keuangan($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function add_neraca()
	{
	}

	// END CRUD NERACA
}
