<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
  <div><?php echo $this->session->flashdata('msg'); ?><div>
<h2>Ujian</h2>
<p>Peraturan Ujian</p>
<ul>
<li>Ujian Dilakukan Selama 1 Jam</li>
<li>Jika lebih dari 1 jam tidak akan mendapat nilai</li>
</ul>
  	<div class="card card-body">
 	 <?php echo form_open_multipart('ujian/token');?>
    <label>Masukan Token</label>
     <input type="text" class="form-control" name="token">
 		<br>	
 		<input type="submit" class="btn btn-success" name="submit" value="Submit"/>
     <?php echo form_close()?>
  	</div>