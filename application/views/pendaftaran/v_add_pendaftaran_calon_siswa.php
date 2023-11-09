
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
  <div><?php echo $this->session->flashdata('msg'); ?><div>
<h2>Form Pendaftaran</h2>
  	<div class="card card-body">
 	 <?php echo form_open_multipart('pendaftaran1/do_insert');?>
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
     <label>Ijazah Depan</label>
		 <input class="form-control" name="ijazah_depan" type="file" >
     <span>max 2mb</span>
     <br>
     <label>Ijazah Belakang</label>
		 <input class="form-control" name="ijazah_belakang" type="file" >
     <span>max 2mb</span>
     <br>
     <label>Bukti Transfer</label>
		 <input class="form-control" name="bukti_transfer" type="file" >
     <span>max 2mb</span>
     <br>
 		<br>	
 		<input type="submit" class="btn btn-success" name="submit" value="Tambah"/>
     <?php echo form_close()?>
  	</div>
    
	
          </div>
        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>