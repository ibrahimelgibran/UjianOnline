<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {
  
    public function index1(){
        $this->load->view('ujian/token');
    }

    public function habis() {
       $this->load->view('ujian/v_sudah_ujian');
    }
    public function index(){
    $usernamecalonsiswa=$this->session->userdata('username');
    $querynisn=$this->db->query("select * from siswa where username='$usernamecalonsiswa'")->result();
    foreach ($querynisn as $rownisn){
        $nisn=$rownisn->nisn;
        $jurusan=$rownisn->jurusan;
    }
    $querynisn2=$this->db->query("select * from siswa where username='$usernamecalonsiswa'");
   $nisnn=$querynisn2->num_rows();

    
    
    

      $data['nisnn']=$nisnn;
      if ($nisnn>0){
    $data['jurusan']=$jurusan;
}
else{$data['jurusan']="TKJ";}
    //if ($nisn1>0){
    //$data['jumlahnisn']=$ujian;
//}

//    $data['nisn1']=$nisn1;

    $data['ujian']=$this->db->query("select * from tbl_soal WHERE jurusan='TKJ' and aktif='Y' ORDER BY RAND ()")->result();
    $data['hasil']=$this->db->query("select * from tbl_soal WHERE jurusan='TKJ' and aktif='Y' ORDER BY RAND ()");
    $data['jumlah']= $data['hasil']->num_rows();

    $data['ujian1']=$this->db->query("select * from tbl_soal WHERE jurusan='Multimedia' and aktif='Y' ORDER BY RAND ()")->result();
    $data['hasil1']=$this->db->query("select * from tbl_soal WHERE  jurusan='Multimedia' and aktif='Y' ORDER BY RAND ()");
    $data['jumlah1']= $data['hasil1']->num_rows();

    $data['ujian2']=$this->db->query("select * from tbl_soal WHERE jurusan='Akuntansi' and aktif='Y' ORDER BY RAND ()")->result();
    $data['hasil2']=$this->db->query("select * from tbl_soal WHERE jurusan='Akuntansi' and aktif='Y' ORDER BY RAND ()");
    $data['jumlah2']= $data['hasil2']->num_rows();

        $this->load->view('ujian/v_ujian', $data);
      }

    public function jawab(){
       if(isset($_POST['submit'])){
       

            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $query=$this->db->query("select * from tbl_soal where id_soal='$nomor' and knc_jawaban='$jawaban'");
                    
                    $cek=$query->num_rows();
                    
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                
                $result=$this->db->query("select * from tbl_soal WHERE aktif='Y'");
                $jumlah_soal=$result->num_rows();
                $score = 100/$jumlah_soal*$benar;
                $hasil = number_format($score,1);
            }
        }
        $usernamecalonsiswa=$this->session->userdata('username');
        $querynisn=$this->db->query("select * from siswa where username='$usernamecalonsiswa'")->result();
        foreach ($querynisn as $rownisn){
            $nisn=$rownisn->nisn;
        }

     
        // Pastikan $nisn didefinisikan sebelum digunakan
        $nisn = "nilai_nisn_yang_anda_inginkan"; // Ganti dengan nilai yang sesuai
        
        // Selanjutnya, jalankan query database dengan variabel yang sudah didefinisikan
        $querynilai = $this->db->query("select * from nilai where nisn='$nisn'")->result();

        
        foreach ($querynilai as $nilai)
        {
            $ipa=$nilai->ipa;
            $indo=$nilai->indo;
            $inggris=$nilai->inggris;
            $mtk=$nilai->mtk;
            $total=$nilai->total;
        }

     //   $nisncalon=$this->db->query("select ujian from  nilai where nisn='$nisn'");
       // $ceknisn = $nisncalon->num_rows();

        

       
        //if ($ceknisn>0) {
          //  $this->session->set_flashdata('msg', 
            //'<div class="alert alert-danger">
              //  <h4>Anda Sudah Input Nilai</h4>
      //      </div>');  
//redirect('ujian');
  //      }
    //    else {
        $nilaiujian=0;
        $querytotal=$this->db->query("select ujian from ujian where nisn='$nisn'")->result();
        foreach ($querytotal as $rowtotal)
        {
            $nilaiujian=$rowtotal->ujian;
        }
        $score=$score*40/100;
        $total = 0; // Inisialisasi $total dengan nilai awal 0 atau sesuai dengan kebutuhan

        // Selanjutnya, lakukan operasi penambahan
        $total = $total + $score; // Gantilah $score dengan nilai yang sesuai
        $data_ujian = array(
            'nisn' => $nisn,
            'ujian' => $score,
           // 'total' => $total,

        );
        $data = array(
            //'ujian' => $score,
            'total' => $total,

        );
        $where = array(
            'nisn' => $nisn
        );

        $query=$this->db->query("select * from ujian where nisn='$nisn'");
         $cekujian=$query->num_rows();
        if ($cekujian>0){
            $this->load->view('ujian/v_sudah_ujian');
        }
        else {
            $this->m_crud->insert_data($data_ujian,'ujian');
        $this->m_crud->update_data($where,$data,'nilai');
        $data['score']=$score;
        $data['benar']=$benar;
        $data['salah']=$salah;
        $data['kosong']=$kosong;
        $this->load->view('ujian/v_jawab',$data);//}
        //Lakukan Penyimpanan Kedalam Database
      
    }
}

    public function jawab_multimedia(){
        if(isset($_POST['submit'])){
        
 
             $pilihan=$_POST["pilihan"];
             $id_soal=$_POST["id"];
             $jumlah=$_POST['jumlah'];
             
             $score=0;
             $benar=0;
             $salah=0;
             $kosong=0;
             
             for ($i=0;$i<$jumlah;$i++){
                 //id nomor soal
                 $nomor=$id_soal[$i];
                 
                 //jika user tidak memilih jawaban
                 if (empty($pilihan[$nomor])){
                     $kosong++;
                 }else{
                     //jawaban dari user
                     $jawaban=$pilihan[$nomor];
                     
                     //cocokan jawaban user dengan jawaban di database
                     $query=$this->db->query("select * from tbl_soal where id_soal='$nomor' and knc_jawaban='$jawaban'");
                     
                     $cek=$query->num_rows();
                     
                     if($cek){
                         //jika jawaban cocok (benar)
                         $benar++;
                     }else{
                         //jika salah
                         $salah++;
                     }
                     
                 } 
                 /*RUMUS
                 Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                 hasil= 100 / jumlah soal * jawaban yang benar
                 */
                 
                 $result=$this->db->query("select * from tbl_soal WHERE aktif='Y'");
                 $jumlah_soal=$result->num_rows();
                 $score = 100/$jumlah_soal*$benar;
                 $hasil = number_format($score,1);
             }
         }
         $usernamecalonsiswa=$this->session->userdata('username');
         $querynisn=$this->db->query("select * from siswa where username='$usernamecalonsiswa'")->result();
         foreach ($querynisn as $rownisn){
             $nisn=$rownisn->nisn;
         }

         $query=$this->db->query("select * from ujian where nisn='$nisn'");
         $cekujian=$query->num_rows();


         $querynilai=$this->db->query("select * from nilai where nisn='$nisn'")->result();
        foreach ($querynilai as $nilai)
        {
            $ipa=$nilai->ipa;
            $indo=$nilai->indo;
            $inggris=$nilai->inggris;
            $mtk=$nilai->mtk;
            $total=$nilai->total;
        }
        $score=$score*40/100;
        $total=$total+$score;
         $data = array(
             //'ujian' => $score,
             'total' => $total,
 
         );

         $data_ujian = array(
            'nisn' => $nisn,
            'ujian' => $score,
           // 'total' => $total,

        );
         $where = array(
             'nisn' => $nisn
         );


         $nilaiujian=0;
         $querytotal=$this->db->query("select ujian from ujian where nisn='$nisn'")->result();
         foreach ($querytotal as $rowtotal)
         {
             $nilaiujian=$rowtotal->ujian;
         }
 
         if ($cekujian>0){
             $this->load->view('ujian/v_sudah_ujian');
         }
         else {
             
         $this->m_crud->insert_data($data_ujian,'ujian');
         $this->m_crud->update_data($where,$data,'nilai');
         $data['score']=$score;
         $data['benar']=$benar;
         $data['salah']=$salah;
         $data['kosong']=$kosong;
         $this->load->view('ujian/v_jawab',$data);
         //Lakukan Penyimpanan Kedalam Database
         
        }
       
     }

     public function jawab_akuntansi(){
        if(isset($_POST['submit'])){
        
 
             $pilihan=$_POST["pilihan"];
             $id_soal=$_POST["id"];
             $jumlah=$_POST['jumlah'];
             
             $score=0;
             $benar=0;
             $salah=0;
             $kosong=0;
             
             for ($i=0;$i<$jumlah;$i++){
                 //id nomor soal
                 $nomor=$id_soal[$i];
                 
                 //jika user tidak memilih jawaban
                 if (empty($pilihan[$nomor])){
                     $kosong++;
                 }else{
                     //jawaban dari user
                     $jawaban=$pilihan[$nomor];
                     
                     //cocokan jawaban user dengan jawaban di database
                     $query=$this->db->query("select * from tbl_soal where id_soal='$nomor' and knc_jawaban='$jawaban'");
                     
                     $cek=$query->num_rows();
                     
                     if($cek){
                         //jika jawaban cocok (benar)
                         $benar++;
                     }else{
                         //jika salah
                         $salah++;
                     }
                     
                 } 
                 /*RUMUS
                 Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                 hasil= 100 / jumlah soal * jawaban yang benar
                 */
                 
                 $result=$this->db->query("select * from tbl_soal WHERE aktif='Y'");
                 $jumlah_soal=$result->num_rows();
                 $score = 100/$jumlah_soal*$benar;
                 $hasil = number_format($score,1);
             }
         }
         $usernamecalonsiswa=$this->session->userdata('username');
         $querynisn=$this->db->query("select * from siswa where username='$usernamecalonsiswa'")->result();
         foreach ($querynisn as $rownisn){
             $nisn=$rownisn->nisn;
         }
         $querynilai=$this->db->query("select * from nilai where nisn='$nisn'")->result();
        foreach ($querynilai as $nilai)
        {
            $ipa=$nilai->ipa;
            $indo=$nilai->indo;
            $inggris=$nilai->inggris;
            $mtk=$nilai->mtk;
            $total=$nilai->total;
        }
        $score=$score*40/100;
        $total=$total+$score;
         $data = array(
            // 'ujian' => $score,
             'total' => $total,
 
         );
         $where = array(
             'nisn' => $nisn
         );
         $nilaiujian=0;
         $querytotal=$this->db->query("select ujian from ujian where nisn='$nisn'")->result();
         foreach ($querytotal as $rowtotal)
         {
             $nilaiujian=$rowtotal->ujian;
         }
         $data_ujian = array(
             'nisn' => $nisn,
             'ujian' => $score,
            // 'total' => $total,
 
         );
 
         $query=$this->db->query("select * from ujian where nisn='$nisn'");
          $cekujian=$query->num_rows();
         if ($cekujian>0){
             $this->load->view('ujian/v_sudah_ujian');
         }
         else {
             $this->m_crud->insert_data($data_ujian,'ujian');
         $this->m_crud->update_data($where,$data,'nilai');
         $data['score']=$score;
         $data['benar']=$benar;
         $data['salah']=$salah;
         $data['kosong']=$kosong;
         $this->load->view('ujian/v_jawab',$data);
         //Lakukan Penyimpanan Kedalam Database
         }
       
     }

     public function token() {
         $token=$this->input->post('token');
         $gettoken=$this->db->query("select * from token where token='$token'");
         $gettoken1=$gettoken->num_rows();
         $usernamecalonsiswa=$this->session->userdata('username');
    $querynisn=$this->db->query("select * from siswa where username='$usernamecalonsiswa'")->result();
    foreach ($querynisn as $rownisn){
        $nisn=$rownisn->nisn;
    }
         $point="1";
       
        

         $data = array(
            'point' => $point,
        );
        $where = array(
            'nisn' => $nisn 
               );
     
        
 
         if ($gettoken1 < 0)
               {
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Token anda Salah</h4>
            </div>');  
redirect('ujian/index1');
         }
         else {
             redirect ('ujian');
         }
     }

   
}