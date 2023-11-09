
<?php if (($jurusan=="TKJ") || ($nisnn<0)) {?>

    <?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<h2>Ujian Online  </h2>
  	<div class="card card-body">
      <div><?php echo $this->session->flashdata('msg'); ?><div>
     

<?php

echo "<div style='width:100%; border: 1px solid #EBEBEB; overflow:scroll;height:700px;'>";
 echo '<table width="100%" border="0">';

        $urut=0;
        foreach ($ujian as $row) {
            //$no++;
            $id=$row->id_soal;
            $pertanyaan=$row->soal;
            $pilihan_a=$row->a;
            $pilihan_b=$row->b;
            $pilihan_c=$row->c;
            $pilihan_d=$row->d; 
            
            ?>
            <form name="form1" method="post" action="<?php echo base_url()?>index.php/ujian/jawab/">
            <input type="hidden" name="id[]" value=<?php echo $id; ?>>
            <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
            <tr>
                  <td width="17"><font color="#000000"><?php echo $urut=$urut+1; ?></font></td>
                  <td width="430"><font color="#000000"><?php echo "$pertanyaan"; ?></font></td>
            </tr>
            <?php
                if (!empty($row->gambar)) {
                    echo "<tr><td></td><td><img src='foto/$row->gambar' width='200' hight='200'></td></tr>";
                }
            ?>
            <tr>
                  <td height="21"><font color="#000000">&nbsp;</font></td>
                <td><font color="#000000">
               A.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
                <?php echo "$pilihan_a";?></font> </td>
            </tr>
            <tr>
                  <td><font color="#000000">&nbsp;</font></td>
                <td><font color="#000000">
               B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
                <?php echo "$pilihan_b";?></font> </td>
            </tr>
            <tr>
                  <td><font color="#000000">&nbsp;</font></td>
                <td><font color="#000000">
              C.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> 
                <?php echo "$pilihan_c";?></font> </td>
            </tr>
            <tr>
                <td><font color="#000000">&nbsp;</font></td>
                <td><font color="#000000">
              D.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> 
                <?php echo "$pilihan_d";?></font> </td>
            </tr>
            
        <?php
        }
        
        ?>
            <tr>
                <td>&nbsp;</td>
                  <td><input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
            </tr>
            </table>
</form>
        </p>
</div>

  	</div>
    
	</div>
  

          </div>
        </main>
      </div>
    </div>

   <?php $this->load->view('sniphets/footer')?>


<?php } elseif ($jurusan=="Multimedia") {?>
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<h2>Ujian Online <span id="countdown">3600</span></h2>
  <div class="card card-body">
 
<?php

echo "<div style='width:100%; border: 1px solid #EBEBEB; overflow:scroll;height:700px;'>";
echo '<table width="100%" border="0">';

    $urut1=0;
    foreach ($ujian1 as $row) {
        //$no++;
        $id1=$row->id_soal;
        $pertanyaan1=$row->soal;
        $pilihan_a1=$row->a;
        $pilihan_b1=$row->b;
        $pilihan_c1=$row->c;
        $pilihan_d1=$row->d; 
        
        ?>
        <form name="form1" method="post" action="<?php echo base_url()?>index.php/ujian/jawab_multimedia/">
        <input type="hidden" name="id[]" value=<?php echo $id1; ?>>
        <input type="hidden" name="jumlah" value=<?php echo $jumlah1; ?>>
        <tr>
              <td width="17"><font color="#000000"><?php echo $urut1=$urut1+1; ?></font></td>
              <td width="430"><font color="#000000"><?php echo "$pertanyaan1"; ?></font></td>
        </tr>
        <?php
            if (!empty($row->gambar)) {
                echo "<tr><td></td><td><img src='foto/$row->gambar' width='200' hight='200'></td></tr>";
            }
        ?>
        <tr>
              <td height="21"><font color="#000000">&nbsp;</font></td>
            <td><font color="#000000">
           A.  <input name="pilihan[<?php echo $id1; ?>]" type="radio" value="A"> 
            <?php echo "$pilihan_a1";?></font> </td>
        </tr>
        <tr>
              <td><font color="#000000">&nbsp;</font></td>
            <td><font color="#000000">
           B. <input name="pilihan[<?php echo $id1; ?>]" type="radio" value="B"> 
            <?php echo "$pilihan_b1";?></font> </td>
        </tr>
        <tr>
              <td><font color="#000000">&nbsp;</font></td>
            <td><font color="#000000">
          C.  <input name="pilihan[<?php echo $id1; ?>]" type="radio" value="C"> 
            <?php echo "$pilihan_c1";?></font> </td>
        </tr>
        <tr>
            <td><font color="#000000">&nbsp;</font></td>
            <td><font color="#000000">
          D.   <input name="pilihan[<?php echo $id1; ?>]" type="radio" value="D"> 
            <?php echo "$pilihan_d1";?></font> </td>
        </tr>
        
    <?php
    }
    
    ?>
        <tr>
            <td>&nbsp;</td>
              <td><input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
        </tr>
        </table>
</form>
    </p>
</div>

  </div>

</div>


<?php } elseif ($jurusan=="Akuntansi") {?>
<?php $this->load->view('sniphets/header')?>
<?php $this->load->view('sniphets/menu')?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
<h2>Ujian Online </h2>
  <div class="card card-body">
 
<?php

echo "<div style='width:100%; border: 1px solid #EBEBEB; overflow:scroll;height:700px;'>";
echo '<table width="100%" border="0">';

    $urut2=0;
    foreach ($ujian2 as $row) {
        //$no++;
        $id2=$row->id_soal;
        $pertanyaan2=$row->soal;
        $pilihan_a2=$row->a;
        $pilihan_b2=$row->b;
        $pilihan_c2=$row->c;
        $pilihan_d2=$row->d; 
        
        ?>
        <form name="form1" method="post" action="<?php echo base_url()?>index.php/ujian/jawab_akuntansi/">
        <input type="hidden" name="id[]" value=<?php echo $id2; ?>>
        <input type="hidden" name="jumlah" value=<?php echo $jumlah2; ?>>
        <tr>
              <td width="17"><font color="#000000"><?php echo $urut2=$urut2+1; ?></font></td>
              <td width="430"><font color="#000000"><?php echo "$pertanyaan2"; ?></font></td>
        </tr>
        <?php
            if (!empty($row->gambar)) {
                echo "<tr><td></td><td><img src='foto/$row->gambar' width='200' hight='200'></td></tr>";
            }
        ?>
        <tr>
              <td height="21"><font color="#000000">&nbsp;</font></td>
            <td><font color="#000000">
           A.  <input name="pilihan[<?php echo $id2; ?>]" type="radio" value="A"> 
            <?php echo "$pilihan_a2";?></font> </td>
        </tr>
        <tr>
              <td><font color="#000000">&nbsp;</font></td>
            <td><font color="#000000">
           B. <input name="pilihan[<?php echo $id2; ?>]" type="radio" value="B"> 
            <?php echo "$pilihan_b2";?></font> </td>
        </tr>
        <tr>
              <td><font color="#000000">&nbsp;</font></td>
            <td><font color="#000000">
          C.  <input name="pilihan[<?php echo $id2; ?>]" type="radio" value="C"> 
            <?php echo "$pilihan_c2";?></font> </td>
        </tr>
        <tr>
            <td><font color="#000000">&nbsp;</font></td>
            <td><font color="#000000">
          D.   <input name="pilihan[<?php echo $id2; ?>]" type="radio" value="D"> 
            <?php echo "$pilihan_d2";?></font> </td>
        </tr>
        
    <?php
    }
    
    ?>
        <tr>
            <td>&nbsp;</td>
              <td><input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
        </tr>
        </table>
</form>
    </p>
</div>

  </div>

</div>



















      </div>
    </main>
  </div>
</div>
</div>
<?php $this->load->view('sniphets/footer')?>
<?php } ?>
