<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">      
          <h2>Pilih Jurusan</h2>
          <div class="table-responsive">
          <div style="background-color: #e3f2fd" class="container p-5">
<select class="form-control" id="dynamic_select">
  <option value="" selected>Pilih</option>
  <option value="<?php echo base_url()?>index.php/reports/tkj">TKJ</option>
  <option value="<?php echo base_url()?>index.php/reports/multimedia">Multimedia</option>
  <option value="<?php echo base_url()?>index.php/reports/akuntansi">Akuntansi</option>
</select>
</div>
          </div>
        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>