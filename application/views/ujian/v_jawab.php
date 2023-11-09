
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
  <div><?php echo $this->session->flashdata('msg'); ?><div>

<h2>Hasil Ujian</h2>
  	<div class="card card-body">

<form>
<?php 
echo "Jawaban Benar ".$benar."<br>";
echo "Jawaban Salah ".$salah."<br>";
echo "Jawaban Kosong ".$kosong."<br>";
echo "Score ".$score."<br>";
?>
</form>



  	</div>
    
	</div>
  

          </div>
        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>
             