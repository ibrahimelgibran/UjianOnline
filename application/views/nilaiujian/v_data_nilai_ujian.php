
<?php $this->load->view('nilai/v_add_nilai_calon_siswa')?>
<?php if ($this->session->userdata('level')=='operator') {?>
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">       
  <div><?php echo $this->session->flashdata('msg'); ?><div>
   
	<div class="collapse" id="collapseExample">
  	<div class="card card-body">
    <nav class="navbar navbar-light bg-light">
  <form method="GET" action="<?php echo base_url()?>index.php/nilaiujian/" class="form-inline">
    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
  	</div>
    
	</div>
  
  <br>
          <h2>Data Nilai Ujian</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NISN</th>
                 <th>Nilai Ujian</th>
              
                </tr>
              </thead>
              <tbody>
              <?php if (empty($nilai)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($nilai as $rownilai) {
                            $no++;
            ?> 
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $rownilai->nisn ?></td>
                  <td><?php echo $rownilai->ujian ?></td>
            
                </tr>
                <?php }} ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>
<?php } ?>