<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Control_User extends CI_Controller {

		function __construct() 
		{
		   	parent::__construct(); 
		   	$this->load->library('form_validation'); // validasi yg di input
		   	$this->load->database(); // Load our cart model for our entire class
		   	$this->load->helper(array('url','form')); // Load our cart model for our entire class
		   	$this->load->library('session');

		}

		public function index()
		{
		    $this->load->model('model_user');
		    $data['user'] = $this->model_user->data_user()->result();
		    $this->load->view('admin/user',$data);
		}

		public function insert_page()
		{
			$this->load->view('admin/input_user');
		}

		public function insert_user()
		{
			$this->load->model('model_user');
			$id_user = $this->input->post('id_user');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$fullname = $this->input->post('fullname');
			$hash_pass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
			$level = $this->input->post('level');

			$data = array ('id_user'  => $id_user, 
							'username' => $username,
							'fullname' => $fullname,
							'password' => $hash_pass,
							'level' =>  $level);			

			$data = $this->model_user->insert_data('user', $data);
			redirect('Control_User');
		}

		function delete()
		{
			$id_user = $this->uri->segment(3);
			$this->db->where('id_user', $id_user);
			$this->db->delete('user');
			redirect('Control_User');
		}

		function edit()
		{
			$id_user = $this->input->post('id_user');
			$username = $this->input->post('username');
			$fullname = $this->input->post('fullname');
			$password = $this->input->post('password');
			$hash_pass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);

			$data = array('username' => $username,
							'fullname' => $fullname,
							'password' => $hash_pass,
							'level' =>  $level);

			$this->db->where('id_user',$id_user);
			$this->db->update('user',$data);
			redirect('Control_User');
		}

		function edit_page()
		{
			$this->load->model('model_user');
			$id_user = $this->uri->segment(3);
			$data['get_data'] = $this->model_user->get_data($id_user)->row_array();

			$this->load->view('admin/edit_user',$data);


		}

	}
?>