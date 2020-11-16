<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Ajax extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->sessi = $this->session->userdata('user');
		$this->user = $this->db->get_where('users', ['username' => $this->sessi])->row_array();
	}

	public function ajax_page($page)
	{
		$data = _data($page);

		echo json_encode([
			'subbody' => 
				$this->load->view('home/'.$page, $data, true)
		]);
	}

	public function ajax_input()
	{
		$id_user = $this->user['id_user'];
		$jenis = $_POST['jenis'];
		$pokok = $_POST['pokok'];
		$sumber_isu = $_POST['sumber_isu'];
		$lainnya = $_POST['lainnya'];
		$kantor = $_POST['kantor'];
		$latar = $_POST['latar'];
		$dasar = $_POST['dasar'];
		$uraian = $_POST['uraian'];
		$analisis = $_POST['analisis'];
		$dampak = $_POST['dampak'];
		$usulan = $_POST['usulan'];
		$lampiran = $_POST['lampiran'];
		$id_posisi = $this->user['id_posisi'];

		$dataInsert = [
			'id_user' => $id_user,
			'jenis' => $jenis,
			'pokok' => $pokok,
			'id_sumber' => $sumber_isu,
			'lainnya' => $lainnya,
			'id_kantor' => $kantor,
			'latar' => $latar,
			'dasar' => $dasar,
			'uraian' => $uraian,
			'analisis' => $analisis,
			'dampak' => $dampak,
			'usulan' => $usulan,
			'lampiran' => $lampiran,
			'id_posisi' => $id_posisi,
			'stamp' => time(),
		];

		$this->db->insert('data', $dataInsert);

		$insert_id = $this->db->insert_id();

		$this->db->insert('log', [
			'id_iks' => $insert_id,
			'from' => $this->user['id_user'],
			'to' => $this->user['id_user'],
			'stamp' => time()
		]);

		$data = _data('data');

		echo json_encode([
			'alert' => '<div class="alert alert-fade alert-success" role="alert">Data berhasil disimpan</div>',
			'subbody' => $this->load->view('home/data', $data, true)
		]);
	}

	public function ajax_detail($id)
	{
		$id_user = $this->user['id_user'];
		$id_posisi = $this->db->get_where('data', ['id_iks' => $id])->row_array()['id_posisi'];

		if ($id_posisi < 0) {
			$posisi = '`data`.`id_posisi`';
		} else {
			$posisi = $id_user;
		}

		$query = "
			SELECT `data`.*, `kantor`.`kantor`, `posisi`.`posisi`, `sumber`.`sumber`, `log`.`alasan`
			FROM `data` 
			JOIN `kantor` 
			ON `data`.`id_kantor` = `kantor`.`id_kantor`
			JOIN `sumber` 
			ON `data`.`id_sumber` = `sumber`.`id_sumber`
			JOIN `posisi` 
			ON `data`.`id_posisi` = `posisi`.`id_posisi`
			JOIN `log` 
			ON `data`.`id_iks` = `log`.`id_iks`
			AND `log`.`to` = $posisi
			WHERE `data`.`id_iks` = $id
		";
		echo json_encode($this->db->query($query)->row_array());
	}

	public function ajax_ajukan()
	{
		$id = $_POST['id'];
		$catatan = $_POST['catatan'];

		$jenis_iks = $this->db->get_where('data', ['id_iks' => $id])->row_array()['jenis'];
		$id_posisi = $this->db->get_where('data', ['id_iks' => $id])->row_array()['id_posisi'];

		if ($jenis_iks == 1 && $id_posisi < 2) {
			$posisi = $id_posisi+1;
			$level_up = $this->db->get_where('users', ['id_kantor' => $this->user['id_kantor'], 'id_posisi' => $posisi])->row_array()['id_user'];
		} else {
			$posisi = 4;
			$level_up = $this->db->get_where('users', ['id_posisi' => $posisi])->row_array()['id_user'];
		}

		$this->db->update('data', ['id_posisi' => $posisi], ['id_iks' => $id]);
		//$this->db->update('bA56hU_data', ['id_posisi' => 0]);

		$this->db->insert('log', [
			'id_IKS' => $id,
			'from' => $this->user['id_user'],
			'to' => $level_up,
			'stamp' => time(),
			'alasan' => strtoupper($catatan)
		]);

		$data = _data('data');

		if ($id_posisi >= 4) $alert = '<div class="alert alert-fade alert-success" role="alert">IKS berhasil didisposisi</div>';
		else $alert = '<div class="alert alert-fade alert-success" role="alert">IKS berhasil diajukan</div>';

		echo json_encode([
			'alert' => $alert,
			'subbody' => $this->load->view('home/data', $data, true)
		]);
	}

	public function ajax_tolak()
	{
		$id = $_POST['id'];
		$alasan = $_POST['alasan'];

		$id_posisi = $this->db->get_where('data', ['id_iks' => $id])->row_array()['id_posisi'];

		$posisi = 0-$id_posisi;

		$this->db->update('data', ['id_posisi' => $posisi], ['id_iks' => $id]);

		$this->db->insert('log', [
			'id_IKS' => $id,
			'from' => $this->user['id_user'],
			'to' => $posisi,
			'stamp' => time(),
			'alasan' => strtoupper($alasan)
		]);

		$data = _data('data');

		echo json_encode([
			'alert' => '<div class="alert alert-fade alert-danger" role="alert">IKS berhasil ditolak</div>',
			'subbody' => $this->load->view('home/data', $data, true)
		]);
	}

	public function ajax_proses()
	{
		$id_user = $this->user['id_user'];
		$id_iks = $_POST['id_iks'];
		$pokok = $_POST['pokok'];
		$latar = $_POST['latar'];
		$dasar = $_POST['dasar'];
		$obyek_isu = $_POST['obyek_isu'];
		$analisis = $_POST['analisis'];
		$legal = $_POST['legal'];
		$filosofi = $_POST['filosofi'];
		$operasional = $_POST['operasional'];
		$sosek = $_POST['sosek'];
		$lainnya = $_POST['lainnya'];
		$kinerja = $_POST['kinerja'];
		$penerimaan = $_POST['penerimaan'];
		$pelayanan = $_POST['pelayanan'];
		$fasilitasi = $_POST['fasilitasi'];
		$pengawasan = $_POST['pengawasan'];
		$kelembagaan = $_POST['kelembagaan'];
		$citra = $_POST['citra'];
		$usulan = $_POST['usulan'];
		$unit = $_POST['unit'];
		$id_posisi = $this->user['id_posisi'];
		$posisi = $id_posisi+1;

		$dataInsert = [
			'id_user' => $id_user,
			'id_iks' => $id_iks,
			'pokok' => $pokok,
			'latar' => $latar,
			'dasar' => $dasar,
			'obyek_isu' => $obyek_isu,
			'analisis' => $analisis,
			'legal' => $legal,
			'filosofi' => $filosofi,
			'operasional' => $operasional,
			'sosek' => $sosek,
			'lainnya' => $lainnya,
			'kinerja' => $kinerja,
			'penerimaan' => $penerimaan,
			'pelayanan' => $pelayanan,
			'fasilitasi' => $fasilitasi,
			'pengawasan' => $pengawasan,
			'kelembagaan' => $kelembagaan,
			'citra' => $citra,
			'usulan' => $usulan,
			'unit' => $unit,
			'id_posisi' => $id_posisi,
			'stamp' => time(),
		];

		$this->db->insert('piap', $dataInsert);

		$insert_id = $this->db->insert_id();

		$this->db->update('data', ['id_posisi' => $posisi], ['id_iks' => $id_iks]);

		$this->db->insert('log_piap', [
			'id_piap' => $insert_id,
			'from' => $this->user['id_user'],
			'to' => $this->user['id_user'],
			'stamp' => time()
		]);

		$data = _data('piap');

		echo json_encode([
			'alert' => '<div class="alert alert-fade alert-success" role="alert">Data berhasil disimpan</div>',
			'subbody' => $this->load->view('home/piap', $data, true)
		]);
	}
}