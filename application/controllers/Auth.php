<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('Auth_model');
		$this->load->library(array('form_validation', 'recaptcha'));
	}

	public function index()
	{
		$this->form_validation->set_rules('userName', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				if ($this->form_validation->run() == false) {
					$this->session->set_flashdata('salah', 'Username Atau Password Salah');
					redirect('auth');
				} else {
					$username = $this->input->post('userName');
					$password = $this->input->post('password');
					$this->login_vendor->login($username, $password);
				}
			}
		}
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		$this->load->view('auth/index', $data);
	}

	function lupa_password()
	{
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		$this->load->view('auth/lupa_password', $data);
	}

	public function kirim_lupa_password()
	{
		$this->form_validation->set_rules('userName', 'Usernmae', 'trim|required', ['required' => 'NPWP Atau Email Wajib Diisi!']);
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				if ($this->form_validation->run() == false) {
					$data = [
						'userName' => form_error('userName'),
					];
					$data['widget'] = $this->recaptcha->getWidget();
					$data['script'] = $this->recaptcha->getScriptTag();
					$this->session->set_flashdata('email_salah', 'Email Atau Npwp Wajib Di Isi');
					redirect('auth/lupa_password');
				} else {
					$data['widget'] = $this->recaptcha->getWidget();
					$data['script'] = $this->recaptcha->getScriptTag();
					$userName = $this->input->post('userName');
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < 10; $i++) {
						$randomString .= $characters[random_int(0, $charactersLength - 1)];
					}
					$randomString;
					$this->session->set_userdata('token_lupa_password', $randomString);
					$this->session->set_userdata('userName', $userName);
					$row_user = $this->Auth_model->login($userName);
					$email = $row_user->email;
					// START EMAIL SEND TYPE
					$type_send_email = 'lupa_password';
					$data_send_email = [
						'email' => $email,
						'token_lupa_password' => $randomString
					];
					// $this->whatsapp->send_wa_one_to_one();
					$this->email_send->sen_row_email($type_send_email, $data_send_email);
					$this->session->set_flashdata('success', 'Ganti Password Berhasil Silakan Check Email Anda Untuk Mengetahui Link Ubah Password');
					redirect('auth/lupa_password');
					// END EMAIL SEND TYPE
				}
			}
		}
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		redirect('auth/lupa_password');
	}


	function buat_password($session_ubah_password = null)
	{
		$data['token_lupa_password'] = $session_ubah_password;
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password2]', ['required' => 'Password Wajib Diisi!', 'matches' => 'Password Tidak Sama']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', ['required' => 'Password Verifikasi harus diisi!', 'matches' => 'Password Tidak Sama']);
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
				if ($this->form_validation->run() == false) {
					$this->session->set_flashdata('error', 'Password Tidak Sama');
					redirect(base_url('auth/buat_password/'. $this->session->userdata('token_lupa_password')));
				} else {
					$username = $this->session->userdata('userName');
					$password = $this->input->post('password');
					$data = [
						'password' => password_hash($password, PASSWORD_DEFAULT),
					];
					$this->Auth_model->update_password($data, $username);
					$this->session->set_flashdata('success', 'Anda Berhasil Ubah Password Silakan Login Kembali');
					redirect(base_url('auth/buat_password/'. $this->session->userdata('token_lupa_password')));
					$this->session->sess_destroy();
				}
			}
		}
		$data['widget'] = $this->recaptcha->getWidget();
		$data['script'] = $this->recaptcha->getScriptTag();
		$this->load->view('auth/ubah_password',$data);
	}


	public function logout()
	{
		$this->login_vendor->logout();
	}
}
