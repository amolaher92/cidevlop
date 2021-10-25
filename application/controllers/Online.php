<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Online')) {
	class Online extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();

			$this->load->library('form_validation');
			$this->load->library('email');
			$this->load->helper('email');
			$this->load->helper('captcha');
			$this->load->helper('form');

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

		public function getAllData()
		{
			$draw = intval($this->input->post("draw"));
			$start = intval($this->input->post("start"));
			$length = intval($this->input->post("length"));

			$data = array();
			$i = 1;

			$applications = $this->Application->getAll();

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

		public function register()
		{
			if ($this->input->method() === 'post') {

				$this->form_validation->set_rules('firstName', 'firstName', 'required|alpha');
				$this->form_validation->set_rules('middleName', 'middleName', 'required|alpha');
				$this->form_validation->set_rules('lastName', 'lastName', 'required|alpha');
				$this->form_validation->set_rules('mobile', 'mobile', 'required|integer|exact_length[10]');
				$this->form_validation->set_rules('email', 'email', 'required|valid_email');

				$this->form_validation->set_message('required', '{field} must have.');
				$this->form_validation->set_message('alpha', '{field} must have characters.');
				$this->form_validation->set_message('integer', '{field} must have numbers.');
				$this->form_validation->set_message('valid_email', '{field} must have valid address.');

				//set error message if validation_array false
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

				//get captcha
				$inputCaptcha = $this->input->post('captcha');
				$sessCaptcha = $this->session->userdata('captchaCode');
				$isValidCaptcha = $inputCaptcha === $sessCaptcha;

				if ($this->form_validation->run() !== FALSE && $isValidCaptcha) {

					$userData = $this->input->post();
					unset($userData['captcha']);

					if ($this->Application->insertUser($userData) == TRUE) {

						$success = '<div class="alert alert-success alert-dismissible" role="alert">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Successfully</strong> submitted your application.
									</div>';
						$this->session->set_flashdata('msg', $success);

						return redirect('home/register');
					} else {
						$failure = '<div class="alert alert-danger alert-dismissible" role="alert">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Failed!</strong> to submting to your application please try again.
									</div> ';
						$this->session->set_flashdata('msg', $failure);

						return redirect('home/register');
					}
				}
				if (!$isValidCaptcha) {
					$message = '<div class="alert alert-danger alert-dismissible" role="alert">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Failed!</strong> Captcha does not match, please try again.
								</div> ';
					$this->session->set_flashdata('msg', $message);
				}

			}

			$captcha = createCaptcha();
			// Unset previous captcha and set new captcha word
			$this->session->unset_userdata('captchaCode');
			$this->session->set_userdata('captchaCode', $captcha['word']);

			$data['captchaImg'] = $captcha['image'];

			$this->load->view('header/header');
			$this->load->view('home/online_register', $data);
			$this->load->view('footer/footer');
		}

		public function onlineFeedback()
		{
			$data = array();
			$feedbackTypes = $this->feedbackModel->getFeedbackTypes($this->feedbackModel::FEEDBACK_CATEGORIES['general']);
			$data['feedbackTypes'] = $feedbackTypes;

			$captcha = createCaptcha();

			// Unset previous captcha and set new captcha word
			$this->session->unset_userdata('captchaCode');
			$this->session->set_userdata('captchaCode', $captcha['word']);

			// Pass captcha image to view
			$data['captchaImg'] = $captcha['image'];

			$this->load->view('header/header');
			$this->load->view('about/governance/online_feedback', $data);
			$this->load->view('footer/feedback_footer');
		}

		/**
		 * Captcha Referesh function
		 */
		public function refreshCaptcha()
		{
			$captcha = refreshCaptcha();
			echo $captcha['image'];
		}
		public function getAllUsers()
		{
			$draw = intval($this->input->post("draw"));
			$start = intval($this->input->post("start"));
			$length = intval($this->input->post("length"));

			$data = array();

			$applications = $this->Application->getAllUser();

			foreach ($applications as $application) {
				$record = array();

				$record[] = $application['id'];
				$record[] = $application['firstName'];
				$record[] = $application['middleName'];
				$record[] = $application['lastName'];
				$record[] = $application['mobile'];
				$record[] = $application['email'];
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

