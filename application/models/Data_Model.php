<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Data_Model')) {

	class Data_Model extends CI_Model
	{
		public $test;

		public function __construct()
		{
			parent::__construct();
			/**
			 * initializes  database class
			 */
			$this->load->database();
		}


		/**
		 * @description standard query with multiple results
		 * @result Object
		 */
		public function getResultObject()
		{
			$query = $this->db->query("SELECT id,user_name,user_email FROM users");
			return $query->result();

			//echo 'Total result :' . $query->num_rows();
		}

		/**
		 * @description standard query with multiple results
		 * @result Array
		 */
		public function getResultArray()
		{
			$query = $this->db->query("SELECT id,user_name,user_email FROM users");
			return $query->result_array();

			//echo 'Total result :' . $query->num_rows();
		}
	}

}
