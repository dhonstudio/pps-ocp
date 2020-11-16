<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->sessi = $this->session->userdata('user');
		$this->user = $this->db->get_where('users', ['username' => $this->sessi])->row_array();
	}

	public function index()
	{
		if(!$this->user) redirect('auth');

		$data = _data('index');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('home/index');
		$this->load->view('templates/footer');
		$this->load->view('scripts/data');
		$this->load->view('scripts/input');
		$this->load->view('templates/footerend');
	}

	public function data()
	{
		if(!$this->user) redirect('auth');

		$data = _data('data');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('home/data');
		$this->load->view('templates/footer');
		$this->load->view('scripts/data');
		$this->load->view('scripts/input');
		$this->load->view('templates/footerend');
	}

	public function piap()
	{
		if(!$this->user) redirect('auth');

		$data = _data('piap');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('home/piap');
		$this->load->view('templates/footer');
		$this->load->view('scripts/data');
		$this->load->view('scripts/input');
		$this->load->view('templates/footerend');
	}

	public function input()
	{
		if(!$this->user) redirect('auth');

		$data = _data('input');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('home/input');
		$this->load->view('templates/footer');
		$this->load->view('scripts/data');
		$this->load->view('scripts/input');
		$this->load->view('templates/footerend');
	}

	public function detail($id)
	{
		$query = "
			SELECT `data`.*, `kantor`.`kantor`, `posisi`.`posisi`, `sumber`.`sumber`
			FROM `data` 
			JOIN `kantor` 
			ON `data`.`id_kantor` = `kantor`.`id_kantor`
			JOIN `sumber` 
			ON `data`.`id_sumber` = `sumber`.`id_sumber`
			JOIN `posisi` 
			ON `data`.`id_posisi` = `posisi`.`id_posisi`
			WHERE `id_iks` = $id
		";
		$iks = $this->db->query($query)->row_array();

		$data = [
			'id' => $id,
			'iks' => $iks
		];

		$this->load->view('home/detail', $data);
	}

	public function disposisi()
	{
		$id = $this->input->post('id_iks');
		$disposisi = $this->input->post('disposisi');

		$id_posisi = $this->user['id_posisi'];
		$posisi = $id_posisi+1;

		if ($id_posisi == 4) {
			$to = $this->db->get_where('users', ['id_posisi' => $posisi])->row_array()['id_user'];

			$this->db->insert('log', [
				'id_iks' => $id,
				'from' => $this->user['id_user'],
				'to' => $to,
				'alasan' => $this->input->post('catatan_disposisi'),
				'stamp' => time()
			]);
		} else {
			$to = $disposisi;

			foreach ($to as $t) {
				$this->db->insert('log', [
					'id_iks' => $id,
					'from' => $this->user['id_user'],
					'to' => $t,
					'alasan' => $this->input->post('catatan_disposisi'),
					'stamp' => time()
				]);
			}
		}

		$this->db->update('data', ['id_posisi' => $posisi], ['id_iks' => $id]);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil didisposisi</div>');
		redirect('home/data');
	}

	public function proses()
	{
		if(!$this->user) redirect('auth');

		$data = _data('input');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar');
		$this->load->view('home/proses');
		$this->load->view('templates/footer');
		$this->load->view('scripts/data');
		$this->load->view('scripts/input');
		$this->load->view('templates/footerend');
	}
}