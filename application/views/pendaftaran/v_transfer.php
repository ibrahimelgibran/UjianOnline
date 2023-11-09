
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">       
  <div><?php echo $this->session->flashdata('msg'); ?><div>
   
	<div class="collapse" id="collapseExample">
  	<div class="card card-body">
    <nav class="navbar navbar-light bg-light">
  <form method="GET" action="<?php echo base_url()?>index.php/transferujian/" class="form-inline">
    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
  	</div>
    
	</div>
  
  <br>
          <h2>Data Bukti Transfer</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NISN</th>
                 <th>Nama</th>
                 <th>Bukti Transfer</th>
              
                </tr>
              </thead>
              <tbody>
              <?php if (empty($transfer)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($transfer as $rowtransfer) {
                            $no++;
            ?> 
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $rowtransfer->nisn ?></td>
                  <td><?php echo $rowtransfer->nama ?></td>
                  <?php if($rowtransfer->jenis_transfer=="Tunai"){ ?>
                    <td>Tunai</td>
                  <?php } elseif($rowtransfer->jenis_transfer=="Transfer") {?>
                    <td><img width="200" height="200" src="../../image/<?php echo $rowtransfer->bukti_transfer ?>" </td>
                  <?php } ?>
                </tr>
                <?php }} ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>
