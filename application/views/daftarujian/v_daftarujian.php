
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
  <div><?php echo $this->session->flashdata('msg'); ?><div>
<h2>Set Token Ujian</h2>
  	<div class="card card-body">
 	 <?php echo form_open_multipart('daftarujian/do_insert');?>
    <label>NISN</label>
        <select class="form-control" name="nisn">
            <option>--Pilih--</option>
            <?php foreach ($daftarujian as $rowsiswa) {
            ?>
            <option value="<?php echo $rowsiswa->nisn?>"><?php echo $rowsiswa->nisn?></option>
            <?php } ?>
        </select>
 		<br>	
 		<input type="submit" class="btn btn-success" name="submit" value="Tambah"/>
     <?php echo form_close()?>
  	</div>
  
    
	
          </div>
        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>