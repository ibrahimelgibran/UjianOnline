<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
  
    public function index(){
	$this->load->view('reports/v_data_reports');
      }

      public function jurusan(){
         $this->load->view('reports/v_data_reports_jurusan');
            }

    public function pendaftar(){
        $pdf = new FPDF('L','mm',array(250,297));
        $pdf->AddPage();
        $pdf->Image('https://lh3.googleusercontent.com/-hgXjkX7F8LY/XT7VWJGrN5I/AAAAAAAAD3M/0lWfKFVWLmU5e9Rro0DqLYiTlsBnH3IuwCLcBGAs/h120/logo.jpeg',20,5,40,20);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'SMK Muhammadiyah Gamping',0,0,'C');
        $pdf->Ln(4);
        $pdf->SetX(103);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Jl. Wates No.Km, RW.6, Depok, Ambarketawang, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55294.');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(4);
        $pdf->SetX(125);
        $pdf->Cell(40,10,'Telp (021) 89143605');
        $pdf->SetFont('Arial','B',8);
        $pdf->Ln(5);
        $pdf->SetLineWidth(0);
        $pdf->Line(0,25,300,25);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'Laporan Data Pendaftar',0,0,'C');
        $pdf->Ln(4);
         //Table
         $pdf->Ln(8);
         $pdf->SetX(50);
         $pdf->SetFont('Arial','',8);
         $pdf->Cell(10,6,'No',1,0);
         $pdf->Cell(30,6,'NISN',1,0);
         $pdf->Cell(30,6,'Nama',1,0);
         $pdf->Cell(40,6,'Orang Tua',1,0);
         $pdf->Cell(30,6,'Telepon',1,0);
         $pdf->Cell(30,6,'Jurusan',1,0);
         $pdf->Cell(50,6,'Alamat',1,1);
         $siswa=$this->db->query("select * from siswa")->result();
         $no=1;
         foreach ($siswa as $rowsiswa){
            $pdf->SetX(50);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(30,6,$rowsiswa->nisn,1,0);
            $pdf->Cell(30,6,$rowsiswa->nama,1,0);
            $pdf->Cell(40,6,$rowsiswa->orangtua,1,0);
            $pdf->Cell(30,6,$rowsiswa->telepon,1,0);
            $pdf->Cell(30,6,$rowsiswa->jurusan,1,0);
            $pdf->Cell(50,6,$rowsiswa->alamat,1,1);  
         }
         $pdf->Output();
      }

      public function nilai(){
        $pdf = new FPDF('L','mm',array(250,297));
        $pdf->AddPage();
        $pdf->Image('https://lh3.googleusercontent.com/-hgXjkX7F8LY/XT7VWJGrN5I/AAAAAAAAD3M/0lWfKFVWLmU5e9Rro0DqLYiTlsBnH3IuwCLcBGAs/h120/logo.jpeg',20,5,40,20);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'SMK Muhammadiyah Gamping',0,0,'C');
        $pdf->Ln(4);
        $pdf->SetX(103);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Jl. Wates No.Km, RW.6, Depok, Ambarketawang, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55294.');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(4);
        $pdf->SetX(125);
        $pdf->Cell(40,10,'Telp (021) 89143605');
        $pdf->SetFont('Arial','B',8);
        $pdf->Ln(5);
        $pdf->SetLineWidth(0);
        $pdf->Line(0,25,300,25);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'Laporan Data Nilai',0,0,'C');
        $pdf->Ln(4);
         //Table
         $pdf->Ln(8);
         $pdf->SetX(40);
         $pdf->SetFont('Arial','',8);
         $pdf->Cell(10,6,'No',1,0);
         $pdf->Cell(30,6,'NISN',1,0);
         $pdf->Cell(30,6,'Nama',1,0);
         $pdf->Cell(30,6,'IPA',1,0);
         $pdf->Cell(30,6,'Matematika',1,0);
         $pdf->Cell(30,6,'Bahasa Indonesia',1,0);
         $pdf->Cell(20,6,'Bahasa Inggris',1,0);
         $pdf->Cell(20,6,'Total',1,1);
         $nilai=$this->db->query("SELECT siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn")->result();
         $no=1;
         foreach ($nilai as $rownilai){
            $pdf->SetFont('Arial','',8);
            $pdf->SetX(40);
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(30,6,$rownilai->nisn,1,0);
            $pdf->Cell(30,6,$rownilai->nama,1,0);
            $pdf->Cell(30,6,$rownilai->ipa,1,0);
            $pdf->Cell(30,6,$rownilai->mtk,1,0);
            $pdf->Cell(30,6,$rownilai->indo,1,0);
            $pdf->Cell(20,6,$rownilai->inggris,1,0);
            $pdf->Cell(20,6,$rownilai->total,1,1);  
         }
         $pdf->Output();
      }

      public function tkj(){
        $pdf = new FPDF('L','mm',array(250,297));
        $pdf->AddPage();
        $pdf->Image('https://lh3.googleusercontent.com/-hgXjkX7F8LY/XT7VWJGrN5I/AAAAAAAAD3M/0lWfKFVWLmU5e9Rro0DqLYiTlsBnH3IuwCLcBGAs/h120/logo.jpeg',20,5,40,20);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'Smk Muhammadiyah Gamping',0,0,'C');
        $pdf->Ln(4);
        $pdf->SetX(103);
        $pdf->SetFont('Arial','Jl. Wates No.Km, RW.6, Depok, Ambarketawang, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55294.',8);
        $pdf->Cell(40,10,'');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(4);
        $pdf->SetX(125);
        $pdf->Cell(40,10,'Telp (021) 89143605');
        $pdf->SetFont('Arial','B',8);
        $pdf->Ln(5);
        $pdf->SetLineWidth(0);
        $pdf->Line(0,25,300,25);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'Laporan Data Kelulusan',0,0,'C');
        $pdf->Ln(4);
         //Table
         $pdf->Ln(8);
         $pdf->SetX(50);
         $pdf->SetFont('Arial','',8);
         $pdf->Cell(10,6,'No',1,0);
         $pdf->Cell(30,6,'NISN',1,0);
         $pdf->Cell(30,6,'Nama',1,0);
         $pdf->Cell(30,6,'Jurusan',1,0);
         $pdf->Cell(50,6,'Asal Sekolah',1,0);
         $pdf->Cell(30,6,'Total',1,0);
         $pdf->Cell(20,6,'Keterangan',1,1);
         $nilai=$this->db->query("SELECT siswa.asal_sekolah, siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='TKJ' order by total desc limit 0,1")->result();
         $no=1;
         foreach ($nilai as $rownilai){
            $pdf->SetX(50);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(30,6,$rownilai->nisn,1,0);
            $pdf->Cell(30,6,$rownilai->nama,1,0);
            $pdf->Cell(30,6,$rownilai->jurusan,1,0);
            $pdf->Cell(50,6,$rownilai->asal_sekolah,1,0);
            $pdf->Cell(30,6,$rownilai->total,1,0);
            $pdf->Cell(20,6,'Lulus',1,1);  
         }
         //Table
        // $pdf->Ln(8);
         //$pdf->SetX(50);
         //$pdf->SetFont('Arial','',8);
         //$pdf->Cell(10,6,'No',1,0);
         //$pdf->Cell(30,6,'NISN',1,0);
         //$pdf->Cell(30,6,'Nama',1,0);
         //$pdf->Cell(30,6,'Jurusan',1,0);
         //$pdf->Cell(50,6,'Asal Sekolah',1,0);
         //$pdf->Cell(30,6,'Total',1,0);
         //$pdf->Cell(20,6,'Keterangan',1,1);
         //$nilai1=$this->db->query("SELECT siswa.asal_sekolah, siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='TKJ' order by total desc limit 1,2")->result();
         //$no=1;
         //foreach ($nilai1 as $rownilai){
           // $pdf->SetX(50);
            //$pdf->SetFont('Arial','',8);
            //$pdf->Cell(10,6,$no++,1,0);
            //$pdf->Cell(30,6,$rownilai->nisn,1,0);
            //$pdf->Cell(30,6,$rownilai->nama,1,0);
            //$pdf->Cell(30,6,$rownilai->jurusan,1,0);
            //$pdf->Cell(50,6,$rownilai->asal_sekolah,1,0);
            //$pdf->Cell(30,6,$rownilai->total,1,0);
            //$pdf->Cell(20,6,'Tidak Lulus',1,1);  
         //}
         $pdf->Output();
      }

            public function multimedia(){
        $pdf = new FPDF('L','mm',array(250,297));
        $pdf->AddPage();
        $pdf->Image('https://lh3.googleusercontent.com/-hgXjkX7F8LY/XT7VWJGrN5I/AAAAAAAAD3M/0lWfKFVWLmU5e9Rro0DqLYiTlsBnH3IuwCLcBGAs/h120/logo.jpeg',20,5,40,20);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'Smk Muhammadiyah Gamping',0,0,'C');
        $pdf->Ln(4);
        $pdf->SetX(103);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Jl. Wates No.Km, RW.6, Depok, Ambarketawang, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55294.');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(4);
        $pdf->SetX(125);
        $pdf->Cell(40,10,'Telp (021) 89143605');
        $pdf->SetFont('Arial','B',8);
        $pdf->Ln(5);
        $pdf->SetLineWidth(0);
        $pdf->Line(0,25,300,25);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'Laporan Data Kelulusan',0,0,'C');
        $pdf->Ln(4);
         //Table
         
         $pdf->Ln(8);
         $pdf->SetX(50);
         $pdf->SetFont('Arial','',8);
         $pdf->Cell(10,6,'No',1,0);
         $pdf->Cell(30,6,'NISN',1,0);
         $pdf->Cell(30,6,'Nama',1,0);
         $pdf->Cell(30,6,'Jurusan',1,0);
         $pdf->Cell(50,6,'Asal Sekolah',1,0);
         $pdf->Cell(30,6,'Total',1,0);
         $pdf->Cell(20,6,'Keterangan',1,1);
         $nilai=$this->db->query("SELECT siswa.asal_sekolah, siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='Multimedia' order by total desc limit 0,1")->result();
         $no=1;
         foreach ($nilai as $rownilai){
            $pdf->SetX(50);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(30,6,$rownilai->nisn,1,0);
            $pdf->Cell(30,6,$rownilai->nama,1,0);
            $pdf->Cell(30,6,$rownilai->jurusan,1,0);
            $pdf->Cell(50,6,$rownilai->asal_sekolah,1,0);
            $pdf->Cell(30,6,$rownilai->total,1,0);
            $pdf->Cell(20,6,'Lulus',1,1);  
         }
          //Table
         
          //$pdf->Ln(8);
          //$pdf->SetX(50);
          //$pdf->SetFont('Arial','',8);
          //$pdf->Cell(10,6,'No',1,0);
          //$pdf->Cell(30,6,'NISN',1,0);
          //$pdf->Cell(30,6,'Nama',1,0);
          //$pdf->Cell(30,6,'Jurusan',1,0);
          //$pdf->Cell(50,6,'Asal Sekolah',1,0);
          //$pdf->Cell(30,6,'Total',1,0);
          //$pdf->Cell(20,6,'Keterangan',1,1);
          //$nilai1=$this->db->query("SELECT siswa.asal_sekolah, siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='Multimedia' order by total desc limit 1,2")->result();
          //$no=1;
          //foreach ($nilai1 as $rownilai){
             //$pdf->SetX(50);
             //$pdf->SetFont('Arial','',8);
             //$pdf->Cell(10,6,$no++,1,0);
             //$pdf->Cell(30,6,$rownilai->nisn,1,0);
             //$pdf->Cell(30,6,$rownilai->nama,1,0);
             //$pdf->Cell(30,6,$rownilai->jurusan,1,0);
             //$pdf->Cell(50,6,$rownilai->asal_sekolah,1,0);
             //$pdf->Cell(30,6,$rownilai->total,1,0);
           //  $pdf->Cell(20,6,'Tidak Lulus',1,1);  
         // }
         $pdf->Output();
      }

      public function akuntansi(){
         $pdf = new FPDF('L','mm',array(250,297));
         $pdf->AddPage();
         $pdf->Image('https://lh3.googleusercontent.com/-hgXjkX7F8LY/XT7VWJGrN5I/AAAAAAAAD3M/0lWfKFVWLmU5e9Rro0DqLYiTlsBnH3IuwCLcBGAs/h120/logo.jpeg',20,5,40,20);
         $pdf->SetX(120);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(40,10,'Smk Muhammadiyah Gaming',0,0,'C');
         $pdf->Ln(4);
         $pdf->SetX(103);
         $pdf->SetFont('Arial','',8);
         $pdf->Cell(40,10,'Jl. Wates No.Km, RW.6, Depok, Ambarketawang, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55294.');
         $pdf->SetFont('Arial','',8);
         $pdf->Ln(4);
         $pdf->SetX(125);
         $pdf->Cell(40,10,'Telp (021) 89143605');
         $pdf->SetFont('Arial','B',8);
         $pdf->Ln(5);
         $pdf->SetLineWidth(0);
         $pdf->Line(0,25,300,25);
         $pdf->SetX(120);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(40,10,'Laporan Data Kelulusan',0,0,'C');
         $pdf->Ln(4);
          //Table
          $pdf->Ln(8);
          $pdf->SetX(50);
          $pdf->SetFont('Arial','',8);
          $pdf->Cell(10,6,'No',1,0);
          $pdf->Cell(30,6,'NISN',1,0);
          $pdf->Cell(30,6,'Nama',1,0);
          $pdf->Cell(30,6,'Jurusan',1,0);
          $pdf->Cell(50,6,'Asal Sekolah',1,0);
          $pdf->Cell(30,6,'Total',1,0);
          $pdf->Cell(20,6,'Keterangan',1,1);
          $nilai=$this->db->query("SELECT siswa.asal_sekolah, siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='akuntansi' order by total desc limit 0,1")->result();
          $no=1;
          foreach ($nilai as $rownilai){
             $pdf->SetX(50);
             $pdf->SetFont('Arial','',8);
             $pdf->Cell(10,6,$no++,1,0);
             $pdf->Cell(30,6,$rownilai->nisn,1,0);
             $pdf->Cell(30,6,$rownilai->nama,1,0);
             $pdf->Cell(30,6,$rownilai->jurusan,1,0);
             $pdf->Cell(50,6,$rownilai->asal_sekolah,1,0);
             $pdf->Cell(30,6,$rownilai->total,1,0);
             $pdf->Cell(20,6,'Lulus',1,1);  
          }
          //Table
          //$pdf->Ln(8);
          //$pdf->SetX(50);
          //$pdf->SetFont('Arial','',8);
          //$pdf->Cell(10,6,'No',1,0);
          //$pdf->Cell(30,6,'NISN',1,0);
          //$pdf->Cell(30,6,'Nama',1,0);
          //$pdf->Cell(30,6,'Jurusan',1,0);
          //$pdf->Cell(50,6,'Asal Sekolah',1,0);
          //$pdf->Cell(30,6,'Total',1,0);
          //$pdf->Cell(20,6,'Keterangan',1,1);
          //$nilai1=$this->db->query("SELECT siswa.asal_sekolah, siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='akuntansi' order by total desc limit 1,2")->result();
          //$no=1;
          //foreach ($nilai1 as $rownilai){
             //$pdf->SetX(50);
             //$pdf->SetFont('Arial','',8);
             //$pdf->Cell(10,6,$no++,1,0);
             //$pdf->Cell(30,6,$rownilai->nisn,1,0);
             //$pdf->Cell(30,6,$rownilai->nama,1,0);
             //$pdf->Cell(30,6,$rownilai->jurusan,1,0);
            // $pdf->Cell(50,6,$rownilai->asal_sekolah,1,0);
           //  $pdf->Cell(30,6,$rownilai->total,1,0);
         //    $pdf->Cell(20,6,'Tidak Lulus',1,1);  
       //   }
          $pdf->Output();
       }
       public function lulus(){
         $pdf = new FPDF('L','mm',array(250,297));
         $pdf->AddPage();
         $pdf->Image('https://lh3.googleusercontent.com/-hgXjkX7F8LY/XT7VWJGrN5I/AAAAAAAAD3M/0lWfKFVWLmU5e9Rro0DqLYiTlsBnH3IuwCLcBGAs/h120/logo.jpeg',20,5,40,20);
         $pdf->SetX(120);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(40,10,'Smk Muhamadiyah Gamping',0,0,'C');
         $pdf->Ln(4);
         $pdf->SetX(103);
         $pdf->SetFont('Arial','',8);
         $pdf->Cell(40,10,'Jl. Wates No.Km, RW.6, Depok, Ambarketawang, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55294.');
         $pdf->SetFont('Arial','',8);
         $pdf->Ln(4);
         $pdf->SetX(125);
         $pdf->Cell(40,10,'Telp (021) 89143605');
         $pdf->SetFont('Arial','B',8);
         $pdf->Ln(5);
         $pdf->SetLineWidth(0);
         $pdf->Line(0,25,300,25);
         $pdf->SetX(120);
         $pdf->SetFont('Arial','B',12);
         $pdf->Cell(40,10,'Laporan Data Kelulusan',0,0,'C');
         $pdf->Ln(4);
          //Table
          $pdf->Ln(8);
          $pdf->SetX(50);
          $pdf->SetFont('Arial','',8);
          $pdf->Cell(10,6,'No',1,0);
          $pdf->Cell(30,6,'NISN',1,0);
          $pdf->Cell(30,6,'Nama',1,0);
          $pdf->Cell(30,6,'Jurusan',1,0);
          $pdf->Cell(50,6,'Asal Sekolah',1,0);
          $pdf->Cell(30,6,'Total',1,0);
          $pdf->Cell(20,6,'Keterangan',1,1);
          $lulus=$this->db->query("SELECT siswa.jurusan as jurusan,siswa.asal_sekolah, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn order by siswa.nama asc")->result();
          //$nilai=$this->db->query("SELECT siswa.asal_sekolah, siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='TKJ' order by total desc limit 0,1")->result();
          $no=1;
          foreach ($lulus as $rownilai){
             $pdf->SetX(50);
             $pdf->SetFont('Arial','',8);
             $pdf->Cell(10,6,$no++,1,0);
             $pdf->Cell(30,6,$rownilai->nisn,1,0);
             $pdf->Cell(30,6,$rownilai->nama,1,0);
             $pdf->Cell(30,6,$rownilai->jurusan,1,0);
             $pdf->Cell(50,6,$rownilai->asal_sekolah,1,0);
             $pdf->Cell(30,6,$rownilai->total,1,0);
             if ($rownilai->total>=66){
             $pdf->Cell(20,6,'Lulus',1,1);
          }
          else {
             $pdf->Cell(20,6,'Tidak Lulus',1,1);
          }  
       }
          //Table
         // $pdf->Ln(8);
          //$pdf->SetX(50);
          //$pdf->SetFont('Arial','',8);
          //$pdf->Cell(10,6,'No',1,0);
          //$pdf->Cell(30,6,'NISN',1,0);
          //$pdf->Cell(30,6,'Nama',1,0);
          //$pdf->Cell(30,6,'Jurusan',1,0);
          //$pdf->Cell(50,6,'Asal Sekolah',1,0);
          //$pdf->Cell(30,6,'Total',1,0);
          //$pdf->Cell(20,6,'Keterangan',1,1);
          //$nilai1=$this->db->query("SELECT siswa.asal_sekolah, siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total,id_nilai, ipa,inggris,mtk,indo FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='TKJ' order by total desc limit 1,2")->result();
          //$no=1;
          //foreach ($nilai1 as $rownilai){
            // $pdf->SetX(50);
             //$pdf->SetFont('Arial','',8);
             //$pdf->Cell(10,6,$no++,1,0);
             //$pdf->Cell(30,6,$rownilai->nisn,1,0);
             //$pdf->Cell(30,6,$rownilai->nama,1,0);
             //$pdf->Cell(30,6,$rownilai->jurusan,1,0);
             //$pdf->Cell(50,6,$rownilai->asal_sekolah,1,0);
             //$pdf->Cell(30,6,$rownilai->total,1,0);
             //$pdf->Cell(20,6,'Tidak Lulus',1,1);  
          //}
          $pdf->Output();
       }
}
