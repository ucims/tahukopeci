<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Bahanbaku extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
	   parent::__construct();
	   require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
	   
	   $this->load->library('form_validation'); // validasi yg di input
	   $this->load->database(); // Load our cart model for our entire class
	   $this->load->helper(array('url','form')); // Load our cart model for our entire class
	   $this->load->library('session');
	   $this->load->library('parser');
	   $this->load->helper('array');

	}
	public function index()
	{
	    // $this->load->model('ModelBahan');
	    // $data['bahan'] = $this->ModelBahan->data_bahanbaku()->result();
	    // $this->load->view('admin/dashboard',$data);
	    $this->load->view('admin/tentang');
  	}

  	function tentang_page()
	{
		$this->load->view('admin/tentang');

	}

	function peramalan_page()
	{
		$this->load->model('ModelBahan');
	    $data['bahan'] = $this->ModelBahan->data_bahanbaku()->result();
	    $this->load->view('admin/dashboard',$data);
	}

	function struktur_page()
	{
		$this->load->view('admin/struktur');

	}

	function alat_bahan_page()
	{
		$this->load->view('admin/alat_bahan');
	}

	function insert_page()
	{
		$this->load->view('admin/input_data');

	}

	function laporan_page()
	{
		$this->load->model('ModelBahan');
	    $data['bahan'] = $this->ModelBahan->distinctrow_tahun()->result();
	    $array_data = json_decode(json_encode($data['bahan']), true);
	    $this->load->view('admin/laporan',$data);
	}

	function insert_page2()
	{
		$this->load->model('ModelBahan');
		$data = $this->ModelBahan->checkLastData();

		$jml_data = $data->bulan;

		if ($jml_data == 0) {
			$this->session->set_flashdata('simpan_ramalan', "kosong");
			redirect('Control_Bahanbaku/insert_page');
		} else {
			$tahun = $data->tahun;
			$data1 =  array('tahun' => $tahun,
								'jml_data' =>$jml_data);
			$d['data'] = $data1;

			$this->load->view('admin/input_peramalan', $d);	
		}
		

	}

	function insert_next()
	{
		// $this->form_validation->set_rules('bahan_baku_bulan_sekarang[]', 'Bahan baku', 'required');
		$this->load->model('ModelBahan');
		//validasi
		$this->form_validation->set_rules('tahun[]', 'tahun', 'trim');
		$this->form_validation->set_rules('bulan[]', 'bulan', 'trim');
		$this->form_validation->set_rules('data_rill[]', 'data_rill', 'trim');
		$this->form_validation->set_rules('mape[]', 'mape', 'trim');
		$this->form_validation->set_rules('mse[]', 'mse', 'trim');


		if (isset($_POST['insert_next'])) {
	
			$data = $this->ModelBahan->checkLastData();
			$query = $this->ModelBahan->data_bahanbaku();

			$jml_data = $query->num_rows();

			$data_bulan_sekarang = $this->input->post('bahan_baku_bulan_sekarang[]'); //posisi bulan input 1 
			
			$bulan = $this->input->post('bulan[]'); //posisi bulan input 1- terkhir, bulan pertama = bulan terakhir di db

			$tahun = $this->input->post('tahun[]'); // data inputan tahun
				
			$data_peramalan_sekarang = $data->data_peramalan; // data peramlan bulan ke-1 = data permalan bulan terkhir id db

			$jumlah = count($data_bulan_sekarang);
			$jumlah_baru = $jml_data + $jumlah;

			$alpha = 0.1;
			$x = 0;
			$y = 0;

			for ($i=0; $i < $jumlah ; $i++) { 
				switch ($i) {
					case 0:
						$ramalan_bulan_selanjutnya[0] = ($alpha * $data_bulan_sekarang[0]) + (1- $alpha) * $data_peramalan_sekarang;
						// $ramalan_bulan_selanjutnya = $data_peramalan_sekarang;
						//MSE
						$mse[$i] = (1 / $jumlah_baru) * pow(($data_peramalan_sekarang - $data_bulan_sekarang[0]),2);
						//MAPE
						$mape[$i] = (($data_bulan_sekarang[$i] - $data_peramalan_sekarang) / $data_bulan_sekarang[0]) * 100;
						
						$x = $data_bulan_sekarang[$i];
						$y = $ramalan_bulan_selanjutnya[$i];

						break;
						
					default:
						$ramalan_bulan_selanjutnya[$i] = ($alpha * $data_bulan_sekarang[$i-1]) + (1- $alpha) * $ramalan_bulan_selanjutnya[$i-1];
							//MSE
						$mse[$i] = (1 / $jml_data) * pow(($data_peramalan_sekarang - $data_bulan_sekarang[$i]),2);
							//MAPE
						$mape[$i] = (($data_bulan_sekarang[$i] - $ramalan_bulan_selanjutnya[$i]) / $data_bulan_sekarang[$i]) * 100;

						$x = $data_bulan_sekarang[$i];
						$y = $ramalan_bulan_selanjutnya[$i];
						break;
					}

					$z = ($alpha * $x) + (1-$alpha) * $y;


					if (end($bulan) == 12) {
					
					$data2 = array('tahun' => end($tahun)+1,
		 					'bulan' => 1, // bulan jadi 1 jika 13 
		 					'data_bulan_sekarang' => $data_bulan_sekarang,								
							'ramalan_bulan_selanjutnya' => $ramalan_bulan_selanjutnya,
		 					'data_peramalan' => $z,
		 					'mape' => 0,
		 					'mse' => 0,
		 					'data_peramalan_sekarang' => $data_peramalan_sekarang
		 				);
					} else  {

						$data2 =  array('bulan' => $bulan,
								'tahun' => $tahun,
								'data_bulan_sekarang' => $data_bulan_sekarang,								
								'ramalan_bulan_selanjutnya' => $ramalan_bulan_selanjutnya,								
								'mape' => $mape,
								'mse' => $mse,								
								'data_peramalan_sekarang' => $data_peramalan_sekarang
								); 
					}
				}

				$z = ($alpha * $x) + (1-$alpha) * $y;

				$d2['data'] = $data2;

				if (end($bulan) == 12) { // tambah bulan jika 12 
			 		$d2['dataz'] = array('tahun' => end($tahun)+1,
			 					'bulan' => 1, // bulan jadi 1 jika 13 
			 					'data_rill' => 0,
			 					'data_peramalan' => $z,
			 					'mape' => 0,
			 					'mse' => 0);
			 	} else {
			 		$d2['dataz'] = array('tahun' => $tahun,
			 					'bulan' => $bulan[$jumlah-1]+1,
			 					'data_rill' => 0,
			 					'data_peramalan' => $z,
			 					'mape' => 0,
			 					'mse' => 0);
			 	}

				$this->load->view('admin/hitung_data2', $d2 );
			}
			// tombol simpan data dari halamn hitung_data2
			if (isset($_POST['simpan_data'])) {
			 	
			 	$this->form_validation->set_rules('tahun[]', 'tahun', 'trim');
		   		$this->form_validation->set_rules('bulan[]', 'bulan', 'trim');
		   		$this->form_validation->set_rules('data_rill[]', 'data_rill', 'trim');
		   		$this->form_validation->set_rules('mape[]', 'mape', 'trim');
		   		$this->form_validation->set_rules('mse[]', 'mse', 'trim');


				if ($this->form_validation->run() == FALSE)
				{
			    	echo validation_errors(); // tampilkan apabila ada error
			   	} else {
			    
				    $tahun = $this->input->post('tahun');
				    $result = array();

				    foreach($tahun AS $key => $val)
				    {
				     $result[] = array(   "id" 		=> $_POST['tahun'][$key].$_POST['bulan'][$key],
									      "tahun"  => $_POST['tahun'][$key],
									      "bulan"  => $_POST['bulan'][$key],
									      "data_rill"  => $_POST['data_rill'][$key],
									      "data_peramalan"  => $_POST['data_peramalan'][$key],
									      "mape"  => $_POST['mape'][$key],
									      "mse"  => $_POST['mse'][$key] );
				    }

				    $test = TRUE;

				    foreach ($result as $a ) {
				    	$where = $a['id'];
				    	$query = $this->db->get_where('peramalan', $where);
						$count_row = $query->num_rows();
						if ($count_row > 0) {
							$test = FALSE;
						}			    	
				    }
				    
				    if($test)
				    {
				    	for ($i=0; $i < count($tahun) ; $i++) { 
				    		switch ($i) 
					    	{
					    		case 0:
					    			$where = array('id' => $result[0]['id']);
							    	$data_update = array("tahun"  => $result[0]['tahun'],
													      "bulan"  => $result[0]['bulan'],
													      "data_rill"  => $result[0]['data_rill'],
													      "data_peramalan"  => $result[0]['data_peramalan'],
													      "mape"  => $result[0]['mape'],
													      "mse"  => $result[0]['mse']);

							    	$update = $this->ModelBahan->update($where, $data_update, 'peramalan');
									$update_backup = $this->ModelBahan->update($where, $data_update, 'backup');
					    			break;
					    		
					    		default:

					    			$where = array('id' => $result[$i]['id']);
							    	$data_insert = array("id"  => $result[$i]['tahun'].$result[$i]['bulan'],
							    						  "tahun"  => $result[$i]['tahun'],
													      "bulan"  => $result[$i]['bulan'],
													      "data_rill"  => $result[$i]['data_rill'],
													      "data_peramalan"  => $result[$i]['data_peramalan'],
													      "mape"  => $result[$i]['mape'],
													      "mse"  => $result[$i]['mse']);

							   		$this->ModelBahan->insert( $data_insert, 'peramalan');
							   		$this->ModelBahan->insert( $data_insert, 'backup');
					    			$this->session->set_flashdata('simpan_ramalan', 'Berhasil');
							   		redirect('Control_Bahanbaku/peramalan_page');    
					    			break;
					    	}		
				    	}
				    		    	
				    	// $this->db->insert('peramalan', $result);
					    // $this->session->set_flashdata('simpan_ramalan', 'Berhasil');
					    // redirect('Control_Bahanbaku');    
					} else {
					    $this->session->set_flashdata('simpan_ramalan', "Gagal");
					    redirect('Control_Bahanbaku/peramalan_page');    

				    }
	   		}
		} 		
	}

	function insert_data(){

		$tahun = $this->input->post('tahun[]');
		$bulan = $this->input->post('bulan[]');	
		$data_rill = $this->input->post('data_rill[]');

		$this->form_validation->set_rules($tahun, 'trim');
	   	$this->form_validation->set_rules($bulan, 'trim');
	   	$this->form_validation->set_rules($data_rill, 'trim');	

	   	if (isset($_POST['tampilkan_data'])) 
	   	{
	   		
	   		$jml = sizeof($tahun);
			$alpha = 0.1;
			
			$bulanSekarang = array();
			$bulanDepan = array();
			$bulanKemarin = array();

			$x = 0;
			$y = 0;

			for ($i=0; $i < $jml; $i++) 
		 	{
		 		switch ($i) 
		 		{ 
				// untuk perhitungan bulan sekarang
					case '0':
						$bulanSekarang[$i] = floatval($data_rill[$i]);
						$bulanKemaring[$i] = floatval($data_rill[$i]);
						//$singleEksponensial = $bulanSekarang;
						$singleEksponensial[0] =  ($alpha * $bulanSekarang[0]) + ((1-$alpha) * $bulanSekarang[0]);
						//MSE
						$mse[$i] = (1 / $jml) * pow(($singleEksponensial[$i] - $bulanSekarang[$i]),2);
						//MAPE
						$mape[$i] = (($bulanSekarang[$i] - $singleEksponensial[$i]) / $bulanSekarang[$i]) * 100;
						$x = $data_rill[$i];
						$y = $singleEksponensial[$i];
						break;
					
					default :	
						$bulanSekarang[$i] = floatval($data_rill[$i]);
						$bulanKemaring[$i] = floatval($data_rill[$i-1]);
						$singleEksponensial[$i] =  ($alpha * $bulanSekarang[$i-1]) + ((1-$alpha) * $singleEksponensial[$i-1]);
						//MSE
						$mse[$i] = (1 / $jml) * pow(($singleEksponensial[$i] - $bulanSekarang[$i]),2);
						//MAPE
						$mape[$i] = (($bulanSekarang[$i] - $singleEksponensial[$i]) / $bulanSekarang[$i]) * 100;

						$x = $data_rill[$i];
						$y = $singleEksponensial[$i];

						break;		
				}
				$z = ($alpha * $x) + (1-$alpha) * $y;
				if (end($bulan) == 12) {
					$data = array('tahun' => end($tahun)+1,
		 					'bulan' => 1, // bulan jadi 1 jika 13 
		 					'data_rill' => 0,
		 					'data_peramalan' => $singleEksponensial,
		 					'mape' => 0,
		 					'mse' => 0);
				} else  {

				$data =  array('tahun' => $tahun,
							'bulan' => $bulan,
							'data_rill' => $data_rill,
							'data_peramalan' => $singleEksponensial,							
							'mape' => $mape,
							'mse' => $mse
							 
						); 
				}
		 	}

		 	$z = ($alpha * $x) + (1-$alpha) * $y;

		 	$d['data'] = $data;

		 	// print_r(end($tahun)+1);

		 	if (end($bulan) == 12) { // tambah bulan jika 12 
		 		$d['dataz'] = array('tahun' => end($tahun)+1,
		 					'bulan' => 1, // bulan jadi 1 jika 13 
		 					'data_rill' => 0,
		 					'data_peramalan' => $z,
		 					'mape' => 0,
		 					'mse' => 0);
		 	} else {
		 		$d['dataz'] = array('tahun' => $tahun,
		 					'bulan' => $bulan[$jml-1]+1,
		 					'data_rill' => 0,
		 					'data_peramalan' => $z,
		 					'mape' => 0,
		 					'mse' => 0);
		 	}

			// echo '<pre>';
			// print_r($d);
			// echo '</pre>';
		 	$this->load->view('admin/hitung_data', $d );
	   	} 

	   	else if (isset($_POST['jml-form']))
	   	
	   	{
	   		$this->form_validation->set_rules('tahun[]', 'tahun', 'trim');
	   		$this->form_validation->set_rules('bulan[]', 'bulan', 'trim');
	   		$this->form_validation->set_rules('data_rill[]', 'data_rill', 'trim');
	   		$this->form_validation->set_rules('mape[]', 'mape', 'trim');
	   		$this->form_validation->set_rules('mse[]', 'mse', 'trim');

	   		if ($this->form_validation->run() == FALSE)
			{
		    	echo validation_errors(); // tampilkan apabila ada error
		   	} else {
		   		$tahun = $this->input->post('tahun');
			    $result = array();

			    foreach($tahun AS $key => $val)
			    {
			     $result[] = array(
			     "id" 		=> $_POST['tahun'][$key].$_POST['bulan'][$key],
			      "tahun"  => $_POST['tahun'][$key],
			      "bulan"  => $_POST['bulan'][$key],
			      "data_rill"  => $_POST['data_rill'][$key],
			      "data_peramalan"  => $_POST['data_peramalan'][$key],
			      "mape"  => $_POST['mape'][$key],
			      "mse"  => $_POST['mse'][$key]
			     );
			    }

			   	$test = TRUE;

			    foreach ($result as $a ) 
			    {
			    	$query = $this->db->get_where('peramalan', array('id' => $a['id']));
					$count_row = $query->num_rows();

					if ($count_row > 0) 
					{
						$test = FALSE;
					}
			    }

			    if($test)
			    {
			    	$this->db->insert_batch('peramalan', $result);
			    	$this->db->insert_batch('backup', $result);
				    $this->session->set_flashdata('simpan_ramalan', 'Berhasil');
				    redirect('Control_Bahanbaku/peramalan_page');    
				} else {
				    $this->session->set_flashdata('simpan_ramalan', 'Gagal');
				    redirect('Control_Bahanbaku/insert_page'); 
			    }

		   	}

	   	}
} 
	

	function hitung_data()
	{	
		$this->form_validation->set_rules('tahun[]', 'tahun', 'required|trim');
		$this->form_validation->set_rules('bulan[]', 'bulan', 'required|trim');
		$this->form_validation->set_rules('data_rill[]', 'data_rill', 'required|trim');	   		

		if ($this->form_validation->run() == FALSE)
		{
	    	echo validation_errors(); // tampilkan apabila ada error
	   	} else {
	    
		    $tahun = $this->input->post('tahun');
		    $result = array();

		    foreach($tahun AS $key => $val)
		    {
		     $result[] = array(
		      "tahun"  => $_POST['tahun'][$key],
		      "bulan"  => $_POST['bulan'][$key],
		      "data_rill"  => $_POST['data_rill'][$key]
	      
		     ); 
		    }

			$test = $this->db->insert_batch('peramalan', $result); // fungsi  untuk menyimpan multi array ke database
		    
		    if($test)
		    {
		    	echo "<script type='text/javascript'>alert('Data berhasil disimpan');</script>";
			    redirect('Control_Bahanbaku');    
			} else {
		    	echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
		    }
   		}    
	}


	function edit_page()
	{
		$this->load->model('ModelBahan');
		$id_bahan = $this->uri->segment(3);
		$data['get_data'] = $this->ModelBahan->get_data($id_bahan)->row_array();

		$this->load->view('admin/edit_data',$data);


	}

	function edit()
	{
		$id = $this->input->post('id');

		$data = array('tahun' => $this->input->post('tahun'),
	 								'bulan' => $this->input->post('bulan'),
									'data_rill' => $this->input->post('data'),
									'data_peramalan' => $this->input->post('ramalan'));

		$this->db->where('id',$id);
		$this->db->update('peramalan',$data);
		redirect('Control_Bahanbaku');
	}

	function delete()
	{
		$id_bahan = $this->uri->segment(3);
		$this->db->where('id', $id_bahan);
		$delete = $this->db->delete('peramalan');
		if ($delete) {
			$this->session->set_flashdata('delete_berhasil', "Berhasil");
			redirect('Control_Bahanbaku/peramalan_page');
		} else{
			$this->session->set_flashdata('delete_gagal', "Gagal");
			redirect('Control_Bahanbaku/peramalan_page');
		}
		// redirect('Control_Bahanbaku');
	}

	function cek_login()
	{
		if (!$this->session->has_userdata('admin')) 
		{
			redirect('Login');
		}
	}

	function logout()
	{
		redirect('Login');
	}

	function check_duplicate_id($id) {

   		 return $this->Model_Bahan->checkId($id);

	}

	function cetakLaporan() //untuk mencetak ke pdf berdasarkan tahun
	{
		$tahun = $this->input->post('list_tahun');
		$dompdf = new Dompdf();
		$this->load->model('ModelBahan');

		$data['bahan'] = $this->ModelBahan->get_where_tahun($tahun)->result_array();
		
		$html = $this->load->view("admin/cetak", $data, true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'lanscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => false)); 
	}

	function cetakLaporanBulan()
	{
		$bulan = $this->input->post('list_bulan');
		$dompdf = new Dompdf();
		$this->load->model('ModelBahan');

		$data['bahan'] = $this->ModelBahan->get_where_bulan($bulan)->result_array();
		
		$html = $this->load->view("admin/cetak", $data, true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'lanscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => false)); 
	}

	function cetakLaporanValue()
	{
		$value = $this->input->post('value');
		$ket = $this->input->post('ket');

		if ($ket == 'kurang_dari') {
			$query = $this->db->query("SELECT * from peramalan WHERE data_rill < $value ");
		} else if ($ket == 'sama_dengan') {
			$query = $this->db->query("SELECT * from peramalan WHERE data_rill = $value ");
		} else if ($ket == 'lebih_dari') {
			$query = $this->db->query("SELECT * from peramalan WHERE data_rill > $value ");
		}

		$dompdf = new Dompdf();
		$this->load->model('ModelBahan');

		$data['bahan'] = $query->result_array();
		
		$html = $this->load->view("admin/cetak", $data, true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'lanscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => false)); 
	}

	function cetakAll() //untuk mencetak ke pdf berdasarkan tahun
	{
		$dompdf = new Dompdf();
		$this->load->model('ModelBahan');

		$data['bahan'] = $this->ModelBahan->data_bahanbaku()->result_array();
		
		$html = $this->load->view("admin/cetak", $data, true);
		$dompdf->load_html($html);
		$dompdf->set_paper('A4', 'lanscape');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan.pdf', array("Attachment" => false)); 
	}

	function cetak()
	{
		switch (isset($_POST['cetak_data'])) {
			case 'pilih_all':
				$dompdf = new Dompdf();
				$this->load->model('ModelBahan');

				$data['bahan'] = $this->ModelBahan->data_bahanbaku()->result_array();
				
				$html = $this->load->view("admin/cetak", $data, true);
				$dompdf->load_html($html);
				$dompdf->set_paper('A4', 'lanscape');
				$dompdf->render();
				$pdf = $dompdf->output();
				$dompdf->stream('laporan.pdf', array("Attachment" => false)); 
				break;
			
			default:
				# code...
				break;
		}

	}

	//buat download banyak data
	function delete_multiple()
	{
		$this->load->model('ModelBahan');

		$action = $this->input->post('action');

		if ($action == "delete") 
		{
			$delete = $this->input->post('checklist');
			for ($i=0; $i < count($delete); $i++) 
			{ 
				$this->db->where('id', $delete[$i]);
				$this->db->delete('peramalan');
			}
		}
		$this->session->set_flashdata('delete_semua', "Berhasil");
		redirect('Control_Bahanbaku/peramalan_page');
	}

	function csv_export()
	{
		
		$this->load->dbutil();

        $this->load->helper('file');

        $this->load->helper('download');

        $delimiter = ",";

        $newline = "\r\n";

        $filename = "data_bahan_baku.csv";

        $query = "SELECT * FROM peramalan WHERE 1";

        $result = $this->db->query($query);

        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);

        force_download($filename, $data);

	}

	function move_data()
	{
		$query1 = $this->db->query("INSERT INTO peramalan SELECT * FROM backup");


		$test = TRUE;

	    foreach ($query1 as $a ) {
	    	$where = $a['id'];
	    	$query = $this->db->get_where('peramalan', $where);
			$count_row = $query->num_rows();
			if ($count_row > 0) {
				$test = FALSE;
			}			    	
	    }

	    if ($test == true) {
	    	$this->session->set_flashdata('backup_berhasil', 'Berhasil');
			redirect('Control_Bahanbaku/peramalan_page');
	    } else {
	    	$this->session->set_flashdata('backup_gagal', 'Gagal');
			redirect('Control_Bahanbaku/laporan_page'); 
	    }			
	}
}
