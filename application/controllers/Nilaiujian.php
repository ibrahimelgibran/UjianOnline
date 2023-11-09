<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilaiujian extends CI_Controller {
  
    public function index(){
    //if ($this->session->userdata('level')=='calonsiswa'){
    //$querynisn1=$this->db->query("select * from nilai where nisn='$nisn'");
    //$data['jumlahnisn']=$querynisn1->num_rows();}
    $data['search'] = $this->input->get('search');
    $data['siswa'] = $this->m_crud->tampil_data('siswa')->result();
    $data['nilai'] = $this->db->query("select * from ujian where nisn like '%".$data['search']."%'")->result();
	$this->load->view('nilaiujian/v_data_nilai_ujian',$data);
      }
    }