<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_datapenyedia/M_datapenyedia');
		$this->load->model('M_jenis_usaha/M_jenis_usaha');
		$this->load->model('Wilayah/Wilayah_model');
		$this->load->library(array('form_validation', 'recaptcha'));
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_vendor.email]', ['required' => 'Email Wajib Diisi!', 'valid_email' => 'Email Tidak Valid',  'is_unique' => 'Email Sudah Terdaftar']);
		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required|is_unique[tbl_vendor.npwp]', ['required' => 'NPWP Wajib Diisi!', 'is_unique' => 'NPWP Sudah Terdaftar']);
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				if ($this->form_validation->run() == false) {
					$data = [
						'email' => form_error('email'),
					];
					$data['widget'] = $this->recaptcha->getWidget();
					$data['script'] = $this->recaptcha->getScriptTag();
					$this->session->set_flashdata('email_salah', 'Email Atau Npwp Salah');
					redirect('registrasi');
				} else {
					$data['widget'] = $this->recaptcha->getWidget();
					$data['script'] = $this->recaptcha->getScriptTag();
					$email = $this->input->post('email');
					$npwp = $this->input->post('npwp');
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < 10; $i++) {
						$randomString .= $characters[random_int(0, $charactersLength - 1)];
					}
					$randomString;
					$this->session->set_userdata('token_regis', $randomString);
					$this->session->set_userdata('email', $email);
					$this->session->set_userdata('npwp', $npwp);
					$this->session->set_flashdata('success', 'Email : ' . $email . ' Terdaftar Silakan Check Email Anda Untuk Mengetahui Link Untuk Mengisi Identitas Vendor Dan Pastikan Masih 1 Perangkat (Terkadang Email Masuk Ke Spam!!)');
					// START EMAIL SEND TYPE
					$type_send_email = 'registrasi';
					$data_send_email = [
						'email' => $email,
						'token_regis' => $randomString
					];
					$this->email_send->sen_row_email($type_send_email, $data_send_email);
					redirect('registrasi');
					// END EMAIL SEND TYPE
				}
			}
		}
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		$this->load->view('template/header_registrasi');
		$this->load->view('template/sidebar_registrasi');
		$this->load->view('datapenyedia/registrasi/index', $data);
		$this->load->view('template/footer');
		$this->load->view('js_file_out_session/index');
	}

	public function dataKabupaten($id_provinsi) //klpd
	{
		$data = $this->M_datapenyedia->getKabupaten($id_provinsi);
		echo '<option value="">--Kabupaten--</option>';
		foreach ($data as $key => $value) {
			echo '<option value="' . $value['id_kabupaten'] . '">' . $value['nama_kabupaten'] . '</option>';
		}
	}

	public function dataKecamatan($id_kabupaten)
	{
		$data = $this->M_datapenyedia->getKecamatan($id_kabupaten);
		echo '<option value="">--Kecamatan--</option>';
		foreach ($data as $key => $value) {
			echo '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>';
		}
	}

	public function identitas($session_data = null)
	{
		$data['token_regis'] = $session_data;
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		$data['get_jenis_usaha']  = $this->M_jenis_usaha->get_result_jenis_usaha();
		$data['provinsi']  = $this->Wilayah_model->getProvinsi();
		$this->load->view('template/header_registrasi');
		$this->load->view('template/sidebar_registrasi');
		$this->load->view('datapenyedia/registrasi/identitas', $data);
		$this->load->view('template/footer');
		$this->load->view('js_file_out_session/index');
	}

	public function add_identitas()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				if ($this->form_validation->run() == false) {
					$data = [
						'password2' => form_error('password2'),
					];
					$this->session->set_flashdata('password2', $data['password']);
					$token = $this->session->userdata('token_regis');
					redirect(base_url('registrasi/identitas', $token));
				} else {
					$nama_usaha = $this->input->post('nama_usaha');
					if (!is_dir('file_vms/' . $nama_usaha)) {
						mkdir('./file_vms/' . $nama_usaha, 0777, TRUE);
					}
					$bentuk_usaha = $this->input->post('bentuk_usaha');
					$kualifikasi_usaha = $this->input->post('kualifikasi_usaha');
					$npwp = $this->input->post('npwp');
					$email = $this->input->post('email');
					$alamat = $this->input->post('alamat');
					$id_provinsi = $this->input->post('id_provinsi');
					$id_kabupaten = $this->input->post('id_kabupaten');
					$id_kecamatan = $this->input->post('id_kecamatan');
					$kelurahan = $this->input->post('kelurahan');
					$kode_pos = $this->input->post('kode_pos');
					$no_telpon = $this->input->post('no_telpon');
					$sts_kantor_cabang = $this->input->post('sts_kantor_cabang');
					$alamat_kantor_cabang = $this->input->post('alamat_kantor_cabang');
					$password = $this->input->post('password');
					$id = $this->uuid->v4();
					$id = str_replace('-', '', $id);
					$jenis_usaha = $this->input->post('jenis_usaha[]');
					$data_vendor = [
						'id_url_vendor' => $id,
						'username' => $nama_usaha,
						'nama_usaha' => $nama_usaha,
						'bentuk_usaha' => $bentuk_usaha,
						'kualifikasi_usaha' => $kualifikasi_usaha,
						'npwp' => $npwp,
						'email' => $email,
						'alamat' => $alamat,
						'id_provinsi' => $id_provinsi,
						'id_kabupaten' => $id_kabupaten,
						'id_kecamatan' => $id_kecamatan,
						'kelurahan' => $kelurahan,
						'kode_pos' => $kode_pos,
						'no_telpon' => $no_telpon,
						'sts_kantor_cabang' => $sts_kantor_cabang,
						'alamat_kantor_cabang' => $alamat_kantor_cabang,
						'password' =>  password_hash($password, PASSWORD_DEFAULT),
						'id_jenis_usaha' => implode("", $jenis_usaha)

					];
					$this->M_datapenyedia->insert_vendor($data_vendor);
					// insert ke trx jenis usaha

					$this->session->set_flashdata('success', 'Registrasi Berhasil');
					$data['token_regis'] = $this->session->userdata('token_regis');
					$data['widget'] = $this->recaptcha->getWidget();
					$data['script'] = $this->recaptcha->getScriptTag();
					$data['get_jenis_usaha']  = $this->M_jenis_usaha->get_result_jenis_usaha();
					$data['provinsi']  = $this->Wilayah_model->getProvinsi();
					$data['token_regis'] = $this->session->userdata('token_regis');
					$this->load->view('template/header_registrasi');
					$this->load->view('template/sidebar_registrasi');
					$this->load->view('datapenyedia/registrasi/identitas', $data);
					$this->load->view('template/footer');
					$this->load->view('datapenyedia/registrasi/redirect_identitas');
					$this->session->sess_destroy();
				}
			}
		} else {
			redirect('registrasi/identitas');
		}
	}
}
