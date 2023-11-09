<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran1 extends CI_Controller {
  
    public function index(){
    $data['search'] = $this->input->get('search');
    $data['pendaftaran'] = $this->db->query("select * from siswa where nama like '%".$data['search']."%' or nisn like '%".$data['search']."%'")->result();
    $this->load->view('pendaftaran/v_add_pendaftaran_calon_siswa',$data);
      }
     
      public function upload_foto(){
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('foto')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          // Jika gagal :
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
	  }
	  public function upload_ijazah_depan(){
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('ijazah_depan')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          // Jika gagal :
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }
      public function upload_ijazah_belakang(){
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('ijazah_belakang')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          // Jika gagal :
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }

      public function upload_bukti_transfer(){
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('bukti_transfer')){ // Lakukan upload dan Cek jika proses upload berhasil
          // Jika berhasil :
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          // Jika gagal :
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }

    

      public function do_insert(){
        $bukti_transfer = $this->upload_bukti_transfer();
        $upload_foto = $this->upload_foto();
        $upload_ijazah_depan = $this->upload_ijazah_depan(); 
        $upload_ijazah_belakang = $this->upload_ijazah_belakang();
        $nama=$this->input->post('nama');
        $nisn=$this->input->post('nisn');
        $alamat=$this->input->post('alamat');
        $jurusan=$this->input->post('jurusan');
        $asal_sekolah=$this->input->post('asal_sekolah');
        $telepon=$this->input->post('telepon');
        $orangtua=$this->input->post('orangtua');
        $username=$this->input->post('telepon');
        $usernamecalonsiswa=$this->session->userdata('username');
        $password=md5('123');
        $level='calonsiswa';
        $sesicalonsiswa=$this->session->userdata('level')=='calonsiswa';
        $sesioperator=$this->session->userdata('level')=='operator';
        $siswa=$this->db->query("select * from siswa where nisn='$nisn'");
        $ceksiswa=$siswa->num_rows();
        $jenis_transfer="Transfer";
        

        $data = array(
            'nama' => $nama,
            'nisn' => $nisn,
            'alamat' => $alamat,
            'jurusan' => $jurusan,
            'asal_sekolah' => $asal_sekolah,
            'telepon' => $telepon,
            'orangtua' => $orangtua,
            'username' => $usernamecalonsiswa,
            'ijazah_belakang' => $upload_ijazah_belakang['file']['file_name'],
            'foto'=> $upload_foto['file']['file_name'],
            'ijazah_depan' => $upload_ijazah_depan['file']['file_name'],
            'bukti_transfer' => $bukti_transfer['file']['file_name'],
            'jenis_transfer'=>$jenis_transfer,
        );
    
        $datauser = array(
            'username' => $username,
            'password' => $password,
            'level' => $level,
        );
    if ($ceksiswa>0){
      $this->session->set_flashdata('msg', 
      '<div class="alert alert-danger">
          <h4>Anda Sudah Terdaftar</h4>
      </div>');  
redirect('pendaftaran1');
    }
    elseif (!empty($nama))
         {
       // $this->m_crud->insert_data($datauser,'user');
        $this->m_crud->insert_data($data,'siswa');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('pendaftaran1');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('pendaftaran1');
    }
}

        
    
}
