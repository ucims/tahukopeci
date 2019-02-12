<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url();?>asset/img/logo.png" type="image/ico" />
    <script>
      function konfirmasi()
    {
      tanya = confirm("Anda Yakin Akan Menghapus Data ?");
      if (tanya == true) return true;
      else return false;
    };
    </script>

    <title>User</title>

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
          <!-- top tiles -->           
          <!-- /top tiles -->
          <div class="row">           
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Data User</h3>        
                    <div class="clearfix"></div>                    
                  </div>

                  <div class="x_content">
                    <?php echo anchor('Control_User/insert_page','Tambah', 'class="btn btn-success"'); ?>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class='column-title'>Id User</th>
                            <th class='column-title'>Username</th>
                            <th class='column-title'>Full Name</th>
                            <th class='column-title'>Password</th>
                            <th class='column-title'>Level</th>
                            <th class='column-title'>Kontrol</th>                           
                          </tr>
                        </thead>
                        <?php
                        foreach ($user as $a)
            {
                        ?>
                        <tbody>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <?php echo  $a->id_user ; ?>
                            </td>
                            <td class=" "><?php echo  $a->username ; ?></td>
                            <td class=" "><?php echo  $a->fullname ; ?></td>
                            <td class=" "><?php echo  $a->password ; ?></td>                            
                            <td class="a-right a-right "><?php echo  $a->level ; ?></td>
                            <td class=" last"><i class="fa fa-wrench"></i><?php echo anchor('Control_user/edit_page/'.$a->id_user,'Ubah'); ?> | <i class="fa fa-close"><?php $js = 'onClick="return konfirmasi()"'; echo anchor('Control_User/delete/'.$a->id_user,'Hapus', $js); ?>
                            </td>
                          </tr>                          
                        </tbody>
                        <?php
                        
                      }
                        ?>
                      </table>
                    </div>            
                  </div>
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

