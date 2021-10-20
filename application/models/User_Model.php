<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('User_Model')) {
	class User_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function saveRecords($records)
		{
			$this->db->insert('users', $records);
			return true;
		}

		public function getDepartment()
		{
			$query = $this->db->get('department');
			return $query->result_array();
		}

		public function getClasses()
		{
			$query = $this->db->get('class');
			return $query->result();
		}

		public function getServices()
		{
			$query = $this->db->get('service');
			return $query->result();
		}

		public function setData($data)
		{
			return $this->db->insert('application', $data);
		}

		public function getResults()
		{
			$this->db->select('*');
			$this->db->from('application')
				->join('department', 'department.did = application.did')
				->join('class', 'class.cid = application.cid')
				->join('service', 'service.sid = application.sid')
				->order_by('application.aid', 'DESC');

			return $this->db->get()->result();
			echo $this->db->last_query();

		}

		public function getAjaxCall($departmentId,$classId,$serviceId,$fdata,$tdate)
		{
			$filter = array('createdAt >=' => $fdata, 'createdAt <=' => $tdate);
			$this->db->select('*');
			$this->db->from('application')
				->order_by('application.aid', 'DESC')
				->join('department', 'department.did = application.did', 'INNER')
				->where('department.did', $departmentId)
				->join('class', 'class.cid = application.cid', 'INNER')
				->where('class.cid', $classId)
				->join('service', 'service.sid = application.sid', 'INNER')
				->where('service.sid', $serviceId)
				->where($filter);
			return $this->db->get()->result();
		}

		public function getServiceRequest()
		{
			$this->db->select('*');
			$this->db->from('online_service_applications')
				->join('department', 'department.deptId = online_service_applications.deptId')
				->join('classes', 'classes.cid = online_service_applications.classId')
				->join('online_service_types', 'online_service_types.sid = online_service_applications.serviceId')
				->order_by('online_service_applications.id', 'DESC');

			return $this->db->get()->result();
			echo $this->db->last_query();

		}

		public function getFilterData($deptId, $serviceId, $classId, $fromDate, $toDate)
		{
			$filter = array('createdAt >=' => $fromDate, 'createdAt <=' => $toDate);
			$this->db->select('*');
			$this->db->from('online_service_applications')
				->order_by('online_service_applications.id', 'DESC')
				->join('department', 'department.deptId = online_service_applications.deptId', 'INNER')
				->where('department.deptId', $deptId)
				->join('classes', 'classes.cid = online_service_applications.classId', 'INNER')
				->where('classes.cid', $classId)
				->join('online_service_types', 'online_service_types.sid = online_service_applications.serviceId', 'INNER')
				->where('online_service_types.sid', $serviceId)
				->where($filter);
			return $this->db->get()->result_array();
		}
	}
}
