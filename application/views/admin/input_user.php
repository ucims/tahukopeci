<!DOCTYPE html>
<html>
<head>
	<title>Input User</title>
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
                    <h2>Insert User</h2>
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
                    echo form_open('Control_User/insert_user', $attributes); ?>                                 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID User 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input('id_user', '', array('placeholder' => 'Id User','required' => 'true', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input('username', '', array('placeholder' => 'Username','required' => 'true', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input('fullname', '', array('placeholder' => 'Fullname','required' => 'true', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input('password', '', array('placeholder' => 'Password','required' => 'true', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                      </div>                                  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                        
                          <select class="form-control" name="level">
                            
                            <option value="Administrator">Administrator</option>";
                            
                          </select>
                        </div>
                      </div>                       
                      <div id="insert-form"></div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                          <?php
                          echo form_submit('simpan_user','Simpan',array('class' => 'btn btn-success'));
                          //echo form_submit('tampilkan','Tampilkan', array('class' => 'btn btn-success'));
                          //echo form_submit('tampilkan','Tampilkan');
                          echo form_close();

                          echo anchor('Control_User', 'Kembali', array('class' => 'btn btn-primary'));
                          ?>                          
                        </div>
                      </div>

                    </form>
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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
