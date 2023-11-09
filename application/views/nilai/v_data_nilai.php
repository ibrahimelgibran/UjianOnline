
<?php $this->load->view('nilai/v_add_nilai_calon_siswa')?>
<?php if ($this->session->userdata('level')=='operator') {?>
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">       
  <div><?php echo $this->session->flashdata('msg'); ?><div>
    <nav class="navbar navbar-light bg-light">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Tambah Nilai
  	</button>
  <form method="GET" action="<?php echo base_url()?>index.php/nilai/" class="form-inline">
    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
	<div class="collapse" id="collapseExample">
  	<div class="card card-body">
 	<form action="<?php echo base_url()?>index.php/nilai/do_insert" method="POST">
 		<label>NISN</label>
        <select class="form-control" name="nisn">
            <option>--Pilih--</option>
            <?php foreach ($siswa as $rowsiswa) {
            ?>
            <option value="<?php echo $rowsiswa->nisn?>"><?php echo $rowsiswa->nisn?></option>
            <?php } ?>
        </select>
 		<label>Matematika</label>
 		<input type="text" class="form-control" name="mtk">
 		<label>Bahasa Indonesia</label>
 		<input type="text" class="form-control" name="indo">
        <label>IPA</label>
 		<input type="text" class="form-control" name="ipa">
 		<label>Inggris</label>
 		<input type="text" class="form-control" name="inggris">
 		<br>
 		<input type="submit" class="btn btn-success" value="Tambah"/>
 	</form>
  	</div>
    
	</div>
  
  <br>
          <h2>Data Nilai</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>IPA</th>
                  <th>Inggris</th>
                  <th>Bahasa Indonesia</th>
                  <th>Matematika</th>
                  <th>Total Nilai</th>
                  <th>Action</th>
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
                  <td><?php echo $rownilai->nama ?></td>
                  <td><?php echo $rownilai->ipa ?></td>
                  <td><?php echo $rownilai->inggris ?></td>
                  <td><?php echo $rownilai->indo ?></td>
                  <td><?php echo $rownilai->mtk ?></td>
                  <td><?php echo $rownilai->total ?></td>
                  <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>index.php/nilai/edit/<?php echo $rownilai->id_nilai ?>"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>index.php/nilai/hapus/<?php echo $rownilai->id_nilai ?>"><i class="fa fa-trash"></i> Delete</a>    
                    </td>
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