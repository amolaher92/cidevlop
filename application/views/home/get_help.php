<?php
/**
 * Controller
 * $records = $this->User_Model->getRecords();
 * 			$data = array();
 * 			$data['users'] = $records;
 * pass $data as parameter to view
 */

/**
 * Model
 * return $users = $this->db->get('users')->result();
 */
//view
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
//view
foreach($users as $record): ?>
	<tr>
		<td scope="row"><?= $record['id'] ?></td>
		<td><?= $record['user_name']?></td>
		<td><?= $record['user_email']?></td>
	</tr>
<?php endforeach; ?><?php
