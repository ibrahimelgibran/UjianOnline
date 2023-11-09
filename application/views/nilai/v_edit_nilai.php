<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
<?php foreach ($nilai as $roweditnilai) {
    $indo=$roweditnilai->indo;
    $ipa=$roweditnilai->ipa;
    $inggris=$roweditnilai->inggris;
    $mtk=$roweditnilai->mtk;
    $id=$roweditnilai->id_nilai;
    $nisn=$roweditnilai->nisn;
}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
<form action="<?php echo base_url()?>index.php/nilai/update" method="POST">
        <label>Nisn</label>
 		<input type="text" class="form-control" value="<?php echo $nisn?>" name="nisn" disabled>
        <label>Matematika</label>
        <input type="hidden" class="form-control" name="id" value="<?php echo $id?>">
 		<input type="text" class="form-control" value="<?php echo $mtk?>" name="mtk">
 		<label>Bahasa Indonesia</label>
 		<input type="text" class="form-control" value="<?php echo $indo?>" name="indo">
        <label>IPA</label>
 		<input type="text" class="form-control" value="<?php echo $ipa?>" name="ipa">
 		<label>Inggris</label>
 		<input type="text" class="form-control" value="<?php echo $inggris?>" name="inggris">
 		<br>
 		<input type="submit" class="btn btn-success" value="Submit"/>
 	</form>
    </div>

   <?php $this->load->view('sniphets/footer')?>