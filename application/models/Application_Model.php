<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Application_Model')) {

	final class Application_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getAll()
		{
			$query = $this->db->get('application');
			return $query->result_array();
		}

		public function getAllApplications($did, $cid, $sid, $fDate, $tDate)
		{
			$con = array('department.did' => $did, 'class.cid' => $cid, 'service.sid' => $sid);
			$query = $this->db->select('application.*,department.dname,class.cname,service.stype')
				->join('department', 'application.did = department.did')
				->join('class', 'application.cid = class.cid')
				->join('service', 'application.sid = service.sid')
				->where($con);
			if (!empty($fData) && !empty($tData)) {
				$query = $query->where('createdAt >=', $fDate)
					->where('createdAt<=', $tDate);
			}
			$query = $query->get('application');
			return $query->result_array();
		}
	}

}
