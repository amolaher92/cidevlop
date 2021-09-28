<?php
defined('BASEPATH') or exit('No direct script access allowed');

if(!class_exists('Users'))
{
	class Users extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Data_Model');
		}
		public function index()
		{
			$records = $this->Data_Model->getResultObject();
			$data = array();
			$data['users'] = $records;
			$this->load->view('header/header');
			$this->load->view('test/results_object',$data);
			$this->load->view('footer/footer');
		}
		public function arrayResult()
		{
			$records = $this->Data_Model->getResultArray();
			$data = array();
			$data['users'] = $records;
			$this->load->view('header/header');
			$this->load->view('test/result_array',$data);
			$this->load->view('footer/footer');
		}
	}
}
