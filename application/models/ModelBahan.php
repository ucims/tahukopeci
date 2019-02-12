<?php

/**
 *
 */
class ModelBahan extends CI_Model
{

	function data_bahanbaku()
	{
	   $bahan = $this->db->get('peramalan');
	   return $bahan;
	}

	function data_backup()
	{
	   $bahan = $this->db->get('backup');
	   return $backup;
	}	

	
  	function get_data($id)
	{
		return $this->db->get_where('peramalan',array('id'=>$id));
	}

	function get_where($data)
	{
		return $this->db->get_where('peramalan', $data);

	}

	function get_where_tahun($tahun)
	{
		$this->db->where('tahun', $tahun);
		$query =  $this->db->get('peramalan');
		return $query;
		// $tahun = $this->db->get_where('peramalan', $tahun);
		// return $tahun;
	}

	function get_where_bulan($bulan)
	{
		$this->db->where('bulan', $bulan);
		$query =  $this->db->get('peramalan');
		return $query;
		// $tahun = $this->db->get_where('peramalan', $tahun);
		// return $tahun;
	}

	function distinctrow_tahun()
	{
		$this->db->select('tahun');
		$this->db->distinct();
		$query = $this->db->get('peramalan');
		return $query;
	}

	function checkId($id)
	{
		$this->db->get_where('id', $id);
		$query =  $this->db->get('peramlan');
		$count_row = $query->num_rows();

		if ($count_row > 0) {
			return false;
		} else {
			return true;
		}
	}

	function checkLastData()
	{
		$this->db->select('*');
		$this->db->from('peramalan');
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$data = $query->row();

		return $data;
	}

	function update($where, $data_update, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data_update);
	}

	function insert($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function insert_batch($data, $table)
	{
		$this->db->insert($table, $data);
	}

	function remove_checked()
	{
		$this->db->where('id', $delete[$i]);
		$this->db->delete('peramalan');
	}

}


 ?>
