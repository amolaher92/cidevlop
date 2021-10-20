<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Service_model')) {

	final class Service_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getAll()
		{
			$query = $this->db->get('service');
			return $query->result_array();
		}
	}

}
