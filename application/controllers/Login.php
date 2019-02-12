<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin');
		$this->load->library('session');
	}

	public function index()
	{
  		$this->load->view('admin/login_form'); 			
  	}

  	public function login()
	{
		
  	if ($this->input->post('login') == 'Login')  {
  			$user = $this->input->post('username', TRUE);
  			$pass = $this->input->post('password', TRUE);
  			$cek = $this->admin->get_where('user', array('username' => $user));

  			if ($cek->num_rows() > 0) 
  			{
  				$data = $cek->row();

  				if (password_verify($pass, $data->password)) 
  				{
  					$userdata = array(
  						
  						'id_user' => $data->id_user,
  						'name' => $data->fullname,
  						'login' => TRUE
  						);
  					$this->session->set_userdata($userdata);
  					redirect('Control_Bahanbaku',$userdata);

  				} else {
            //redirect('Login');    
  					// echo "<script> alert('Password yang anda masukan salah !');</script>"; 
            $this->session->set_flashdata('login', 'salah');
            
            $this->load->view('admin/login_form');
		
  				}
  			} else {
              
  				// echo "<script> 
      //     alert('Username atau password salah');
      //     </script>";
          $this->session->set_flashdata('login', 'gagal');
          $this->load->view('admin/login_form');
  			}

  		}
  	}

  	public function logout()
  	{
  		$this->session->sess_destroy();
  		redirect('Login');
  	}


}
