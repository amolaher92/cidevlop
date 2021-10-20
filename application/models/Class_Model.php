<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Class_Model')) {

	final class Class_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getAll()
		{
			$query = $this->db->get('class');
			return $query->result_array();
		}
	}

}
