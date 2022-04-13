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


	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		$result = $query->row_array();

		if (!empty($result) && password_verify($password, $result['password'])) {
			return $result;
		} else {
			return false;
		}
	}


	public function check_username_exists($username)
	{
		$query = $this->db->get_where('users', array('username' => $username));

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function check_email_exists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function check_phone_exists($phone)
	{
		$query = $this->db->get_where('users', array('phone' => $phone));

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
