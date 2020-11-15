<?php

function _data($page)
{
	$ci = get_instance();

	$id_user = $ci->user['id_user'];
	$query = "
		SELECT `log`.*, `data`.*, `kantor`.`kantor`, `posisi`.`posisi`
		FROM `log` 
		JOIN `data` 
		ON `log`.`id_iks` = `data`.`id_iks`
		JOIN `kantor` 
		ON `data`.`id_kantor` = `kantor`.`id_kantor`
		JOIN `posisi` 
		ON `data`.`id_posisi` = `posisi`.`id_posisi`
		WHERE `log`.`to` = $id_user
		ORDER BY FIELD(`data`.`id_posisi`,0,1,2,4,-1,-2,-4),
		`log`.`id_iks` DESC
	";
	return [
		'title' => "PPS - Online Critical Paper",
		'user' => $ci->user,
		'page' => $page,
		'total' => $ci->db->get('data')->num_rows(),
		'aju' => $ci->db->get_where('data', ['id_posisi >' => 3])->num_rows(),
		'datas' => $ci->db->query($query)->result_array(),
		'sumber' => $ci->db->get('sumber')->result_array(),
		'kantor' => $ci->db->get_where('kantor', ['id_kantor' => $ci->user['id_kantor']])->row_array()['kantor']
	];
}