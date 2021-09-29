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
			if ($this->input->method === 'post') {
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
						$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Successfully</strong> submitted your application.
				</div>  ');

						/**
						 * @description redirect to application page
						 * @methods redirect
						 * @param url
						 * @return true|false
						 */
						return redirect('home/signup');
					} else {

						//failure
						$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Failed!</strong> to submting to your application please try again.
				</div>  ');

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
	}
}
