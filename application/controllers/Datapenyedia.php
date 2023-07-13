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
		$this->load->model('M_dashboard/M_dashboard');
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
		$id_vendor = $this->session->userdata('id_vendor');
		$data['row_vendor'] = $this->M_dashboard->get_row_vendor($id_vendor);
		$data['kualifikasi'] = str_split($data['row_vendor']['id_jenis_usaha']);
		$this->load->view('template_menu/header_menu');
		$this->load->view('datapenyedia/identitas/index', $data);
		$this->load->view('template_menu/new_footer');
		$this->load->view('js_file_on_session/index', $data);
	}

	function simpan_penyedia()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$bentuk_usaha = $this->input->post('bentuk_usaha');
		$nama_usaha = $this->input->post('nama_usaha');
		$kualifikasi_usaha = $this->input->post('kualifikasi_usaha');
		$alamat = $this->input->post('alamat');
		$id_provinsi = $this->input->post('id_provinsi');
		$id_kabupaten = $this->input->post('id_kabupaten');
		$id_kecamatan = $this->input->post('id_kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$kode_pos = $this->input->post('kode_pos');
		$no_telpon = $this->input->post('no_telpon');
		$sts_kantor_cabang = $this->input->post('sts_kantor_cabang');
		$alamat_kantor_cabang = $this->input->post('alamat_kantor_cabang');
		$alasan_perubahan = $this->input->post('alasan_perubahan');
		$jenis_usaha = $this->input->post('jenis_usaha[]');
		$where = [
			'id_vendor' => $id_vendor
		];
		if ($jenis_usaha) {
			$data_vendor = [
				'nama_usaha' => $nama_usaha,
				'bentuk_usaha' => $bentuk_usaha,
				'kualifikasi_usaha' => $kualifikasi_usaha,
				'alamat' => $alamat,
				'id_provinsi' => $id_provinsi,
				'id_kabupaten' => $id_kabupaten,
				'id_kecamatan' => $id_kecamatan,
				'kelurahan' => $kelurahan,
				'kode_pos' => $kode_pos,
				'no_telpon' => $no_telpon,
				'sts_kantor_cabang' => $sts_kantor_cabang,
				'alasan_perubahan' => $alasan_perubahan,
				'alamat_kantor_cabang' => $alamat_kantor_cabang,
				'id_jenis_usaha' => implode("", $jenis_usaha)

			];
		} else {
			$data_vendor = [
				'nama_usaha' => $nama_usaha,
				'bentuk_usaha' => $bentuk_usaha,
				'kualifikasi_usaha' => $kualifikasi_usaha,
				'alamat' => $alamat,
				'id_provinsi' => $id_provinsi,
				'id_kabupaten' => $id_kabupaten,
				'id_kecamatan' => $id_kecamatan,
				'kelurahan' => $kelurahan,
				'kode_pos' => $kode_pos,
				'no_telpon' => $no_telpon,
				'sts_kantor_cabang' => $sts_kantor_cabang,
				'alasan_perubahan' => $alasan_perubahan,
				'alamat_kantor_cabang' => $alamat_kantor_cabang,

			];
		}

		$this->M_datapenyedia->update_vendor($data_vendor, $where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
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
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup_nib');
		$tgl_berlaku = $this->input->post('tgl_berlaku_nib');

		$this->form_validation->set_rules('nomor_surat_nib', 'Nomor Surat', 'required|trim', ['required' => 'Nomor Surat Wajib Diisi!']);
		$this->form_validation->set_rules('sts_seumur_hidup_nib', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nomor_surat_nib' => form_error('nomor_surat_nib'),
					'sts_seumur_hidup_nib' => form_error('sts_seumur_hidup_nib'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			$password_dokumen = '1234';
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
					'sts_seumur_hidup' => $sts_seumur_hidup,
					'password_dokumen' => $password_dokumen,
					'file_dokumen' => $enckrips_string,
					'token_dokumen' => $secret,
					'tgl_berlaku' => $tgl_berlaku,
					'sts_token_dokumen' => 1,
					'sts_validasi' => 0,
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
					'sts_seumur_hidup' => $sts_seumur_hidup,
					'tgl_berlaku' => $tgl_berlaku,
					'sts_validasi' => 0,
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
		$row_vendor = $this->M_datapenyedia->get_row_kbli_nib_by_vendor($id_vendor);
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$id_kbli = $this->input->post('id_kbli_nib');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_nib');
		$ket_kbli_nib = $this->input->post('ket_kbli_nib');
		if ($row_vendor) {
			if ($id_kbli == $row_vendor['id_kbli']) {
				$is_uniq_id_kbli =  '|is_unique[tbl_vendor_kbli_nib.id_kbli]';
			} else {
				$is_uniq_id_kbli =  '';
			}
		} else {
			$is_uniq_id_kbli =  '';
		}
		$this->form_validation->set_rules('id_kbli_nib', 'Kode Kbli', 'required|trim|xss_clean' . $is_uniq_id_kbli, ['required' => 'Kode Kbli Wajib Diisi!', 'is_unique' => 'Kode Kbli Sudah Ada Di Table Anda']);
		$this->form_validation->set_rules('id_kualifikasi_izin_kbli_nib', 'Kualifikasi Kbli', 'required|trim', ['required' => 'Kualifikasi Kbli Wajib Diisi!']);
		$this->form_validation->set_rules('ket_kbli_nib', 'Keterangan Kbli', 'required|trim', ['required' => 'Keterangan Kbli Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'id_kbli_nib' => form_error('id_kbli_nib'),
					'id_kualifikasi_izin_kbli_nib' => form_error('id_kualifikasi_izin_kbli_nib'),
					'ket_kbli_nib' => form_error('ket_kbli_nib'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
	}
	function edit_kbli_nib()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$id_url_kbli_nib = $this->input->post('id_url_kbli_nib');
		$token_kbli_nib = $this->input->post('token_kbli_nib');
		$id_kbli = $this->input->post('id_kbli_nib');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_nib');
		$ket_kbli_nib = $this->input->post('ket_kbli_nib');
		$cek_token = $this->M_datapenyedia->get_row_kbli_nib($id_url_kbli_nib);
		$row_vendor = $this->M_datapenyedia->get_row_kbli_nib_by_vendor($id_vendor);
		if ($id_kbli == $row_vendor['id_kbli']) {
			$is_uniq_id_kbli =  '|is_unique[tbl_vendor_kbli_nib.id_kbli]';
		} else {
			$is_uniq_id_kbli =  '';
		}
		$this->form_validation->set_rules('id_kbli_nib', 'Kode Kbli', 'required|trim|xss_clean' . $is_uniq_id_kbli, ['required' => 'Kode Kbli Wajib Diisi!', 'is_unique' => 'Kode Kbli Sudah Ada Di Table Anda']);
		$this->form_validation->set_rules('id_kualifikasi_izin_kbli_nib', 'Kualifikasi Kbli', 'required|trim', ['required' => 'Kualifikasi Kbli Wajib Diisi!']);
		$this->form_validation->set_rules('ket_kbli_nib', 'Keterangan Kbli', 'required|trim', ['required' => 'Keterangan Kbli Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'id_kbli_nib' => form_error('id_kbli_nib'),
					'id_kualifikasi_izin_kbli_nib' => form_error('id_kualifikasi_izin_kbli_nib'),
					'ket_kbli_nib' => form_error('ket_kbli_nib'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			if ($token_kbli_nib == $cek_token['token_kbli_nib']) {
				$where = [
					'id_url_kbli_nib' => $id_url_kbli_nib
				];
				$data = [
					'id_kbli' => $id_kbli,
					'id_kualifikasi_izin' => $id_kualifikasi_izin,
					'ket_kbli_nib' => $ket_kbli_nib,
					'sts_kbli_nib' => 2,
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
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup_siup');
		$tgl_berlaku = $this->input->post('tgl_berlaku_siup');
		$password_dokumen = '1234';
		$this->form_validation->set_rules('nomor_surat_siup', 'Nomor Surat', 'required|trim', ['required' => 'Nomor Surat Wajib Diisi!']);
		$this->form_validation->set_rules('sts_seumur_hidup_siup', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nomor_surat_siup' => form_error('nomor_surat_siup'),
					'sts_seumur_hidup_siup' => form_error('sts_seumur_hidup_siup'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
					'sts_seumur_hidup' => $sts_seumur_hidup,
					'password_dokumen' => $password_dokumen,
					'file_dokumen' => $enckrips_string,
					'token_dokumen' => $secret,
					'tgl_berlaku' => $tgl_berlaku,
					'sts_token_dokumen' => 1,
					'sts_validasi' => 0,
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
					'sts_seumur_hidup' => $sts_seumur_hidup,
					'tgl_berlaku' => $tgl_berlaku,
					'sts_validasi' => 0,
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
		$row_vendor = $this->M_datapenyedia->get_row_kbli_siup_by_vendor($id_vendor);
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$id_kbli = $this->input->post('id_kbli_siup');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_siup');
		$ket_kbli_siup = $this->input->post('ket_kbli_siup');


		if ($row_vendor) {
			if ($id_kbli == $row_vendor['id_kbli']) {
				$is_uniq_id_kbli =  '|is_unique[tbl_vendor_kbli_siup.id_kbli]';
			} else {
				$is_uniq_id_kbli =  '';
			}
		} else {
			$is_uniq_id_kbli =  '';
		}
		$this->form_validation->set_rules('id_kbli_siup', 'Kode Kbli', 'required|trim|xss_clean' . $is_uniq_id_kbli, ['required' => 'Kode Kbli Wajib Diisi!', 'is_unique' => 'Kode Kbli Sudah Ada Di Table Anda']);
		$this->form_validation->set_rules('id_kualifikasi_izin_kbli_siup', 'Kualifikasi Kbli', 'required|trim', ['required' => 'Kualifikasi Kbli Wajib Diisi!']);
		$this->form_validation->set_rules('ket_kbli_siup', 'Keterangan Kbli', 'required|trim', ['required' => 'Keterangan Kbli Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'id_kbli_siup' => form_error('id_kbli_siup'),
					'id_kualifikasi_izin_kbli_siup' => form_error('id_kualifikasi_izin_kbli_siup'),
					'ket_kbli_siup' => form_error('ket_kbli_siup'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {

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
	}
	function edit_kbli_siup()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$id_url_kbli_siup = $this->input->post('id_url_kbli_siup');
		$token_kbli_siup = $this->input->post('token_kbli_siup');
		$id_kbli = $this->input->post('id_kbli_siup');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_siup');
		$ket_kbli_siup = $this->input->post('ket_kbli_siup');
		$cek_token = $this->M_datapenyedia->get_row_kbli_siup($id_url_kbli_siup);
		$row_vendor = $this->M_datapenyedia->get_row_kbli_siup_by_vendor($id_vendor);
		if ($id_kbli == $row_vendor['id_kbli']) {
			$is_uniq_id_kbli =  '|is_unique[tbl_vendor_kbli_siup.id_kbli]';
		} else {
			$is_uniq_id_kbli =  '';
		}
		$this->form_validation->set_rules('id_kbli_siup', 'Kode Kbli', 'required|trim|xss_clean' . $is_uniq_id_kbli, ['required' => 'Kode Kbli Wajib Diisi!', 'is_unique' => 'Kode Kbli Sudah Ada Di Table Anda']);
		$this->form_validation->set_rules('id_kualifikasi_izin_kbli_siup', 'Kualifikasi Kbli', 'required|trim', ['required' => 'Kualifikasi Kbli Wajib Diisi!']);
		$this->form_validation->set_rules('ket_kbli_siup', 'Keterangan Kbli', 'required|trim', ['required' => 'Keterangan Kbli Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'id_kbli_siup' => form_error('id_kbli_siup'),
					'id_kualifikasi_izin_kbli_siup' => form_error('id_kualifikasi_izin_kbli_siup'),
					'ket_kbli_siup' => form_error('ket_kbli_siup'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			if ($token_kbli_siup == $cek_token['token_kbli_siup']) {
				$where = [
					'id_url_kbli_siup' => $id_url_kbli_siup
				];
				$data = [
					'id_kbli' => $id_kbli,
					'id_kualifikasi_izin' => $id_kualifikasi_izin,
					'ket_kbli_siup' => $ket_kbli_siup,
					'sts_kbli_siup' => 2,
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
		$this->form_validation->set_rules('nomor_surat_siujk', 'Nomor Surat', 'required|trim', ['required' => 'Nomor Surat Wajib Diisi!']);
		$this->form_validation->set_rules('sts_seumur_hidup_siujk', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nomor_surat_siujk' => form_error('nomor_surat_siujk'),
					'sts_seumur_hidup_siujk' => form_error('sts_seumur_hidup_siujk'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
					'sts_validasi' => 0
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
					'sts_validasi' => 2
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
			$row[] = '<a  href="javascript:;" class="btn btn-warning btn-sm button_edit" onClick="byid_kbli_siujk(' . "'" . $rs->id_url_kbli_siujk . "','edit'" . ')"><i 		class="fa fa-edit"></i> Edit</a>
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
		$row_vendor = $this->M_datapenyedia->get_row_kbli_siujk_by_vendor($id_vendor);

		if ($row_vendor) {
			if ($id_kbli == $row_vendor['id_kbli']) {
				$is_uniq_id_kbli =  '|is_unique[tbl_vendor_kbli_siujk.id_kbli]';
			} else {
				$is_uniq_id_kbli =  '';
			}
		} else {
			$is_uniq_id_kbli =  '';
		}
		$this->form_validation->set_rules('id_kbli_siujk', 'Kode Kbli', 'required|trim|xss_clean' . $is_uniq_id_kbli, ['required' => 'Kode Kbli Wajib Diisi!', 'is_unique' => 'Kode Kbli Sudah Ada Di Table Anda']);
		$this->form_validation->set_rules('id_kualifikasi_izin_kbli_siujk', 'Kualifikasi Kbli', 'required|trim', ['required' => 'Kualifikasi Kbli Wajib Diisi!']);
		$this->form_validation->set_rules('ket_kbli_siujk', 'Keterangan Kbli', 'required|trim', ['required' => 'Keterangan Kbli Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'id_kbli_siujk' => form_error('id_kbli_siujk'),
					'id_kualifikasi_izin_kbli_siujk' => form_error('id_kualifikasi_izin_kbli_siujk'),
					'ket_kbli_siujk' => form_error('ket_kbli_siujk'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
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
	}
	function edit_kbli_siujk()
	{

		$id_url_kbli_siujk = $this->input->post('id_url_kbli_siujk');
		$token_kbli_siujk = $this->input->post('token_kbli_siujk');
		$id_kbli = $this->input->post('id_kbli_siujk');
		$id_kualifikasi_izin = $this->input->post('id_kualifikasi_izin_kbli_siujk');
		$ket_kbli_siujk = $this->input->post('ket_kbli_siujk');
		$cek_token = $this->M_datapenyedia->get_row_kbli_siujk($id_url_kbli_siujk);
		$id_vendor = $this->session->userdata('id_vendor');
		$row_vendor = $this->M_datapenyedia->get_row_kbli_siujk_by_vendor($id_vendor);
		if ($id_kbli == $row_vendor['id_kbli']) {
			$is_uniq_id_kbli =  '|is_unique[tbl_vendor_kbli_siujk.id_kbli]';
		} else {
			$is_uniq_id_kbli =  '';
		}
		$this->form_validation->set_rules('id_kbli_siujk', 'Kode Kbli', 'required|trim|xss_clean' . $is_uniq_id_kbli, ['required' => 'Kode Kbli Wajib Diisi!', 'is_unique' => 'Kode Kbli Sudah Ada Di Table Anda']);
		$this->form_validation->set_rules('id_kualifikasi_izin_kbli_siujk', 'Kualifikasi Kbli', 'required|trim', ['required' => 'Kualifikasi Kbli Wajib Diisi!']);
		$this->form_validation->set_rules('ket_kbli_siujk', 'Keterangan Kbli', 'required|trim', ['required' => 'Keterangan Kbli Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'id_kbli_siujk' => form_error('id_kbli_siujk'),
					'id_kualifikasi_izin_kbli_siujk' => form_error('id_kualifikasi_izin_kbli_siujk'),
					'ket_kbli_siujk' => form_error('ket_kbli_siujk'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			if ($token_kbli_siujk == $cek_token['token_kbli_siujk']) {
				$where = [
					'id_url_kbli_siujk' => $id_url_kbli_siujk
				];
				$data = [
					'id_kbli' => $id_kbli,
					'id_kualifikasi_izin' => $id_kualifikasi_izin,
					'ket_kbli_siujk' => $ket_kbli_siujk,
					'sts_kbli_siujk' => 2,
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
		$this->form_validation->set_rules('nomor_surat_sbu', 'Nomor Surat', 'required|trim', ['required' => 'Nomor Surat Wajib Diisi!']);
		$this->form_validation->set_rules('sts_seumur_hidup_sbu', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nomor_surat_sbu' => form_error('nomor_surat_sbu'),
					'sts_seumur_hidup_sbu' => form_error('sts_seumur_hidup_sbu'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
					'sts_validasi' => 0
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
					'sts_validasi' => 2
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
			}
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
		$row_vendor = $this->M_datapenyedia->get_row_kbli_sbu_by_vendor($id_vendor);

		if ($row_vendor) {
			if ($id_sbu == $row_vendor['id_sbu']) {
				$is_uniq_id_kbli =  '|is_unique[tbl_vendor_kbli_sbu.id_sbu]';
			} else {
				$is_uniq_id_kbli =  '';
			}
		} else {
			$is_uniq_id_kbli =  '';
		}
		$this->form_validation->set_rules('id_kbli_sbu', 'Kode SBU', 'required|trim|xss_clean' . $is_uniq_id_kbli, ['required' => 'Kode SBU Wajib Diisi!', 'is_unique' => 'Kode SBU Sudah Ada Di Table Anda']);
		$this->form_validation->set_rules('id_kualifikasi_izin_kbli_sbu', 'Kualifikasi SBU', 'required|trim', ['required' => 'Kualifikasi SBU Wajib Diisi!']);
		$this->form_validation->set_rules('ket_kbli_sbu', 'Keterangan SBU', 'required|trim', ['required' => 'Keterangan SBU Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'id_kbli_sbu' => form_error('id_kbli_sbu'),
					'id_kualifikasi_izin_kbli_sbu' => form_error('id_kualifikasi_izin_kbli_sbu'),
					'ket_kbli_sbu' => form_error('ket_kbli_sbu'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// tambah kbli_sbu 
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
	}
	function edit_kbli_sbu()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$id_url_kbli_sbu = $this->input->post('id_url_kbli_sbu');
		$token_kbli_sbu = $this->input->post('token_kbli_sbu');
		$id_sbu = $this->input->post('id_kbli_sbu');
		$id_kualifikasi_sbu = $this->input->post('id_kualifikasi_izin_kbli_sbu');
		$ket_kbli_sbu = $this->input->post('ket_kbli_sbu');
		$cek_token = $this->M_datapenyedia->get_row_kbli_sbu($id_url_kbli_sbu);
		$row_vendor = $this->M_datapenyedia->get_row_kbli_sbu_by_vendor($id_vendor);
		if ($id_sbu == $row_vendor['id_sbu']) {
			$is_uniq_id_kbli =  '|is_unique[tbl_vendor_kbli_sbu.id_sbu]';
		} else {
			$is_uniq_id_kbli =  '';
		}
		$this->form_validation->set_rules('id_kbli_sbu', 'Kode Kbli', 'required|trim|xss_clean' . $is_uniq_id_kbli, ['required' => 'Kode Kbli Wajib Diisi!', 'is_unique' => 'Kode Kbli Sudah Ada Di Table Anda']);
		$this->form_validation->set_rules('id_kualifikasi_izin_kbli_sbu', 'Kualifikasi Kbli', 'required|trim', ['required' => 'Kualifikasi Kbli Wajib Diisi!']);
		$this->form_validation->set_rules('ket_kbli_sbu', 'Keterangan Kbli', 'required|trim', ['required' => 'Keterangan Kbli Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'id_kbli_sbu' => form_error('id_kbli_sbu'),
					'id_kualifikasi_izin_kbli_sbu' => form_error('id_kualifikasi_izin_kbli_sbu'),
					'ket_kbli_sbu' => form_error('ket_kbli_sbu'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
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
		$nomor_surat = $this->input->post('no_surat_akta');
		$sts_seumur_hidup = $this->input->post('sts_seumur_hidup');
		$jumlah_setor_modal = $this->input->post('jumlah_setor_modal');
		$kualifikasi_usaha = $this->input->post('kualifikasi_usaha');
		$tgl_berlaku_akta = $this->input->post('berlaku_sampai');
		$password_dokumen = '1234';

		$this->form_validation->set_rules('no_surat_akta', 'Nomor Surat', 'required|trim', ['required' => 'Nomor Surat Wajib Diisi!']);
		$this->form_validation->set_rules('sts_seumur_hidup', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai Wajib Diisi!']);
		$this->form_validation->set_rules('jumlah_setor_modal', 'Jumlah Setor Modal', 'required|trim', ['required' => 'Jumlah Setor Modal Wajib Diisi!']);
		$this->form_validation->set_rules('kualifikasi_usaha', 'Kualifikasi Usaha', 'required|trim', ['required' => 'Kualifikasi Usaha Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nomor_surat' => form_error('no_surat_akta'),
					'sts_seumur_hidup' => form_error('sts_seumur_hidup'),
					'jumlah_setor_modal' => form_error('jumlah_setor_modal'),
					'kualifikasi_usaha' => form_error('kualifikasi_usaha'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
				$sts_upload = [
					'sts_upload_dokumen' => 1
				];
				$where = [
					'id_vendor' => $id_vendor
				];
				if (!$row_akta_pendirian) {
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
						'sts_validasi' => 0,
					];
					$this->M_datapenyedia->tambah_akta_pendirian($upload);
					$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
				} else {
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
						'sts_validasi' => 2,
					];
					$this->M_datapenyedia->update_akta_pendirian($upload, $where);
					$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
				}
				$response = [
					'row_akta' => $this->M_datapenyedia->get_row_akta_pendirian($id_vendor),
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				if (!$row_akta_pendirian) {
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
						'sts_validasi' => 0,
					];
					$this->M_datapenyedia->tambah_akta_pendirian($upload);
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
						'sts_validasi' => 2,
					];
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
	}


	function tidak_ada_akta_perubahan()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$row_akta_perubahan = $this->M_datapenyedia->get_row_akta_perubahan($id_vendor);
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		$chiper = "AES-128-ECB";
		$secret = $token;
		$enckrips_string = openssl_encrypt('-', $chiper, $secret);
		$upload = [
			'id_url' => $id,
			'id_vendor' => $id_vendor,
			'no_surat' => '-',
			'kualifikasi_usaha' => '-',
			'sts_seumur_hidup' => '-',
			'file_dokumen' => $enckrips_string,
			'token_dokumen' => $secret,
			'tgl_berlaku_akta' => null,
			'jumlah_setor_modal' => null,
			'sts_token_dokumen' => 1,
			'sts_validasi' => 1,
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
			'row_akta' => $this->M_datapenyedia->get_row_akta_perubahan($id_vendor),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
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
		$this->form_validation->set_rules('no_surat_perubahan', 'Nomor Surat', 'required|trim', ['required' => 'Nomor Surat Wajib Diisi!']);
		$this->form_validation->set_rules('sts_seumur_hidup_perubahan', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai Wajib Diisi!']);
		$this->form_validation->set_rules('jumlah_setor_perubahan', 'Jumlah Setor Modal', 'required|trim', ['required' => 'Jumlah Setor Modal Wajib Diisi!']);
		$this->form_validation->set_rules('kualifikasi_usaha_perubahan', 'Kualifikasi Usaha', 'required|trim', ['required' => 'Kualifikasi Usaha Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'no_surat_perubahan' => form_error('no_surat_perubahan'),
					'sts_seumur_hidup_perubahan' => form_error('sts_seumur_hidup_perubahan'),
					'jumlah_setor_perubahan' => form_error('jumlah_setor_perubahan'),
					'kualifikasi_usaha_perubahan' => form_error('kualifikasi_usaha_perubahan'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
		$this->load->view('js_folder/manajerial/file_public');
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
			if ($rs->sts_validasi == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else if ($rs->sts_validasi == 0) {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-danger">Tidak Valid</span>';
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
			$row[] = $rs->npwp;
			$row[] = $rs->nama_pemilik;
			$row[] = $rs->warganegara;
			$row[] = $rs->jns_pemilik;
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
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim', ['required' => 'NIK Wajib Diisi!']);
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim', ['required' => 'Nama Pemilik Wajib Diisi!']);
		$this->form_validation->set_rules('jns_pemilik', 'Jenis Pemilik', 'required|trim', ['required' => 'Jenis Pemilik  Wajib Diisi!']);
		$this->form_validation->set_rules('alamat_pemilik', 'Alamat Pemilik', 'required|trim', ['required' => 'Alamat Pemilik Wajib Diisi!']);
		$this->form_validation->set_rules('npwp', 'Npwp', 'required|trim', ['required' => 'Npwp Wajib Diisi!']);
		$this->form_validation->set_rules('warganegara', 'Warga Negara', 'required|trim', ['required' => 'Warga Negara Wajib Diisi!']);
		$this->form_validation->set_rules('saham', 'Saham', 'required|trim', ['required' => 'Saham Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nik' => form_error('nik'),
					'nama_pemilik' => form_error('nama_pemilik'),
					'jns_pemilik' => form_error('jns_pemilik'),
					'alamat_pemilik' => form_error('alamat_pemilik'),
					'npwp' => form_error('npwp'),
					'warganegara' => form_error('warganegara'),
					'saham' => form_error('saham'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$id = $this->uuid->v4();
			$id = str_replace('-', '', $id);
			// seeting enkrip dokumen
			$chiper = "AES-128-ECB";
			$secret_token_dokumen1 = 'jmto.1' . $id;
			$secret_token_dokumen2 = 'jmto.2' . $id;
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
				'sts_validasi' => 0
			];
			$this->M_datapenyedia->tambah_tbl_vendor_pemilik($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
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
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim', ['required' => 'NIK Wajib Diisi!']);
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim', ['required' => 'Nama Pemilik Wajib Diisi!']);
		$this->form_validation->set_rules('jns_pemilik', 'Jenis Pemilik', 'required|trim', ['required' => 'Jenis Pemilik  Wajib Diisi!']);
		$this->form_validation->set_rules('alamat_pemilik', 'Alamat Pemilik', 'required|trim', ['required' => 'Alamat Pemilik Wajib Diisi!']);
		$this->form_validation->set_rules('npwp', 'Npwp', 'required|trim', ['required' => 'Npwp Wajib Diisi!']);
		$this->form_validation->set_rules('warganegara', 'Warga Negara', 'required|trim', ['required' => 'Warga Negara Wajib Diisi!']);
		$this->form_validation->set_rules('saham', 'Saham', 'required|trim', ['required' => 'Saham Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nik' => form_error('nik'),
					'nama_pemilik' => form_error('nama_pemilik'),
					'jns_pemilik' => form_error('jns_pemilik'),
					'alamat_pemilik' => form_error('alamat_pemilik'),
					'npwp' => form_error('npwp'),
					'warganegara' => form_error('warganegara'),
					'saham' => form_error('saham'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// seeting enkrip dokumen
			$chiper = "AES-128-ECB";
			$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
			$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
				'sts_validasi' => 2
			];
			if ($type_edit_pemilik == 'edit_excel') {
				$this->M_datapenyedia->update_excel_pemilik_manajerial($upload, $where);
			} else {
				$this->M_datapenyedia->update_pemilik_manajerial($upload, $where);
			}

			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
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
				'sts_valdiasi' => 0
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
			if ($rs->sts_validasi == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else if ($rs->sts_validasi == 0) {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-danger">Tidak Valid</span>';
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
		$this->form_validation->set_rules('nik_pengurus', 'NIK', 'required|trim', ['required' => 'NIK Wajib Diisi!']);
		$this->form_validation->set_rules('nama_pengurus', 'Nama Pengurus', 'required|trim', ['required' => 'Nama Pengurus Wajib Diisi!']);
		$this->form_validation->set_rules('jabatan_pengurus', 'Jabatan Pengurus', 'required|trim', ['required' => 'Jabatan Pengurus  Wajib Diisi!']);
		$this->form_validation->set_rules('alamat_pengurus', 'Alamat Pengurus', 'required|trim', ['required' => 'Alamat Pengurus Wajib Diisi!']);
		$this->form_validation->set_rules('npwp_pengurus', 'Npwp', 'required|trim', ['required' => 'Npwp Wajib Diisi!']);
		$this->form_validation->set_rules('warganegara_pengurus', 'Warga Negara', 'required|trim', ['required' => 'Warga Negara Wajib Diisi!']);
		$this->form_validation->set_rules('jabatan_mulai', 'Jabatan Mulai', 'required|trim', ['required' => 'Jabatan Mulai Wajib Diisi!']);
		$this->form_validation->set_rules('jabatan_selesai', 'Jabatan Mulai', 'required|trim', ['required' => 'Jabatan Mulai Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nik_pengurus' => form_error('nik_pengurus'),
					'nama_pengurus' => form_error('nama_pengurus'),
					'jabatan_pengurus' => form_error('jabatan_pengurus'),
					'alamat_pengurus' => form_error('alamat_pengurus'),
					'npwp_pengurus' => form_error('npwp_pengurus'),
					'warganegara_pengurus' => form_error('warganegara_pengurus'),
					'jabatan_mulai' => form_error('jabatan_mulai'),
					'jabatan_selesai' => form_error('jabatan_selesai'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$id = $this->uuid->v4();
			$id = str_replace('-', '', $id);
			// seeting enkrip dokumen
			$chiper = "AES-128-ECB";
			$secret_token_dokumen1 = 'jmto.1' . $id;
			$secret_token_dokumen2 = 'jmto.2' . $id;
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
				'sts_validasi' => 0
			];
			$this->M_datapenyedia->tambah_tbl_vendor_pengurus($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
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
							'sts_validasi' => 0
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
		$warganegara = $this->input->post('warganegara_pengurus');
		$jabatan_pengurus = $this->input->post('jabatan_pengurus');
		$jabatan_mulai = $this->input->post('jabatan_mulai');
		$jabatan_selesai = $this->input->post('jabatan_selesai');
		$this->form_validation->set_rules('nik_pengurus', 'NIK', 'required|trim', ['required' => 'NIK Wajib Diisi!']);
		$this->form_validation->set_rules('nama_pengurus', 'Nama Pengurus', 'required|trim', ['required' => 'Nama Pengurus Wajib Diisi!']);
		$this->form_validation->set_rules('jabatan_pengurus', 'Jabatan Pengurus', 'required|trim', ['required' => 'Jabatan Pengurus  Wajib Diisi!']);
		$this->form_validation->set_rules('alamat_pengurus', 'Alamat Pengurus', 'required|trim', ['required' => 'Alamat Pengurus Wajib Diisi!']);
		$this->form_validation->set_rules('npwp_pengurus', 'Npwp', 'required|trim', ['required' => 'Npwp Wajib Diisi!']);
		$this->form_validation->set_rules('warganegara_pengurus', 'Warga Negara', 'required|trim', ['required' => 'Warga Negara Wajib Diisi!']);
		$this->form_validation->set_rules('jabatan_mulai', 'Jabatan Mulai', 'required|trim', ['required' => 'Jabatan Mulai Wajib Diisi!']);
		$this->form_validation->set_rules('jabatan_selesai', 'Jabatan Mulai', 'required|trim', ['required' => 'Jabatan Mulai Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nik_pengurus' => form_error('nik_pengurus'),
					'nama_pengurus' => form_error('nama_pengurus'),
					'jabatan_pengurus' => form_error('jabatan_pengurus'),
					'alamat_pengurus' => form_error('alamat_pengurus'),
					'npwp_pengurus' => form_error('npwp_pengurus'),
					'warganegara_pengurus' => form_error('warganegara_pengurus'),
					'jabatan_mulai' => form_error('jabatan_mulai'),
					'jabatan_selesai' => form_error('jabatan_selesai'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// seeting enkrip dokumen
			$chiper = "AES-128-ECB";
			$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
			$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
				'sts_validasi' => 2
			];
			if ($type_edit_pengurus == 'edit_excel') {
				$this->M_datapenyedia->update_excel_pengurus_manajerial($upload, $where);
			} else {
				$this->M_datapenyedia->update_pengurus_manajerial($upload, $where);
			}
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
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
		$this->load->view('js_folder/pengalaman_perusahaan/file_public');
	}

	// INI UNTUK PENGALAMAN
	public function buat_pengalaman()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$no_kontrak = $this->input->post('no_kontrak');
		$nama_pekerjaan = $this->input->post('nama_pekerjaan');
		$id_jenis_usaha = $this->input->post('id_jenis_usaha');
		$tanggal_kontrak = $this->input->post('tanggal_kontrak');
		$instansi_pemberi = $this->input->post('instansi_pemberi');
		$nilai_kontrak = $this->input->post('nilai_kontrak');
		$lokasi_pekerjaan = $this->input->post('lokasi_pekerjaan');
		$this->form_validation->set_rules('no_kontrak', 'No Kontrak', 'required|trim', ['required' => 'No Kontrak Wajib Diisi!']);
		$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required|trim', ['required' => 'Nama Pekerjaan Wajib Diisi!']);
		$this->form_validation->set_rules('id_jenis_usaha', 'Jenis Pengadaan', 'required|trim', ['required' => 'Jenis Pengadaan  Wajib Diisi!']);
		$this->form_validation->set_rules('tanggal_kontrak', 'Tanggal Kontrak', 'required|trim', ['required' => 'Tanggal Kontrak  Wajib Diisi!']);
		$this->form_validation->set_rules('instansi_pemberi', 'Instansi Pemberi', 'required|trim', ['required' => 'Instansi Pemberi  Wajib Diisi!']);
		$this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required|trim', ['required' => 'Nilai Kontrak  Wajib Diisi!']);
		$this->form_validation->set_rules('lokasi_pekerjaan', 'Lokasi Pekerjaan', 'required|trim', ['required' => 'Lokasi Pekerjaan  Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'no_kontrak' => form_error('no_kontrak'),
					'nama_pekerjaan' => form_error('nama_pekerjaan'),
					'id_jenis_usaha' => form_error('id_jenis_usaha'),
					'tanggal_kontrak' => form_error('tanggal_kontrak'),
					'instansi_pemberi' => form_error('instansi_pemberi'),
					'nilai_kontrak' => form_error('nilai_kontrak'),
					'lokasi_pekerjaan' => form_error('lokasi_pekerjaan'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			$id = $this->uuid->v4();
			$id = str_replace('-', '', $id);
			// seeting enkrip dokumen
			$chiper = "AES-128-ECB";
			$secret_token_dokumen1 = 'jmto.1' . $id;
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			$date = date('Y');
			if (!is_dir('file_vms/' . $nama_usaha . '/Pengalaman-' . $date)) {
				mkdir('file_vms/' . $nama_usaha . '/Pengalaman-' . $date, 0777, TRUE);
			}
			$config['upload_path'] = './file_vms/' . $nama_usaha . '/Pengalaman-' . $date;
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 0;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file_kontrak_pengalaman')) {
				$file_kontrak_pengalaman = $this->upload->data();
			}
			$upload = [
				'id_vendor' => $id_vendor,
				'id_url' => $id,
				'no_kontrak' => $no_kontrak,
				'nama_pekerjaan' => $nama_pekerjaan,
				'id_jenis_usaha' => $id_jenis_usaha,
				'tanggal_kontrak' => $tanggal_kontrak,
				'instansi_pemberi' => $instansi_pemberi,
				'nilai_kontrak' => $nilai_kontrak,
				'lokasi_pekerjaan' => $lokasi_pekerjaan,
				'file_kontrak_pengalaman' => openssl_encrypt($file_kontrak_pengalaman['file_name'], $chiper, $secret_token_dokumen1),
				'sts_token_dokumen_pengalaman' => 1,
				'sts_validasi' => 0
			];
			$this->M_datapenyedia->tambah_tbl_pengalaman($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}


	function import_pengalaman_perusahaan()
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
							'no_kontrak' => $row->getCellAtIndex(0),
							'nama_pekerjaan' => $row->getCellAtIndex(1),
							'id_jenis_usaha' => $row->getCellAtIndex(2),
							'nilai_kontrak' => $row->getCellAtIndex(3),
							'instansi_pemberi' => $row->getCellAtIndex(4),
							'lokasi_pekerjaan' => $row->getCellAtIndex(5),
							'tanggal_kontrak' => $row->getCellAtIndex(6),
							'sts_validasi' => 0
						);
						$this->M_datapenyedia->insert_pengalaman($data);
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
	public function get_data_pengalaman_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_pengalaman_manajerial($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->no_kontrak;
			$row[] = $rs->tanggal_kontrak;
			$row[] = $rs->nama_pekerjaan;
			$row[] = $rs->nilai_kontrak;
			$row[] = $rs->id_jenis_usaha;
			$row[] = $rs->instansi_pemberi;
			$row[] = $rs->lokasi_pekerjaan;
			if ($rs->sts_validasi == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else if ($rs->sts_validasi == 0) {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-danger">Tidak Valid</span>';
			}
			$row[] = '<a  href="javascript:;" class="btn btn-info btn-sm" onClick="by_id_pengalaman_manajerial(' . "'" . $rs->id_pengalaman . "','edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> View</a>
			<a  href="javascript:;" class="btn btn-danger btn-sm" onClick="by_id_pengalaman_manajerial(' . "'" . $rs->id_pengalaman . "','hapus'" . ')"><i class="fas fa fa-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_pengalaman_manajerial($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_pengalaman_manajerial($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
	public function get_data_excel_pengalaman_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_excel_pengalaman_manajerial($id_vendor);
		$data = [];
		$no = $_POST['start'];
		$nama_usaha = $this->session->userdata('nama_usaha');
		$date = date('Y');
		$file_path = 'file_vms/' . $nama_usaha . '/Pengalaman-' . $date;
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->no_kontrak;
			$row[] = $rs->tanggal_kontrak;
			$row[] = $rs->nama_pekerjaan;
			$row[] = $rs->nilai_kontrak;
			$row[] = $rs->id_jenis_usaha;
			$row[] = $rs->instansi_pemberi;
			$row[] = $rs->lokasi_pekerjaan;
			$row[] = '<a  href="javascript:;" class="btn btn-warning btn-sm d-md-block" onClick="by_id_excel_pengalaman_manajerial(' . "'" . $rs->id_pengalaman . "','edit'" . ')"><i class="fa fa-edit"></i></a>
				<a  href="javascript:;" class="btn btn-danger btn-sm d-md-block" onClick="by_id_excel_pengalaman_manajerial(' . "'" . $rs->id_pengalaman . "','hapus'" . ')"><i class="fas fa fa-trash"></i></a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_excel_pengalaman_manajerial($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_excel_pengalaman_manajerial($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function by_id_excel_pengalaman_menajerial($id_pengalaman)
	{
		$response = [
			'row_excel_pengalaman_manajerial' => $this->M_datapenyedia->get_row_excel_pengalaman_manajerial($id_pengalaman),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function edit_excel_pengalaman_manajerial()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$id_pengalaman = $this->input->post('id_pengalaman');
		$type_edit_pengalaman = $this->input->post('type_edit_pengalaman');
		if ($type_edit_pengalaman == 'edit_excel') {
			$get_row_enkrip = $this->M_datapenyedia->get_row_excel_pengalaman_manajerial($id_pengalaman);
		} else {
			$get_row_enkrip = $this->M_datapenyedia->get_row_pengalaman_manajerial($id_pengalaman);
		}
		$no_kontrak = $this->input->post('no_kontrak');
		$nama_pekerjaan = $this->input->post('nama_pekerjaan');
		$id_jenis_usaha = $this->input->post('id_jenis_usaha');
		$tanggal_kontrak = $this->input->post('tanggal_kontrak');
		$instansi_pemberi = $this->input->post('instansi_pemberi');
		$nilai_kontrak = $this->input->post('nilai_kontrak');
		$lokasi_pekerjaan = $this->input->post('lokasi_pekerjaan');
		$this->form_validation->set_rules('no_kontrak', 'No Kontrak', 'required|trim', ['required' => 'No Kontrak Wajib Diisi!']);
		$this->form_validation->set_rules('nama_pekerjaan', 'Nama Pekerjaan', 'required|trim', ['required' => 'Nama Pekerjaan Wajib Diisi!']);
		$this->form_validation->set_rules('id_jenis_usaha', 'Jenis Pengadaan', 'required|trim', ['required' => 'Jenis Pengadaan  Wajib Diisi!']);
		$this->form_validation->set_rules('tanggal_kontrak', 'Tanggal Kontrak', 'required|trim', ['required' => 'Tanggal Kontrak  Wajib Diisi!']);
		$this->form_validation->set_rules('instansi_pemberi', 'Instansi Pemberi', 'required|trim', ['required' => 'Instansi Pemberi  Wajib Diisi!']);
		$this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required|trim', ['required' => 'Nilai Kontrak  Wajib Diisi!']);
		$this->form_validation->set_rules('lokasi_pekerjaan', 'Lokasi Pekerjaan', 'required|trim', ['required' => 'Lokasi Pekerjaan  Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'no_kontrak' => form_error('no_kontrak'),
					'nama_pekerjaan' => form_error('nama_pekerjaan'),
					'id_jenis_usaha' => form_error('id_jenis_usaha'),
					'tanggal_kontrak' => form_error('tanggal_kontrak'),
					'instansi_pemberi' => form_error('instansi_pemberi'),
					'nilai_kontrak' => form_error('nilai_kontrak'),
					'lokasi_pekerjaan' => form_error('lokasi_pekerjaan'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// seeting enkrip dokumen
			$chiper = "AES-128-ECB";
			$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			$date = date('Y');
			if (!is_dir('file_vms/' . $nama_usaha . '/Pengalaman-' . $date)) {
				mkdir('file_vms/' . $nama_usaha . '/Pengalaman-' . $date, 0777, TRUE);
			}
			$config['upload_path'] = './file_vms/' . $nama_usaha . '/Pengalaman-' . $date;
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 0;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file_kontrak_pengalaman')) {
				$fileDataKontrak = $this->upload->data();
				$post_file_kontrak_pengalaman = openssl_encrypt($fileDataKontrak['file_name'], $chiper, $secret_token_dokumen1);
			} else {
				$fileDataKontrak = $get_row_enkrip['file_kontrak_pengalaman'];
				$post_file_kontrak_pengalaman = $fileDataKontrak;
			}
			$where = [
				'id_pengalaman' => $id_pengalaman
			];
			$upload = [
				'id_vendor' => $id_vendor,
				'no_kontrak' => $no_kontrak,
				'nama_pekerjaan' => $nama_pekerjaan,
				'id_jenis_usaha' => $id_jenis_usaha,
				'tanggal_kontrak' => $tanggal_kontrak,
				'instansi_pemberi' => $instansi_pemberi,
				'nilai_kontrak' => $nilai_kontrak,
				'lokasi_pekerjaan' => $lokasi_pekerjaan,
				'file_kontrak_pengalaman' => $post_file_kontrak_pengalaman,
				'sts_token_dokumen_pengalaman' => 1,
				'sts_validasi' => 2
			];
			if ($type_edit_pengalaman == 'edit_excel') {
				$this->M_datapenyedia->update_excel_pengalaman_manajerial($upload, $where);
			} else {
				$this->M_datapenyedia->update_pengalaman_manajerial($upload, $where);
			}

			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}


	public function hapus_row_import_excel_pengalaman($id_url)
	{
		$where = [
			'id_url' => $id_url
		];
		$this->M_datapenyedia->delete_import_excel_pengalaman($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	public function hapus_import_excel_pengalaman()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$where = [
			'id_vendor' => $id_vendor
		];
		$this->M_datapenyedia->delete_import_excel_pengalaman($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	public function dekrip_enkrip_pengalaman($id_url)
	{
		$type = $this->input->post('type');
		$type_edit_pengalaman = $this->input->post('type_edit_pengalaman');
		if ($type_edit_pengalaman == 'edit_excel') {
			$get_row_enkrip = $this->M_datapenyedia->get_row_excel_pengalaman_manajerial_enkription($id_url);
		} else {
			$get_row_enkrip = $this->M_datapenyedia->get_row_pengalaman_manajerial_enkription($id_url);
		}
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$where = [
			'id_url' => $id_url
		];
		if ($type == 'dekrip') {
			$file_kontrak_pengalaman = openssl_decrypt($get_row_enkrip['file_kontrak_pengalaman'], $chiper, $secret_token_dokumen1);
			$data = [
				'sts_token_dokumen_pengalaman' => 2,
				'file_kontrak_pengalaman' => $file_kontrak_pengalaman,
			];
		} else {
			$file_kontrak_pengalaman = openssl_encrypt($get_row_enkrip['file_kontrak_pengalaman'], $chiper, $secret_token_dokumen1);
			$data = [
				'sts_token_dokumen_pengalaman' => 1,
				'file_kontrak_pengalaman' => $file_kontrak_pengalaman,
			];
		}
		if ($type_edit_pengalaman == 'edit_excel') {
			$this->M_datapenyedia->update_excel_pengalaman_manajerial_enkription($where, $data);
		} else {
			$this->M_datapenyedia->update_pengalaman_manajerial_enkription($where, $data);
		}
		$response = [
			'type_edit_pengalaman' => $type_edit_pengalaman,
			'row_excel_pengalaman_manajerial' => $this->M_datapenyedia->get_row_excel_pengalaman_manajerial($get_row_enkrip['id_pengalaman']),
			'row_pengalaman_manajerial' => $this->M_datapenyedia->get_row_pengalaman_manajerial($get_row_enkrip['id_pengalaman']),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_pengalaman()
	{
		$id_url = $this->uri->segment(3);
		$type = $this->uri->segment(4);
		if ($id_url == '') {
			// tendang not found
		}
		if ($type == 'pengalaman_kontrak') {
			$get_row_enkrip = $this->M_datapenyedia->get_row_excel_pengalaman_manajerial_enkription($id_url);
			$fileDownload = $get_row_enkrip['file_kontrak_pengalaman'];
			$id_vendor = $get_row_enkrip['id_vendor'];
		} else {
			$get_row_enkrip = $this->M_datapenyedia->get_row_pengalaman_manajerial_enkription($id_url);
			$fileDownload = $get_row_enkrip['file_kontrak_pengalaman'];
			$id_vendor = $get_row_enkrip['id_vendor'];
		}
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/Pengalaman-' . $date . '/' . $fileDownload, NULL);
	}

	public function simpan_import_excel_pengalaman()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$cek_table = $this->M_datapenyedia->get_result_pengalaman_manajerial($id_vendor);
		$cek_table_excel_validasi = $this->M_datapenyedia->result_excel_pengalaman($id_vendor);
		$result = $this->M_datapenyedia->get_result_excel_pengalaman_manajerial($id_vendor, $cek_table);
		$data_tervalidasi = $this->M_datapenyedia->get_result_validasi_excel_pengalaman_manajerial($id_vendor, $cek_table_excel_validasi);
		foreach ($result as $key => $value) {
			$data = [
				'id_vendor' => $value['id_vendor'],
				'id_url' => $value['id_url'],
				'no_kontrak' => $value['no_kontrak'],
				'nama_pekerjaan' => $value['nama_pekerjaan'],
				'id_jenis_usaha' => $value['id_jenis_usaha'],
				'tanggal_kontrak' => $value['tanggal_kontrak'],
				'instansi_pemberi' => $value['instansi_pemberi'],
				'nilai_kontrak' => $value['nilai_kontrak'],
				'lokasi_pekerjaan' => $value['lokasi_pekerjaan'],
			];
			$this->M_datapenyedia->tambah_tbl_vendor_pengalaman($data);
		}
		$where = [
			'id_vendor' => $id_vendor
		];
		if ($data_tervalidasi == null) {
			$response = [
				'error' => 'maaf'
			];
		} else {
			$response = [
				'validasi' => $data_tervalidasi,
			];
		}
		$this->M_datapenyedia->delete_import_excel_pengalaman($where);
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	function by_id_pengalaman_manajerial($id_pengalaman)
	{
		$response = [
			'row_pengalaman_manajerial' => $this->M_datapenyedia->get_row_pengalaman_manajerial($id_pengalaman),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function hapus_row_pengalaman($id_url)
	{
		$where = [
			'id_url' => $id_url
		];
		$this->M_datapenyedia->delete_pengalaman($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
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
		$this->load->view('datapenyedia/pajak/file_public_spt');
		$this->load->view('datapenyedia/pajak/file_public_laporan_keuangan');
	}



	function buat_excel_format_neraca()
	{
		$jenis_laporan_1 = $this->input->post('jenis_laporan_1');
		$nilai_tahun_kolom_1_1 = $this->input->post('nilai_tahun_kolom_1_1');
		$nilai_tahun_kolom_2_1 = $this->input->post('nilai_tahun_kolom_2_1');

		// batas
		$jenis_laporan_2 = $this->input->post('jenis_laporan_2');
		$nilai_tahun_kolom_1_2 = $this->input->post('nilai_tahun_kolom_1_2');
		$nilai_tahun_kolom_2_2 = $this->input->post('nilai_tahun_kolom_2_2');
		// batas
		$jenis_laporan_3 = $this->input->post('jenis_laporan_3');
		$nilai_tahun_kolom_1_3 = $this->input->post('nilai_tahun_kolom_1_3');
		$nilai_tahun_kolom_2_3 = $this->input->post('nilai_tahun_kolom_2_3');

		// batas
		// 4
		$jenis_laporan_4 = $this->input->post('jenis_laporan_4');
		$nilai_tahun_kolom_1_4 = $this->input->post('nilai_tahun_kolom_1_4');
		$nilai_tahun_kolom_2_4 = $this->input->post('nilai_tahun_kolom_2_4');

		// batas
		// 5
		$jenis_laporan_5 = $this->input->post('jenis_laporan_5');
		$nilai_tahun_kolom_1_5 = $this->input->post('nilai_tahun_kolom_1_5');
		$nilai_tahun_kolom_2_5 = $this->input->post('nilai_tahun_kolom_2_5');

		// batas
		// 6
		$jenis_laporan_6 = $this->input->post('jenis_laporan_6');
		$nilai_tahun_kolom_1_6 = $this->input->post('nilai_tahun_kolom_1_6');
		$nilai_tahun_kolom_2_6 = $this->input->post('nilai_tahun_kolom_2_6');

		// 7
		$jenis_laporan_7 = $this->input->post('jenis_laporan_7');
		$nilai_tahun_kolom_1_7 = $this->input->post('nilai_tahun_kolom_1_7');
		$nilai_tahun_kolom_2_7 = $this->input->post('nilai_tahun_kolom_2_7');
		// 8
		$jenis_laporan_8 = $this->input->post('jenis_laporan_8');
		$nilai_tahun_kolom_1_8 = $this->input->post('nilai_tahun_kolom_1_8');
		$nilai_tahun_kolom_2_8 = $this->input->post('nilai_tahun_kolom_2_8');
		$data = [
			'jenis_laporan_1' => $jenis_laporan_1,
			'nilai_tahun_kolom_1_1' => $nilai_tahun_kolom_1_1,
			'nilai_tahun_kolom_2_1' => $nilai_tahun_kolom_2_1,
			// batas
			'jenis_laporan_2' => $jenis_laporan_2,
			'nilai_tahun_kolom_1_2' => $nilai_tahun_kolom_1_2,
			'nilai_tahun_kolom_2_2' => $nilai_tahun_kolom_2_2,
			// batas
			// 3
			'jenis_laporan_3' => $jenis_laporan_3,
			'nilai_tahun_kolom_1_3' => $nilai_tahun_kolom_1_3,
			'nilai_tahun_kolom_2_3' => $nilai_tahun_kolom_2_3,
			// 4
			'jenis_laporan_4' => $jenis_laporan_4,
			'nilai_tahun_kolom_1_4' => $nilai_tahun_kolom_1_4,
			'nilai_tahun_kolom_2_4' => $nilai_tahun_kolom_2_4,
			// 5
			'jenis_laporan_5' => $jenis_laporan_5,
			'nilai_tahun_kolom_1_5' => $nilai_tahun_kolom_1_5,
			'nilai_tahun_kolom_2_5' => $nilai_tahun_kolom_2_5,
			// 6
			'jenis_laporan_6' => $jenis_laporan_6,
			'nilai_tahun_kolom_1_6' => $nilai_tahun_kolom_1_6,
			'nilai_tahun_kolom_2_6' => $nilai_tahun_kolom_2_6,
			// 7
			'jenis_laporan_7' => $jenis_laporan_7,
			'nilai_tahun_kolom_1_7' => $nilai_tahun_kolom_1_7,
			'nilai_tahun_kolom_2_7' => $nilai_tahun_kolom_2_7,
			// 8
			'jenis_laporan_8' => $jenis_laporan_8,
			'nilai_tahun_kolom_1_8' => $nilai_tahun_kolom_1_8,
			'nilai_tahun_kolom_2_8' => $nilai_tahun_kolom_2_8,
		];
		$this->load->view('datapenyedia/pajak/export_format_excel', $data);
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}


	public function simpan_neraca_keuangan()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		// seeting enkrip dokumen
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $id;
		// SETTING PATH 
		$sts_upload = [
			'sts_upload_dokumen' => 1
		];
		$where = [
			'id_vendor' => $id_vendor
		];
		$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/Neraca-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/Neraca-' . $date, 0777, TRUE);
		}
		$config['upload_path'] = './file_vms/' . $nama_usaha . '/Neraca-' . $date;
		$config['allowed_types'] = 'pdf|xlsx|xls';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen_neraca')) {
			$filedata_neraca = $this->upload->data();
		}
		$upload = [
			'id_vendor' => $id_vendor,
			'id_url_neraca' => $id,
			'file_dokumen_neraca' => openssl_encrypt($filedata_neraca['file_name'], $chiper, $secret_token_dokumen1),
			'sts_token_dokumen' => 1,
		];
		$this->M_datapenyedia->tambah_tbl_vendor_neraca($upload);
		$response = [
			'message' => 'success'
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function edit_neraca_keuangan()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$id_neraca = $this->input->post('id_neraca');
		$get_row_enkrip = $this->M_datapenyedia->get_row_neraca($id_neraca);
		// seeting enkrip dokumen
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url_neraca'];
		// SETTING PATH 
		$sts_upload = [
			'sts_upload_dokumen' => 1
		];
		$where = [
			'id_vendor' => $id_vendor
		];
		$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
		$date = date('Y');
		if (!is_dir('file_vms/' . $nama_usaha . '/Neraca-' . $date)) {
			mkdir('file_vms/' . $nama_usaha . '/Neraca-' . $date, 0777, TRUE);
		}
		$config['upload_path'] = './file_vms/' . $nama_usaha . '/Neraca-' . $date;
		$config['allowed_types'] = 'pdf|xlsx|xls';
		$config['max_size'] = 0;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_dokumen_neraca')) {
			$fileDataKtp = $this->upload->data();
			$post_file_dokumen_neraca = openssl_encrypt($fileDataKtp['file_name'], $chiper, $secret_token_dokumen1);
		} else {
			$fileDataKtp = $get_row_enkrip['file_dokumen_neraca'];
			$post_file_dokumen_neraca = $fileDataKtp;
		}
		$where = [
			'id_neraca' => $id_neraca
		];
		$upload = [
			'id_vendor' => $id_vendor,
			'sts_token_dokumen' => 1,
			'file_dokumen_neraca' => $post_file_dokumen_neraca,
		];
		$this->M_datapenyedia->update_neraca($upload, $where);

		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}




	public function get_table_nerca_keuangan()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$resultss = $this->M_datapenyedia->gettable_neraca_keuangan($id_vendor);
		$data = [];
		$no = $_POST['start'];
		$nama_usaha = $this->session->userdata('nama_usaha');
		$date = date('Y');
		$file_path = 'file_vms/' . $nama_usaha . '/Neraca-' . $date;
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			if ($rs->sts_token_dokumen == 1) {
				$row[] = '<label for="" style="white-space: nowrap; 
				width: 100px; 
				overflow: hidden;
				text-overflow: ellipsis;">' . $rs->file_dokumen_neraca . '</label>';
			} else {
				$row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="Download_neraca(\'' . $rs->id_url_neraca . '\'' . ',' . '\'' . 'neraca_dokumen' . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_dokumen_neraca . '</a>';
			}
			if ($rs->sts_token_dokumen == 2) {
				$row[] = '<center>
            	<a href="javascript:;" class="btn btn-success btn-sm shadow-lg" onClick="DekripEnkrip_neraca(' . "'" . $rs->id_url_neraca . "','enkrip'" . ')"> <i class="fa-solid fa-lock px-1"></i> Enkrip</a></center>';
			} else {
				$row[] = '<center>
            	<a href="javascript:;" class="btn btn-warning btn-sm shadow-lg" onClick="DekripEnkrip_neraca(' . "'" . $rs->id_url_neraca . "','dekrip'" . ')"> <i class="fa-solid fa-lock-open px-1"></i> Dekrip</a></center>';
			}
			if ($rs->sts_validasi == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else if ($rs->sts_validasi == 0) {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-danger">Tidak Valid</span>';
			}
			$row[] = '<a  href="javascript:;" class="btn btn-info btn-sm" style="width:150px" onClick="by_id_neraca_keuangan(' . "'" . $rs->id_neraca . "','edit'" . ')"><i class="fa-solid fa-users-viewfinder px-1"></i> View</a>
			<a  href="javascript:;" class="btn btn-danger btn-sm" style="width:150px" onClick="by_id_neraca_keuangan(' . "'" . $rs->id_neraca . "','hapus'" . ')"><i class="fas fa fa-trash"></i> Delete</a>';
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_data_neraca_keuangan($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_data_neraca_keuangan($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function by_id_neraca($id_neraca)
	{
		$response = [
			'row_neraca' => $this->M_datapenyedia->get_row_neraca($id_neraca),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function dekrip_enkrip_neraca($id_url_neraca)
	{
		$type = $this->input->post('type');
		$get_row_enkrip = $this->M_datapenyedia->get_row_neraca_enkrip($id_url_neraca);
		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url_neraca'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url_neraca'];
		$where = [
			'id_url_neraca' => $id_url_neraca
		];
		if ($type == 'dekrip') {
			$file_dokumen_neraca = openssl_decrypt($get_row_enkrip['file_dokumen_neraca'], $chiper, $secret_token_dokumen1);
			$file_dokumen_sertifikat = openssl_decrypt($get_row_enkrip['file_dokumen_sertifikat'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen' => 2,
				'file_dokumen_neraca' => $file_dokumen_neraca,
				'file_dokumen_sertifikat' => $file_dokumen_sertifikat,
			];
			// st
		} else {
			$file_dokumen_neraca = openssl_encrypt($get_row_enkrip['file_dokumen_neraca'], $chiper, $secret_token_dokumen1);
			$file_dokumen_sertifikat = openssl_encrypt($get_row_enkrip['file_dokumen_sertifikat'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen' => 1,
				'file_dokumen_neraca' => $file_dokumen_neraca,
				'file_dokumen_sertifikat' => $file_dokumen_sertifikat,
			];
		}
		$this->M_datapenyedia->update_neraca_enkrip($where, $data);
		$response = [
			'row_neraca' => $this->M_datapenyedia->get_row_neraca($get_row_enkrip['id_neraca']),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function url_download_neraca()
	{
		$id_url_neraca = $this->uri->segment(3);
		$type = $this->uri->segment(4);
		if ($id_url_neraca == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_neraca_enkrip($id_url_neraca);
		if ($type == 'neraca_dokumen') {
			$fileDownload = $get_row_enkrip['file_dokumen_neraca'];
		}
		if ($type == 'neraca_sertifikat') {
			$fileDownload = $get_row_enkrip['file_dokumen_sertifikat'];
		}
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/Neraca-' . $date . '/' . $fileDownload, NULL);
	}
	public function hapus_row_neraca($id_url_neraca)
	{
		$where = [
			'id_url_neraca' => $id_url_neraca
		];
		$this->M_datapenyedia->delete_neraca($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function get_row_global_pajak($id_url_vendor)
	{
		$token = $this->input->post('secret_token');
		$row_vendor = $this->M_datapenyedia->get_row_vendor_by_id_url_vendor($id_url_vendor);
		$id_vendor = $row_vendor['id_vendor'];
		$row_sppkp = $this->M_datapenyedia->get_row_sppkp($id_vendor);
		$row_npwp = $this->M_datapenyedia->get_row_npwp($id_vendor);
		$row_neraca = $this->M_datapenyedia->get_row_neraca($id_vendor);
		$row_spt = $this->M_datapenyedia->get_row_spt($id_vendor);
		// $row_siujk = $this->M_datapenyedia->get_row_siujk($id_vendor);
		if ($token == $row_vendor['token_scure_vendor']) {
			$response = [
				'row_vendor' => $row_vendor,
				'row_sppkp' => $row_sppkp,
				'row_npwp' => $row_npwp,
				'row_neraca' => $row_neraca,
				'row_spt' => $row_spt,
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

	// INI UNTUK SPPKP
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
		$this->form_validation->set_rules('no_surat_sppkp', 'SPPKP', 'required|trim', ['required' => 'SPPKP Wajib Diisi!']);
		$this->form_validation->set_rules('sts_seumur_hidup_sppkp', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai Wajib Diisi!']);
		$this->form_validation->set_rules('tgl_berlaku_sppkp', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai  Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'no_surat_sppkp' => form_error('no_surat_sppkp'),
					'sts_seumur_hidup_sppkp' => form_error('sts_seumur_hidup_sppkp'),
					'tgl_berlaku_sppkp' => form_error('tgl_berlaku_sppkp'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
				$where = [
					'id_vendor' => $id_vendor
				];
				if (!$row_sppkp) {
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
						'sts_validasi' => 0
					];
					$this->M_datapenyedia->tambah_sppkp($upload);
				} else {
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
						'sts_validasi' => 2
					];
					$this->M_datapenyedia->update_sppkp($upload, $where);
				}

				$response = [
					'row_sppkp' => $this->M_datapenyedia->get_row_sppkp($id_vendor),
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				if (!$row_sppkp) {
					$upload = [
						'id_url' => $id,
						'id_vendor' => $id_vendor,
						'no_surat' => $no_surat,
						'sts_seumur_hidup' => $sts_seumur_hidup,
						'tgl_berlaku' => $tgl_berlaku,
						'sts_validasi' => 0
					];
					$this->M_datapenyedia->tambah_sppkp($upload);
				} else {
					$upload = [
						'id_url' => $id,
						'id_vendor' => $id_vendor,
						'no_surat' => $no_surat,
						'sts_seumur_hidup' => $sts_seumur_hidup,
						'tgl_berlaku' => $tgl_berlaku,
						'sts_validasi' => 2
					];
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
		$this->form_validation->set_rules('no_npwp', 'NPWP', 'required|trim', ['required' => 'NPWP Wajib Diisi!']);
		$this->form_validation->set_rules('sts_seumur_hidup_npwp', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai Wajib Diisi!']);
		$this->form_validation->set_rules('tgl_berlaku_npwp', 'Berlaku Sampai', 'required|trim', ['required' => 'Berlaku Sampai  Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'no_npwp' => form_error('no_npwp'),
					'sts_seumur_hidup_npwp' => form_error('sts_seumur_hidup_npwp'),
					'tgl_berlaku_npwp' => form_error('tgl_berlaku_npwp'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
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
						'sts_validasi' => 0
					];
					$this->M_datapenyedia->tambah_npwp($upload);
				} else {
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
						'sts_validasi' => 2
					];
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
					$upload = [
						'id_url' => $id,
						'id_vendor' => $id_vendor,
						'no_npwp' => $no_surat,
						'sts_seumur_hidup' => $sts_seumur_hidup,
						'tgl_berlaku' => $tgl_berlaku,
						'sts_validasi' => 0
					];
					$this->M_datapenyedia->tambah_npwp($upload);
				} else {
					$upload = [
						'id_url' => $id,
						'id_vendor' => $id_vendor,
						'no_npwp' => $no_surat,
						'sts_seumur_hidup' => $sts_seumur_hidup,
						'tgl_berlaku' => $tgl_berlaku,
						'sts_validasi' => 2
					];
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

	// CRUD SPT

	function get_spt($id_vendor)
	{
		$result = $this->M_datapenyedia->gettable_spt($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {

			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nomor_surat;
			$row[] = $rs->tahun_lapor;
			$row[] = $rs->jenis_spt;
			$row[] = $rs->tgl_penyampaian;
			if ($rs->sts_token_dokumen == 1) {
				$row[] = $rs->file_dokumen;
			} else {
				$row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_spt(\'' . $rs->id_url . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_dokumen . '</a>';
			}
			// nanti main kondisi hitung dokumen dimari
			if ($rs->sts_validasi == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else if ($rs->sts_validasi == 0) {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-danger">Tidak Valid</span>';
			}

			if ($rs->sts_token_dokumen == 1) {
				$row[] = '<center><a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onClick="byid_spt(' . "'" . $rs->id_url . "','lihat'" . ')"><i class="fa-solid fa-search px-1"></i> Lihat</a><a href="javascript:;" class="btn btn-danger btn-sm shadow-lg" onClick="byid_spt(' . "'" . $rs->id_url . "','hapus'" . ')"><i class="fa-solid fa-trash px-1"></i> Hapus</a>
            	<a href="javascript:;" class="btn btn-warning btn-sm shadow-lg" onClick="byid_spt(' . "'" . $rs->id_url . "','dekrip'" . ')">  <i class="fa-solid fa-lock-open px-1"></i> Dekrip</a></center>';
			} else {
				$row[] = '<center><a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onClick="byid_spt(' . "'" . $rs->id_url . "','lihat'" . ')"><i class="fa-solid fa-search px-1"></i> Lihat</a><a href="javascript:;" class="btn btn-danger btn-sm shadow-lg" onClick="byid_spt(' . "'" . $rs->id_url . "','hapus'" . ')"><i class="fa-solid fa-trash px-1"></i> Hapus</a>
            	<a href="javascript:;" class="btn btn-success btn-sm shadow-lg" onClick="byid_spt(' . "'" . $rs->id_url . "','enkrip'" . ')">  <i class="fa-solid fa-lock px-1"></i> Enkrip</a></center>';
			}


			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_spt($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_spt($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function add_spt()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_spt = $this->M_datapenyedia->get_row_spt($id_vendor);
		$id_url = $this->input->post('id_url');

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$no_surat = $this->input->post('nomor_surat');
		$tahun_lapor = $this->input->post('tahun_lapor');
		$jenis_spt = $this->input->post('jenis_spt');
		$tgl_penyampaian = $this->input->post('tgl_penyampaian');
		$password_dokumen = '1234';
		$this->form_validation->set_rules('nomor_surat', 'No Surat ', 'required|trim', ['required' => 'No Surat  Wajib Diisi!']);
		$this->form_validation->set_rules('tahun_lapor', 'Tahun Lapor', 'required|trim', ['required' => 'Tahun Lapor Wajib Diisi!']);
		$this->form_validation->set_rules('jenis_spt', 'Jenis Spt', 'required|trim', ['required' => 'Jenis Spt  Wajib Diisi!']);
		$this->form_validation->set_rules('tgl_penyampaian', 'Jenis Penyampaian', 'required|trim', ['required' => 'Jenis Penyampaian  Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nomor_surat' => form_error('nomor_surat'),
					'tahun_lapor' => form_error('tahun_lapor'),
					'jenis_spt' => form_error('jenis_spt'),
					'tgl_penyampaian' => form_error('tgl_penyampaian'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			$date = date('Y');
			if (!is_dir('file_vms/' . $nama_usaha . '/SPT-' . $date)) {
				mkdir('file_vms/' . $nama_usaha . '/SPT-' . $date, 0777, TRUE);
			}
			$config['upload_path'] = './file_vms/' . $nama_usaha . '/SPT-' . $date;
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 0;
			$config['remove_spaces'] = TRUE;
			// $config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file_dokumen_spt')) {
				$fileData = $this->upload->data();
				$file_dokumen = $fileData['file_name'];
				$chiper = "AES-128-ECB";
				$secret = $token;
				$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);
				$upload = [
					'id_url' => $id,
					'id_vendor' => $id_vendor,
					'nomor_surat' => $no_surat,
					'tahun_lapor' => $tahun_lapor,
					'jenis_spt' => $jenis_spt,
					'tgl_penyampaian' => $tgl_penyampaian,
					'password_dokumen' => $password_dokumen,
					'file_dokumen' => $enckrips_string,
					'token_dokumen' => $secret,
					'sts_token_dokumen' => 1,
					'sts_validasi' => 0
				];
				$this->M_datapenyedia->tambah_spt($upload);
				$response = [
					'row_spt' => $this->M_datapenyedia->get_row_spt($id_vendor),
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				$upload = [
					'id_url' => $id,
					'id_vendor' => $id_vendor,
					'nomor_surat' => $no_surat,
					'tahun_lapor' => $tahun_lapor,
					'jenis_spt' => $jenis_spt,
					'tgl_penyampaian' => $tgl_penyampaian,
					'sts_validasi' => 0
				];
				$this->M_datapenyedia->tambah_spt($upload);

				$response = [
					'row_spt' => $this->M_datapenyedia->get_row_spt($id_vendor),
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
				// redirect(base_url('upload'));
			}
		}
	}


	function edit_spt()
	{
		$id_vendor = $this->session->userdata('id_vendor');
		$nama_usaha = $this->session->userdata('nama_usaha');
		$row_spt = $this->M_datapenyedia->get_row_spt($id_vendor);
		$id_url = $this->input->post('id_url');

		$id = $this->uuid->v4();
		$id = str_replace('-', '', $id);
		$token = $this->token->data_token();
		// post
		$no_surat = $this->input->post('nomor_surat');
		$tahun_lapor = $this->input->post('tahun_lapor');
		$jenis_spt = $this->input->post('jenis_spt');
		$tgl_penyampaian = $this->input->post('tgl_penyampaian');
		$password_dokumen = '1234';

		$this->form_validation->set_rules('nomor_surat', 'No Surat ', 'required|trim', ['required' => 'No Surat  Wajib Diisi!']);
		$this->form_validation->set_rules('tahun_lapor', 'Tahun Lapor', 'required|trim', ['required' => 'Tahun Lapor Wajib Diisi!']);
		$this->form_validation->set_rules('jenis_spt', 'Jenis Spt', 'required|trim', ['required' => 'Jenis Spt  Wajib Diisi!']);
		$this->form_validation->set_rules('tgl_penyampaian', 'Jenis Penyampaian', 'required|trim', ['required' => 'Jenis Penyampaian  Wajib Diisi!']);
		if ($this->form_validation->run() == false) {
			$response = [
				'error' => [
					'nomor_surat' => form_error('nomor_surat'),
					'tahun_lapor' => form_error('tahun_lapor'),
					'jenis_spt' => form_error('jenis_spt'),
					'tgl_penyampaian' => form_error('tgl_penyampaian'),
				],
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		} else {

			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			$date = date('Y');
			if (!is_dir('file_vms/' . $nama_usaha . '/SPT-' . $date)) {
				mkdir('file_vms/' . $nama_usaha . '/SPT-' . $date, 0777, TRUE);
			}

			$config['upload_path'] = './file_vms/' . $nama_usaha . '/SPT-' . $date;
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 0;
			$config['remove_spaces'] = TRUE;
			// $config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file_dokumen_spt')) {
				$fileData = $this->upload->data();
				$file_dokumen = $fileData['file_name'];
				$chiper = "AES-128-ECB";
				$secret = $token;
				$enckrips_string = openssl_encrypt($file_dokumen, $chiper, $secret);

				$upload = [
					'id_vendor' => $id_vendor,
					'nomor_surat' => $no_surat,
					'tahun_lapor' => $tahun_lapor,
					'jenis_spt' => $jenis_spt,
					'tgl_penyampaian' => $tgl_penyampaian,
					'password_dokumen' => $password_dokumen,
					'file_dokumen' => $enckrips_string,
					'token_dokumen' => $secret,
					'sts_token_dokumen' => 1,
					'sts_validasi' => 2
				];
				$where = [
					'id_url' => $id_url
				];

				// var_dump($upload, $where);
				// die;
				$this->M_datapenyedia->update_spt($upload, $where);

				$response = [
					'row_spt' => $this->M_datapenyedia->get_row_spt($id_vendor),
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			} else {
				$upload = [
					'id_vendor' => $id_vendor,
					'nomor_surat' => $no_surat,
					'tahun_lapor' => $tahun_lapor,
					'jenis_spt' => $jenis_spt,
					'tgl_penyampaian' => $tgl_penyampaian,
					'sts_validasi' => 2
				];
				$where = [
					'id_url' => $id_url
				];

				$this->M_datapenyedia->update_spt($upload, $where);

				$response = [
					'row_spt' => $this->M_datapenyedia->get_row_spt($id_vendor),
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
				// redirect(base_url('upload'));
			}
		}
	}

	function get_spt_by_id($id_url_vendor)
	{
		$row_spt = $this->M_datapenyedia->get_row_spt_url($id_url_vendor);
		$response = [
			'row_spt' => $row_spt
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function encryption_spt($id_url)
	{
		$id_url = $this->input->post('id_url_spt');
		$token_dokumen = $this->input->post('token_dokumen');
		// $secret_token = $this->input->post('secret_token');

		$type = $this->input->post('type');

		$get_row_enkrip = $this->M_datapenyedia->get_row_spt_url($id_url);
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
				$this->M_datapenyedia->update_spt($data, $where);
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
				$this->M_datapenyedia->update_spt($data, $where);
			} else {
				$response = [
					'maaf' => 'Maaf Anda Memerlukan Token Yang Valid',
				];
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function url_download_spt($id_url)
	{
		if ($id_url == '') {
			// tendang not found
		}
		$get_row_enkrip = $this->M_datapenyedia->get_row_spt_url($id_url);
		$id_vendor = $get_row_enkrip['id_vendor'];
		$row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$date = date('Y');
		// $nama_file = $get_row_enkrip['nomor_surat'];
		// $file_dokumen = $get_row_enkrip['file_dokumen'];
		return force_download('file_vms/' . $row_vendor['nama_usaha'] . '/SPT-' . $date . '/' . $get_row_enkrip['file_dokumen'], NULL);
	}
	public function hapus_row_spt($id_url)
	{
		$where = [
			'id_url' => $id_url
		];
		$this->M_datapenyedia->delete_spt($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	// END CRUD SPT

	// crud laporan keuangan

	function get_keuangan($id_vendor)
	{
		$result = $this->M_datapenyedia->gettable_keuangan($id_vendor);
		$data = [];
		$no = $_POST['start'];
		foreach ($result as $rs) {

			$row = array();
			$row[] = ++$no;
			$row[] = $rs->tahun_lapor;
			$row[] = $rs->jenis_audit;
			if ($rs->sts_token_dokumen == 1) {
				$row[] = '<center><span class="badge bg-danger text-white">Terenkripsi <i class="fa-solid fa-lock px-1"></i> </span></center>';
			} else {
				$row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_keuangan(\'' . $rs->id_url . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_laporan_auditor . '</a>';
			}
			if ($rs->sts_token_dokumen == 1) {
				$row[] = '<center><span class="badge bg-danger text-white">Terenkripsi <i class="fa-solid fa-lock px-1"></i></span></center>';
			} else {
				$row[] = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_keuangan(\'' . $rs->id_url . '\')" class="btn btn-sm btn-warning btn-block">' . $rs->file_laporan_keuangan . '</a>';
			}
			if ($rs->sts_validasi == 1) {
				$row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
			} else if ($rs->sts_validasi == 0) {
				$row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
			} else {
				$row[] = '<span class="badge bg-danger">Tidak Valid</span>';
			}

			if ($rs->sts_token_dokumen == 1) {
				$row[] = '<center><a href="javascript:;" class="btn btn-warning btn-sm shadow-lg" onClick="byid_keuangan(' . "'" . $rs->id_url . "','dekrip'" . ')">  <i class="fa-solid fa-lock-open px-1"></i> Dekrip</a> <a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onClick="byid_keuangan(' . "'" . $rs->id_url . "','edit'" . ')">  <i class="fa-solid fa-edit px-1"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm shadow-lg" onClick="byid_keuangan(' . "'" . $rs->id_url . "','hapus'" . ')">  <i class="fa-solid fa-trash px-1"></i> Hapus</a></center>';
			} else {
				$row[] = '<center>
            	<a href="javascript:;" class="btn btn-success btn-sm shadow-lg" onClick="byid_keuangan(' . "'" . $rs->id_url . "','enkrip'" . ')">  <i class="fa-solid fa-lock px-1"></i> Enkrip</a> <a href="javascript:;" class="btn btn-info btn-sm shadow-lg" onClick="byid_keuangan(' . "'" . $rs->id_url . "','edit'" . ')">  <i class="fa-solid fa-edit px-1"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm shadow-lg" onClick="byid_keuangan(' . "'" . $rs->id_url . "','hapus'" . ')">  <i class="fa-solid fa-trash px-1"></i> Hapus</a></center>';
			}
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_datapenyedia->count_all_keuangan($id_vendor),
			"recordsFiltered" => $this->M_datapenyedia->count_filtered_keuangan($id_vendor),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add_keuangan()
	{
		// id_vendor_keuangan
		$type_keuangan = $this->input->post('type_keuangan');
		if ($type_keuangan == 'tambah') {
			$id_vendor = $this->session->userdata('id_vendor');
			$nama_usaha = $this->session->userdata('nama_usaha');

			$tahun_lapor = $this->input->post('tahun_lapor');
			$jenis_audit = $this->input->post('jenis_audit');

			$id = $this->uuid->v4();
			$id = str_replace('-', '', $id);
			// seeting enkrip dokumen
			$chiper = "AES-128-ECB";
			$secret_token_dokumen1 = 'jmto.1' . $id;
			$secret_token_dokumen2 = 'jmto.2' . $id;
			$secret = $secret_token_dokumen1 . $secret_token_dokumen2;
			$password_dokumen = '1234';
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			$date = date('Y');
			if (!is_dir('file_vms/' . $nama_usaha . '/Laporan_Keuangan-' . $date)) {
				mkdir('file_vms/' . $nama_usaha . '/Laporan_Keuangan-' . $date, 0777, TRUE);
			}
			$config['upload_path'] = './file_vms/' . $nama_usaha . '/Laporan_Keuangan-' . $date;
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 0;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file_laporan_auditor')) {
				$file_laporan_auditor = $this->upload->data();
			}
			if ($this->upload->do_upload('file_laporan_keuangan')) {
				$file_laporan_keuangan = $this->upload->data();
			}
			$upload = [
				'id_vendor' => $id_vendor,
				'id_url' => $id,
				'tahun_lapor' => $tahun_lapor,
				'file_laporan_auditor' => openssl_encrypt($file_laporan_auditor['file_name'], $chiper, $secret_token_dokumen1),
				'file_laporan_keuangan' => openssl_encrypt($file_laporan_keuangan['file_name'], $chiper, $secret_token_dokumen2),
				'sts_token_dokumen' => 1,
				'password_dokumen' => $password_dokumen,
				'token_dokumen' => $secret,
				'sts_validasi' => 0,
				'jenis_audit' => $jenis_audit

			];
			$this->M_datapenyedia->tambah_keuangan($upload);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else {
			$id_vendor = $this->session->userdata('id_vendor');
			$nama_usaha = $this->session->userdata('nama_usaha');
			$tahun_lapor = $this->input->post('tahun_lapor');
			$jenis_audit = $this->input->post('jenis_audit');
			$id_vendor_keuangan =  $this->input->post('id_vendor_keuangan');
			$get_row_enkrip = $this->M_datapenyedia->get_row_keuangan_row_banget($id_vendor_keuangan);
			$id = $this->uuid->v4();
			$id = str_replace('-', '', $id);
			// seeting enkrip dokumen
			$chiper = "AES-128-ECB";
			
			$secret_token_dokumen1 = 'jmto.1'. $get_row_enkrip['id_url'];
			$secret_token_dokumen2 = 'jmto.2'. $get_row_enkrip['id_url'];
			$secret = $secret_token_dokumen1 . $secret_token_dokumen2;
			$password_dokumen = '1234';
			// SETTING PATH 
			$sts_upload = [
				'sts_upload_dokumen' => 1
			];
			$where = [
				'id_vendor' => $id_vendor
			];
			$this->M_datapenyedia->update_status_dokumen($sts_upload, $where);
			$date = date('Y');
			if (!is_dir('file_vms/' . $nama_usaha . '/Laporan_Keuangan-' . $date)) {
				mkdir('file_vms/' . $nama_usaha . '/Laporan_Keuangan-' . $date, 0777, TRUE);
			}
			$config['upload_path'] = './file_vms/' . $nama_usaha . '/Laporan_Keuangan-' . $date;
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 0;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file_laporan_auditor')) {
				$file_laporan_auditordata = $this->upload->data();
				$post_file_laporan_auditordata = openssl_encrypt($file_laporan_auditordata['file_name'], $chiper, $secret_token_dokumen1);
			} else {
				$file_laporan_auditordata = $get_row_enkrip['file_laporan_auditor'];
				$post_file_laporan_auditordata = $file_laporan_auditordata;
			}
			if ($this->upload->do_upload('file_laporan_keuangan')) {
				$file_laporan_keuangandata = $this->upload->data();
				$post_file_laporan_keuangan = openssl_encrypt($file_laporan_keuangandata['file_name'], $chiper, $secret_token_dokumen2);
			} else {
				$file_laporan_keuangandata = $get_row_enkrip['file_laporan_keuangan'];
				$post_file_laporan_keuangan = $file_laporan_keuangandata;
			}
			$where = [
				'id_vendor_keuangan' => $id_vendor_keuangan
			];
			$upload = [
				'tahun_lapor' => $tahun_lapor,
				'file_laporan_auditor' => $post_file_laporan_auditordata,
				'file_laporan_keuangan' => $post_file_laporan_keuangan,
				'sts_token_dokumen' => 1,
				'sts_validasi' => 2,
				'jenis_audit' => $jenis_audit
			];
			$this->M_datapenyedia->update_keuangan($upload, $where);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	function get_keuangan_by_id($id_url_vendor)
	{
		$row_keuangan = $this->M_datapenyedia->get_row_keuangan_url($id_url_vendor);
		$response = [
			'row_keuangan' => $row_keuangan
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function encryption_keuangan($id_url)
	{
		// $id_url = $this->input->post('id_url_keuangan');
		$token_dokumen = $this->input->post('token_dokumen');
		// $secret_token = $this->input->post('secret_token');

		$type = $this->input->post('type');

		$get_row_enkrip = $this->M_datapenyedia->get_row_keuangan_url($id_url);
		// $id_vendor = $get_row_enkrip['id_vendor'];
		// $row_vendor = $this->M_datapenyedia->get_row_vendor($id_vendor);
		$chiper = "AES-128-ECB";
		// $secret_token_dokumen = $get_row_enkrip['token_dokumen'];

		$chiper = "AES-128-ECB";
		$secret_token_dokumen1 = 'jmto.1' . $get_row_enkrip['id_url'];
		$secret_token_dokumen2 = 'jmto.2' . $get_row_enkrip['id_url'];
		$where = [
			'id_url' => $id_url
		];
		if ($type == 'dekrip') {
			$file_laporan_auditor = openssl_decrypt($get_row_enkrip['file_laporan_auditor'], $chiper, $secret_token_dokumen1);
			$file_laporan_keuangan = openssl_decrypt($get_row_enkrip['file_laporan_keuangan'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen' => 2,
				'file_laporan_auditor' => $file_laporan_auditor,
				'file_laporan_keuangan' => $file_laporan_keuangan,
			];
			$this->M_datapenyedia->update_keuangan($data, $where);
		} else {
			$file_laporan_auditor = openssl_encrypt($get_row_enkrip['file_laporan_auditor'], $chiper, $secret_token_dokumen1);
			$file_laporan_keuangan = openssl_encrypt($get_row_enkrip['file_laporan_keuangan'], $chiper, $secret_token_dokumen2);
			$data = [
				'sts_token_dokumen' => 1,
				'file_laporan_auditor' => $file_laporan_auditor,
				'file_laporan_keuangan' => $file_laporan_keuangan,
			];
			$this->M_datapenyedia->update_keuangan($data, $where);
		}

		$response = [
			'row_keuangan' => $this->M_datapenyedia->get_row_excel_pemilik_manajerial($get_row_enkrip['id_vendor_keuangan'])
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	
	public function hapus_row_keuangan($id_url)
	{
		$where = [
			'id_url' => $id_url
		];
		$this->M_datapenyedia->delete_keuangan($where);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
	// end crud laporan keuangan
}
