<?php
/**
 * Controller
 * $records = $this->User_Model->getRecords();
 * 			$data = array();
 * 			$data['users'] = $records;
 */

/**
 * Model
 * return $users = $this->db->get('users')->result();
 */
foreach($users as $record): ?>
	<tr>
		<td scope="row"><?= $record->id ?></td>
		<td><?= $record->user_name?></td>
		<td><?= $record->user_email?></td>
	</tr>
<?php endforeach;

/**
 * Model
 * return $users = $this->db->get('users')->result_array();
 */
foreach($users as $record): ?>
	<tr>
		<td scope="row"><?= $record['id'] ?></td>
		<td><?= $record['user_name']?></td>
		<td><?= $record['user_email']?></td>
	</tr>
<?php endforeach; ?><?php
