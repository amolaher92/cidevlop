<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('User_Model')) {
	class User_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function saveRecords($records)
		{
			$this->db->insert('users', $records);
			return true;
		}

		public function getRecords()
		{
			return $users = $this->db->get('users')->result();
			/*$result = $query->result();
			foreach ($result as $row) {
				echo $row->id;
				echo $row->user_name;
				echo $row->user_email;
			}*/
		}

	}
}
