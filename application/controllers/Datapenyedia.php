<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
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
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/identitas/index', $data);
		$this->load->view('template_menu/new_footer');
		$this->load->view('js_file_on_session/index');
	}

	public function izin_usaha()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$data['row_vendor']  = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$data['get_row_nib']  = $this->M_datapenyedia->get_row_nib($id_vendor);
		$data['kualifikasi']  = $this->M_datapenyedia->get_kualifikasi_izin();
		$data['data_kbli']  = $this->M_datapenyedia->get_kbli();
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/izin_usaha/singgah', $data);
		$this->load->view('template_menu/new_footer');
		$this->load->view('js_file_on_session/index');
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
		if ($token == $row_vendor['token_scure_vendor']) {
			$response = [
				'row_vendor' => $row_vendor,
				'row_nib' => $row_nib,
				'row_siup' => $row_siup,
				'row_sbu' => $row_sbu,
				'row_siujk' => $row_siujk,
			];
		} else {
			$response = [
				'maaf' => 'Anda Belum Beruntung',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function add_izin_usaha()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_nib = $this->M_datapenyedia->get_row_nib($id_vendor);

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$nomor_surat_nib = $this->input->post('nomor_surat_nib');
		$kualifikasi_izin_nib = $this->input->post('kualifikasi_izin_nib');
		$sts_seumur_hidup_nib = $this->input->post('sts_seumur_hidup_nib');
		$tgl_berlaku_nib = $this->input->post('tgl_berlaku_nib');
		$password_dokumen_nib = '1234';

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
			$file_dokumen_nib = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen_nib, $chiper, $secret);
			$upload = [
				'id_url_nib' => $id,
				'id_vendor' => $id_vendor,
				'no_urut_nib' => '322',
				'nomor_surat_nib' => $nomor_surat_nib,
				'kualifikasi_izin_nib' => $kualifikasi_izin_nib,
				'sts_seumur_hidup_nib' => $sts_seumur_hidup_nib,
				'password_dokumen_nib' => $password_dokumen_nib,
				'file_dokumen_nib' => $enckrips_string,
				'token_dokumen_nib' => $secret,
				'tgl_berlaku_nib' => $tgl_berlaku_nib,
				'sts_token_dokumen_nib' => 1,
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
				'id_url_nib' => $id,
				'id_vendor' => $id_vendor,
				'no_urut_nib' => '322',
				'nomor_surat_nib' => $nomor_surat_nib,
				'kualifikasi_izin_nib' => $kualifikasi_izin_nib,
				'sts_seumur_hidup_nib' => $sts_seumur_hidup_nib,
				'tgl_berlaku_nib' => $tgl_berlaku_nib,
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
		$this->M_datapenyedia->update_enkrip($where, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function dekrip_nib()
	{
		$id_url = $this->input->post('id_url');
		$token_dokumen = $this->input->post('token_dokumen');
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
			$this->M_datapenyedia->update_enkrip($where, $data);
		} else {
			$response = [
				'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}




	public function url_download($id_url)
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
			$row[] = '<a  href="javascript:;" class=" btn btn-warning btn-sm" onClick="byid_kbli_nib(' . "'" . $rs->id_url_kbli_nib . "','edit'" . ')"><i class="fa fa-edit"></i> Edit</a>
			<a  href="javascript:;" class=" btn btn-danger btn-sm" onClick="byid_kbli_nib(' . "'" . $rs->id_url_kbli_nib . "','hapus'" . ')"><i class="fas fa fa-trash"></i> Hapus</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data($id_vendor),
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
		$id_kbli = $this->input->post('id_kbli');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin');
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
		$id_kbli = $this->input->post('id_kbli');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin');
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
		$id_url_kbli_nib = $this->input->post('id');
		$token_kbli_nib = $this->input->post('token');
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
	public function add_izin_usaha_siup()
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
		$tgl_berlaku_siup = $this->input->post('tgl_berlaku_siup');
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
		if ($this->upload->do_upload('file_dokumen')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut_siup' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'tgl_berlaku_siup' => $tgl_berlaku_siup,
				'sts_token_dokumen' => 1,
			];
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			if (!$row_siup) {
				$this->M_datapenyedia->tambah_siup($upload);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_siup($upload, $where);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			}


			$response = [
				'row_siup' => $this->M_datapenyedia->get_row_siup($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut_siup' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'tgl_berlaku_siup' => $tgl_berlaku_siup,
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
	// end siup crud


	// sbu crud
	public function add_izin_usaha_sbu()
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
		$tgl_berlaku_sbu = $this->input->post('tgl_berlaku_sbu');
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
		if ($this->upload->do_upload('file_dokumen')) {
			$fileData = $this->upload->data();
			$file_dokumen = $fileData['file_name'];
			$chiper = "AES-128-ECB";
			$secret = $token;
			$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut_sbu' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'tgl_berlaku_sbu' => $tgl_berlaku_sbu,
				'sts_token_dokumen' => 1,
			];
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			if (!$row_sbu) {
				$this->M_datapenyedia->tambah_sbu($upload);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_sbu($upload, $where);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			}


			$response = [
				'row_sbu' => $this->M_datapenyedia->get_row_sbu($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut_sbu' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'tgl_berlaku_sbu' => $tgl_berlaku_sbu,
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
	// end sbu crud

	// siujk
	public function add_izin_usaha_siujk()
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
		$tgl_berlaku_siujk = $this->input->post('tgl_berlaku_siujk');
		$password_dokumen = '1234';

		// SETTING PATH 
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/SIUJK-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/SIUJK-' . $date, 0777, TRUE);
		}

		$config['upload_path'] = './file_vms/' . $nama_usaha . '/SIUJK-' . $date;
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
				'no_urut_siujk' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'file_dokumen' => $enckrips_string,
				'token_dokumen' => $secret,
				'tgl_berlaku_siujk' => $tgl_berlaku_siujk,
				'sts_token_dokumen' => 1,
			];
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			if (!$row_siujk) {
				$this->M_datapenyedia->tambah_siujk($upload);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			} else {
				$where = [
					'id_vendor' => $id_vendor
				];
				$this->M_datapenyedia->update_siujk($upload, $where);
				$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			}


			$response = [
				'row_siujk' => $this->M_datapenyedia->get_row_siujk($id_vendor),
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$upload = [
				'id_url' => $id,
				'id_vendor' => $id_vendor,
				'no_urut_siujk' => '322',
				'nomor_surat' => $nomor_surat,
				'kualifikasi_izin' => $kualifikasi_izin,
				'sts_seumur_hidup' => $sts_seumur_hidup,
				'password_dokumen' => $password_dokumen,
				'tgl_berlaku_siujk' => $tgl_berlaku_siujk,
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
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/SIUJK-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}
	// end siujk

	public function akta_pendirian()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/akta_pendirian/index');
		$this->load->view('template_menu/new_footer');
	}

	public function manajerial()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/manajerial/index');
		$this->load->view('template_menu/new_footer');
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
		$this->load->view('datapenyedia/pengalaman/index');
		$this->load->view('template_menu/new_footer');
	}

	public function pajak()
	{
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/pajak/index');
		$this->load->view('template_menu/new_footer');
	}
}
