<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
  
    public function index(){
    $data['search'] = $this->input->get('search');
    $data['pendaftaran'] = $this->db->query("select * from siswa where nama like '%".$data['search']."%' or nisn like '%".$data['search']."%'")->result();
    $this->load->view('pendaftaran/v_data_pendaftaran',$data);
      }
     
      public function upload_foto(){
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config); 
        if($this->upload->do_upload('foto')){ 
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
   
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
	  }
	  public function upload_ijazah_depan(){
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config); 
        if($this->upload->do_upload('ijazah_depan')){ 
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
        
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }
      public function upload_ijazah_belakang(){
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config);
        if($this->upload->do_upload('ijazah_belakang')){ 
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          
          $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
          return $return;
        }
      }

      public function upload_bukti_transfer(){
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;
      
        $this->load->library('upload', $config); 
        if($this->upload->do_upload('bukti_transfer')){ 
    
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
          return $return;
        }else{
          
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
        $password=md5($telepon);
        $level='calonsiswa';
        $sesicalonsiswa=$this->session->userdata('level')=='calonsiswa';
        $sesioperator=$this->session->userdata('level')=='operator';
       // $bukti="sudahbayar.png";
        $jenis_transfer=$this->input->post('jenis_transfer');

        $data = array(
            'nama' => $nama,
            'nisn' => $nisn,
            'alamat' => $alamat,
            'jurusan' => $jurusan,
            'asal_sekolah' => $asal_sekolah,
            'telepon' => $telepon,
            'orangtua' => $orangtua,
            'username' => $username,
            'ijazah_belakang' => $upload_ijazah_belakang['file']['file_name'],
            'foto'=> $upload_foto['file']['file_name'],
            'ijazah_depan' => $upload_ijazah_depan['file']['file_name'],
            'bukti_transfer'=>$bukti_transfer['file']['file_name'],
            'jenis_transfer'=>$jenis_transfer,
        );

        $ceknisn12=$this->db->query("select * from siswa where nisn='$nisn'");
        $ceknisn1 = $ceknisn12->num_rows();
    
        $datauser = array(
            'username' => $username,
            'password' => $password,
            'level' => $level,
        );
        if ($ceknisn1 > 0){
            $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
                <h4>Anda Sudah Terdaftar</h4>
            </div>');  
redirect('pendaftaran');
        }
    elseif (!empty($nama))
         {
        $this->m_crud->insert_data($datauser,'user');
        $this->m_crud->insert_data($data,'siswa');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('pendaftaran');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('pendaftaran');
    }
}



    function hapus($id){
        $where = array('id_siswa' => $id);
        $this->m_crud->hapus_data($where,'siswa');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('pendaftaran');
      }
    function edit($id){
		$where = array('id_siswa' => $id);
        $data['pendaftaran'] = $this->m_crud->edit_data($where,'siswa')->result();
		$this->load->view('pendaftaran/v_edit_pendaftaran', $data);
    }

    function update(){
        $id=$this->input->post('id');;
        $nama=$this->input->post('nama');
        $nisn=$this->input->post('nisn');
        $alamat=$this->input->post('alamat');
        $jurusan=$this->input->post('jurusan');
        $asal_sekolah=$this->input->post('asal_sekolah');
        $telepon=$this->input->post('telepon');
        $orangtua=$this->input->post('orangtua');

        $data = array(
            'nama' => $nama,
            'nisn' => $nisn,
            'alamat' => $alamat,
            'jurusan' => $jurusan,
            'asal_sekolah' => $asal_sekolah,
            'telepon' => $telepon,
            'orangtua' => $orangtua,
        );
    
        $where = array(
            'id_siswa' => $id
        );
     
        $this->m_crud->update_data($where,$data,'siswa');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Update Data</h4>
                    </div>');  
        redirect('pendaftaran');
        }

        public function detail($id){
            $data['calonsiswa']=$this->db->query("select * from siswa where id_siswa='$id'")->result();
            $this->load->view('pendaftaran/v_data_pendaftaran_detail',$data);
        }

        public function transfer(){
            
            $data['transfer'] = $this->db->query("select * from siswa")->result();
            $this->load->view('pendaftaran/v_transfer',$data);
            
              }
             
    
}