<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Online')) {
	class Online extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Dept_Model', 'Dept');
			$this->load->model('Class_Model', 'Class');
			$this->load->model('Service_Model', 'Service');
			$this->load->model('Application_Model', 'Application');
		}

		public function index()
		{
			$department = $this->Dept->getAll();
			$class = $this->Class->getAll();
			$service = $this->Service->getAll();

			$data = array();

			$data['departments'] = $department;
			$data['classes'] = $class;
			$data['services'] = $service;

			$this->load->view('header/header');
			$this->load->view('home/online_service', $data);
			$this->load->view('footer/online_footer');
		}

		public function applicationsGet()
		{
			$draw = intval($this->input->post("draw"));
			$start = intval($this->input->post("start"));
			$length = intval($this->input->post("length"));

			$did = $this->input->post('did');
			$cid = $this->input->post('cid');
			$sid = $this->input->post('sid');
			$fromDate = $this->input->post('fDate');
			$toDate = $this->input->post('tDate');

			$data = array();
			$i = 1;

			$applications = $this->Application->getAllApplications($did, $cid, $sid, $fromDate, $toDate);

			foreach ($applications as $application) {
				$record = array();

				$record[] = $i++;
				$record[] = $application['dname'];
				$record[] = $application['cname'];
				$record[] = $application['stype'];
				$record[] = $application['sname'];
				$record[] = $application['semail'];
				$date = new DateTime($application['createdAt']);
				$record[] = $date->format('d-m-Y');

				$data[] = $record;
			}

			$output = array(
				"draw" => $draw,
				"recordsTotal" => count($data),
				"recordsFiltered" => count($data),
				"data" => $data
			);

			echo json_encode($output);

		}

	}
}
