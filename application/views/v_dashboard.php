<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div><?php echo $this->session->flashdata('msg'); ?><div>
        <div class="jumbotron">
        
  <h1 class="display-4">Welcome To PPDB System Smk Muhamadiyah Gamping</h1>
  <p class="lead">Enjoy It.</p>
  
  <hr class="my-4">
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Hai.. <?php echo $this->session->userdata('username')?></a>
  </p>
</div>

        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>