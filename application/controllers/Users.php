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
			$this->load->model('Data_Model', 'Data_Model');
			$this->load->model('User_Model', 'User_Model');
			$this->load->library('session');
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
			 * @methods getResultObject, getSingleResultObject, getQuerytObject
			 * @return object $records,$single
			 */
			$records = $this->Data_Model->getResultObject();
			$single = $this->Data_Model->getSingleResultObject();
			$queryBuilder = $this->Data_Model->getQuerytObject();

			/**
			 * @description data store in associative array form
			 * @param $data to pass data to view
			 * @return array $records stored in associative array form
			 * @key users to fetch record from view
			 * @var array $data
			 */
			$data = array();
			$data['users'] = $records;
			$data['single'] = $single;
			$data['querybuilds'] = $queryBuilder;

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
			 * @methods getResultArray,getSingleResultArray
			 * @return array $records,$single
			 */
			$records = $this->Data_Model->getResultArray();
			$single = $this->Data_Model->getSingleResultArray();
			$queryBuilder = $this->Data_Model->getQuerytArray();

			/**
			 * @description data store in associative array form
			 * @param $data to pass data to view
			 * @return array $records stored in associative array form
			 * @key users to fetch record from view
			 * @var array $data
			 */
			$data = array();
			$data['users'] = $records;
			$data['single'] = $single;
			$data['querybuilds'] = $queryBuilder;

			//load view
			$this->load->view('header/header');
			$this->load->view('test/result_array', $data);
			$this->load->view('footer/footer');
		}

		public function userSignup()
		{
			/**
			 * @description check user input form method
			 * @class input
			 * @methods method
			 * @return true|false
			 */
			if ($this->input->method() === 'post') {
				/**
				 * @description set form validation rule
				 * @class form_validation
				 * @methods set_rules
				 * @param array field|label|rules
				 * @return true|false
				 */
				$this->form_validation->set_rules('user_name', "User Name", 'required');
				$this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email');

				//set error message if validation_array false
				$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

				//check if validation is true
				if ($this->form_validation->run() !== FALSE) {
					/**
					 * @description get user input array
					 * @var array $application
					 */
					$application = $this->input->post();
					/**
					 * @description save input data to database
					 * @class onlineServiceModel
					 * @methods saveApplication
					 * @param $application
					 * @return true|false
					 */
					if ($this->Data_Model->setQuerytArray($application) == TRUE) {
						/**
						 * @description if save data successfully message show in view
						 * @class session
						 * @methods set_flashdata
						 * @param array data|value
						 * @return string
						 */
						$Success = '<div 
										class="alert alert-success alert-dismissible" 
										role="alert">
										<strong>Successfully Login</strong>
										<button type="button" 
												class="close" 
												data-dismiss="alert" 
												aria-label="Close">
   									 	<span aria-hidden="true">&times;</span></button>
									</div> ';
						$this->session->set_flashdata('msg', $Success);

						/**
						 * @description redirect to application page
						 * @methods redirect
						 * @param url
						 * @return true|false
						 */
						return redirect('home/signup');
					} else {

						//failure
						$Danger = '<div class="alert alert-danger alert-dismissible" 
										role="alert" >
									<button type="button" 
												class="close" 
												data-dismiss="alert" 
												aria-label="Close">
   									 	<span aria-hidden="true">&times;</span></button>
									<strong>Failed!</strong> to submting to your application please try again.</div>  ';
						$this->session->set_flashdata('msg', $Danger);

						//redirect
						return redirect('home/signup');
					}
				}

			}
			//load view
			$this->load->view('header/header');
			$this->load->view('test/insert_data');
			$this->load->view('footer/footer');
		}

		public function userTest()
		{
			if ($this->input->method() === 'post') {
				$department = $this->input->post('did');
				$class = $this->input->post('cid');
				$service = $this->input->post('sid');

				$data = $this->input->post();

				if ($this->User_Model->setData($data) == TRUE) {
					return redirect('home/test');
				} else {
					echo 'Insertion Error';
					return redirect('home/test');
				}
			}

			$dept = $this->User_Model->getDepartment();
			$class = $this->User_Model->getClasses();
			$service = $this->User_Model->getServices();
			$results = $this->User_Model->getResults();
			$data = array();

			$data['departments'] = $dept;
			$data['classes'] = $class;
			$data['services'] = $service;
			$data['applications'] = $results;


			//load view
			$this->load->view('header/header');
			$this->load->view('test/test', $data);
			$this->load->view('footer/footer');
		}

		public function getStudents()
		{
			$result = $this->User_Model->getDepartment();
//			print_r($result);
//			exit();
			echo json_encode($result);
		}

		public function ajaxStduent()
		{
			$draw = intval($this->input->post("draw"));
			$start = intval($this->input->post("start"));
			$length = intval($this->input->post("length"));

			$data = array();

			$applications = $this->User_Model->getDepartment();

			foreach ($applications as $application) {
				$record = array();
				$record[] = $application['did'];
				$record[] = $application['dname'];
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

	trait test
	{
		public function test()
		{
			$draw = intval($this->input->post("draw"));
			$start = intval($this->input->post("start"));
			$length = intval($this->input->post("length"));

			$departmentId = $this->input->post('did');
			$classId = $this->input->post('cid');
			$serviceId = $this->input->post('sid');
			$fdata = $this->input->post('fd');
			$tdate = $this->input->post('td');

			$data = array();

			$recordsTotal = count($data);
			$recordsFiltered = count($data);

			$students = $this->User_Model->getAjaxCall($departmentId, $classId, $serviceId, $fdata, $tdate);

			foreach ($students as $student) {
				$applications = array();
				$applications[] = $student->dname;
				$applications[] = $student->cname;
				$applications[] = $student->stype;
				$applications[] = $student->sname;
				$applications[] = $student->semail;

				$data[] = $applications;

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
}
