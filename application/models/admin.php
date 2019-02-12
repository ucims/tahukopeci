<?php

	class admin extends CI_Model
	{
		function get_where($table = null, $where = null)
		{
			$this->db->from($table);
			$this->db->where($where);

			return $this->db->get();
		}
	}

?>