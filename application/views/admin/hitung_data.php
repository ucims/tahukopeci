<!DOCTYPE html>
<html>
<head>
   <?php
      if ($this->session->flashdata('simpan_ramalan') == 'Gagal') {
        ?>
          <script type='text/javascript'>alert('Data gagal disimpan');</script>0;
        <?php
      } 
    ?>
	<title>Hasil Perhitungan</title>
	<script type="text/javascript" src="../asset/jquery.min.js"></script>
	<script>
      function konfirmasi()
    {
      tanya = confirm("Anda Yakin Akan Menghapus Data ?");
      if (tanya == true) return true;
      else return false;
    };
  </script>
 <!-- Bootstrap -->
  <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>asset/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
	<div class="container body">
      <div class="main_container">

        <?php $this->load->view('admin/nav') ?>
        
            <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hasil Perhitungan Data</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                      echo form_open('Control_Bahanbaku/insert_data', $attributes);
                    ?>
                    <div class="table-responsive">
                    <table border = '1' class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">        
                        <th class='column-title'>Tahun</th>
                        <th class='column-title'>Bulan</th>
                        <th class='column-title'>Data rill</th>
                        <th class='column-title'>SES</th>
                        <th class='column-title'>MAPE</th>
                        <th class='column-title'>MSE</th>                        
                      </tr>                         				    
                    </thead>
                    <?php 
                    var_dump($data['data_peramalan']);
                    $jml = count($data['data_peramalan']);
                    for ($i=0; $i < $jml ; $i++) { 
                      echo "<tbody>
                              <tr class='odd pointer'>            
                                <td>".$data['tahun'][$i]."                             
                                  <input type='text' name = 'tahun[]' value='".$data['tahun'][$i]."' readonly='true' size='5' hidden>
                                </td>                              
                                <td>". $data['bulan'][$i] ."
                                  <input type='text' name = 'bulan[]' value='". $data['bulan'][$i] ."' readonly='true' size='5' hidden>
                                </td>
                                <td>". $data['data_rill'][$i] . "
                                  <input type='text' name = 'data_rill[]' value='". $data['data_rill'][$i] . "' readonly='true'  hidden>
                                </td>
                                <td>". $data['data_peramalan'][$i] . "
                                  <input type='text' name = 'data_peramalan[]' value='". $data['data_peramalan'][$i] . "' readonly='true'  hidden>
                                </td>
                                                            
                                <td>". $data['mape'][$i] . "
                                  <input type='text' name = 'mape[]' value='". $data['mape'][$i] . "' readonly='true' hidden>
                                </td>
                                <td>". $data['mse'][$i] . "
                                  <input type='text' name = 'mse[]' value='". $data['mse'][$i] . "' readonly='true' hidden>
                                </td>
                              </tr>
                            </tbody>
                            ";
                    }
                    ?>
                        <tbody>
                          <tr class="odd pointer">
                            <td><input type="text" name="tahun[]" value="<?= $dataz['tahun'][0] ?>" hidden><?= $dataz['tahun'][0] ?></td>

                            <td><input type="text" name="bulan[]" value="<?= $dataz['bulan'] ?>" hidden ><?= $dataz['bulan'] ?></td>

                            <td><input type="text" name="data_rill[]" value="<?= $dataz['data_rill'] ?>" hidden><?= $dataz['data_rill'] ?></td>

                            <td><input type="text" name="data_peramalan[]" value="<?= $dataz['data_peramalan']?>" hidden><?= $dataz['data_peramalan'] ?></td>

                            <td><input type="text" name="mape[]" value="<?= $dataz['mape']?>" hidden><?= $dataz['mape'] ?></td>

                            <td><input type="text" name="mse[]" value="<?= $dataz['mse']?>" hidden><?= $dataz['mse'] ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
 <!--
<td>". $data['data_peramalan_des'][$i] . "
                                <input type='text' name = 'data_peramalan_des[]' value='". $data['data_peramalan_des'][$i] . "' readonly='true'  hidden>
                              </td>
<td>". $data['a'][$i] . "
                                <input type='text' name = 'a[]' value='". $data['a'][$i] . "' readonly='true' hidden>
                              </td>
                              <td>". $data['b'][$i] . "
                                <input type='text' name = 'b[]' value='". $data['b'][$i] . "' readonly='true'  hidden>
                              </td>
                              <td>". $data['s'][$i] . "
                                <input type='text' name = 's[]' value='". $data['s'][$i] . "' readonly='true' hidden>
                              </td>

 -->                                
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        
                          <?php
                          echo form_submit('jml-form','Simpan',array('class' => 'btn btn-success'));
                          //echo form_submit('tampilkan','Tampilkan', array('class' => 'btn btn-success'));
                          //echo form_submit('tampilkan','Tampilkan');
                          echo form_close();

                          echo anchor('Control_Bahanbaku/insert_page', 'Kembali', array('class' => 'btn btn-primary'));
                          ?>                          
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
<!-- Kita buat textbox untuk menampung jumlah data form -->
	<input type="hidden" id="jumlah-form" value="1"><script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
				" <div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12' for='first-name'>Tahun                 </label><div class='col-md-6 col-sm-6 col-xs-12'><input type='text' name ='tahun[]'placeholder = 'Tahun' class='form-control col-md-7 col-xs-12' required /></div></div>" + 
				"<div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'>Bulan</label><div class='col-md-6 col-sm-6 col-xs-12'><select class='form-control' name='bulan[]'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option> </select></div></div>  " +
				" <div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'>Data bahan baku</label><div class='col-md-6 col-sm-6 col-xs-12'><input type='text' name ='data_rill[]'placeholder = 'Data Bahan baku' class='form-control col-md-7 col-xs-12' required /></div></div> " +
				"<div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12'>Data bahan baku</label><div class='col-md-6 col-sm-6 col-xs-12'><input type='text' name ='data_peramalan[]' placeholder = 'Data Peramalan Bahan baku' class='form-control col-md-7 col-xs-12' required /></div></div> ");

			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
		});

		// Buat fungsi untuk mereset form ke semula
		$("#btn-reset-form").click(function(){
			$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
		});
	});
	</script>


		<footer>
          <div class="pull-right">
            Resto Tahu Kopeci <a href="https://colorlib.com">&copy 2018</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>   
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>asset/js/custom.min.js"></script>
</body>
</html>
