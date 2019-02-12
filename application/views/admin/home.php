           <!-- /top tiles -->
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Data Bahan Baku</h3>        
                    <div class="clearfix"></div>               
                  </div>                
                  <div class="x_content">
                      <?php 

                      if ($this->session->flashdata('delete_berhasil') == 'Berhasil') {
                         $message = "<div class='alert alert-success' role='alert'>
                                            <strong>Data berhasil dihapus </strong>
                                            <a href='' class='close' data-dismiss='alert' aria-label='Close'>x</a>
                                          </div>";;
                        echo $message;
                      } else if ($this->session->flashdata('delete_gagal') == 'Gagal' ){
                         $message = "<div class='alert alert-danger' role='alert'>
                                            <strong>Data gagal dihapus semua</strong>
                                            <a href='' class='close' data-dismiss='alert' aria-label='Close'>x</a>
                                          </div>";;
                        echo $message;
                      } else if ($this->session->flashdata('simpan_ramalan') == 'Berhasil') {
                        $message = "<div class='alert alert-success' role='alert'>
                                            <strong>Data berhasil disimpan</strong>
                                            <a href='' class='close' data-dismiss='alert' aria-label='Close'>x</a>
                                          </div>";;
                        echo $message;
                      } else if ($this->session->flashdata('simpan_ramalan') == 'Gagal') {
                         $message = "<div class='alert alert-danger' role='alert'>
                                            <strong>Data gagal disimpan</strong>
                                            <a href='' class='close' data-dismiss='alert' aria-label='Close'>x</a>
                                          </div>";;
                        echo $message;
                      } else if ($this->session->flashdata('delete_semua') == 'Berhasil') {
                        $message = "<div class='alert alert-success' role='alert'>
                                            <strong>Data berhasil dihapus semua</strong>
                                            <a href='' class='close' data-dismiss='alert' aria-label='Close'>x</a>
                                          </div>";;
                        echo $message;
                      } else if ($this->session->flashdata('backup_berhasil') == 'Berhasil' ){
                         $message = "<div class='alert alert-success' role='alert'>
                                            <strong>Data berhasil ditambahkan semua</strong>
                                            <a href='' class='close' data-dismiss='alert' aria-label='Close'>x</a>
                                          </div>";;
                        echo $message;
                      } else if ($this->session->flashdata('backup_gagal') == 'Gagal' ){
                         $message = "<div class='alert alert-success' role='alert'>
                                            <strong>Data gagal ditambahkan </strong>
                                            <a href='' class='close' data-dismiss='alert' aria-label='Close'>x</a>
                                          </div>";;
                        echo $message;
                      } 
                    ?>
                    <?php echo anchor('Control_Bahanbaku/insert_page','Tambah', 'class="btn btn-success"'); ?>
                    <?php echo anchor('Control_Bahanbaku/insert_page2','Tambah Peramalan ', 'class="btn btn-success"'); ?>                    
                    <hr>
                    <form action="<?php echo site_url('Control_Bahanbaku/delete_multiple');?>" method="post">
                    <select name="action">
                      <option value="null">--Pilih Aksi--</option>
                      <option value="delete">Hapus</option>
                    </select>
                    <input type="submit" name="submit" value="Action" class="btn btn-danger" onClick="return konfirmasi()">
                    <hr>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" >
                        <thead>
                          <tr class="headings">
                            <th class='column-title'></th>
                            <th class='column-title'>Tahun</th>
            						    <th class='column-title'>Bulan</th>
            						    <th class='column-title'>Data Bahan Baku</th>
            						    <th class='column-title'>Data Hasil Peramalan</th>                            
                            <th class='column-title'>Persentase Error</th>
                            <th class='column-title'>Selisih data aktual ^2</th>
            						    <th class='column-title'>Kontrol</th>                     
                          </tr>
                        </thead>
                        <?php
                        foreach ($bahan as $a)
						{
                        ?>
                        <tbody>
                          <tr class="odd pointer">
                            <td><input type="checkbox" name="checklist[]" value="<?php echo  $a->id ; ?>"></td>
                            <td class=" "><?php echo  $a->tahun ; ?></td>
                            <td class=" "><?php echo bulan($a->bulan) ; ?></td>
                            <td class=" "><?php echo  $a->data_rill ; ?></td>                            
                            <td class=""><?php echo  number_format($a->data_peramalan,2,",",".") ; ?></td>                            
                            <td class=" "><?php echo  number_format($a->mape,2,",",".") ; ?></td> 
                            <td class=" "><?php echo  number_format($a->mse,2,",",".") ; ?></td> 
                            <td class=" last"><i class="fa fa-close"><?php $js = 'onClick="return konfirmasi()"'; echo anchor('Control_Bahanbaku/delete/'.$a->id,'Hapus', $js); ?> <!-- <i class="fa fa-wrench"></i><?php echo anchor('Control_Bahanbaku/edit_page/'.$a->id,'Ubah'); ?> |  -->
                            </td>
                          </tr>                          
                        </tbody>
                        <?php
                    		
                    	}
                        ?>
                      </table>
                      <input type="button" name="Check_All" value="Check All" onClick="CheckAll();">
                      <input type="button" name="Un_CheckAll" value="Uncheck All" onClick="UnCheckAll();">


                      </form>
                      <br>
                      <br>
                      <hr>               
                    </div>								
                  </div>
                </div>
              </div>                  	              
          </div>

      

