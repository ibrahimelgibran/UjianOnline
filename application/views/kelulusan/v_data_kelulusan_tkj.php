<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">       
  
<div><?php echo $this->session->flashdata('msg'); ?><div>
  <br>
          <h2>Data Kelulusan</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Total nilai</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
              <?php if (empty($lulus)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($lulus as $rownilailulus) {
                            $no++;
            ?> 
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $rownilailulus->nisn ?></td>
                  <td><?php echo $rownilailulus->nama ?></td>
                  <td><?php echo $rownilailulus->jurusan ?></td>
                  <td><?php echo $rownilailulus->total ?></td>
                  <td><?php if($rownilailulus->total>66) {
                    echo "Lulus";
                  }else {
                    echo "Tidak Lulus";
                  }
                    ?></td>
                </tr>
                <?php }} ?>
              </tbody>
            </table>
            </div>
          </div>
        </main>
      </div>
    </div>
  
   <?php $this->load->view('sniphets/footer')?>