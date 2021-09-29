<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('User_Model')) {
	class User_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function saveRecords($records)
		{
			$this->db->insert('users', $records);
			return true;
		}

	}
}
