<?php if ($this->session->userdata('level')=='calonsiswa') {?>

   
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">       
  <div><?php echo $this->session->flashdata('msg'); ?><div>
  <h2>Form Nilai</h2>
  	<div class="card card-body">
 	<form action="<?php echo base_url()?>index.php/nilai/do_insert" method="POST">
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
          </div>
        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>
                    <?php } ?>