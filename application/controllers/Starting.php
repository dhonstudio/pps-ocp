<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Starting extends CI_Controller 
{

	public function users($key)
	{
		if ($key != 'b6yh78') {
			print_r('key invalid!');
		} else {

			$this->load->dbforge();

			$table = 'users';

			$fields = array(
			  'id_user' => array(
			    'type' => 'INT',
			    'auto_increment' => TRUE
			  ),
			  'username' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 50,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'password' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 200,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'fullName' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 50,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'id_posisi' => array(
			    'type' => 'INT',
			    'constraint' => 2,
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'id_kantor' => array(
			    'type' => 'INT',
			    'constraint' => 2,
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'id_seksi' => array(
			    'type' => 'INT',
			    'constraint' => 1,
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'is_active' => array(
			    'type' => 'INT',
			    'constraint' => 1,
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'stamp' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => null
			  )
			 );

			$this->dbforge->add_field($fields);

			$this->dbforge->add_key('id_user', TRUE);

			$this->dbforge->create_table($table, TRUE);

			print_r('table '. $table .' create!');
		}
	}

	public function kantor($key)
	{
		if ($key != 'b6yh78') {
			print_r('key invalid!');
		} else {

			$this->load->dbforge();

			$table = 'kantor';

			$fields = array(
			  'id_kantor' => array(
			    'type' => 'INT',
			    'auto_increment' => TRUE
			  ),
			  'kantor' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 100,
			    'null' => TRUE,
			    'default' => null
			  )
			 );

			$this->dbforge->add_field($fields);

			$this->dbforge->add_key('id_kantor', TRUE);

			$this->dbforge->create_table($table, TRUE);

			print_r('table '. $table .' create!');
		}
	}

	public function sumber($key)
	{
		if ($key != 'b6yh78') {
			print_r('key invalid!');
		} else {

			$this->load->dbforge();

			$table = 'sumber';

			$fields = array(
			  'id_sumber' => array(
			    'type' => 'INT',
			    'auto_increment' => TRUE
			  ),
			  'sumber' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 200,
			    'null' => TRUE,
			    'default' => null
			  )
			 );

			$this->dbforge->add_field($fields);

			$this->dbforge->add_key('id_sumber', TRUE);

			$this->dbforge->create_table($table, TRUE);

			print_r('table '. $table .' create!');
		}
	}

	public function posisi($key)
	{
		if ($key != 'b6yh78') {
			print_r('key invalid!');
		} else {

			$this->load->dbforge();

			$table = 'posisi';

			$fields = array(
			  'id_posisi' => array(
			    'type' => 'INT',
			    'unique' => TRUE,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'posisi' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 200,
			    'null' => TRUE,
			    'default' => null
			  )
			 );

			$this->dbforge->add_field($fields);

			$this->dbforge->create_table($table, TRUE);

			print_r('table '. $table .' create!');
		}
	}

	public function insert($table, $key)
	{
		if ($key != 'b6yh78') {
			print_r('key invalid!');
		} else {
			if ($table == 'kantor') {
				$query = "
					INSERT INTO `kantor` (`id_kantor`, `kantor`) VALUES
						(1, 'SEKRETARIAT DIREKTORAT JENDERAL'),
						(2, 'DIREKTORAT TEKNIS KEPABEANAN'),
						(3, 'DIREKTORAT FASILITAS KEPABEANAN'),
						(4, 'DIREKTORAT TEKNIS DAN FASILITAS CUKAI'),
						(5, 'DIREKTORAT KEPABEANAN INTERNASIONAL DAN ANTAR LEMBAGA'),
						(6, 'DIREKTORAT KEBERATAN BANDING DAN PERATURAN'),
						(7, 'DIREKTORAT INFORMASI KEPABEANAN DAN CUKAI'),
						(8, 'DIREKTORAT KEPATUHAN INTERNAL'),
						(9, 'DIREKTORAT AUDIT KEPABEANAN DAN CUKAI'),
						(10, 'DIREKTORAT PENINDAKAN DAN PENYIDIKAN'),
						(11, 'DIREKTORAT PENERIMAAN DAN PERENCANAAN STRATEGIS'),
						(12, 'KPUBC TIPE A TANJUNG PRIOK'),
						(13, 'KPUBC TIPE B BATAM'),
						(14, 'KPUBC TIPE C SOEKARNO-HATTA'),
						(15, 'KANWIL DJBC ACEH'),
						(16, 'KPPBC TMP C SABANG'),
						(17, 'KPPBC TMP C BANDA ACEH'),
						(18, 'KPPBC TMP C MEULABOH'),
						(19, 'KPPBC TMP C LHOKSEUMAWE'),
						(20, 'KPPBC TMP C KUALA LANGSA'),
						(21, 'KANWIL DJBC SUMATERA UTARA'),
						(22, 'KPPBC TMP BELAWAN'),
						(23, 'KPPBC TMP B MEDAN'),
						(24, 'KPPBC TMP C PEMATANGSIANTAR'),
						(25, 'KPPBC TMP C SIBOLGA'),
						(26, 'KPPBC TMP C TELUK NIBUNG'),
						(27, 'KPPBC TMP C KUALA TANJUNG'),
						(28, 'KPPBC TMP B KUALANAMU'),
						(29, 'KANWIL DJBC RIAU'),
						(30, 'KPPBC TMP B PEKANBARU'),
						(31, 'KPPBC TMP B DUMAI'),
						(32, 'KPPBC TMP C TEMBILAHAN'),
						(33, 'KPPBC TMP C BENGKALIS'),
						(34, 'KANWIL DJBC KHUSUS KEPULAUAN RIAU'),
						(35, 'KPPBC TMP B TANJUNG BALAI KARIMUN'),
						(36, 'KPPBC TMP B TANJUNGPINANG'),
						(37, 'KANWIL DJBC SUMATERA BAGIAN TIMUR'),
						(38, 'KPPBC TMP B PALEMBANG'),
						(39, 'KPPBC TMP B JAMBI'),
						(40, 'KPPBC TMP C PANGKALPINANG'),
						(41, 'KPPBC TMP C TANJUNGPANDAN'),
						(42, 'KANWIL DJBC SUMATERA BAGIAN BARAT'),
						(43, 'KPPBC TMP B TELUK BAYUR'),
						(44, 'KPPBC TMP C BENGKULU'),
						(45, 'KPPBC TMP B BANDAR LAMPUNG'),
						(46, 'KANWIL DJBC BANTEN'),
						(47, 'KPPBC TMP MERAK'),
						(48, 'KPPBC TMP A TANGERANG'),
						(49, 'KANWIL DJBC JAKARTA'),
						(50, 'KPPBC TMP A JAKARTA'),
						(51, 'KPPBC TMP A MARUNDA'),
						(52, 'KPPBC TMP C KANTOR POS PASAR BARU'),
						(53, 'KANWIL DJBC JAWA BARAT'),
						(54, 'KPPBC TMP A BEKASI'),
						(55, 'KPPBC TMP A BOGOR'),
						(56, 'KPPBC TMP A PURWAKARTA'),
						(57, 'KPPBC TMP A BANDUNG'),
						(58, 'KPPBC TMP C CIREBON'),
						(59, 'KPPBC TMP C TASIKMALAYA'),
						(60, 'KPPBC TMP CIKARANG'),
						(61, 'KANWIL DJBC JAWA TENGAH DAN DIY'),
						(62, 'KPPBC TMP TANJUNG EMAS'),
						(63, 'KPPBC TMC KUDUS'),
						(64, 'KPPBC TMP B SURAKARTA'),
						(65, 'KPPBC TMP C CILACAP'),
						(66, 'KPPBC TMP C PURWOKERTO'),
						(67, 'KPPBC TMP C TEGAL'),
						(68, 'KPPBC TMP A SEMARANG'),
						(69, 'KPPBC TMP B YOGYAKARTA'),
						(70, 'KPPBC TMP C MAGELANG'),
						(71, 'KANWIL DJBC JAWA TIMUR I'),
						(72, 'KPPBC TMP TANJUNG PERAK'),
						(73, 'KPPBC TMP A PASURUAN'),
						(74, 'KPPBC TMP JUANDA'),
						(75, 'KPPBC TMP  B GRESIK'),
						(76, 'KPPBC TMP C MADURA'),
						(77, 'KPPBC TMP C BOJONEGORO'),
						(78, 'KPPBC TMP B SIDOARJO'),
						(79, 'KANWIL DJBC JAWA TIMUR II'),
						(80, 'KPPBC TMC MALANG'),
						(81, 'KPPBC TMC KEDIRI'),
						(82, 'KPPBC TMP C BLITAR'),
						(83, 'KPPBC TMP C MADIUN'),
						(84, 'KPPBC TMP C JEMBER'),
						(85, 'KPPBC TMP C BANYUWANGI'),
						(86, 'KPPBC TMP C PROBOLINGGO'),
						(87, 'KANWIL DJBC BALI, NTB, DAN NTT'),
						(88, 'KPPBC TMP NGURAH RAI'),
						(89, 'KPPBC TMP A DENPASAR'),
						(90, 'KPPBC TMP C MATARAM'),
						(91, 'KPPBC TMP C SUMBAWA'),
						(92, 'KPPBC TMP C KUPANG'),
						(93, 'KPPBC TMP B ATAMBUA'),
						(94, 'KPPBC TMP C MAUMERE'),
						(95, 'KANWIL DJBC KALIMANTAN BAGIAN BARAT'),
						(96, 'KPPBC TMP B PONTIANAK'),
						(97, 'KPPBC TMP C ENTIKONG'),
						(98, 'KPPBC TMP C NANGA BADAU'),
						(99, 'KPPBC TMP C SINTETE'),
						(100, 'KPPBC TMP C KETAPANG'),
						(101, 'KPPBC TMP C JAGOI BABANG'),
						(102, 'KANWIL DJBC KALIMANTAN BAGIAN SELATAN'),
						(103, 'KPPBC TMP C SAMPIT'),
						(104, 'KPPBC TMP C PANGKALAN BUN'),
						(105, 'KPPBC TMP C PULANG PISAU'),
						(106, 'KPPBC TMP B BANJARMASIN'),
						(107, 'KPPBC TMP C KOTABARU'),
						(108, 'KANWIL DJBC KALIMANTAN BAGIAN TIMUR'),
						(109, 'KPPBC TMP B BALIKPAPAN'),
						(110, 'KPPBC TMP B SAMARINDA'),
						(111, 'KPPBC TMP C BONTANG'),
						(112, 'KPPBC TMP C SANGATTA'),
						(113, 'KPPBC TMP B TARAKAN'),
						(114, 'KPPBC TMP C NUNUKAN'),
						(115, 'KANWIL DJBC SULAWESI BAGIAN SELATAN'),
						(116, 'KPPBC TMP B MAKASSAR'),
						(117, 'KPPBC TMP C PAREPARE'),
						(118, 'KPPBC TMP C MALILI'),
						(119, 'KPPBC TMP C KENDARI'),
						(120, 'KANWIL DJBC SULAWESI BAGIAN UTARA'),
						(121, 'KPPBC TMP C PANTOLOAN'),
						(122, 'KPPBC TMP C MOROWALI'),
						(123, 'KPPBC TMP C LUWUK'),
						(124, 'KPPBC TMP C BITUNG'),
						(125, 'KPPBC TMP C MANADO'),
						(126, 'KPPBC TMP C GORONTALO'),
						(127, 'KANWIL DJBC MALUKU'),
						(128, 'KPPBC TMP C AMBON'),
						(129, 'KPPBC TMP C TUAL'),
						(130, 'KPPBC TMP C TERNATE'),
						(131, 'KANWIL DJBC KHUSUS PAPUA'),
						(132, 'KPPBC TMP C SORONG'),
						(133, 'KPPBC TMP C MANOKWARI'),
						(134, 'KPPBC TMP C BABO'),
						(135, 'KPPBC TMP C JAYAPURA'),
						(136, 'KPPBC TMP C AMAMAPARE'),
						(137, 'KPPBC TMP C BIAK'),
						(138, 'KPPBC TMP C MERAUKE')
				";
			} else if ($table == 'sumber') {
				$query = "
					INSERT INTO `sumber` (`id_sumber`, `sumber`) VALUES
						(1, 'hasil kegiatan kehumasan dan penyuluhan kepada pihak internal maupun eksternal DJBC'),
						(2, 'hasil monitoring dan evaluasi pelaksanaan tugas dan fungsi yang dilaksanakan DJBC'),
						(3, 'perlawanan dan tindakan hukum yang dihadapi DJBC'),
						(4, 'pengaduan masyarakat'),
						(5, 'hasil temuan atau policy recommendation aparat pengawas fungsional'),
						(6, 'hasil koordinasi dengan instansi lain'),
						(7, 'arahan pimpinan'),
						(99, 'sumber lainnya')
				";
			} else if ($table == 'posisi') {
				$query = "
					INSERT INTO `posisi` (`id_posisi`, `posisi`) VALUES
						(-5, 'Penolakan Kepala Subdirektorat PSMT'),
						(-6, 'Penolakan Kepala Seksi'),
						(-4, 'Penolakan Direktorat PPS'),
						(-2, 'Penolakan Kepala Kantor Pengusul'),
						(-1, 'Penolakan Kepala Seksi Pengusul'),
						(0, 'Pelaksana Pengusul'),
						(1, 'Kepala Seksi Pengusul'),
						(2, 'Kepala Kantor Pengusul'),
						(4, 'Direktorat PPS'),
						(5, 'Direktorat PPS'),
						(6, 'Direktorat PPS'),
						(7, 'Direktorat PPS'),
						(8, 'Draft PIAP'),
						(9, 'Draft PIAP'),
						(10, 'Draft PIAP'),
						(11, 'Draft PIAP')
				";
			} else if ($table == 'users') {
				$query = "
					INSERT INTO `users` (`username`, `fullName`, `id_posisi`, `id_kantor`, `id_seksi`, `is_active`) VALUES
						('196904091989121003', 'Direktur PPS', 4, 11, 0, 1),
						('197407111995031001', 'Kepala Subdirektorat PSMT', 5, 11, 0, 1),
						('197711242000011001', 'Kepala Seksi Kebijakan Organisasi', 6, 11, 1, 1),
						('197705091997031002', 'Kepala Seksi Manajemen Kepegawaian', 6, 11, 2, 1),
						('198003162001121001', 'Kepala Seksi PPB-MT', 6, 11, 3, 1),
						('198904052009121004', 'KRISTO RAHMAT SILABAN', 7, 11, 1, 1),
						('198508272004121004', 'MUHAMMAD ARAFIQ', 7, 11, 1, 1),
						('199610042018011002', 'PANDU SUWANDI', 7, 11, 1, 1),
						('199305142018012002', 'RENITA AYU PUTRI', 7, 11, 1, 1),
						('199704112015121002', 'RIYANDI AKBAR RASID', 7, 11, 1, 1),
						('198505092007011001', 'AMRI HIDAYAT', 7, 11, 2, 1),
						('199507192015121001', 'MAJU P. SITORUS', 7, 11, 2, 1),
						('199212032018011004', 'NIKOLAS SRI SEWANDONO', 7, 11, 2, 1),
						('199904112018012001', 'NUHA ROFIFAH', 7, 11, 2, 1),
						('199211062012101001', 'YOGA PUTRA PRATAMA', 7, 11, 2, 1),
						('199012012012101001', 'ALWI ERLANGGA PRAKOSO', 7, 11, 3, 1),
						('198711222007011003', 'BANU AZAM', 7, 11, 3, 1),
						('198507292004121001', 'GANDA PARDAMEAN PURBA', 7, 11, 3, 1),
						('199111152018011002', 'IBAN ARIA NUGRAHA', 7, 11, 3, 1),
						('199707232018121002', 'LEO WICAKSONO', 7, 11, 3, 1),
						('199803282018011002', 'MUHAMMAD ASYIFA MAULANA SHOLAHUDDIN', 7, 11, 3, 1),
						('199907292018122002', 'NIKE DEWI YULIANA', 7, 11, 3, 1),
						('198409052004121003', 'TAUFIQ RAHMAT', 7, 11, 3, 1),
						('198908112010121003', 'ZUMAN HERI RITONGA', 7, 11, 3, 1),
						('199103202013101002', 'MUHAMMAD RAMADHON', 0, 12, 0, 1),
						('199103202013101001', 'Kepala Seksi Pengusul', 1, 12, 0, 1),
						('199103202013101000', 'Kepala Kantor Pengusul', 2, 12, 0, 1)
				";
			}

			$this->db->query($query);

			print_r('data insert to '. $table .'!');
		}
	}

	public function data($key)
	{
		if ($key != 'b6yh78') {
			print_r('key invalid!');
		} else {

			$this->load->dbforge();

			$table = 'data';

			$fields = array(
			  'id_iks' => array(
			    'type' => 'INT',
			    'auto_increment' => TRUE
			  ),
			  'jenis' => array(
			    'type' => 'INT',
			    'constraint' => 1,
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'id_user' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'pokok' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 500,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'id_sumber' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'lainnya' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 200,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'id_kantor' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'latar' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'dasar' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 200,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'uraian' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'analisis' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'dampak' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'usulan' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'lampiran' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'id_posisi' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'stamp' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  )
			 );

			$this->dbforge->add_field($fields);

			$this->dbforge->add_key('id_iks', TRUE);

			$attributes = array('ENGINE' => 'MyISAM');
			$this->dbforge->create_table($table, FALSE, $attributes);

			print_r('table '. $table .' create!');
		}
	}

	public function log($key)
	{
		if ($key != 'b6yh78') {
			print_r('key invalid!');
		} else {

			$this->load->dbforge();

			$table = 'log';

			$fields = array(
			  'id_log' => array(
			    'type' => 'INT',
			    'auto_increment' => TRUE
			  ),
			  'is_active' => array(
			    'type' => 'INT',
			    'constraint' => 1,
			    'null' => TRUE,
			    'default' => 1
			  ),
			  'id_iks' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'from' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'to' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'alasan' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 500,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'stamp' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => null
			  ),
			 );

			$this->dbforge->add_field($fields);

			$this->dbforge->add_key('id_log', TRUE);

			$this->dbforge->create_table($table, TRUE);

			print_r('table '. $table .' create!');
		}
	}

	public function log_piap($key)
	{
		if ($key != 'b6yh78') {
			print_r('key invalid!');
		} else {

			$this->load->dbforge();

			$table = 'log_piap';

			$fields = array(
			  'id_log' => array(
			    'type' => 'INT',
			    'auto_increment' => TRUE
			  ),
			  'id_piap' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'from' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'to' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'alasan' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 500,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'stamp' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => null
			  ),
			 );

			$this->dbforge->add_field($fields);

			$this->dbforge->add_key('id_log', TRUE);

			$this->dbforge->create_table($table, TRUE);

			print_r('table '. $table .' create!');
		}
	}

	public function piap($key)
	{
		if ($key != 'b6yh78') {
			print_r('key invalid!');
		} else {

			$this->load->dbforge();

			$table = 'piap';

			$fields = array(
			  'id_piap' => array(
			    'type' => 'INT',
			    'auto_increment' => TRUE
			  ),
			  'id_iks' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'id_user' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'pokok' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 500,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'latar' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'dasar' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 200,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'obyek_isu' => array(
			    'type' => 'VARCHAR',
			    'constraint' => 20,
			    'null' => TRUE,
			    'default' => null
			  ),
			  'analisis' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'legal' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'filosofi' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'operasional' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'sosek' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'lainnya' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'kinerja' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'penerimaan' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'pelayanan' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'fasilitasi' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'pengawasan' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'kelembagaan' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'citra' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'usulan' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'unit' => array(
			    'type' => 'TEXT',
			    'null' => TRUE,
			    'default' => null
			  ),
			  'id_posisi' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  ),
			  'stamp' => array(
			    'type' => 'INT',
			    'null' => TRUE,
			    'default' => 0
			  )
			 );

			$this->dbforge->add_field($fields);

			$this->dbforge->add_key('id_piap', TRUE);

			$attributes = array('ENGINE' => 'MyISAM');
			$this->dbforge->create_table($table, FALSE, $attributes);

			print_r('table '. $table .' create!');
		}
	}
}