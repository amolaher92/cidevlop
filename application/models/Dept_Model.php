<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Dept_Model')) {

	final class Dept_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getAll()
		{
			$query = $this->db->get('department');
			return $query->result_array();
		}
	}

}
