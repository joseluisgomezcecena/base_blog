<?php

class Users extends CI_Controller{

	public function register()
	{
		$data['title'] = 'Sign Up!';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
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
}
