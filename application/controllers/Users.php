<?php

class Users extends CI_Controller{

	public function register()
	{
		$data['title'] = 'Sign Up!';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'User Name', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('phone', 'Mobile Number', 'callback_check_phone_exists');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'matches[password]');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			//Encrypt password
			$encrypted_pwd = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$this->UserModel->register($encrypted_pwd);


			//session message
			$this->session->set_flashdata('user_registered', 'You can now login.');

			redirect('posts');
		}

	}



	public function login()
	{

		$data['title'] = 'Login Here!';

		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			//Encrypt password
			$username = $this->input->post('username');
			$password = $this->input->post('password');


			$user_id = $this->UserModel->login($username, $password);

			if($user_id)
			{
				//die("Success!");

				//create session
				$user_data = array(
					'user_id'=>$user_id,
					'user_name'=>$username,
					'logged_in'=>true,
				);

				$this->session->set_userdata($user_data);


				//session message
				$this->session->set_flashdata('login_success', 'You are now logged in.');
				redirect(base_url() . 'posts');
			}
			else
			{
				//session message
				$this->session->set_flashdata('login_failed', 'Incorrect username or password.');
				redirect(base_url() . 'users/login');
			}
		}


	}



	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');

		//session message
		$this->session->set_flashdata('user_logged_out', 'You have logged out.');
		redirect(base_url() . 'users/login');
	}



	function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists','That username is taken. Please choose a different one.');

		if($this->UserModel->check_username_exists($username))
		{
			return true;
		}
		else
		{
			return false;
		}
	}



	function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists','That email is taken. Please choose a different one.');

		if($this->UserModel->check_email_exists($email))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function check_phone_exists($phone)
	{
		$this->form_validation->set_message('check_phone_exists','That phone number is taken. Please choose a different one.');

		if($this->UserModel->check_phone_exists($phone))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
