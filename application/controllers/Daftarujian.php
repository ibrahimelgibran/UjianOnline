<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarujian extends CI_Controller {
  
    public function index(){
        
        $data['daftarujian']=$this->db->query('select * from siswa')->result();
         $this->load->view('daftarujian/v_daftarujian',$data);
      }

function do_insert(){
 $val=$this->input->post('nisn');
 $nisn=$this->input->post('nisn');
 $token = password_hash($val, PASSWORD_DEFAULT);
 //return $token;
 $data = array(
    'nisn' => $nisn,
    'token' =>  $token,

);
$nisn1 = $this->db->query("select * from token where nisn='$nisn'");
$getnisn=$nisn1->num_rows();

    if ($getnisn > 0)
    {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-denger">
                        <h4>Token sudah ada</h4>
                    </div>');  
        redirect('daftarujian');
    }
    elseif (!empty($nisn))
    { 
        $this->m_crud->insert_data($data,'token');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('daftarujian');
    }
    else 
    {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Gagal</h4>
                    </div>');  
        redirect('daftarujian');
    }
}    
   
    
    
    
    
    
    
    
    
    
    
    
    
      
    
}
