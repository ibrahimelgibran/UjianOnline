<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kelulusan extends CI_Controller {
  
    public function index(){
      $this->load->view('kelulusan/v_data_kelulusan');
      }

      public function tkj() {
        //$data['search'] = $this->input->get('search');
      //$data['siswa'] = $this->m_crud->tampil_data('siswa')->result();
      //$kuota=$this->input->post('kuota');
      //$data['nilai'] = $this->db->query("SELECT siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where nama like '%".$data['search']."%' order by total desc")->result();
      //if ($kuota){
      //$data['lulus'] = $this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='TKJ' order by total desc limit 0,1 ")->result();
     // }
      //else {
        //$data['lulus'] = $this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='TKJ' order by total desc limit 10")->result();
      //}
      //$data['tidaklulus'] = $this->db->query("SELECT siswa.jurusan as jurusan,siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='TKJ' order by total desc limit 1,2")->result();
      $data['lulus']=$this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='TKJ'")->result();
      $this->load->view('kelulusan/v_data_kelulusan_tkj',$data);
      }
    
    public function multimedia() {
      //$data['search'] = $this->input->get('search');
   // $data['siswa'] = $this->m_crud->tampil_data('siswa')->result();
    //$kuota=$this->input->post('kuota');
  //  $data['nilai'] = $this->db->query("SELECT siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where nama like '%".$data['search']."%' order by total desc")->result();
    //if ($kuota){
   // $data['lulus'] = $this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='multimedia' order by total desc limit 0,1 ")->result();
    //$data['lulus1'] = $this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='multimedia' order by total desc limit 1 ");
    //$data['lulus1']=$data['lulus1']->num_rows;
    ///}
    //else {
    //  $data['lulus'] = $this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='multimedia' order by total desc limit 10")->result();
    //}
   // $data['tidaklulus'] = $this->db->query("SELECT siswa.jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='multimedia' order by total desc limit 1,2")->result();
   $data['lulus']=$this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='Multimedia'")->result();
      
   $this->load->view('kelulusan/v_data_kelulusan_multimedia',$data);
    }
    

    public function akuntansi() {
      //$data['search'] = $this->input->get('search');
    $data['siswa'] = $this->m_crud->tampil_data('siswa')->result();
    //$kuota=$this->input->post('kuota');
    //$data['nilai'] = $this->db->query("SELECT siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where nama like '%".$data['search']."%' order by total desc")->result();
    //if ($kuota){
    //$data['lulus'] = $this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='akuntansi' order by total desc limit 0,1 ")->result();
   // }
    //else {
      //$data['lulus'] = $this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='TKJ' order by total desc limit 10")->result();
    //}
    //$data['tidaklulus'] = $this->db->query("SELECT siswa.jurusan,siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='akuntansi' order by total desc limit 1,2")->result();
    $data['lulus']=$this->db->query("SELECT siswa.jurusan as jurusan, siswa.nisn as nisn,siswa.nama as nama, total FROM nilai join siswa on nilai.nisn = siswa.nisn where jurusan='Akuntansi'")->result();
    
    $this->load->view('kelulusan/v_data_kelulusan_akuntansi',$data);
    }



  }


