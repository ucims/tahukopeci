<!DOCTYPE html>
<html>
<head>
   <?php

      if ($this->session->flashdata('simpan_ramalan') == 'Gagal') {
        ?>
          echo "<script type='text/javascript'>alert('Data gagal disimpan');</script>";
        <?php
      } 
    ?>
	<title>Alat dan Bahan</title>
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
                    <h2>Cara membuat tahu</h2>
                    <div class="clearfix"></div>
                  </div>
                  <ul>
                    <li>Rendam kedelai selama 3 jam</li>
                    <li>Cuci kedelai yang sudah direndam sampai bersih.</li>
                    <li>Giling kedelai sambil campur air sampai halus.</li>
                    <li>Masak kedelai yang sudah halus sapai mendidih jangan lupa ditambah air secukupnya.</li>
                    <li>Saring hasil yang sudah dimasak untuk memeisahkan sari kedelai dengan ampasnya </li>
                    <li>Setelah kedelai disaring, saatnya mencampur bibit tahu kedalam sari kedelai yang disaring tadi, kemudian aduk hingga merata </li>
                    <li>Setelah menggumpal dan mengendap, baung air yang dipermukaan sedikit demi sedikit.</li>
                    <li>Cetak sari kedelai yang sudah terkumpule memakai cetakan</li>
                    <li>Tahu yang sudah terbentuk dipotong sesuai ukuran yang diinginkan </li>
                    <li>Tahu diberi garam agar lebih terasa</li>
                    <li>Tahu yang sudah dipotong masuk ke proses penggorengan</li>
                  </ul>
                  <div class="x_title">
                    <h2>Alat dalam proses membuat tahu</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="table-responsive">
                     <table class="table table-striped jambo_table bulk_action">
                     <thead>
                      <tr>
                       <th>Nama Alat</th>
                       <th>Jumlah Alat</th>
                      </tr>
                     </thead>
                    <tbody>
                        <tr>
                         <td>Mesin giling kedelai</td>
                         <td>1 Unit</td>
                        </tr>
                        <tr>
                          <td>Tahang Jati</td>
                          <td>4 Unit</td>
                        </tr>
                        <tr>
                          <td>Tampir bambu</td>
                          <td>15 Unit</td>
                        </tr>
                        <tr>
                          <td>Papan Cetak tahu</td>
                          <td>25 Unit</td>
                        </tr>
                        <tr>
                          <td>Ayakan besar</td>
                          <td>5 Unit</td>
                        </tr>
                        <tr>
                          <td>Saringan untuk tahu ukuran besar</td>
                          <td>5 Unit</td>
                        </tr>                         
                    </tbody>                  
                 </table>
                </div>
                <div class="x_title">
                    <h2>Bahan dalam proses membuat tahu</h2>
                    <div class="clearfix"></div>
                </div>
                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                     <thead>
                      <tr>
                       <th>Nama Bahan</th>
                       <th>Kebutuhan</th>
                      </tr>
                     </thead>
                    <tbody>
                        <tr>
                         <td>Kacang Kedelai</td>
                         <td>6000 Kg</td>
                        </tr>
                        <tr>
                          <td>Garam</td>
                          <td>300 Kg</td>
                        </tr>
                        <tr>
                          <td>Air</td>
                          <td>-</td>
                        </tr>                        
                    </tbody>                   
                 </table>
                </div>

                <div class="x_title">
                    <h2>Pembelian peralatan</h2>
                    <div class="clearfix"></div>
                </div>
                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                     <thead>
                      <tr>
                       <th>Nama Alat</th>
                       <th>Jumlah Unit</th>
                       <th>Harga Satuan</th>
                       <th>Total</th>
                      </tr>
                     </thead>
                    <tbody>
                        <tr>
                         <td>Mesin gilinng kedelai</td>
                         <td>1 Unit</td>
                         <td>5.000.000</td>
                         <td>5.000.000</td>
                        </tr>
                        <tr>
                          <td>Tahang Jati</td>
                         <td>4 Unit</td>
                         <td>1.000.000</td>
                         <td>4.000.000</td>
                        </tr>
                        <tr>
                          <td>Tampir bambu</td>
                         <td>15 Unit</td>
                         <td>30.000</td>
                         <td>450.000</td>
                        </tr>    
                        <tr>
                          <td>Kepala kompor gas</td>
                         <td>1 Unit</td>
                         <td>500.000</td>
                         <td>500.000</td>
                        </tr>   
                        <tr>
                          <td>Papan cetakan tahu</td>
                         <td>25 Unit</td>
                         <td>30.000</td>
                         <td>750.000</td>
                        </tr>   
                        <tr>
                          <td>Ayakan</td>
                         <td>5 Unit</td>
                         <td>30.000</td>
                         <td>150.000</td>
                        </tr>   
                        <tr>
                          <td>Saringan tahu</td>
                         <td>5 Unit</td>
                         <td>20.000</td>
                         <td>100.000</td>
                        </tr>                     
                    </tbody>                   
                 </table>
                </div>
                <div class="x_title">
                    <h2>Pembelian bahan baku perbulan</h2>
                    <div class="clearfix"></div>
                </div>
                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                     <thead>
                      <tr>
                       <th>Nama Bahan baku</th>
                       <th>Jumlah Kebutuhan</th>
                       <th>Harga Satuan</th>
                       <th>Total</th>
                      </tr>
                     </thead>
                    <tbody>
                        <tr>
                         <td>Kacang kedelai</td>
                         <td>6 ton (6000 Kg)</td>
                         <td>7.500</td>
                         <td>45.000.000</td>
                        </tr>
                        <tr>
                          <td>Tabung gas</td>
                         <td>80 Tabung</td>
                         <td>150.00</td>
                         <td>12.000.000</td>
                        </tr>
                        <tr>
                          <td>Minyak goreng</td>
                         <td>600 Liter</td>
                         <td>-</td>
                         <td>-</td>
                        </tr>                                              
                    </tbody>                   
                 </table>
               </div>
               <div class="x_title">
                    <h2>Biaya operasional perbulan</h2>
                    <div class="clearfix"></div>
                </div>
                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                     <thead>
                      <tr>
                       <th>Nama Bahan baku</th>
                       <th>Harga Satuan</th>
                       <th>Total</th>
                      </tr>
                     </thead>
                    <tbody>
                        <tr>
                         <td>Biaya listrik</td>
                         <td>200.000</td>
                         <td>200.000</td>
                        </tr>
                        <tr>
                          <td>Biaya air</td>
                         <td>300.000</td>
                         <td>300.000</td>
                        </tr>
                        <tr>
                          <td>Gaji karyawan</td>
                         <td colspan="2"></td>
                        </tr> 
                        <tr>
                          <td>3 Orang bagian pemasaran</td>
                         <td>1.500.000</td>
                         <td>4.500.000</td>
                        </tr> 
                        <tr>
                          <td>3 orang bagin produksi</td>
                         <td>2.500.000</td>
                         <td>7.500.000</td>
                        </tr> 
                        <tr>
                          <td colspan="2">Total</td>
                         <td>12.500.000</td>
                        </tr>                                              
                    </tbody>                   
                 </table>
               </div>

              </div>
            </div>
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
