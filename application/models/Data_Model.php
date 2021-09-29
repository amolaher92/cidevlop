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
			/**
			 * @description  get CI library and helper functions
			 * @class load
			 * @methods library|helper
			 * @param form_validation|email|captcha
			 */
			$this->load->library('form_validation');
			$this->load->library('email');
			//	$this->load->helper('captcha');
			$this->load->helper('email');
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
			 * @methods query,result_array
			 * @param string $query
			 * @retrun array
			 */
			$query = $this->db->query("SELECT id,user_name,user_email FROM users");

			//get result in associative array form
			return $query->result_array();

			//echo 'Total result :' . $query->num_rows();
		}

		/**
		 * @description get single column from database
		 * @function getSingleResultObject
		 * @return true|false
		 */
		public function getSingleResultObject()
		{
			/**
			 * @description standard query with signle results in object
			 * @class db
			 * @methods query,row
			 * @param string $query
			 * @retrun object
			 */
			$query = $this->db->query("SELECT user_name FROM users LIMIT 1");
			return $query->row();
		}

		/**
		 * @description get single column from database
		 * @function getSingleResultArray
		 * @return true|false
		 */
		public function getSingleResultArray()
		{
			/**
			 * @description standard query with signle results in object
			 * @class db
			 * @methods query,row
			 * @param string $query
			 * @retrun object
			 */
			$query = $this->db->query("SELECT user_name FROM users LIMIT 1");
			return $query->row_array();
		}

		/**
		 * @description  Query Builder with multiple results
		 * @function getQuerytObject
		 * @return true|false
		 */
		public function getQuerytObject()
		{
			/**
			 * @description get data from database
			 * @class db
			 * @methods get
			 * @param string table_name
			 * @retrun array
			 */
			$query = $this->db->get("users");

			//get result in object form
			return $query->result();

			//echo 'Total result :' . $query->num_rows();
		}

		/**
		 * @description  Query Builder with multiple results
		 * @function getQuerytArray
		 * @return true|false
		 */
		public function getQuerytArray()
		{
			/**
			 * @description get data from database
			 * @class db
			 * @methods get
			 * @param string table_name
			 * @retrun array
			 */
			$query = $this->db->get("users");

			//get result in object form
			return $query->result_array();

			//echo 'Total result :' . $query->num_rows();
		}

		/**
		 * @description  Query Builder with insert multiple records
		 * @function setQuerytArray
		 * @return true|false
		 */
		public function setQuerytArray($application)
		{
			/**
			 * @description save data to the database
			 * @class db
			 * @methods insert
			 * @param array $application
			 * @return true|false
			 */
			return $this->db->insert('users', $application);
		}
	}

}
