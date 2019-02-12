<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />
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
                    <h2>Edit Data</h2>
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
                    echo form_open('Control_Bahanbaku/edit', $attributes); ?>                

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input('id', $get_data['id'] , array('placeholder' => 'Id','readonly' => 'true', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tahun
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input('tahun', $get_data['tahun'] , array('placeholder' => 'Tahun', 'class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Bulan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                          <select class="form-control" name="bulan">
                            <?php
                            $jumlah = 12;
                            for ($i=1; $i <= $jumlah ; $i++) {
                              echo "<option value=$i". set_select('bulan[]', $i).">$i</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Data bahan baku
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input('data', $get_data['data_rill'], array('placeholder' => 'Data Bahan baku','required' => 'true','class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                      </div>                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Peramalan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input('ramalan', $get_data['data_peramalan'], array('placeholder' => 'Data Ramalan Bahan baku','class' => 'form-control col-md-7 col-xs-12')); ?>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
                          <?php
                          echo form_submit('ubah','Ubah',array('class' => 'btn btn-success'));
                          //echo form_submit('tampilkan','Tampilkan');
                          echo form_close();

                          echo anchor('Control_Bahanbaku', 'Kembali', array('class' => 'btn btn-primary'));
                          ?>                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>                      
        <!-- /page content -->

        <!-- footer content -->
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