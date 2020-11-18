<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Auth extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->user = $this->session->userdata('user');
	}

	public function index()
	{
		if($this->user) redirect('home');

		//$this->form_validation->set_rules('username', 'username', 'required|trim|is_natural|min_length[18]|max_length[18]');

		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|max_length[11]');
		
		if($this->form_validation->run() == false){
			$data = [
				'title' => "PPS - Online Critical Paper"
			];

			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/index');
			$this->load->view('templates/auth_footer');
			$this->load->view('templates/footerend');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$user = $this->db->get_where('users', ['username' => $this->input->post('username')])->row_array();

		/*
		if ($user) {
			if ($user['is_active'] == 1) {
				if(password_verify($this->input->post('password'), $user['password'])){
					$dataSession = [
						'user' => $user['username']
					];
					$this->session->set_userdata($dataSession);

					$this->session->set_flashdata('message','<div class="alert alert-fade alert-success" role="alert">Succesfully signed in</div>');
					redirect('home');
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Incorrect Username/Password</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">User on validation process</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Incorrect Username/Password</div>');
			redirect('auth');
		}
		*/

		if ($user) {
			if ($user['is_active'] == 1) {
				if(password_verify($this->input->post('password'), $user['password'])){
					$dataSession = [
						'user' => $user['username']
					];
					$this->session->set_userdata($dataSession);

					$this->session->set_flashdata('message','<div class="alert alert-fade alert-success" role="alert">Succesfully signed in</div>');
					redirect('home');
				} else {
					$this->session->set_flashdata('message','<div class="text-danger" style="font-size:80%">Incorrect Username/Password</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message','<div class="text-danger" style="font-size:80%">User on validation process</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message','<div class="text-danger" style="font-size:80%">Incorrect Username/Password</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		if($this->user) redirect('home');

		$this->form_validation->set_rules('username', 'NIP', 'required|trim|is_natural|min_length[18]|max_length[18]');

		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|max_length[11]');

		$this->form_validation->set_rules('password2', 'repeat password', 'required|trim|matches[password]');
		
		if($this->form_validation->run() == false){
			$data = [
				'title' => "PPS - Online Critical Paper"
			];

			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
			$this->load->view('templates/footerend');
		} else {
			$this->_register();
		}
	}

	private function _register()
	{
		$username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		$av_user = $this->db->get_where('users', ['username' => $username])->row_array();

		/*
		if ($av_user) {
			if ($av_user['password'] === null) {
				$this->db->update('users', ['password' => $password, 'stamp' => time()], ['username' => $username]);

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Succesfully registered, please sign in</div>');
				redirect('auth');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">NIP sudah pernah didaftarkan</div>');
				redirect('auth/register');
			}
			*/
		if ($av_user) {
			if ($av_user['password'] === null) {
				$this->db->update('users', ['password' => $password, 'stamp' => time()], ['username' => $username]);

				$this->session->set_flashdata('message','<div class="text-success" style="font-size:80%">Succesfully registered, please sign in</div>');
				redirect('auth');
			} else {
				$this->session->set_flashdata('message','<div class="text-danger" style="font-size:80%">NIP sudah pernah didaftarkan</div>');
				redirect('auth/register');
			}
		} else {
			$dataInsert = [
				'username' => $username,
				'password' => $password,
				'stamp' => time()
			];

			$this->db->insert('users', $dataInsert);

			//$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Succesfully registered, please wait for our validation</div>');
			$this->session->set_flashdata('message','<div class="text-success" style="font-size:80%">Succesfully registered, please wait for our validation</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');

		//$this->session->set_flashdata('message','<div class="alert alert-success alert-fade" role="alert">Session Ended</div>');
		$this->session->set_flashdata('message','<div class="text-success" style="font-size:80%">Session Ended</div>');
		redirect('auth');
	}
}