<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
<?php foreach ($pendaftaran as $roweditpendaftaran) {
    $nama=$roweditpendaftaran->nama;
	$alamat=$roweditpendaftaran->alamat;
	$asal_sekolah=$roweditpendaftaran->asal_sekolah;
	$telepon=$roweditpendaftaran->telepon;
	$orangtua=$roweditpendaftaran->orangtua;
    $id=$roweditpendaftaran->id_siswa;

}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
<form action="<?php echo base_url()?>index.php/pendaftaran/update" method="POST">
 		<label>NISN</label>
         <input type="hidden" value="<?php echo $id?>" class="form-control" name="id">
 		<input type="text" class="form-control" value="<?php echo $roweditpendaftaran->nisn?>" name="nisn">
 		<label>Nama</label>
 		<input type="text" class="form-control" value="<?php echo $roweditpendaftaran->nama?>" name="nama">
 		<label>Jurusan</label> 
     <select name="jurusan" class="form-control">
      <option value="Multimedia">Multimedia</option>
      <option value="TKJ">TKJ</option>
    </select>
     <label>Alamat</label>
     <input type="text" class="form-control" value="<?php echo $roweditpendaftaran->alamat?>" name="alamat">
     <label>Asal Sekolah</label>
     <input type="text" class="form-control" value="<?php echo $roweditpendaftaran->asal_sekolah?>" name="asal_sekolah">
     <label>Telepon</label>
     <input type="text" value="<?php echo $roweditpendaftaran->telepon?>" class="form-control" name="telepon">
     <label>Orang Tua</label>
 		<input type="text" value="<?php echo $roweditpendaftaran->orangtua?>" class="form-control" name="orangtua">
 		<br>
 		<input type="submit" class="btn btn-success" value="Submit"/>
 	</form>
    </div>

   <?php $this->load->view('sniphets/footer')?>