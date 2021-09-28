<?php
defined('BASEPATH') or exit('No direct script access allowed');

if(!class_exists('Users'))
{
	final class Users extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Data_Model');
		}
		public function index()
		{
			/**
			 * @description get data in object form
			 * @var array $data
			 * @param object $records
			 * @return object $users use to view
			 */
			$records = $this->Data_Model->getResultObject();
			$data = array();
			//data store in associative array
			$data['users'] = $records;
			$this->load->view('header/header');
			$this->load->view('test/results_object',$data);
			$this->load->view('footer/footer');
		}
		public function arrayResult()
		{
			/**
			 * @description get data in array form
			 * @var array $data
			 * @param array $records
			 * @return array $users use to view
			 */
			$records = $this->Data_Model->getResultArray();
			$data = array();
			$data['users'] = $records;
			$this->load->view('header/header');
			$this->load->view('test/result_array',$data);
			$this->load->view('footer/footer');
		}
	}
}
