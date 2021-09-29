<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Data_Model')) {

	class Data_Model extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
			/**
			 * @description initializes database
			 * @class load
			 * @methods database
			 */
			$this->load->database();
		}


		/**
		 * @description standard query with multiple results
		 * @function getResultObject
		 * @return true|false
		 */
		public function getResultObject()
		{
			/**
			 * @description get data from database
			 * @class db
			 * @methods query
			 * @param string $query
			 * @retrun array
			 */
			$query = $this->db->query("SELECT id,user_name,user_email FROM users");

			//get result in object form
			return $query->result();

			//echo 'Total result :' . $query->num_rows();
		}

		/**
		 * @description standard query with multiple results
		 * @function  getResultArray
		 * @return true|false
		 */
		public function getResultArray()
		{
			/**
			 * @description get data from database
			 * @class db
			 * @methods query
			 * @param string $query
			 * @retrun array
			 */
			$query = $this->db->query("SELECT id,user_name,user_email FROM users");

			//get result in associative array form
			return $query->result_array();

			//echo 'Total result :' . $query->num_rows();
		}
	}

}
