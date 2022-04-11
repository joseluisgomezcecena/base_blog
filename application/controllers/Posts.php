<?php

class Posts extends CI_Controller
{
	//display all posts
	public function index()
	{
		$data['title'] = "Latest Posts";
		$data['posts'] = $this->PostModel->get_posts();

		//load header, page & footer
		$this->load->view('templates/header');
		$this->load->view('posts/index', $data); //loading page and data
		$this->load->view('templates/footer');
	}




	public function view($id = NULL)
	{
		$data['post'] = $this->PostModel->get_posts($id);

		if(empty($data['post']))
		{
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data); //loading page and data
		$this->load->view('templates/footer');
	}




	public function create()
	{
		$data['title'] = "New Post";
		$data['categories'] = $this->CategoryModel->get_categories();

		//validation style
		$this->form_validation->set_error_delimiters(
			'<div class="alert alert_danger mb-5"><strong class="uppercase">Error: </strong>',
			'<button type="button" class="dismiss la la-times" data-dismiss="alert"></button></div>'
		);

		//form validation
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('category[]', 'Category', 'required');


		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			//file uploads
			$config['upload_path'] = './assets/uploads/posts';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = '2048';
			$config['max_width'] = '2500';
			$config['max_height'] = '2500';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload())
			{
				$errors = array('error'=>$this->upload->display_errors());
				$post_image = 'noimage.jpg';
			}
			else
			{
				$data = array('upload_data'=>$this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->PostModel->create_post($post_image);
			redirect('posts');
		}
	}




	public function edit($id = NULL)
	{
		$data['title'] = 'Edit this post';
		$data['categories'] = $this->CategoryModel->get_categories();
		$data['post'] = $this->PostModel->get_posts($id);

		//validation style
		$this->form_validation->set_error_delimiters(
			'<div class="alert alert_danger mb-5"><strong class="uppercase">Error: </strong>',
			'<button type="button" class="dismiss la la-times" data-dismiss="alert"></button></div>'
		);

		//form validation
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('category[]', 'Category', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data); //loading page and data
			$this->load->view('templates/footer');
		}
		else
		{
			$this->PostModel->create_post();
			redirect('posts');
		}

	}




	public function update()
	{

	}




	public function delete($id = NULL)
	{
		$data['title'] = "Delete Post";
		$data['categories'] = $this->CategoryModel->get_categories();
		$data['post'] = $this->PostModel->get_posts($id);

		if(empty($data['post'])){
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('posts/delete', $data); //loading page and data
		$this->load->view('templates/footer');

		if(isset($_POST['delete']))
		{
			$this->PostModel->delete_post();
			redirect('posts');
		}

	}

}
