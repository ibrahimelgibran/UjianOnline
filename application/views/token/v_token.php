
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">       
  <div><?php echo $this->session->flashdata('msg'); ?><div>
    <nav class="navbar navbar-light bg-light">

  <?php 
  $token1="";
  foreach ($token as $rowtoken)
  {
      $token1=$rowtoken->token;
  }
  
  if (is_null($token1))
  {
      echo "Anda Belum Punya Token";
  }
  else 
  {
      echo "Token Anda Adalah";
      echo "<br>";
      echo $token1;
  }
  ?>
  



          </div>
        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>
