<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Cidevlop')) {
	class Cidevlop extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//$this->load->database();
			$this->load->model('User_Model');
			$this->load->library('form_validation');
		}

		public function index()
		{
			$records = $this->User_Model->getRecords();
			$data = array();
			$data['users'] = $records;
			$this->load->view('header/header');
			$this->load->view('home/home', $data);
			$this->load->view('footer/footer');
		}

		public
		function signup()
		{
			$userInput = array();
			$userInput['user_name'] = $this->input->post('user_name');
			$userInput['user_email'] = $this->input->post('user_email');
			$this->User_Model->saveRecords($userInput);
			return redirect('home');
		}
	}
}
