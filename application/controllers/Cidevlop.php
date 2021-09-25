<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Cidevlop')) {
	class Cidevlop extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->load->view('header/header');
			$this->load->view('home/home');
			$this->load->view('footer/footer');
		}
	}
}
