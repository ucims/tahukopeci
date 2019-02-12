<!DOCTYPE html>
<html>
<head>
   <?php 
     if ($this->session->flashdata('backup_gagal') == 'Gagal' ){
        echo "<script type='text/javascript'>alert('Data gagal ditambahkan, duplicate id');</script>";
      } 
    ?>
  <title>Rekap Data</title>
  <script type="text/javascript" src="../asset/jquery.min.js"></script>
  <script>
      function konfirmasi()
    {
      tanya = confirm("Anda Yakin Akan Menghapus Data ?");
      if (tanya == true) return true;
      else return false;
    };
  </script>

  <script type="text/javascript">
    function pilih_berdasarkan()
    {
      if (document.getElementById('pilih_all').checked) 
      {
        document.getElementById('button_cetak').style.display = 'block';
        document.getElementById('div_bulan').style.display = 'none';
        document.getElementById('div_value').style.display = 'none';
        document.getElementById('div_tahun').style.display = 'none';
      } else if(document.getElementById('pilih_tahun').checked){
        document.getElementById('div_tahun').style.display = 'block';
        document.getElementById('div_bulan').style.display = 'none';
        document.getElementById('div_value').style.display = 'none';   
        // document.getElementById('button_cetak').style.display = 'none';
        
      } else if (document.getElementById('pilih_bulan').checked){
        document.getElementById('div_bulan').style.display = 'block';
        document.getElementById('div_value').style.display = 'none';
        document.getElementById('div_tahun').style.display = 'none';
        document.getElementById('button_cetak').style.display = 'none';
        // document.getElementById('button_cetak').style.display = 'block';
        
      } else if(document.getElementById('pilih_value').checked){
        document.getElementById('div_value').style.display = 'block';
        document.getElementById('div_bulan').style.display = 'none';
        document.getElementById('div_tahun').style.display = 'none';
        document.getElementById('button_cetak').style.display = 'none';
      }

    }
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
                    <h2>Cetak with filter</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">                    
                    <p>
                      <input type="radio" class="flat" name="cetak_data" id="pilih_all" value="pilih_all" onclick="pilih_berdasarkan();" /> Semua Data
                      <input type="radio" class="flat" name="cetak_data" id="pilih_tahun" value="pilih_tahun" onclick="pilih_berdasarkan();"/>Berdasarkan tahun
                      <input type="radio" class="flat" name="cetak_data" id="pilih_bulan" value="pilih_bulan" onclick="pilih_berdasarkan();" />Berdasarkan bulan   
                      <input type="radio" class="flat" name="cetak_data" id="pilih_value" value="pilih_value" onclick="pilih_berdasarkan();" />Berdasarkan value   
                    </p>
                    <div name="div_tahun" id = "div_tahun" style='display:none'>
                      <?php 
                        $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2 demo-form');
                        echo form_open('Control_Bahanbaku/cetakLaporan', $attributes); ?> 
                        Pilih tahun berikut :
                        <select name="list_tahun" id="list_tahun" >                      
                          <?php 
                          foreach ($bahan as $key => $val) 
                          {
                          ?>
                            <option value="<?php echo $val->tahun ?>"><?php echo $val->tahun ?></option>
                          <?php
                            }                    
                          ?>
                        </select>
                        <input type="submit" name="cetak_laporan_tahun" value="Cetak" id="button_cetak_tahun" class="btn btn-success">
                      <?php echo form_close(); ?>
                    </div>
                    <div name="div_bulan" id = "div_bulan" style='display:none'>
                      <?php 
                        $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2 demo-form');
                        echo form_open('Control_Bahanbaku/cetakLaporanBulan', $attributes); ?> 
                      Pilih semua data dari bulan berikut : <br>                     
                      <select name="list_bulan" id="list_bulan" >
                        <?php 
                          for ($i=1; $i < 12 ; $i++) { 
                            echo "<option value='$i'>".bulan($i)."</option>";
                          }
                        ?>
                      </select>
                      <input type="submit" name="cetak_laporan_bulan" value="Cetak" id="button_cetak_bulan" class="btn btn-success">
                      <?php echo form_close(); ?>
                    </div>
                    <div name="div_value" id = "div_value" style='display:none'>
                      <?php 
                      $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2 demo-form');
                      echo form_open('Control_Bahanbaku/cetakLaporanValue', $attributes); ?> 
                      Pilih berdasarkan value berikut : <br> 
                      <select name="ket">
                        <option value="kurang_dari"><</option>
                        <option value="sama_dengan">=</option>
                        <option value="lebih_dari">></option>
                      </select> - <input type="text" name="value" placeholder="value 2">
                      <input type="submit" name="cetak_laporan_value" value="Cetak" id="button_cetak_value"  class="btn btn-success">
                      <?php echo form_close(); ?> 
                    </div>
                    <?php 
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2 demo-form');
                    echo form_open('Control_Bahanbaku/cetakAll', $attributes); ?> 
                      <input type="submit" name="cetak_laporan" value="Cetak" id="button_cetak" style='display:none' class="btn btn-success">
                    <?php echo form_close(); ?>  
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Back up Data</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                                   
                    <hr>
                    Ambil data dari back up <hr>
                    <a href="<?php echo base_url('Control_bahanbaku/move_data')?>" class="btn btn-success">Ambil data Back up</a>
                    <hr>              
                    Menyimpan data dalam bentuk file Excel
                    <hr>                    
                    <a href="<?php echo base_url('Control_bahanbaku/csv_export')?>" class="btn btn-success"> Export to CSV</a>
                  </div>
                  </div>
                </div>
            </div>
          </div>
        <footer>
          <div class="pull-right">
           Resto Tahu Kopeci <a href="https://colorlib.com">&copy 2018</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
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
