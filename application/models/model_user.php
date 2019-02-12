<?php 

	class model_user extends CI_Model
	{
		function data_user()
		{
		   $user = $this->db->get('user');
		   return $user;
		}

	  	function get_data($id_user)
		{
			return $this->db->get_where('user',array('id_user'=>$id_user));
		}

		function insert_data($table, $data)
		{
			$users = $this->db->insert($table, $data);
			return $users;
		}
	}
 ?>