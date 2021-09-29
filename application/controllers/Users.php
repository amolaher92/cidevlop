<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @descriptor check class exists or not
 * @return boolean true if class
 */
if (!class_exists('Users')) {
	//create class
	class Users extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			/**
			 * @description load mode class
			 * @class load
			 * @methods model
			 * @param string model name
			 * @return boolean true if model
			 */
			$this->load->model('Data_Model');
		}

		/**
		 * @description function to return view
		 * @function index
		 * @return boolean true if function returns
		 */
		public function index()
		{
			/**
			 * @description get data in object form
			 * @class Data_Model
			 * @methods getResultObject
			 * @return array $records
			 */
			$records = $this->Data_Model->getResultObject();

			/**
			 * @description data store in associative array form
			 * @param $data to pass data to view
			 * @return array $records stored in associative array form
			 * @key users to fetch record from view
			 * @var array $data
			 */
			$data = array();
			$data['users'] = $records;

			//load view
			$this->load->view('header/header');
			$this->load->view('test/results_object', $data);
			$this->load->view('footer/footer');
		}

		public function arrayResult()
		{
			/**
			 * @description get data in array form
			 * @class Data_Model
			 * @methods getResultArray
			 * @return array $records
			 */
			$records = $this->Data_Model->getResultArray();

			/**
			 * @description data store in associative array form
			 * @param $data to pass data to view
			 * @return array $records stored in associative array form
			 * @key users to fetch record from view
			 * @var array $data
			 */
			$data = array();
			$data['users'] = $records;

			//load view
			$this->load->view('header/header');
			$this->load->view('test/result_array', $data);
			$this->load->view('footer/footer');
		}
	}
}
