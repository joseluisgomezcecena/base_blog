<?php

class UserModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function register($encrypted_pwd)
	{
		$data = array(
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'username'=>$this->input->post('username'),
			'phone'=>$this->input->post('phone'),
			'password'=>$encrypted_pwd,
		);

		return $this->db->insert('users', $data);
	}

}
