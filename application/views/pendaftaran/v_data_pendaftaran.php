
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
  <div><?php echo $this->session->flashdata('msg'); ?><div>

    <nav class="navbar navbar-light bg-light">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Tambah Pendaftar
  	</button>
  <form method="GET" action="<?php echo base_url()?>index.php/pendaftaran/" class="form-inline">
    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
	<div class="collapse" id="collapseExample">
  	<div class="card card-body">
    <?php echo form_open_multipart('pendaftaran/do_insert');?>
 		<label>NISN</label>
 		<input type="text" class="form-control" name="nisn">
 		<label>Nama</label>
     <input type="text" class="form-control" name="nama">
     <label>Foto</label>
		 <input class="form-control" name="foto" type="file" >
     <span>max 2mb</span>
     <br>
     <label>Jurusan</label> 
     <select name="jurusan" class="form-control">
      <option value="Multimedia">Multimedia</option>
      <option value="TKJ">TKJ</option>
      <option value="Akuntansi">Akuntansi</option>
    </select>
     <label>Alamat</label>
     <input type="text" class="form-control" name="alamat">
     <label>Asal Sekolah</label>
     <input type="text" class="form-control" name="asal_sekolah">
     <label>Telepon</label>
     <input type="text" class="form-control" name="telepon">
     <label>Orang Tua</label>
 		 <input type="text" class="form-control" name="orangtua">
    <label>Pembayaran</label><br>
    <input type="radio" name="jenis_transfer" value="Tunai"/><b>Tunai</b>
    <input type="radio" name="jenis_transfer" value="Transfer"/><b>Transfer</b>
    <br><br>
    <label>Bukti Transfer</label>
		 <input class="form-control" name="bukti_transfer" type="file" >
     <span>max 2mb</span>
     <br>
    <label>Ijazah Depan</label>
		 <input class="form-control" name="ijazah_depan" type="file" >
     <span>max 2mb</span>
     <br>
     <label>Ijazah Belakang</label>
		 <input class="form-control" name="ijazah_belakang" type="file" >
     <span>max 2mb</span>
 		<br>	
 		<input type="submit" class="btn btn-success" name="submit" value="Tambah"/>
 <?php echo form_close()?>
  	</div>
    
	</div>
  
  <br>
          <h2>Data Pendaftar</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Alamat</th>
                  <th>Asal Sekolah</th>
                  <th>Telepon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php if (empty($pendaftaran)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($pendaftaran as $rowpendaftaran) {
                            $no++;
            ?> 
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $rowpendaftaran->nisn ?></td>
                  <td><?php echo $rowpendaftaran->nama ?></td>
                  <td><?php echo $rowpendaftaran->jurusan ?></td>
                  <td><?php echo $rowpendaftaran->alamat ?></td>
                  <td><?php echo $rowpendaftaran->asal_sekolah ?></td>
                  <td><?php echo $rowpendaftaran->telepon ?></td>
                  <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>index.php/pendaftaran/edit/<?php echo $rowpendaftaran->id_siswa ?>"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>index.php/pendaftaran/hapus/<?php echo $rowpendaftaran->id_siswa ?>"><i class="fa fa-trash"></i> Delete</a>    
                    
                    <a class="btn btn-sm btn-info" href="<?php echo base_url() ?>pendaftaran/detail/<?php echo $rowpendaftaran->id_siswa ?>"><i class="fa fa-info-circle"></i> Details</a>
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
                  